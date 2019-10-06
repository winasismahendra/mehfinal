@extends('layout.master')

	@section('isi')

    @if (count($p) == 0)
        <section class="home-section home-parallax home-fade home-full-height bg-dark-60 agency-page-header" id="home" data-background="{{asset('master/assets/images/3.jpg')}}">
        @else
          <section class="home-section home-parallax home-fade home-full-height bg-dark-60 agency-page-header" id="home" data-background="{{ url('gambar/jurusan/modal/'.$p[0]->gambar_top) }}">
    @endif
		
    @if (count($p) == 0)
      <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">Isikan Judul</div>
            <div class="font-alt mb-40 titan-title-size-3">Isikan Isi
            </div><a class="section-scroll btn btn-border-w btn-circle" href="#about">Learn More</a>
          </div>
        </div>

        @else
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">{{$p[0]->judul_top}}</div>
            <div class="font-alt mb-40 titan-title-size-3">{{$p[0]->deskripsi_top}}
            </div><a class="section-scroll btn btn-border-w btn-circle" href="#about">Learn More</a>
          </div>
        </div>
    @endif
      </section>
      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row multi-columns-row">
             <h2 class="module-title font-alt">Keunggulan</h2>
              @for($i=0; $i<count($keunggulan); $i++)
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="{{$keunggulan[$i]->icon}}"></span></div>
                  <h3 class="features-title font-alt">{{$keunggulan[$i]->judul}}</h3>{{$keunggulan[$i]->isi}}
                </div>
              </div>
              @endfor
              
            </div>
          </div>
        </section>
      	  
        <hr class="divider-w">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h4 class="font-alt mb-30">Frequently Asked Questions</h4>
                <div class="panel-group" id="accordion">
                  @for($i=0; $i<count($alasan); $i++)
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support{{$i}}">{{$alasan[$i]->pertanyaan}}</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="support{{$i}}">
                      <div class="panel-body">{{$alasan[$i]->jawaban}}
                      </div>
                    </div>
                  </div>
                  @endfor
                  
                </div>
              </div>
              <div class="col-sm-6">
                <h4 class="font-alt mb-30">Our Expertises</h4>
                <h6 class="font-alt"><span class="icon-tools-2"></span> Development
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> Branding
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> Marketing
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> Photography
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-pencil"></span> Designing
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="70" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-lifesaver"></span> Dedication
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <section class="module">
          <div class="container">
          <h2 class="module-title font-alt">Gallery</h2>
            <div class="row multi-columns-row">
               @for($i=0; $i<count($gallery); $i++)
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="gallery-item">
                  <div class="gallery-image"><a class="gallery" href="{{ url('gambar/jurusan/gallery/'.$gallery[$i]->file) }}" title="Title 1"><img src="{{ url('gambar/jurusan/gallery/'.$gallery[$i]->file) }}" alt="Gallery Image 1"/>
                      <div class="gallery-caption">
                        <div class="gallery-icon"><span class="icon-magnifying-glass"></span></div>
                      </div></a></div>
                </div>
              </div>
              @endfor
              
            </div>
          </div>
        </section>
        <div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">About Titan</h5>
                  <p>The languages only differ in their grammar, their pronunciation and their most common words.</p>
                  <p>Phone: +1 234 567 89 10</p>Fax: +1 234 567 89 10
                  <p>Email:<a href="#">somecompany@example.com</a></p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Recent Comments</h5>
                  <ul class="icon-list">
                    <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                    <li>John on <a href="#">Realistic Business Card Mockup</a></li>
                    <li>Andy on <a href="#">Eco bag Mockup</a></li>
                    <li>Jack on <a href="#">Bottle Mockup</a></li>
                    <li>Mark on <a href="#">Our trip to the Alps</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Blog Categories</h5>
                  <ul class="icon-list">
                    <li><a href="#">Photography - 7</a></li>
                    <li><a href="#">Web Design - 3</a></li>
                    <li><a href="#">Illustration - 12</a></li>
                    <li><a href="#">Marketing - 1</a></li>
                    <li><a href="#">Wordpress - 16</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="widget">
                  <h5 class="widget-title font-alt">Popular Posts</h5>
                  <ul class="widget-posts">
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                        <div class="widget-posts-meta">23 january</div>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                        <div class="widget-posts-meta">15 February</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

     
      
        


	@endsection