<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\calon_siswa;
use App\ppdbjurusan;
use App\jalur;
use DB;

class ppdbController extends Controller
{
    public function indexform ()
    {
         $jurusan= ppdbjurusan::all();
          $jalur= jalur::all();
    	return view ("ppdb/ppdbform", ['jurusan'=> $jurusan, 'jalur'=> $jalur]);
    }

    public function addform (Request $request)
    {


        // $validator = Validator::make($request->all(), [
        //     'nisn' => 'required',
           
        //     ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->with('gagal','gagal post berita!');
        // }


       // $validatedData = $request->validate([
       //  'nisn' => 'required|unique:calon_siswas|max:255'
      
       //  ]);

        // if ($validatedData->fails()) {
        //     // return redirect()->back()->with('gagal','gagal post berita!');
        //   return('skdjfhskdjfhskjd');
        // }


       $id_jurusan=$request->jurusan1;
        $jurusan = ppdbjurusan::find($id_jurusan);

        // dd($jurusan);
        $namajurusan= $jurusan->nama_jurusan;

// menyimpan form baru
    	$formulir = new calon_siswa;
    	 $formulir ->id_jalur = $request->jalur_pendaftaran;
    	  $formulir ->id_jurusan1= $request->jurusan1;
          $formulir ->id_jurusan2= $request->jurusan2;
          // $formulir ->nisn= $request->nisn;

          $formulir ->jurusan=$namajurusan;
          
            $formulir -> save();

        $formid=$formulir->id;

// jurusan1
        // mendapatkan id_jurusan dari tabel calon_siswas 
        $id_jurusan1 = $formulir->id_jurusan1;

        // mencari jurusan dengan id yang didapatkan dari table calon_siswa
        $jurusan1 = ppdbjurusan::find($id_jurusan1);

        // menyimpan info kuota dari jurusan ke dalam variable
        $kuota_jurusan1 = $jurusan1->kuota;

        // menghitung jumlah siswa yang memeiliki id sama dengan $id_jurusan
        $siswa_jurusan1 = calon_siswa::where('id_jurusan1',$id_jurusan1 )->get()->count();



// jurusan2
        $id_jurusan2 = $formulir->id_jurusan2;
        $jurusan2 = ppdbjurusan::find($id_jurusan2);
        $kuota_jurusan2 = $jurusan2->kuota;
        $siswa_jurusan2 = calon_siswa::where('id_jurusan2',$id_jurusan2 )->get()->count();


// jalur

         // mendapatkan id_jalur dari tabel calon_siswas 
        $id_jalur = $formulir->id_jalur;

        // mencari jalur dengan id yang didapatkan dari table calon_siswa
        $jalur = jalur::find($id_jalur);

        // menyimpan info kuota dari jalur ke dalam variable
        $kuota_jalur = $jalur->kuota;

        // menghitung jumlah siswa yang memeiliki id sama dengan $id_jalur
        $siswa_jalur = calon_siswa::where('id_jalur',$id_jalur )->get()->count();

//if 
       
       // membandingkan data yang ada di table calon_siswa dengan kuota 
        if ($siswa_jurusan1>$kuota_jurusan1 && $siswa_jalur>$kuota_jalur && $siswa_jurusan2>$kuota_jurusan2) 
        {
                // menghapus lagi form (karena kuota penuh)
               $form = calon_siswa::find($formid);
                $form->delete();
                return redirect()->back()->with('gagal','kuota jalur pendaftaran dan jurusan yang anda pilih telah penuh');
        }

        else if ($siswa_jalur>$kuota_jalur)
        {       
               $form = calon_siswa::find($formid);
                $form->delete();
               return redirect()->back()->with('gagal','kuota jalur yang anda pilih telah penuh');     
        }

         else if($siswa_jurusan1>$kuota_jurusan1 && $siswa_jurusan2>$kuota_jurusan2)
        {           
               $form = calon_siswa::find($formid);
                $form->delete();
                 return redirect()->back()->with('gagal','kuota kedua jurusan yang anda pilih telah penuh');     
        }

        else if($siswa_jurusan1>$kuota_jurusan1)
        {           
               $form = calon_siswa::find($formid);
                $form->delete();
                return redirect()->back()->with('gagal','kuota jurusan (pilihan 1) yang anda pilih telah penuh');
        }

         else if($siswa_jurusan2>$kuota_jurusan2)
        {
               $form = calon_siswa::find($formid);
                $form->delete();
                 return redirect()->back()->with('gagal','kuota jurusan (pilihan 2) yang anda pilih telah penuh');
        }
        else
        {
             // melanjutkan ke formulir pendaftaran
                return redirect ('/ppdb/form/show/'.$formid);
        }

    }



    public function showform($id)
    {
          $formulir= calon_siswa::find($id);

            $id1=$formulir->id_jurusan1;
          $jurusan1 = ppdbjurusan::find($id1); 

            $id2=$formulir->id_jurusan2;
          $jurusan2 = ppdbjurusan::find($id2); 

            $iddd=$formulir->id_jalur;
          $jalur = jalur::find($iddd); 




        return view('ppdb/ppdbformulir',['formulir' =>  $formulir , 'jurusan1' =>  $jurusan1,  'jurusan2' =>  $jurusan2,  'jalur' =>  $jalur] );
    }




