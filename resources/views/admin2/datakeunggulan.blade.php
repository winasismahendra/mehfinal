
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

    	<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Striped Rows</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Isi</th>
                                                    <th scope="col">Icon</th>
                                                    <th scope="col">Admin</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    @foreach($ungguls as $ungguls)
                                    @continue($ungguls->id == 1)
                                    <tr>
                                       <td>{{$ungguls->subjudul}}</td>
                                        <td>{{$ungguls->isi}}</td>
                                        <td>{{$ungguls->icon}}</td>
                                        <td>{{$ungguls->id_admin}}</td>
                                        <td><a href="#" class="btn btn-green">  <i class="fa fa-edit"> </i>   edit</a>
                                            <a onclick="return confirm('Yakin Mau Hapus?');" href="/admin/ungguls/del/{{$ungguls->id}}" class="btn btn-red" >  <i class="fa fa-trash-o"> </i>   hapus</a>
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