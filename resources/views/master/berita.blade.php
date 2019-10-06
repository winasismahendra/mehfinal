@extends('layout.master')


  @section('isi')
<div class="main">
        <section class="module bg-dark-60 blog-page-header" data-background="{{asset('/master/assets/images/3.jpg')}}">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Berita</h2>
                <div class="module-subtitle font-serif">Selamat datang di Portal Berita SMK Islam Ulul Albab.</div>
              </div>
            </div>
          </div>
        </section>
  <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <div class="row multi-columns-row post-columns">
                @foreach($berita as $b)	
                  <div class="col-md-6 col-lg-6">
                    <div class="post">
                      <div class="post-thumbnail"><a href="#"><img src="{{asset('wysiwyg/'.$b->cover)}}" alt="{{$b->judul}}"/></a></div>
                      <div class="post-header font-alt">
                        <h2 class="post-title"><a href="{{route('berita_view', ['id' => $b->id_berita, 'judul' => $b->judul])}}">{{$b->judul}}</a></h2>
                        <div class="post-meta">By&nbsp;<a href="#">Administrator</a>&nbsp;| {{date('d-m-Y', strtotime($b->tanggal))}}
                        </div>
                      </div>
                      
                    </div>
                  </div>
                 @endforeach
                </div>
                {{$berita->links()}}
              </div>
              <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                <div class="widget">
                  <form action="{{route('berita_search2')}}" method="post" enctype="multipart/form-data" role="form">
                    {{csrf_field()}}
                    <div class="search-box">
                      <input class="form-control" name="search" type="text" placeholder="Search..."/>
                      <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </form>
                </div>
                <div class="widget">
                  <h5 class="widget-title font-alt">Blog Categories</h5>
                  <ul class="icon-list">
                    @foreach($kategori as $kat)
                    <li><a href="#">{{$kat->nama_kategori}}</a></li>
                    @endforeach
                  </ul>
                </div>
                <div class="widget">
                  <h5 class="widget-title font-alt">Random Posts</h5>
                  <ul class="widget-posts">
                    @foreach ($random as $rand)
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="{{asset('wysiwyg/'.$rand->cover)}}" alt="{{$rand->judul}}"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="{{route('berita_view', ['id' => $b->id_berita, 'judul' => $b->judul])}}">{{$rand->judul}}</a></div>
                        <div class="widget-posts-meta">{{date('d-m-Y', strtotime($rand->tanggal))}}</div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </section>

  @endsection