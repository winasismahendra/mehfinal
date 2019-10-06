@extends('layout.master')


  @section('isi')
  

    <section class="home-section home-parallax home-fade home-full-height" id="home">
        <div class="hero-slider">
          <ul class="slides">
           @foreach ($slider as $slider)
            <li class="bg-dark-30 bg-dark" style="background-image:url({{url('gambar/slider/'.$slider->gambar)}});">
              <div class="titan-caption">  
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1">{{$slider->judul}}</div>
                  <div class="font-alt mb-40 titan-title-size-4">{{$slider->deskripsi}}</div><a class="section-scroll btn btn-border-w btn-round" href="#about">INFO</a>
                </div>
              </div>
            </li>
            @endforeach
          </ul>          
        </div>
      </section>



     
      <div class="main">
        <section class="module" id="about">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
              @foreach( $katadepan as $katadepan)
                <h2 class="module-title font-alt">{{$katadepan->judul}}</h2>
                <div class="module-subtitle font-serif large-text">{{$katadepan->isi}}.</div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 col-sm-offset-5">
                <div class="large-text align-center"><a class="section-scroll" href="#services"><i class="fa fa-angle-down"></i></a></div>
              </div>
            </div>
          </div>
        </section>

        <section class="module bg-dark-60" data-background="({{url('master/assets/images/services_bg.jpg')}}" >
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">SMKI ULUL ALBAB DALAM ANGKA</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row multi-columns-row">
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="count-item mb-sm-40">
                  <div class="count-icon"><span class="icon-wallet"></span></div>
                  <h3 class="count-to font-alt" data-countto="{{$statistik[0]->s_baru}}"></h3>
                  <h5 class="count-title font-serif">Siswa Baru</h5>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="count-item mb-sm-40">
                  <div class="count-icon"><span class="icon-wine"></span></div>
                  <h3 class="count-to font-alt" data-countto="{{$statistik[0]->s_aktif}}"></h3>
                  <h5 class="count-title font-serif">Siswa Aktif</h5>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="count-item mb-sm-40">
                  <div class="count-icon"><span class="icon-camera"></span></div>
                  <h3 class="count-to font-alt" data-countto="{{$statistik[0]->t_pendidik}}"></h3>
                  <h5 class="count-title font-serif">Tenaga Pendidik</h5>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="count-item mb-sm-40">
                  <div class="count-icon"><span class="icon-map-pin"></span></div>
                  <h3 class="count-to font-alt" data-countto="{{$statistik[0]->t_kependidikan}}"></h3>
                  <h5 class="count-title font-serif">Tenaga Kependidikan</h5>
                </div>
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-w">
        <section class="module" id="services">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">

                <h2 class="module-title font-alt">{{$master->judul}}</h2>
                <div class="module-subtitle font-serif">{{$master->deskripsi}}</div>
              </div>
            </div>
            <div class="row multi-columns-row">


              
              @foreach($keunggulan as $keunggulans )
                  @continue($keunggulans->id == 1)
                  
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="{{$keunggulans->icon}}"></span></div>
                  <h3 class="features-title font-alt">{{$keunggulans->subjudul}}</h3>
                  <p>{{$keunggulans->isi}}</p>

                </div>
              </div>
              @endforeach
            </div>
          </div>
        </section>
        <section class="module module-video bg-dark-30" data-background="assets/images/section-12.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="module-title font-alt align-left">{{$video[0]->judul}}</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="font-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p class="font-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
              </div>
              <div class="col-sm-3">
                <p class="font-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
              </div>
            </div>
          </div>
          <div class="video-player" data-property="{videoURL:'{{$video[0]->alamat}}', containment:'.module-video', startAt:0, mute:false, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
          <div class="video-controls-box">
            <div class="container">
              <div class="video-controls"><a class="fa fa-volume-up" id="video-volume" href="#">&nbsp;</a><a class="fa fa-pause" id="video-play" href="#">&nbsp;</a></div>
            </div>
          </div>
        </section>
        
        <section class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
                <div class="callout-text font-alt">
                  <h3 class="callout-title">Want to see more works?</h3>
                  <p>We are always open to interesting projects.</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="callout-btn-box"><a class="btn btn-w btn-round" href="portfolio_boxed_gutter_col_3.html">Lets view portfolio</a></div>
              </div>
            </div>
          </div>
        </section>
        <section class="module" id="alt-features">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">

                <h2 class="module-title font-alt">{{$kepala->judul}}</h2>
                <div class="module-subtitle font-serif">{{$kepala->isi}}</div>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3 col-lg-3">

              </div>
                
              <div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
                <div class="alt-services-image align-center"><img src="{{url('gambar/kepala_sekolah/'.$kepala->gambar)}}" alt="Feature Image"></div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
              </div>


            </div>
          </div>
        </section>
        <hr class="divider-w">
        <section class="module" id="team">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Meet Our Team</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
            <div class="row">
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/team-1.jpg" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Hi all</h5>
                      <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Jim Stone</div>
                    <div class="team-role">Art Director</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/team-2.jpg" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Good day</h5>
                      <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Andy River</div>
                    <div class="team-role">Creative director</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/team-3.jpg" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Hello</h5>
                      <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Adele Snow</div>
                    <div class="team-role">Account manager</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/team-4.jpg" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Yes, it's me</h5>
                      <p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
                      <div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Dylan Woods</div>
                    <div class="team-role">Developer</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="master/assets/images/testimonial_bg.jpg">
          <div class="testimonials-slider pt-140 pb-140">
            <ul class="slides">
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                          <div class="testimonial-title">Jack Woods</div>
                          <div class="testimonial-descr">SomeCompany INC, CEO</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                          <div class="testimonial-title">Jim Stone</div>
                          <div class="testimonial-descr">SomeCompany INC, CEO</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                          <div class="testimonial-title">Adele Snow</div>
                          <div class="testimonial-descr">SomeCompany INC, CEO</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section class="module" id="news">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Latest blog posts</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
            @foreach ($berita as $berita)
            <div class="row multi-columns-row post-columns">
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="post mb-20">
                  <div class="post-thumbnail"><a href="#"><img src="{{asset('/wysiwyg/'.$berita->cover)}}" alt="Blog-post Thumbnail"/></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a href="{{route('berita_view', ['id' => $berita->id_berita, 'judul' => $berita->judul])}}">{{$berita->judul}}</a></h2>
                    <div class="post-meta">By&nbsp;<a href="#">Administrator</a>&nbsp;| {{date('d-m-Y', strtotime($berita->tanggal))}}
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>{{ str_limit(strip_tags($berita->isi), 50) }}</p>
                  </div>
                  <div class="post-more"><a class="more-link" href="{{route('berita_view', ['id' => $berita->id_berita, 'judul' => $berita->judul])}}">Read more</a></div>
                </div>
              </div>
             @endforeach 
            </div>
          </div>
        </section>
        <div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-lg-offset-2">
                <div class="callout-text font-alt">
                  <h3 class="callout-title">Subscribe now</h3>
                  <p>We will not spam your email.</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="callout-btn-box">
                  <form id="subscription-form" role="form" method="post" action="php/subscribe.php">
                    <div class="input-group">
                      <input class="form-control" type="email" id="semail" name="semail" placeholder="Your Email" data-validation-required-message="Please enter your email address." required="required"/><span class="input-group-btn">
                        <button class="btn btn-g btn-round" id="subscription-form-submit" type="submit">Submit</button></span>
                    </div>
                  </form>
                  <div class="text-center" id="subscription-response"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <section class="module" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Get in touch</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
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