
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

    	<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Striped Rows</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Nik</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($gtk as $gtk)
                                            <tr>
                                                  <td>{{$gtk->nama}}</td>
                                                  <td>{{$gtk->nik}}</td>
                                                  <td>{{$gtk->email}}</td>
                                                  <td>

                                                    <a href="{{ route ('data2_gtk', $gtk->id)}}" class="btn btn-green">  <i class="ti-search "> </i>preview</a>
                                                    <a href="{{ route ('del_ketenagaan', $gtk->id)}}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
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