    
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
                                        <h4 class="header-title">Textual inputs</h4>
                                       
                                    <form action="{{ route('up_statistik') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Input Siswa Baru</label>
                                            <input class="form-control" type="text" name="s_baru" value="{{$statistik[0]->s_baru}}" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Input Siswa Baru</label>
                                            <input class="form-control" type="text" name="s_aktif" value="{{$statistik[0]->s_aktif}}" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Input Siswa Baru</label>
                                            <input class="form-control" type="text" name="t_pendidik" value="{{$statistik[0]->t_pendidik}}" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Input Siswa Baru</label>
                                            <input class="form-control" type="text" name="t_kependidikan" value="{{$statistik[0]->t_kependidikan}}" id="example-text-input">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
                                    </div>
                                </div>
                            </div>

    @endsection