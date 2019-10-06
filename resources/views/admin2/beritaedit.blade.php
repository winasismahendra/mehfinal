
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
                                <h4 class="header-title">Edit Berita</h4>
                                <div class="module">                        
                            <div class="module-body">
                       <form action="{{route('berita_update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                      <label class="control-label" for="form-control">Judul</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="judul" value="{{$edit->judul}}" class="span8">                       
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="form-control">Cover</label>
                      <div class="controls">
                        <img width="50px" src="{{asset('wysiwyg/'.$edit->cover)}}">  
                        <input class="btn btn-default" type="file" class="form-control" name="cover" value="{{$edit->cover}}" class="span8">  

                      </div>
                    </div>
                    <div class="form-group">
                    <div class="controls">
                      <textarea class="form-control" name="isi" id="article-ckeditor">{{$edit->isi}}</textarea>
                    </div>
                    </div>  
                    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                        <script>CKEDITOR.replace( 'article-ckeditor', {
                          filebrowserUploadUrl: '{{ route('berita_upimage',['_token' => csrf_token() ]) }}'}
                        );</script>

                     <div class="form-group">
                      <label class="control-label" for="form-control">Kategori</label>
                      <div class="controls">
                        <select name="id_kategori" tabindex="1" data-placeholder="Select here.." class="custom-select">
                          <option value="{{$b[0]->id_kategori}}">-- {{$b[0]->nama_kategori}} --</option>
                          @foreach ($kategori as $kat)
                          <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                          @endforeach
                        </select>
                    <input type="hidden" value="{{$edit->id_berita}}" name="id_berita">
                      </div>
                    </div>
                <button class="btn" type="submit">Submit</button>   
              </form>


                            </div>
                        </div>


                            </div>
                        </div>
                    </div>

                  
    @endsection