    public function storeform(request $request, $id)
    {



        $formulir= calon_siswa::find($id);
            
            $formulir ->no_un= $request->no_un;
          $formulir ->ktrgn_paud= $request->paud;
          $formulir ->ktrgn_tk= $request->tk;
          $formulir ->hobi= $request->hoby;
          $formulir ->cita_cita= $request->cita;
           $formulir ->nama= $request->nama;
            $formulir ->jenis_kelamin= $request->jenis_kelamin;
             $formulir ->nisn= $request->nisn;
              $formulir ->nik= $request->nik;
               $formulir ->tempat_lhr= $request->tempat_lahir;
                $formulir ->tanggal_lhr= $request->tanggal_lahir;      
                 $formulir ->agama= $request->agama;
                  $formulir ->alamat= $request->alamat;
                  $formulir ->rt= $request->rt;
                  $formulir ->rw= $request->rw;
                  $formulir ->nama_dusun= $request->dusun;
                  $formulir ->nama_desa= $request->desa;
                  $formulir ->kecamatan= $request->Kecamatan;
                  $formulir ->kota= $request->kabupaten;
                  $formulir ->kode_pos= $request->kode_pos; 
                  $formulir ->tempat_tinggal= $request->tempat_tinggal;
                  $formulir ->modal_transport= $request->transportasi;        
                  $formulir ->no_hp= $request->no_hp;
                  $formulir ->email= $request->email;
                  $formulir ->no_tlp= $request->no_telepon;
                  $formulir ->no_sktm= $request->sktm;
                  $formulir ->no_kks= $request->kks;
                  $formulir ->no_kps= $request->kps;
                   $formulir ->no_kip= $request->kip;
                    $formulir ->no_kis= $request->kis;
                    $formulir ->kewarganegaraan= $request->warga;
                     $formulir ->kebutuhan= $request->kebutuhan_siswa;


                     $formulir ->jumlah_sdr= $request->jumlah_saudara;
                    $formulir ->jarak_rmh= $request->jarak_tinggal;
                  $formulir ->berat_badan= $request->berat_badan;
                $formulir ->tinggi_badan= $request->tinggi_badan;
              $formulir ->waktu_tempuh= $request->waktu_tempuh;



                    $formulir ->nama_ayah= $request->nama_ayah;
                    $formulir ->tgllahir_ayah= $request->tgl_ayah;
                     $formulir ->pendidikan_ayah= $request->pendidikan_ayah;
                      $formulir ->penghasilan_ayah= $request->penghasilan_ayah;
                       $formulir ->pekerjaan_ayah= $request->pekerjaan_ayah;
                       $formulir ->kebutuhan_ayah= $request->kebutuhan_ayah;


                    $formulir ->nama_ibu= $request->nama_ibu;
                    $formulir ->tgllahir_ibu= $request->tgl_ibu;
                     $formulir ->pendidikan_ibu= $request->pendidikan_ibu;
                      $formulir ->penghasilan_ibu= $request->penghasilan_ibu;
                       $formulir ->pekerjaan_ibu= $request->pekerjaan_ibu;
                       $formulir ->kebutuhan_ibu= $request->kebutuhan_ibu;

                    $formulir ->nama_wali= $request->nama_wali;
                    $formulir ->tgllahir_wali= $request->tgl_wali;
                     $formulir ->pendidikan_wali= $request->pendidikan_wali;
                      $formulir ->penghasilan_wali= $request->penghasilan_wali;
                       $formulir ->pekerjaan_wali= $request->pekerjaan_wali;
                       $formulir ->kebutuhan_wali= $request->kebutuhan_wali;     

                   $formulir -> save();


                  $no_daftar = date('Y').'000'.$formulir ->id;
                  
                   $formulir= calon_siswa::find($id);
                   $formulir->no_daftar= $no_daftar;
                    $formulir -> save();


                $messages = [ 'mimes' => 'Ekstensi file:jpg,png,jpeg.  Ukuran Maksimal 2 MB!!!'];

                $this->validate( $request, [
                    'file'=> 'required|file|mimes:jpg,jpeg,png|max:2000'  ],$messages );

                $upload = $request->file('file');
                $name =  $upload->getClientOriginalName();
                $path = $upload->move('/gambar/fotopeserta', $name);
                 $file = calon_siswa:: find($id);

                 $file->foto_title =  $upload -> getClientOriginalName();
                 $file->foto_path = $name;

                 $file->save();



            return redirect('/ppdb/form') ->with("Formulir Berhasil Terkirim. ") ;

    }


 public function hasil()
    {
        
      return view ("ppdb/cekhasil");
    }
   
  public function cekhasil(request $request)
    {  
      $no_daftar=$request->no_daftar;
        $hasil= calon_siswa::where('no_daftar',$no_daftar)->first();

        // dd($hasil);
        if ($hasil) 
        {
             if($hasil->status=='diterima' )
              {
                
                $status = 'Selamat Anda Diterima ';
                $pesan= 'Silahkan untuk Melakukan Daftar Ulang Dengan Membawa Berkas -Berkas Yang Dibutuhkan';
              
                return view ("ppdb/hasil",['hasil'=>$hasil,'status'=>$status,'pesan'=>$pesan]);
              }
              elseif ($hasil->status=='ditolak')
              {

                $status = 'Maaf masa depan anda telah tiada ';
                $pesan= 'gagal total. silahkan bunuh diri saja!';

                // dd($pesan);
              
                return view ("ppdb/hasil",['hasil'=>$hasil,'status'=>$status,'pesan'=>$pesan]);
              }
              elseif ($hasil->status==null)
              {
                $status = 'sabar... proses seleksi belum dilakukan :)';
                 $pesan= ' ';
              
                return view ("ppdb/hasil",['hasil'=>$hasil,'status'=>$status,'pesan'=>$pesan]);
              }
              else
              {

              }
        }

        else 
        {
            $status= 'Data tidak ditemukan, pastikan nomor pendaftaran yang anda masukkan benar';
            $pesan=' ';

           
              
                return view ("ppdb/hasil",['hasil'=>$hasil,'status'=>$status,'pesan'=>$pesan]);
        }


       

         
    }
     
                   
}
