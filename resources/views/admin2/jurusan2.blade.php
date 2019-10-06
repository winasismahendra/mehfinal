
@extends('layout/cmaster')
    @section('css')

    @endsection
	

    @section('isi')

        @if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
    @endif
    @if (session('gagal'))
    <div class="alert alert-danger">
        {{ session('gagal') }}
    </div>
    @endif
     @if (session('edit_keunggulan'))
    <div class="alert alert-success">
        {{ session('edit_keunggulan') }}
    </div>
    @endif
    @if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
    @endif

     
    	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Modal Atas</h4>

                                        <button href="#myModal" id="openBtn" data-toggle="modal" class="btn btn-default">Data Modal</button>

<div class="modal fade" id="myModal">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <h5 class="text-center">Input Data</h5>
            
            <form action="{{ route ('up_jur_modal', $jurusan[0]->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul</label>
                                            @if (count($p) == 0)
                                            <input class="form-control" type="text" name="judul"  id="example-text-input">
                                                @else
                                                <input class="form-control" type="text" name="judul" value="{{$p[0]->judul_top}}"  id="example-text-input">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Deskripsi</label>
                                            @if (count($p) == 0)
                                            <input class="form-control" type="text" name="deskripsi"  id="example-text-input">
                                                @else
                                                 <input class="form-control" type="text" name="deskripsi" value="{{$p[0]->deskripsi_top}}"  id="example-text-input">
                                            @endif
                                        </div>
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">



                                                    @if (count($p) == 0)
                                                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                                        @else
                                                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                                        <input type="hidden" name="cov" value="{{$p[0]->gambar_top}}">
                                                    @endif


                                                    
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                        <input type="hidden" name="p" value="{{$jurusan[0]->id}}">
                                        <input type="hidden" name="status" value="yes">
                                       
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
        </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
         
        </div>
                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

                                    
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($p as $po)
                                            <tr >  
                                                  <td>{{$po->judul_top}}</td>
                                                  <td>{{$po->deskripsi_top}}</td>
                                                  <td><img src="{{ url('gambar/jurusan/modal/'.$po->gambar_top) }}" width="40px"></td>  
                                                  <td>
                                                    <a href="#" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
                                                 </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <br><br>
                                    <h4 class="header-title">Keunggulan</h4>

                                    <button href="#myModal2" id="openBtn" data-toggle="modal" class="btn btn-default">Input Keunggulan</button>

<div class="modal fade" id="myModal2">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <h5 class="text-center">Input Data</h5>

                        
                        <form action="{{ route('up_jur_keunggulan', $jurusan[0]->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Icon</label>
                                            @if (count($p) == 0)
                                            <input class="form-control" type="text" name="icon"  id="example-text-input">
                                                @else
                                                <input class="form-control" type="text" name="icon" value="{{$p[0]->icon}}"  id="example-text-input">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul</label>
                                            @if (count($p) == 0)
                                            <input class="form-control" type="text" name="judul"  id="example-text-input">
                                                @else
                                                 <input class="form-control" type="text" name="judul" value="{{$p[0]->judul}}"  id="example-text-input">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Isi</label>
                                            @if (count($p) == 0)
                                            <input class="form-control" type="text" name="isi"  id="example-text-input">
                                                @else
                                                 <input class="form-control" type="text" name="isi" value="{{$p[0]->isi}}"  id="example-text-input">
                                            @endif
                                        </div>
                                        
                                        <input type="hidden" name="p" value="{{$jurusan[0]->id}}">
                                        <input type="hidden" name="status" value="yes">
                                       
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
        </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
         
        </div>
                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
                                        

                                    <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Isi</th>
                                                    <th scope="col">Icon</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach($keunggulan as $i => $keunggulans)
                                            <tbody>
                                            
                                          
                                            <tr id="tabel">  
                                                  <td>{{$keunggulans->judul}}</td>
                                                  <td>{{$keunggulans->isi}}</td>
                                                  <td><i class="{{$keunggulans->icon}}"> </i></td>  
                                                  <td>
                                                  
                                                  
                                                  <!-- <a href="#myModal3" id="openBtn" data-toggle="modal" data-id="$i"  class="btn btn-red">  <i class="fa fa-edit"> </i>    Edit</a> -->
                                                  
                                                  <a href="{{ route ('edithal_jur_keunggulan', $keunggulans->id)}}" >  <i class="fa fa-edit"> </i>    Edit</a>
                                                    
                                                    <a href="{{ route ('del_jur_keunggulan', $keunggulan[$i]->id )}}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   Hapus</a>
                                                 </td>
                                            </tr>
                                                @endforeach



                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <br><br>
                                    <h4 class="header-title">Alasan</h4>

                                    <button href="#myModal4" id="openBtn" data-toggle="modal" class="btn btn-default">Input Alasan</button>

