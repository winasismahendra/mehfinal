@extends('layout.master')


  @section('isi')
 <div class="main">
        <section class="module-small">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <div class="post">
                  <div class="post-header font-alt">
                    <h1 class="post-title">{{$berita->judul}}</h1>
                    <div class="post-meta">By&nbsp;<a href="#">Administrator</a> {{date('d-m-Y', strtotime($berita->tanggal))}}</a></a>
                    </div>
                  </div>
                  <div class="post-entry">
                    @php echo $berita->isi; @endphp
                  </div>
                </div>

              </div>
               <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                <div class="widget">
                  <form role="form">
                    <div class="search-box">
                      <input class="form-control" type="text" placeholder="Search..."/>
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
                        <div class="widget-posts-title"><a href="{{route('berita_view', ['id' => $berita->id_berita, 'judul' => $berita->judul])}}">{{$rand->judul}}</a></div>
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