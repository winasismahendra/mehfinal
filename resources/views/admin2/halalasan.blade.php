
@extends('layout/cmaster')
	@section('navigasi')
			<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                          
                             <a href="{{ route ('data_jurusan', $alasan->id_jurusan)}}"><h4 class="page-title pull-left" >Kembali</h4></a>
                            
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

    <div class="alert-dismiss">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-times"></span>
            </button>
        </div>
        @endif
        @if (session('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
         {{ session('gagal') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-times"></span>
            </button>
        </div>
        @endif
    </div>

   

    	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Textual inputs</h4>
                                        

                                    
                                    <form action="{{ route ('editpro_jur_alasan', $alasan->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Pertanyaan</label>
                                            <input class="form-control" type="text" name="pertanyaan" value="{{$alasan->pertanyaan}}"  id="example-text-input">
                                        </div>
                                       <div class="form-group">
                                
                                                <label for="example-text-input" class="col-form-label">Jawaban</label>
                                                <textarea class="form-control" type="text"  name="jawaban">{{$alasan->jawaban}} </textarea>
                                                
                                            
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                        <input type="hidden" name="p" value="{{$alasan->id_jurusan}}">
                                       
                                    </form>
                                    </div>
                                </div>
                            </div>

    @endsection