<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use View;
use App\slider;
use App\katadepan;
use App\keunggulan;
use App\kepala;
use App\gallery;
use App\album;
use File;
use App\kategori;
use App\berita;
use App\alumni;
use App\jurusan;
use App\User;
use App\filejurusan;
use App\jurkeunggulan;
use App\juralasan;
use App\jurgallery;
use App\statistik;
use App\videodepan;
use App\laborat;
use App\gtk;
use Auth;

use App\mapel;
use App\files;
use App\ppdbjurusan;
use App\visimisi;
use App\profilsekolah;


class AdminController extends Controller
{
         protected $gallery,$album  ;
      public function __construct(gallery $gallery, album $album)
    {

        $this->middleware('auth');
         $this->gallery = $gallery;
        $this->album   = $album ;

        // $jurusan = jurusan::all();

        // View::share('coba', $jurusan);
    }

    public function menu(){


    }


    public function berita_add(){
        $kategori = kategori::all();
        return view ('admin/beritaadd',['kategori' => $kategori]);
    }

    public function berita_add2(){
        $kategori = kategori::all();
        return view ('admin2/berita',['kategori' => $kategori]);
    }
    public function berita_store(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'cover' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal post berita!');
        }
        else {
            $uploadfile = $request->file('cover');
            $name = time().'.'.$uploadfile->getClientOriginalName();
            $path = $uploadfile->move('wysiwyg',$name);
            $berita = new berita;
            $berita->cover = $name;
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->id_kategori = $request->id_kategori;
            $berita->tanggal = now();
            $berita->id_admin = Auth::User()->id;
            $berita->save();
            return redirect()->back()->with('sukses','sukses post berita!');
        }
        
    }
    public function berita_controller(){
    //     $berita = berita::orderBy('id_berita', 'DESC')->get();
    return view ('admin/beritacontrol');
    }
    public function berita_controller2(){
    //     $berita = berita::orderBy('id_berita', 'DESC')->get();
    return view ('admin2/databerita');
    }
    public function berita_del(Request $request){
        // $del = berita::find($id);
        // $del->forceDelete();
        // return redirect()->back()->with('sukses','Berhasil menghapus data!');

        if($request->ajax())
        {
            DB::table('berita')
                ->where('id_berita', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    

    }
    public function berita_edit(Request $request,$id){
        $edit = berita::find($id);
        $kategori = kategori::all();  
        $idkat = $edit->id_kategori;
        $b = DB::table('berita')
        ->join('kategori', 'berita.id_kategori', '=', 'kategori.id_kategori')
        ->where('kategori.id_kategori', '=', $idkat)
        ->select('*')
        ->get();
        return view('admin2/beritaedit', ['edit' => $edit, 'b' => $b, 'kategori' => $kategori]);
    }
    public function berita_update(Request $request){
        if($request->cover == NULL){
            $id = $request->id_berita;
            $berita = berita::find($id);
            $berita->judul = $request->judul;
            $berita->cover = $berita->cover;
            $berita->isi = $request->isi;
            $berita->id_kategori = $request->id_kategori;
            $berita->save();
        return redirect()->back()->with('sukses','sukses edit!');
        } else {    
        $uploadfile = $request->file('cover');
        $name = time().'.'.$uploadfile->getClientOriginalName();
        $path = $uploadfile->move('wysiwyg',$name);    
        $id = $request->id_berita;
        $berita = berita::find($id);
        $berita->judul = $request->judul;
        $berita->cover = $name;
        $berita->isi = $request->isi;
        $berita->id_kategori = $request->id_kategori;
        $berita->save();
        return redirect()->back()->with('sukses','sukses edit!');
        }
       

    }
    public function berita_search(Request $request){
    //     if($request->ajax()){
    //         $output="";
    //         $berita=DB::table('berita')->where('judul','LIKE','%'.$request->search."%")->get();
    //         if($berita){
    //             foreach ($berita as $key => $products) {
    //             $output.='<tr>'.
    //             '<td>'.$loop->iteration.'</td>'.
    //             '<td>'.$products->judul.'</td>'.
    //             '<td>'.$products->tanggal.'</td>'.
    //             '<td><a href="/admin/berita/edit/{{$row->id_berita}}"><input type="button" class="btn btn-primary" Value="Edit" name=""></a> <a href="/admin/berita/del/{{$row->id_berita}}"><input type="button" class="btn btn-danger" Value="Delete" onclick="return confirm());" name=""></a></td>'.
    //             '</tr>';
    //         }
    //         return Response($output);
    //         }
    //     }
    // }
       
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('berita')
                ->where('judul', 'like', '%'.$query.'%')
                ->orderBy('id_berita', 'desc')
                ->get();
            }
            else {
                $data = DB::table('berita')
                ->orderBy('id_berita', 'desc')
                ->get();
            }
            $total_row=$data->count();
            if($total_row > 0){
                $i=1;
                foreach ($data as $row) {
                  
                   $output .= '<tr>
                    <td>'.$i++.'</td>
                    <td>'.$row->judul.'</td>
                    <td>'.$row->tanggal.'</td>
                    <td><a href="./berita/edit/'.$row->id_berita.'"><input type="button" class="btn btn-primary" Value="Edit" name=""></a> <button type="button" class="btn btn-danger delete"  id="'.$row->id_berita.'">Delete</button></td>
                    </tr>
                   ';
                }
            }
            else {
                $output = '
                <tr>
                    <td align="center">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row

            );
            echo json_encode($data);
        }
    
    }
    public  function    ppdb(){


        return  view    ('master/ppdb');
    }


    public  function    coba(){


        return  view    ('admin2/index');
    }


	public function index()
    {
    	$slider = slider::all();
    	$katadepan = katadepan::find(1);

    	return view('admin/slidebar',['slider' => $slider, 'katadepan' => $katadepan]);  
    
    }


    public function slidebar()
    {

    	$slider = slider::all();

    	return view('admin2/slidebar',['slider' => $slider]); 

    
    }

    public function slidebar2()
    {

        $slider = slider::all();

        return view('admin2/dataslide',['slider' => $slider]); 

    
    }

    public function statistik(){

        $statistik = statistik::all();

        return view('admin2/statistik',compact('statistik'));
    }

    public function up_statistik(Request $request){

        $validator = Validator::make($request->all(),[
            's_baru' => 'required',
            's_aktif' => 'required',
            't_pendidik' => 'required',
            't_kependidikan' => 'required'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }
        else{

            $statistik = statistik::find(1);
            $statistik->s_baru = $request->s_baru;
            $statistik->s_aktif = $request->s_aktif;
            $statistik->t_pendidik = $request->t_pendidik;
            $statistik->t_kependidikan = $request->t_kependidikan;

           

            $statistik->save();

        }


        return redirect()->back()->with('sukses','Berhasil Menambahkan !!');
    }

    public function video(){

        $video = videodepan::all();

        return view('admin2/video',compact('video'));
    }

    public function up_video(Request $request){

        $validator = Validator::make($request->all(),[
            'judul' => 'required',
            'alamat' => 'required'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambahkan !');
        }
        else{

            $video = videodepan::find(1);
            $video->judul = $request->judul;
            $video->alamat = $request->alamat;
                    
            $video->save();

        }


        return redirect()->back()->with('sukses','Berhasil Menambahkan !!');
    }

     public function slider_up(Request $request)
    {
    	$validation = Validator::make($request->all(),[
    		'judul' => 'required',
    		'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    		'keterangan' => 'required|max:300'
    		]);

    	$uploadedFile = $request->file('file'); 

    	if ($uploadedFile == NULL){

    		return redirect()->back()->with('gagal','gambar belom diisi');
    	}

    	else{

    	$name = time().'.'.$uploadedFile->getClientOriginalName();

        $path = $uploadedFile->move('gambar/slider',$name);

    	}


       
        

        	$slider= new slider;

        	$slider->judul = $request->judul;
        	
           
            $slider->gambar = $name;
			$slider->deskripsi = $request->keterangan;

        
            

			$slider->save();
			return redirect()->back()->with('success','sukses!');
			
    	 // $check->$slider->save();  

  //   	 if ($validation->fails() && $uploadedFile == NULL) {
  			
  // 			return redirect()->back()->with('gagal','gagal upload');
		// }else {
		// 	return redirect()->back()->with('success','sukses!');
		// 	$slider->save();
		// }

    	// if(!$check){
    	// 	return redirect()->back()->with('gagal','gagal!');
    	// }
    	// else {
    	// 	return redirect()->back()->with('success','data berhasil ditambah!');
    	// }
    
    }

    public function slider_del(Request $request,$id){

    	$hapus = slider::find($id);

    	$path = public_path()."/gambar/slider/".$hapus->gambar;
		unlink($path);
    	$hapus -> forceDelete();

    	return redirect('/admin');

    }

    public function slider_edit($id){


    	$edit = slider::find($id);


        return view('admin/slidebar',['slider' => $slider, 'katadepan' => $katadepan]); 
    }

    public function katasambutan(){

        $katadepan = katadepan::find(3);

        return view('admin2/katasambutan',['katadepan' => $katadepan]);

    }


     public function kata_up(Request $request)
    {
    	$validation = Validator::make($request->all(),[
    		'judul' => 'required',
    		'isi' => 'required|max:300'
    		]);



        $kata=  katadepan::find(1) ;

        	$kata->judul = $request->judul;
        	    

            $kata->isi = $request->isi;

			
           			$kata->save();
           			return redirect()->back()->with('success','sukses!');
             
    }

    public function alumni(){

        return view ('admin2/alumni');
    }
    public function alumni2(){
        $alumni = alumni::all();
        return view ('admin2/dataalumni',compact('alumni'));
    }

    public function alumni_proses(Request $request){
        $uploadedFile = $request->file('file');
        if ($uploadedFile == null) {

            $alumni = new alumni;

        $alumni->nama = $request->nama;
        $alumni->tahun = $request->tahun;
        $alumni->pesan =$request->pesan;
        $alumni->file = 'user.png';
            
        } else{

        $name = time().'.'.$uploadedFile->getClientOriginalName();

        $path = $uploadedFile->move('gambar/alumni',$name);

        $alumni = new alumni;

        $alumni->nama = $request->nama;
        $alumni->tahun = $request->tahun;
        $alumni->pesan =$request->pesan;
        $alumni->file = $name;
        }
        $alumni->save();


        return redirect()->back();
    }

    public function alumni_del(Request $request,$id){

        $hapus = alumni::find($id);

        $path = public_path()."/gambar/alumni/".$hapus->file;
        unlink($path);
        $hapus -> forceDelete();

        return redirect()->back();
    }


    public function keunggulan()
    {
        $master = keunggulan::find(1);
        $unggul = keunggulan::select('subjudul','isi','icon');
        $ungguls = keunggulan::all();

        return view('admin2/keunggulan',['master' => $master , 'unggul' => $unggul, 'ungguls' => $ungguls]); 
    
    }

    public function keunggulan2()
    {
        $master = keunggulan::find(1);
        $unggul = keunggulan::select('subjudul','isi','icon');
        $ungguls = keunggulan::all();

        return view('admin2/datakeunggulan',['master' => $master , 'unggul' => $unggul, 'ungguls' => $ungguls]); 
    
    }

      public function keunggulan_up(Request $request)
    {
    	$validation = Validator::make($request->all(),[
    		'judul' => 'required',
    		'deskripsi' => 'required',
    		'judul_label' => 'required',
    		'isi_label' => 'required',
    		
    		]);


        $master = keunggulan::find(1);

            $master->judul = $request->judul;
            $master->deskripsi = $request->deskripsi;

        $unggul= new keunggulan ;

        	
        	$unggul->subjudul = $request->judul_label;
        	$unggul->isi = $request->isi_label;
        	$unggul->icon = $request->icon;
		
        $master->save();	

        $unggul->save();

           			return redirect()->back()->with('success','sukses!');
             
    }


    public function kepala()
    {
       $kepala =  kepala::all();

        return view('admin2/kepala',compact('kepala')); 
    
    }

    public function kepala_up(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'judul' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'pesan' => 'required|max:300'
            ]);

        $uploadedFile = $request->file('file'); 

        if ($uploadedFile == NULL){

            return redirect()->back()->with('gagal','gambar belom diisi');
        }

        else{

        $name = time().'.'.$uploadedFile->getClientOriginalName();

        $path = $uploadedFile->move('gambar/kepala_sekolah',$name);

        }


         

            $kepala= new kepala;

            $kepala->judul = $request->judul;
            
           
            $kepala->gambar = $name;
            $kepala->isi = $request->pesan;
            

            $kepala->save();
            return redirect()->back()->with('success','sukses!');
            
         
    
    }

    public function kepala_up2(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'judul' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'pesan' => 'required|max:300'
            ]);

        $uploadedFile = $request->file('file'); 

        if ($uploadedFile == NULL){

            return redirect()->back()->with('gagal','gambar belom diisi');
        }

        else{

        $name = time().'.'.$uploadedFile->getClientOriginalName();

        $path = $uploadedFile->move('gambar/kepala_sekolah',$name);

        }


         

            $kepala= kepala::find(1);

            $kepala->judul = $request->judul;
            
           
            $kepala->gambar = $name;
            $kepala->isi = $request->pesan;
            

            $kepala->save();
            return redirect()->back()->with('success','sukses!');
            
         
    
    }
   /* protected $gallery;

    public function __construct(
        Gallery $gallery )
    {
        $this->gallery = $gallery;
    }*/

    public function gallery(){
        /*$users =gallery::all();*/
        $cok = album::all();
        foreach ($cok as $cokk){
          for($i=0; $i<count($cok); $i++)
        $k = $cokk->id;
         }
        $asu = db::table('galleries')->join('album', 'galleries.id_album', '=', 'album.id')->select('galleries.*', 'galleries.image')->get();

  
        
        $users = db::table('album')->join('galleries', 'album.id', '=', 'galleries.id_album')->select('album.*', 'galleries.id_album' , 'galleries.image')->get();
        
        
        $album =album::all();


       // return dd($users);
        return  view('admin/gallery',compact('users','album','asu','cokk','cok','k'));

    }

    public function gallery_datafoto(){

          $cok = album::all();
        foreach ($cok as $cokk){
          for($i=0; $i<count($cok); $i++)
        $k = $cokk->id;
         }
        $asu = db::table('galleries')->join('album', 'galleries.id_album', '=', 'album.id')->select('galleries.*', 'galleries.image')->get();

  
        
        $users = db::table('album')->join('galleries', 'album.id', '=', 'galleries.id_album')->select('album.*', 'galleries.id_album' , 'galleries.image')->get();
        
        
        $album =album::all();

         return  view('admin2/datagallery_f',compact('users','album','asu','cokk','cok','k'));
     
    }
    public function gallery_foto(){

        return view('admin2/gallery_f');
    }

    public function gallery_edit( $id){

        $users =album::find($id);     
        $p = gallery::where('id_album' ,'=' ,$id)->get();
        $tes = album::where('id' ,'=' ,$id)->get();

       return view('admin/galleryedit',compact('users','p','tes'));
    }

    public function gallery_edit2( $id){

        $users =album::find($id);     
        $p = gallery::where('id_album' ,'=' ,$id)->get();
        $tes = album::where('id' ,'=' ,$id)->get();

       return view('admin2/galleryedit_f',compact('users','p','tes'));
    }

    public function gallery_del(Request $request,$id){
        
        $hapus = album::find($id);
        $hapus2 = gallery::where('id_album' ,'=' ,$id)->get();
        
       
        $hapus -> forceDelete();

         return back();

    }

    public function gallery_del2(Request $request,$id){
        
        $hapus = gallery::find($id);

        $path = public_path()."/images/originals/".$hapus->image;
        unlink($path);
        $hapus -> forceDelete();

         return back();

    }
    
    public function gallery_editpros(Request $request,$id){
        
        $uploadedFile = $request->file('cover'); 
            $edit = album::find($id);

        
        if ($uploadedFile == NULL){

            $p1 = $request->judul;
            $p2 = $request->deskripsi;
            $p = $request->cov;

            $edit->judul = $p1;
            $edit->deskripsi = $p2;
            $edit->cover = $p;

        }

        else{

        $name = time().'.'.$uploadedFile->getClientOriginalExtension();

        $path = $uploadedFile->move('images/originals/cover/',$name);

        $edit = album::find($id);
        $edit->judul = $request->judul;
        $edit->deskripsi = $request->deskripsi;
        $edit->cover = $name;
       }

        $edit->save();

         
         return back();
    }

    

     



    public function gallery_up2(Request $request,$id){



        //check if image exist
        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }/*
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }*/
 
            // loop through each image to save and upload
            foreach($images as $key => $image) {
                //create new instance of Photo class
                $newPhoto = new $this->gallery;
                $album   = $this->album->find($id);

                $albums = $album->id;



                

                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
                /*$thm_path = 'images/thumbnails/' . $filename;*/
             
                
                $newPhoto->id_album  = $albums;
                $newPhoto->image     = $filename;
                /*$newPhoto->thumbnail = 'images/thumbnails/'.$filename;*/
 
                //don't upload file when unable to save name to database
                if ( ! $newPhoto->save()) {
                    return false;
                }
 
                // upload image to server
                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(900, 500, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                   /*Image::make($image)->fit(270, 160, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);*/
                }
            }
        }           
                    return redirect()->back()->with('success','sukses!');

    }

     public function gallery_up(Request $request)
    {

          
       /* 
        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  

                $data[] = $name;  
            }
         }


         $form= new gallery();
         $form->judul = $request->judul;
         $form->deskripsi = $request->deskripsi;
         $form->image=json_encode($data);

         
        
        $form->save();

        return back()->with('success', 'Your images has been successfully');




        $validation = Validator::make($request->all(),[
            'judul' => 'required',
            'isi' => 'required|max:300'
            ]);*/

        $uploadedFile = $request->file('cover'); 

        if ($uploadedFile == NULL){

            return redirect()->back()->with('gagal','gambar belom diisi');
        }

        else{

        $name = time().'.'.$uploadedFile->getClientOriginalExtension();

        $path = $uploadedFile->move('images/originals/cover/',$name);

       }
                $newAlbum = new album;

                $newAlbum->judul     = $request->judul;
                $newAlbum->deskripsi = $request->deskripsi;
                $newAlbum->cover     = $name;
               
                $newAlbum   ->save  ();
                $id = $newAlbum->id;

               


         //check if image exist
        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }/*
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }*/
 
            // loop through each image to save and upload
            foreach($images as $key => $image) {
                //create new instance of Photo class
                $newPhoto = new $this->gallery;
                $album   = $this->album->find($id);

                $albums = $album->id;



                

                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
                /*$thm_path = 'images/thumbnails/' . $filename;*/
             
                
                $newPhoto->id_album  = $albums;
                $newPhoto->image     = $filename;
                /*$newPhoto->thumbnail = 'images/thumbnails/'.$filename;*/
 
                //don't upload file when unable to save name to database
                if ( ! $newPhoto->save()) {
                    return false;
                }
 
                // upload image to server
                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(900, 500, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                   /*Image::make($image)->fit(270, 160, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);*/
                }
            }
        }
                    return redirect()->back()->with('success','sukses!');
             
    }



    public function berita_upimage(Request $request){
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
            if (Input::hasFile('upload')) {
                $file = Input::file('upload');
                if ($file->isValid()) {
                    $filename =rand(1000,9999).$file->getClientOriginalName();
                    $file->move(public_path().'/wysiwyg/', $filename);
                    $url = url('wysiwyg/' . $filename);
        } else {
            $message = 'An error occurred while uploading the file.';
        }
    } 
    else {
        $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';    
    }

public function jurusan(){

    $jurusan= jurusan::all();

    return view('admin2/jurusan',compact('jurusan'));
}

public function del_jurusan(Request $request, $id){

        $hapus1 = jurusan::find($id);
       
        $hapus3  = ppdbjurusan::where('id_jur' , '=' , $id )->get();
        
         
        $hapus1->forceDelete();
           

    return redirect()->back()->with('delete','menghapus jurusan!');
}



public function jurusan2($id){

    $jurusan = jurusan::where('id' ,'=' ,$id)->get();
    $p       = filejurusan::where('id_jurusan' ,'=' ,$id)->get();
    $keunggulan  = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get();
    $alasan     = juralasan::where('id_jurusan', '=' , $id)->get();
    $gallery   = jurgallery::where('id_jurusan', '=' , $id)->get();


    return view('admin2/jurusan2',compact('jurusan','p','keunggulan','alasan','gallery'));
}

public function jurusan3($id){

    $jurusan = jurusan::where('id' ,'=' ,$id)->get();
    $p       = filejurusan::where('id_jurusan' ,'=' ,$id)->get();
    $keunggulan  = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get();

    $ok = jurkeunggulan::find($id);

    return view('admin2/datajurusan',compact('jurusan','p','keunggulan','ok'));
}

public function jurusan_up(Request $request){

    $validator = Validator::make($request->all(), [
            'jurusan' => 'required'
           
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan jurusan!');
        }
        else {
            
            $jurusan= new jurusan;

            $jurusan->nama_jurusan = $request->jurusan;

            $jurusan->save();

            $ppdb_jur = new ppdbjurusan;

            $ppdb_jur->id_jur = $jurusan->id;
            $ppdb_jur->nama_jurusan = $jurusan->nama_jurusan;
            $ppdb_jur->kuota = '100';

            $ppdb_jur->save();

            return redirect()->back()->with('sukses','menambhkan jurusan!');
        }


    }
public function files(){
    $mapel = mapel::all();
    return view('admin2/files', compact('mapel'));
} 

public function up_mapel(Request $request){
    $validator = Validator::make($request->all(), [
            'nama_mapel' => 'required'
           
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan mapel!');
        }
        else {
            
            $mapel = new mapel;

            $mapel->nama_mapel = $request->nama_mapel;

            $mapel->save();

            return redirect()->back()->with('sukses','menambhkan mapel!');
        }
    }

    public function jurusan_up_modal(Request $request,$id){

    $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:jpg,gif,png,jpeg'   
            ]);

    $cek = filejurusan::where('id_jurusan' ,'=' ,$id)->get('id_jurusan');
    $k = filejurusan::where('id_jurusan' ,'=' ,$id)->get('id');
    $ko = $k[0]->id;
 /*   dd($ko);*/


        
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }

        elseif (count($cek) == 0) {
            
        $uploadedFile = $request->file('file'); 
        $name = time().'.'.$uploadedFile->getClientOriginalExtension();
        $path = $uploadedFile->move('gambar/jurusan/modal/',$name);
            $jurusan= new filejurusan;
            $jurusan->id_jurusan = $request->p;
            $jurusan->judul_top = $request->judul;
            $jurusan->deskripsi_top = $request->deskripsi;
            $jurusan->gambar_top = $name;
            $jurusan->status = $request->status;
          
            
        $jurusan->save();

        }
        else {
            

           $uploadedFile = $request->file('file');

           if ($uploadedFile == NULL) {

           $edit = filejurusan::find($ko);
            $edit->id_jurusan = $request->p;
            $edit->judul_top = $request->judul;
            $edit->deskripsi_top = $request->deskripsi;
           
            $edit->save();      

                
           }
           else{
 
        $name = time().'.'.$uploadedFile->getClientOriginalExtension();
        $path = $uploadedFile->move('gambar/jurusan/modal/',$name);
            $edit2 = filejurusan::find($ko);
            $edit2->id_jurusan = $request->p;
            $edit2->judul_top = $request->judul;
            $edit2->deskripsi_top = $request->deskripsi;
            $edit2->gambar_top = $name;
            
           $edit2->save();
          


           }

            return redirect()->back()->with('sukses','menambhkan jurusan!');
        }


    }

    public function jurusan_up_keunggulan(Request $request,$id){

    

    $validator = Validator::make($request->all(), [
            'icon' => 'required',
            'judul' => 'required',
            'isi' => 'required'   
            ]);

    $cek = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id_jurusan');
    $k = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id');

    

    if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }
    $jurusan= new jurkeunggulan;
            $jurusan->id_jurusan = $request->p;
            $jurusan->icon = $request->icon;
            $jurusan->judul = $request->judul;
            $jurusan->isi = $request->isi;
           
    $jurusan->save();

     return redirect()->back()->with('sukses','menambhkan jurusan!');
    }

    public function jurusan_hal_keunggulan(Request $request,$id){

    $jurusan = jurusan::where('id' ,'=' ,$id)->get();
    $p       = filejurusan::where('id_jurusan' ,'=' ,$id)->get();
    $keunggulan  = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get();
    $ok     = jurkeunggulan::find($id);


    return view('admin2/halunggul',compact('jurusan','p','keunggulan','ok'));

    }
    public function up_files(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'id_mapel' => 'required',
            'deskripsi' => 'required',
            'files' => 'mimes:doc,pdf,docx,zip',
            'id' => 'required'
            ]);
        if ($validator->fails()){
            return redirect()->back()->with('gagal','Gagal!');
            }
        else {
            $uploadedFile = $request->file('files');
            $name = time().'.'.$uploadedFile->getClientOriginalName();
            $path = $uploadedFile->move('files',$name);
            $files = new files;
            $files->id_mapel = $request->id_mapel;
            $files->judul = $request->judul;
            $files->deskripsi = $request->deskripsi;
            $files->file = $name;
            $files->id_users = $request->id;
            $files->save();
            return redirect()->back()->with('sukses','berhasil menambahkan data!');
        }
    }
    public function filesmapelcontroller(){
        if(Auth::User()->role == 1){
        $id = Auth::User()->id;
        $files = files::all();   
        }
        else {
        $id = Auth::User()->id;
        $files = files::where('id_users',$id)->orderBy('id_files', 'desc')->get();
        }
        return view('admin2/filesmapelcontroll', compact('files'));
    }

    public function filesmapeldel(Request $request,$id){
        $files = files::find($id);
        if($files == null){
            return abort('404');
        }
        else {
        $path = public_path()."/files/".$files->file;
        unlink($path);
        $files->forceDelete();
        return redirect()->back()->with('sukses','sukses menghapus!');
        }
    }
    public function filesmapeledit(Request $request,$id){
        $files = files::find($id);
        $idmapel = $files->id_mapel;
        $mapels = mapel::all();
        $mapel = DB::table('files')
        ->join('mapel', 'files.id_mapel', '=', 'mapel.id_mapel')
        ->where('mapel.id_mapel', '=', $idmapel)
        ->select('*')
        ->get();
        if($files == null){
            return abort('404');
        }else {
            return view('admin2/filesmapeledit', compact('files','mapel','mapels'));
        }
    }
    public function filesmapel_store(Request $request){
        $validator = Validator::make($request->all(), [
            'files' => 'mimes:doc,pdf,docx,zip',
            ]);
        $files = files::find($request->id);
        if ($validator->fails()){
            return redirect()->back()->with('gagal','Gagal!');
            }
        if($request->file('files') == NULL){
            $files->judul = $request->judul;
            $files->id_mapel = $request->id_mapel;
            $files->file = $files->file;
            $files->deskripsi = $request->deskripsi;
            $files->save();
            return redirect()->back()->with('sukses','berhasil!');
        }else{
            $uploadedFile = $request->file('files');
            $name = time().'.'.$uploadedFile->getClientOriginalName();
            $path = $uploadedFile->move('files',$name);
            $path = public_path()."/files/".$files->file;
            unlink($path);
            $files->judul = $request->judul;
            $files->file = $name;
            $files->id_mapel = $request->id_mapel;
            $files->deskripsi = $request->deskripsi;
            $files->save();
            return redirect()->back()->with('sukses','berhasil!');
        }
        }
    public function visimisi(){
        $visimisi = visimisi::find(1);
        return view('admin2/visimisi', compact('visimisi'));
    }
    public function visimisi_store(Request $request){
        $validator = Validator::make($request->all(), [
            'isi' => 'required',
            ]);
        $isi = visimisi::find(1);
        if($request->isi == NULL) {
            return redirect()->back()->with('gagal','Isi tidak boleh kosong!');
        }
        else {
            $isi->isi = $request->isi;
            $isi->save();
            return redirect()->back()->with('sukses','edit berhasil!');
        }
    }
     public function profilsekolah(){
        $profilsekolah = profilsekolah::find(1);
        return view('admin2/profilsekolah', compact('profilsekolah'));
    }
    public function profilsekolah_store(Request $request){
        $validator = Validator::make($request->all(), [
            'isi' => 'required',
            ]);
        $isi = profilsekolah::find(1);
        if($request->isi == NULL) {
            return redirect()->back()->with('gagal','Isi tidak boleh kosong!');
        }
        else {
            $isi->isi = $request->isi;
            $isi->save();
            return redirect()->back()->with('sukses','edit berhasil!');
        }
    }



    public function jurusan_edit_keunggulan(Request $request,$id){
        
    $validator = Validator::make($request->all(), [
            'icon' => 'required',
            'judul' => 'required',
            'isi' => 'required'   
            ]);

    $cek = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id_jurusan');
    $k = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id_jurusan');

    

    if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }
    else{
    $jurusan= jurkeunggulan::find($id);
            $jurusan->icon = $request->icon;
            $jurusan->judul = $request->judul;
            $jurusan->isi = $request->isi;
           
    $jurusan->save();
        }
     return redirect()->back()->with('edit_keunggulan','menambhkan jurusan!');
    }
    public function jurusan_del_keunggulan(Request $request,$id){


    
    $jurusan= jurkeunggulan::find($id);

    dd($jurusan);
            
           
    $jurusan->forceDelete();
        
     return redirect()->back()->with('delete','Telah Dihapus!');
    }
    
    public function jurusan_hal_alasan(Request $request,$id){

    $jurusan = jurusan::where('id' ,'=' ,$id)->get();
    $p       = filejurusan::where('id_jurusan' ,'=' ,$id)->get();
    $keunggulan  = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get();
    $ok     = jurkeunggulan::find($id);
    $alasan = juralasan::find($id);


    return view('admin2/halalasan',compact('jurusan','p','keunggulan','ok','alasan'));
    }

    public function jurusan_up_alasan(Request $request,$id){

    $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'jawaban' => 'required'
            ]);

    $cek = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id_jurusan');
    $k = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id');

    

    if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }
        else{
    $jurusan= new juralasan;
            $jurusan->id_jurusan = $request->p;
            $jurusan->pertanyaan = $request->pertanyaan;
            $jurusan->jawaban = $request->jawaban;

           
    $jurusan->save();
        }
     return redirect()->back()->with('sukses','menambhkan Alasan!');
    }

    public function jurusan_edit_alasan(Request $request,$id){
      
    $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'jawaban' => 'required'
            ]);

    $cek = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id_jurusan');
    $k = jurkeunggulan::where('id_jurusan' ,'=' ,$id)->get('id');

    

    if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }
    else{
    $jurusan= juralasan::find($id);
            
            $jurusan->pertanyaan = $request->pertanyaan;
            $jurusan->jawaban = $request->jawaban;
            

           
    $jurusan->save();
        }   
     return redirect()->back()->with('sukses','Berhasil Mengedit Alasan !    ');
    }
     public function jurusan_del_alasan(Request $request,$id){

    $jurusan= juralasan::find($id);
    $jurusan->forceDelete();
        
     return redirect()->back()->with('delete','Telah Dihapus!');
    }

    
    public function jurusan_up_gallery(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required'    
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambhkan !');
        }
        else{
       
        $uploadedFile = $request->file('file'); 
        $name = time().'.'.$uploadedFile->getClientOriginalExtension();
        $path = $uploadedFile->move('gambar/jurusan/gallery/',$name);
            $jurusan = new jurgallery;
            $jurusan->id_jurusan = $request->p;
            $jurusan->file = $name;
           
        $jurusan->save();
        }   
       return redirect()->back()->with('sukses','menambhkan gallery!');

    }

    public function jurusan_del_gallery(Request $request,$id){

        $hapus = jurgallery::find($id);
        $path = public_path()."/gambar/jurusan/gallery/".$hapus->file;
        
        unlink($path);
        $hapus -> forceDelete();
        return redirect()->back()->with('sukses','Behasil menghapus gallery!');
    }

    public function ketenagaan(){
        $laborat = laborat::all();
        
       
        return view ('admin2/ketenagaan',compact('laborat'));
    }

    public function data_ketenagaan(){
        $gtk = gtk::all();
        $laborat = laborat::all();
        
       
        return view ('admin2/data_ketenaga',compact('gtk'));
    }

     public function data_ketenagaan2($id){
        $gtk = gtk::find($id);
        $laborat = laborat::all();
        if($gtk == null){
            abort('404');
        }
       
        return view ('admin2/data_ketenaga2',compact('gtk','laborat'));
    }

    public function laborat(){
        $laborat = laborat::all();
        return view ('admin2/laborat',compact('laborat'));  
    }
    public function up_laborat(Request $request){

         $validator = Validator::make($request->all(), [
            'laborat' => 'required'    
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambahkan !');
        }
        else{
            $laborat = new laborat;
            $laborat->laborat = $request->laborat;
            $laborat->save();
        }

        return redirect()->back()->with('sukser','berhasil menambahkan !');  
    }
    public function up_ketenagaan(Request $request){

            // nama,nik,email
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required'
               
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambahkan !');
        }



        else{
        $uploadedFile = $request->file('file');

            if ($uploadedFile == null) {

                $user = new User;
                $user->name = $request->nama;
                $user->email = $request->email;
                $user->password = 'baru1234';
                $user->role = '2';
                $user->save();

                $id= $user->id;
               

                $name = null;

                $ketenagaan = new gtk;
                $ketenagaan->id_user = $id; 
                $ketenagaan->no_srt_tgs = $request->no_srt_tgs;
                $ketenagaan->tgl_srt_tgs = $request->tgl_srt_tgs;
                $ketenagaan->tmt_tgs = $request->tmt_tgs;
                $ketenagaan->stts_sklh = $request->s_sklh;

                $ketenagaan->nama = $request->nama;
                $ketenagaan->jns_kel = $request->j_kel;
                $ketenagaan->nik = $request->nik;
                $ketenagaan->tmpt_lhr = $request->tmp_lhr;
                $ketenagaan->nama_ibu = $request->n_ibu;
                $ketenagaan->tgl_lhr = $request->tgl_lhr;
                $ketenagaan->file = $name;

                $ketenagaan->alamat = $request->alamat;
                $ketenagaan->rt = $request->rt;
                $ketenagaan->rw = $request->rw;
                $ketenagaan->dusun = $request->dusun;
                $ketenagaan->desa = $request->desa;
                $ketenagaan->kecamatan = $request->kecamatan;
                $ketenagaan->kabupaten = $request->kabupaten;
                $ketenagaan->kodepos = $request->k_pos;

                $ketenagaan->agama = $request->agama;
                $ketenagaan->s_nikah = $request->s_nikah;
                $ketenagaan->nama_psgn = $request->n_pasangan;
                $ketenagaan->pkrjn_psgn = $request->p_pasangan;
                $ketenagaan->negara = $request->kewarganegaraan;
                $ketenagaan->npwp = $request->npwp;

                $ketenagaan->status = $request->s_pegawai;
                $ketenagaan->nip = $request->nip;
                $ketenagaan->niy = $request->niy;
                $ketenagaan->j_gtk = $request->j_gtk;
                $ketenagaan->sk_pengankatan = $request->sk_pengangkatan;
                $ketenagaan->tmt_pengangkatan = $request->tmt_pengangkatan;
                $ketenagaan->lmbg_pengangkatan = $request->l_pengangkatan;
                $ketenagaan->sk_cpns = $request->sk_cpns;
                $ketenagaan->tmt_pns = $request->tmt_pns;
                $ketenagaan->golongan = $request->pangkat;
                $ketenagaan->s_gaji = $request->s_gaji;

                $ketenagaan->lisensi = $request->lisensi;
                $ketenagaan->k_laborat = $request->k_lab;
                $ketenagaan->keb_khusus = $request->k_khusus;
                $ketenagaan->k_brailer = $request->k_bralle;
                $ketenagaan->k_bahasa = $request->k_bahasa;

                $ketenagaan->no_rumah = $request->no_rm;
                $ketenagaan->no_hp = $request->no_hp;
                $ketenagaan->email = $request->email;


                $ketenagaan->save();
                
            }

            else{

                $name = time().'.'.$uploadedFile->getClientOriginalExtension();
                $path = $uploadedFile->move('gambar/profil/gtk/',$name);


                $ketenagaan = new gtk;
                    
                 $ketenagaan->no_srt_tgs = $request->no_srt_tgs;
                $ketenagaan->tgl_srt_tgs = $request->tgl_srt_tgs;
                $ketenagaan->tmt_tgs = $request->tmt_tgs;
                $ketenagaan->stts_sklh = $request->s_sklh;

                $ketenagaan->nama = $request->nama;
                $ketenagaan->jns_kel = $request->j_kel;
                $ketenagaan->nik = $request->nik;
                $ketenagaan->tmpt_lhr = $request->tmp_lhr;
                $ketenagaan->nama_ibu = $request->n_ibu;
                $ketenagaan->tgl_lhr = $request->tgl_lhr;
                $ketenagaan->file = $name;

                $ketenagaan->alamat = $request->alamat;
                $ketenagaan->rt = $request->rt;
                $ketenagaan->rw = $request->rw;
                $ketenagaan->dusun = $request->dusun;
                $ketenagaan->desa = $request->desa;
                $ketenagaan->kecamatan = $request->kecamatan;
                $ketenagaan->kabupaten = $request->kabupaten;
                $ketenagaan->kodepos = $request->k_pos;

                $ketenagaan->agama = $request->agama;
                $ketenagaan->s_nikah = $request->s_nikah;
                $ketenagaan->nama_psgn = $request->n_pasangan;
                $ketenagaan->pkrjn_psgn = $request->p_pasangan;
                $ketenagaan->negara = $request->kewarganegaraan;
                $ketenagaan->npwp = $request->npwp;

                $ketenagaan->status = $request->s_pegawai;
                $ketenagaan->nip = $request->nip;
                $ketenagaan->niy = $request->niy;
                $ketenagaan->j_gtk = $request->j_gtk;
                $ketenagaan->sk_pengankatan = $request->sk_pengangkatan;
                $ketenagaan->tmt_pengangkatan = $request->tmt_pengangkatan;
                $ketenagaan->lmbg_pengangkatan = $request->l_pengangkatan;
                $ketenagaan->sk_cpns = $request->sk_cpns;
                $ketenagaan->tmt_pns = $request->tmt_pns;
                $ketenagaan->golongan = $request->pangkat;
                $ketenagaan->s_gaji = $request->s_gaji;

                $ketenagaan->lisensi = $request->lisensi;
                $ketenagaan->k_laborat = $request->k_lab;
                $ketenagaan->keb_khusus = $request->k_khusus;
                $ketenagaan->k_brailer = $request->k_bralle;
                $ketenagaan->k_bahasa = $request->k_bahasa;

                $ketenagaan->no_rumah = $request->no_rm;
                $ketenagaan->no_hp = $request->no_hp;
                $ketenagaan->email = $request->email;

                
                $ketenagaan->save();
            }
        return redirect()->back()->with('sukses','berhasil menambahkan !');
        }

    }

    public function del_ketenagaan(Request $request,$id){


    $gtk= gtk::find($id);

    

    if ($gtk->file == null) {
        
        $gtk->forceDelete();
        
    }
    else{
        $path = public_path()."/gambar/profil/gtk/".$gtk->file;
        unlink($path);
        $gtk->forceDelete();
    }
            
           
        
     return redirect()->back()->with('delete','Telah Dihapus!');
    }
    
    public function edit_ketenagaan(Request $request, $id){
        
            // nama,nik,email
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required'
               
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('gagal','gagal menambahkan !');
        }



        else{   
                $ketenagaan = gtk::find($id);
                $uploadedFile = $request->file('file');
                

                    
                 $ketenagaan->no_srt_tgs = $request->no_srt_tgs;
                $ketenagaan->tgl_srt_tgs = $request->tgl_srt_tgs;
                $ketenagaan->tmt_tgs = $request->tmt_tgs;
                $ketenagaan->stts_sklh = $request->s_sklh;

                $ketenagaan->nama = $request->nama;
                $ketenagaan->jns_kel = $request->j_kel;
                $ketenagaan->nik = $request->nik;
                $ketenagaan->tmpt_lhr = $request->tmp_lhr;
                $ketenagaan->nama_ibu = $request->n_ibu;
                $ketenagaan->tgl_lhr = $request->tgl_lhr;
                if ($uploadedFile == null) {

                    $ketenagaan->file = $request->file2;
                }
                else{
                    $name = time().'.'.$uploadedFile->getClientOriginalExtension();
                    $path = $uploadedFile->move('gambar/profil/gtk/',$name);
                }
              

                $ketenagaan->alamat = $request->alamat;
                $ketenagaan->rt = $request->rt;
                $ketenagaan->rw = $request->rw;
                $ketenagaan->dusun = $request->dusun;
                $ketenagaan->desa = $request->desa;
                $ketenagaan->kecamatan = $request->kecamatan;
                $ketenagaan->kabupaten = $request->kabupaten;
                $ketenagaan->kodepos = $request->k_pos;

                $ketenagaan->agama = $request->agama;
                $ketenagaan->s_nikah = $request->s_nikah;
                $ketenagaan->nama_psgn = $request->n_pasangan;
                $ketenagaan->pkrjn_psgn = $request->p_pasangan;
                $ketenagaan->negara = $request->kewarganegaraan;
                $ketenagaan->npwp = $request->npwp;

                $ketenagaan->status = $request->s_pegawai;
                $ketenagaan->nip = $request->nip;
                $ketenagaan->niy = $request->niy;
                $ketenagaan->j_gtk = $request->j_gtk;
                $ketenagaan->sk_pengankatan = $request->sk_pengangkatan;
                $ketenagaan->tmt_pengangkatan = $request->tmt_pengangkatan;
                $ketenagaan->lmbg_pengangkatan = $request->l_pengangkatan;
                $ketenagaan->sk_cpns = $request->sk_cpns;
                $ketenagaan->tmt_pns = $request->tmt_pns;
                $ketenagaan->golongan = $request->pangkat;
                $ketenagaan->s_gaji = $request->s_gaji;

                $ketenagaan->lisensi = $request->lisensi;
                $ketenagaan->k_laborat = $request->k_lab;
                $ketenagaan->keb_khusus = $request->k_khusus;
                $ketenagaan->k_brailer = $request->k_bralle;
                $ketenagaan->k_bahasa = $request->k_bahasa;

                $ketenagaan->no_rumah = $request->no_rm;
                $ketenagaan->no_hp = $request->no_hp;
                $ketenagaan->email = $request->email;
               
                
                $ketenagaan->save();
            
        return redirect()->back()->with('sukses','berhasil menambahkan !');
        }

    }

}