<div class="modal fade" id="myModal4">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <h5 class="text-center">Input Data</h5>

            <form action="{{ route ('up_jur_alasan' , $jurusan[0]->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                
                                                <label for="example-text-input" class="col-form-label">Pertanyaan</label>
                                                <input class="form-control" type="text" name="pertanyaan"  id="example-text-input">
                                            
                                        </div>
                                        <div class="form-group">
                                
                                                <label for="example-text-input" class="col-form-label">Jawaban</label>
                                                <textarea class="form-control" type="text" name="jawaban"> </textarea>
                                                
                                            
                                        </div>
                                        <input type="hidden" name="p" value="{{$jurusan[0]->id}}">
                                       
                                       
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
        </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
         
        </div>
                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
                
            <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Pertanyaan</th>
                                                    <th scope="col">Alasan</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($alasan as $i => $alasana)
                                            <tr >  
                                                  <td>{{$alasana->pertanyaan}}</td>
                                                  <td>{{$alasana->jawaban}}</td> 
                                                  <td>
                                                  
                                                   <a href="{{ route ('edithal_jur_alasan', $alasana->id)}}">  <i class="fa fa-edit"> </i>Edit</a>
                                                    
                                                    <a href="{{ route ('del_alasan', $alasana->id)}}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
                                                 </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>       

                                   
<br><br>
                                    <h4 class="header-title">Statistik</h4>

                                    <button href="#myModal6" id="openBtn" data-toggle="modal" class="btn btn-default">Input statistik</button>

<div class="modal fade" id="myModal6">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <h5 class="text-center">Input Data</h5>
           
            <form action="{{ route ('up_jur_gallery',$jurusan[0]->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                        <input type="hidden" name="p" value="{{$jurusan[0]->id}}">
                                       
                                       
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
        </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
         
        </div>
                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


                                        

                                    <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                   
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($gallery as $po)
                                            <tr >  
                                                 
                                                  <td><img src="{{ url('gambar/jurusan/gallery/'.$po->file) }}" width="40px">{{$po->file}}</td>  
                                                  <td>
                                                    
                                                    <a href="{{ route ('del_jur_gallery', $po->id)}}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
                                                 </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                




                                    <br><br>
                                    <h4 class="header-title">Gallery</h4>

                                    <button href="#myModal5" id="openBtn" data-toggle="modal" class="btn btn-default">Input Gallery</button>

<div class="modal fade" id="myModal5">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <h5 class="text-center">Input Data</h5>
           
            <form action="{{ route ('up_jur_gallery',$jurusan[0]->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                        <input type="hidden" name="p" value="{{$jurusan[0]->id}}">
                                       
                                       
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
        </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
         
        </div>
                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


                                        

                                    <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                   
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($gallery as $po)
                                            <tr >  
                                                 
                                                  <td><img src="{{ url('gambar/jurusan/gallery/'.$po->file) }}" width="40px">{{$po->file}}</td>  
                                                  <td>
                                                    
                                                    <a href="{{ route ('del_jur_gallery', $po->id)}}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
                                                 </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>


    @endsection