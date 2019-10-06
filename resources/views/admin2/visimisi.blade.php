
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

    	<div class="col-12 mt-5">
                                <div class="card">
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
                                    <div class="card-body">
                                        <h4 class="header-title">Visi Misi</h4>
                                        

                                    <form action="{{route('visimisi_store')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        
                                        <div class="form-group">
                                            <textarea class="form-control" name="isi" id="article-ckeditor">{{$visimisi->isi}}</textarea>
                                        </div>
                                        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>CKEDITOR.replace( 'article-ckeditor', {
                                                filebrowserUploadUrl: '{{ route('berita_upimage',['_token' => csrf_token() ]) }}'}
                                            );</script>
                                        
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
                                    </div>
                                </div>
                            </div>

    @endsection