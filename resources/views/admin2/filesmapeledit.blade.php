
@extends('layout/cmaster')
    @section('css')

    @endsection
	@section('navigasi')
			<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Home</a></li>
                                <li><span>Slide Bar</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
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

    	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Penambahan Jurusan</h4>
                                        
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah Mapel</button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route('up_mapel') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Mapel:</label>
            <input type="text" class="form-control" name="nama_mapel">
          </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send</button>
         </form>
      </div>
    </div>
  </div>
</div>

<form action="{{ route('filesmapel_store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
                                            <label class="col-form-label">Pilih Mapel</label>
                                            <select name="id_mapel" class="custom-select">
                                            <option value="{{$mapel[0]->id_mapel}}" selected="selected">-- {{$mapel[0]->nama_mapel}} --</option>
                                                @foreach($mapels as $m)
                                                    <option value="{{$m->id_mapel}}">{{$m->nama_mapel}}</option>
                                                @endforeach   
                                            </select>
    </div>
    <div class="form-group">
     <label class="col-form-label">Judul</label>
     <input type="text" class="form-control" value="{{$files->judul}}" name="judul">
    </div>
    <div class="form-group">
     <label class="col-form-label">Deskripsi</label>
     <input type="text" class="form-control" value="{{$files->deskripsi}}" name="deskripsi">
    </div>
    <label class="col-form-label"><a href="{{asset('files/'.$files->file)}}">{{$files->file}}</a></label>
    <div class="input-group mb-3">
        
        
                                                <div class="input-group-prepend">

                                                    <span class="input-group-text">Upload Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="files" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                        <input type="hidden" value="{{$files->id_files}}" name="id">
                                        <button type="submit" class="btn btn-primary" >Tambah</button>
</form>



                                    </div>
                                </div>
                            </div>

    @endsection