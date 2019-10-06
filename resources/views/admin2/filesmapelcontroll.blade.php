
@extends('layout/cmaster')
	@section('navigasi')
			<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix"><br>
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Home</a></li>
                                <li><span>Data Slide Bar</span></li>
                            </ul>
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

    	<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="module">
                            <div class="module-head">
                                <h3>Files</h3>
                            </div>                          
                            <div class="module-body">

          
                            <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Judul</th>
                                      <th>Deskripsi</th>
                                      <th>File</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  @foreach($files as $f)
                                  <tbody>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$f->judul}}</td>
                                  <td>{{$f->deskripsi}}</td>
                                  <td><a href="{{url('files/'.$f->file)}}"> {{$f->file}}</a></td>
                                  <td><a href="filesmapeledit/{{$f->id_files}}">Edit</a> | <a onclick="return confirm('Are u sure?');" href="filesmapeldel/{{$f->id_files}}">Delete</td>
                                  </tbody>
                                  @endforeach
                                </table>

                            </div>
                        </div>


                            </div>
                        </div>
                    </div>

 
    @endsection