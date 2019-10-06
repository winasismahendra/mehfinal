<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\calon_siswa;
use App\jurusan;
use App\ppdbjurusan;
use App\jalur;
use DB;

class ppdbadminController extends Controller
{
     public function indexsiswa ()
    {

    }




     public function calonsiswa($id)
    {
      $jurusans=jurusan::find($id);
      $nama_jurusan=$jurusans->nama_jurusan;

         $calon_siswa = DB::table( 'calon_siswas')
                     ->join ('jalur_pendaftaran' , 'calon_siswas.id_jalur', '=' , 'jalur_pendaftaran.id')
                     ->select('jalur_pendaftaran.*', 'calon_siswas.*')
                     ->where('calon_siswas.status', null)
                     ->where('calon_siswas.jurusan',$nama_jurusan)
                     ->get();

         $jurusan= $nama_jurusan;
     
         return view ("admin2/ppdbsiswalist", ['calon_siswa'=> $calon_siswa,'jurusan'=> $jurusan]);
    }



    public function detailcalonsiswa($id)
	{
		$calon_siswa = calon_siswa::find($id);

		
            $id1=$calon_siswa->id_jurusan1;
          $jurusan1 = ppdbjurusan::find($id1); 

            $id2=$calon_siswa->id_jurusan2;
          $jurusan2 = ppdbjurusan::find($id2); 

            $iddd=$calon_siswa->id_jalur;
          $jalur = jalur::find($iddd); 

		return view('admin2/ppdbsiswadetail',['calon_siswa' => $calon_siswa , 'jurusan1' =>  $jurusan1,  'jurusan2' =>  $jurusan2,  'jalur' =>  $jalur] );
	}


  public function tolaksiswa (Request $request, $id )
  {
      $calon_siswa = calon_siswa::find($id);

      // mengambil id_jurusan2
      $idjurusan2= $calon_siswa->id_jurusan2;

      // mengambil nama jurusan yang mempunyai id sama dengan id_jurusan2
      $jurusan2 = ppdbjurusan::find($idjurusan2);


      // jika keduanya sama maka langsung mengisi kolom status dengan "ditolak", namun jika masih beda maka mengisi kolom "jurusan" denganisi dari kolom "id_jurusan2"
      if ($calon_siswa->jurusan === $jurusan2->nama_jurusan) 
      {
         $calon_siswa->status=$request->status;
         $calon_siswa -> save();

         return redirect()->back()->with('berhasil','peserta dengan Nomor Pendaftaran : '.$calon_siswa->no_daftar.' telah ditolak. Silahkan Kembali Ke List Peserta');
       
      }

      else
      {
        $calon_siswa->jurusan=$jurusan2->nama_jurusan;
         $calon_siswa -> save();

          return redirect()->back()->with('berhasil','peserta dengan Nomor Pendaftaran : '.$calon_siswa->no_daftar.' dialihkan ke jurusan pilihan kedua. Silahkan Kembali Ke List Peserta');
      }
      
  }

  public function terimasiswa (Request $request, $id )
  {
     $calon_siswa = calon_siswa::find($id);

     // mengisi kolom status dengan "diterima"
      $calon_siswa->status=$request->status;

      // mengisi kolom "jurusan_diterima" dengan isi sama dengan kolom "jurusan"
      $calon_siswa->jurusan_diterima= $calon_siswa->jurusan;
      $calon_siswa -> save();

       return redirect()->back()->with('berhasil','peserta dengan Nomor Pendaftaran : '.$calon_siswa->no_daftar.' berhasil diterima di jurusan '.$calon_siswa->jurusan_diterima.' Silahkan Kembali Ke List Peserta');
  }



     public function siswa($id)
    {
        $jurusans=ppdbjurusan::find($id);
       $nama_jurusan=$jurusans->nama_jurusan;

         $calon_siswa = calon_siswa::where('status',"diterima")
        ->where('jurusan_diterima',$nama_jurusan)
        ->get();

        $jurusan= $nama_jurusan;
  
         return view ("admin2/siswalist", ['calon_siswa'=> $calon_siswa,'jurusan'=> $jurusan]);
    }




    public function detailsiswa($id)
  {
    $calon_siswa = calon_siswa::find($id);

    
            $id1=$calon_siswa->id_jurusan1;
          $jurusan1 = ppdbjurusan::find($id1); 

            $id2=$calon_siswa->id_jurusan2;
          $jurusan2 = ppdbjurusan::find($id2); 

            $iddd=$calon_siswa->id_jalur;
          $jalur = jalur::find($iddd); 

    return view('admin2/siswadetail',['calon_siswa' => $calon_siswa , 'jurusan1' =>  $jurusan1,  'jurusan2' =>  $jurusan2,  'jalur' =>  $jalur] );
  }


   public function editsiswa($id) 
    {
         $calon_siswa = calon_siswa::find($id);
        return view ('admin2/editsiswa', ['calon_siswa' => $calon_siswa]);
    }




     public function siswaditolak()
    {
     

         $calon_siswa = DB::table( 'calon_siswas')
                     ->join ('jalur_pendaftaran' , 'calon_siswas.id_jalur', '=' , 'jalur_pendaftaran.id')
                     ->select('jalur_pendaftaran.*', 'calon_siswas.*')
                     ->where('calon_siswas.status', 'ditolak')
                     ->get();

         
     
         return view ("admin2/siswaditolaklist", ['calon_siswa'=> $calon_siswa]);
    }




}
