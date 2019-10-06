@extends('layout.master')

@section('isi')
<section class="module bg-dark-30 about-page-header" data-background="{{asset('master/assets/images/file-track.jpg')}}">

          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Files Materi Ajar</h1>
        
              </div>
            </div>
          </div>
        </section>
        <br>
        <section>
          <div class="container">  
            <div class="col-sm-3 col-sm-offset-7">  
                <div class="widget">
                  <form action="{{route('filesmapel_search')}}" method="post" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}
                    <div class="search-box">
                      <input class="form-control" type="text" name="search" placeholder="Search...">
                      <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">

               @foreach ($files as $f)
               <div class="post">
                 
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="#">{{$f->judul}}</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#"> Guru </a>Category <a href="#">{{$f->nama_mapel}} </a>
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>{{$f->deskripsi}}</p>
                  </div>
                  <div class="post-more"><a href="{{asset('files/'.$f->file)}}"><button class="btn btn-d btn-circle btn-xs">Unduh File</button></a></div>
                </div>
                @endforeach
                {{$files->links()}}

                </div>
              </div>
            </div>
          </div>
        </section>
@endsection        