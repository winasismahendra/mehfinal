
@extends('layout/cmaster')
	@section('navigasi')
			<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Home</a></li>
                                <li><span>Edit Foto</span></li>
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

    	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Textual inputs</h4>
                                        

                                    <form action="/admin/gallery/{{$tes[0]->id}}/proses" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul</label>
                                            <input class="form-control" name="judul" value="{{$tes[0]->judul}}" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Deskripsi</label>
                                            <input class="form-control" type="text" value="{{$tes[0]->deskripsi}}" name="deskripsi"  id="example-text-input">
                                        </div>
                                        
                                        <img src="{{ url('images/originals/cover/'.$tes[0]->cover) }}" width="200px">
                                       <br><br>
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload Cover</span>
                                                </div>

                                                <div class="custom-file">
                                                 
                                                    <input type="file" name="cover" class="custom-file-input" id="inputGroupFile01">
                                                    <input type="hidden" name="cov" value="{{$tes[0]->cover}}">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
                                    <br>
                                    <form action="/admin/gallery/{{$tes[0]->id}}/p" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="image[]" multiple="true" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                       <input type="hidden" name="p" value="{{$tes[0]->id}}">

                                        
                                        
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>

                                <br><br>
                                <h4 class="header-title">Data Foto</h4>
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
                                    @foreach($p as $image)
                                    <tr>
                                       <td><img src="{{ url('images/originals/'.$image->image) }}" width="200px"> {{$image->image}}</td>
                                       <td>

                                            
                                            <a href="{{ route ('del_perfoto' , $image->id)}}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
                                            <a href="" onclick="confirm('pepek ?')">tes</a>

                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    @endsection