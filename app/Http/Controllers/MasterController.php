<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;
use App\slider;
use App\katadepan;
use App\keunggulan;
use App\kepala;
use App\gallery;
use App\album;
use App\alumni;
use App\berita;
use App\galeri;

use App\jurusan;
use App\filejurusan;
use App\jurkeunggulan;
use App\juralasan;
use App\jurgallery;
use App\statistik;
use App\videodepan;


use App\mapel;
use App\visimisi;
use App\profilsekolah;
use Crypt;
use App\kategori;



class MasterController extends Controller
{
     public function __construct()
    {

       
        $jurusan = jurusan::all();

        View::share('coba', $jurusan);
    }
	public function index()
    {
    	
        $slider = slider::all();
        $katadepan = katadepan::all();
        $keunggulan = keunggulan::all();
        $statistik = statistik::all();
        $video = videodepan::all();
        $master = keunggulan::find(1);

        $kepala = kepala::find(3);
        $berita = berita::all()->take(3);
        
    	return view('master/index',['slider' => $slider, 'katadepan' => $katadepan, 'keunggulan' => $keunggulan, 'master' => $master, 'kepala' => $kepala, 'statistik' => $statistik, 'video' => $video, 'berita' => $berita  ]); 


    
    }

    public function jurusan($id){

    $jurusan = jurusan::where('id' ,'=' ,$id)->get();
    $p       = filejurusan::where('id_jurusan' ,'=' ,$id)->get();
    $keunggulan  = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get();
    $alasan     = juralasan::where('id_jurusan', '=' , $id)->get();
    $gallery   = jurgallery::where('id_jurusan', '=' , $id)->get();


    return view('master/tkj',compact('jurusan','p','keunggulan','alasan','gallery'));
}

    public function tkj()
    {
    	

    	return view('master/tkj'); 
    
    }

    public function perbankan()
    {
    	

    	return view('master/perbankan'); 
    
    }

    public function multimedia()
    {
    	

    	return view('master/multimedia'); 
    
    }

    public function alumni(){

        $alumni = alumni::all();
        return view('master/alumni',compact('alumni'));
    }


    public function gallery()
    {   
         $users = db::table('album')->join('galleries', 'album.id', '=', 'galleries.id_album')->select('album.*', 'galleries.image')->get();
        
        $album =album::orderBy('created_at', 'desc')->paginate(6);
       return view('master/mgallery',compact('users','album'));
    
    }

        public function gallery2($id_album)
    {   
        $users = db::table('album')->join('galleries', 'album.id', '=', 'galleries.id_album')->select('album.*', 'galleries.image')->get();

      
        

        
        $p = gallery::where('id_album' ,'=' ,$id_album)->get('image');
        $tes = album::where('id' ,'=' ,$id_album)->get();
     

       
        // $cok = DB::table('galleries')
        //          ->leftJoin('album', 'galleries.id_album', '=', 'album.id')
                 
        //          ->select('galleries.image')->first($id_album);

            // $cok = gallery:: where ('id', $id_album)
            //     -> leftJoin ('album', 'galleries.id_album', '=', $id_album)
            //     -> select ('galleries.id_album', 'galleries.image') -> first ();

               

        return view('master/mgallery2',compact('users','tes','p','cok')); 

    
    }
    public function berita(){
        $berita = berita::orderBy('id_berita','desc')->paginate(5);
        $kategori = kategori::all();
        $count = count($berita);
        if ($count == null)
            $random = berita::all();
        elseif ($count == 1)
            $random = berita::all()->random(1);
        elseif ($count > 1) 
            $random = berita::all()->random(2);
        return view('master/berita', ['berita' => $berita, 'kategori' => $kategori, 'random' => $random]);
    }
    public function berita_view($id,$judul){
        $berita = berita::find($judul);
        $b = berita::all();
        $kategori = kategori::all();
        $count = count($b);
        if ($count == null)
            $random = berita::all();
        elseif ($count == 1)
            $random = berita::all()->random(1);
        elseif ($count > 1) 
            $random = berita::all()->random(2);
        return view('master/beritaview', compact('berita','kategori','random','b'));
    }
   
    public function files(){
        $mapel = mapel::all();
        $files = DB::table('files')
        ->join('mapel', 'files.id_mapel', '=', 'mapel.id_mapel')
        ->select('*')
        ->orderBy('id_files', 'desc')
        ->paginate(6);
        return view('master/files', compact('mapel','files'));
    }
    public function filesmapel_search(Request $request){
        $files = DB::table('files')
        ->join('mapel', 'files.id_mapel', '=', 'mapel.id_mapel')
        ->select('*')
        ->orderBy('id_files', 'desc')
        ->where('judul', 'like', '%'.$request->search.'%')
        ->paginate(1000);
        return view('master/files', compact('mapel','files'));
    }
    public function visimisi(){
        $visimisi = visimisi::find(1);
        return view('master/visimisi', compact('visimisi'));
    }
    public function profilsekolah(){
        $profilsekolah = profilsekolah::find(1);
        return view('master/profilsekolah', compact('profilsekolah'));
    }
}
