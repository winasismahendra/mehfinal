<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a src="{{asset('master/assets/images/logo2.png')}}" class="navbar-brand"  href="{{route('home2') }}"><img src="{{asset('master/assets/images/logo2.png')}}" width="118" height="14"></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Profil</a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('profilsekolah_master')}}">Sekolah</a></li>
                  <li><a href="{{route('visimisi_master')}}">Visi Misi</a></li>
                  <li><a href="index_op_fullscreen_gradient_overlay.html">Tenaga Pendidik</a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Jurusan</a>
                <ul class="dropdown-menu" role="menu">
                  
                  @for($i=0; $i<count($coba); $i++)
                  <li><a href="{{ route('jurusan', $coba[$i]->id) }}"> {{$coba[$i]->nama_jurusan}}</a></li>
                  @endfor

                </ul>
              </li>

              <li ><a href="{{route ('alumni')}}" >Alumni</a>

              <li ><a href="{{route('berita_master')}}" >Berita</a>
              
              <li ><a href="{{route('filesmapel_master')}}" >Materi</a>  

                
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">PPDB2019</a>
                <ul class="dropdown-menu" role="menu">
                  
                  <li><a href="{{route('ppdbform')}}">Formulir PPDB</a></li>
                  <li><a href="{{route('hasil')}}">Hasil Seleksi</a></li>
                  <li><a href="#">Cetak Formulir</a></li>
                  <li><a href="#">Download Formulir</a></li>

                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Gallery</a>
                <ul class="dropdown-menu" role="menu">
                 
                  <li><a href="{{route ('gallery_foto') }}"><i class="fa fa-bolt"></i> Gallery Foto</a></li>
                  <li><a href="buttons.html"><i class="fa fa-link fa-sm"></i> Gallery Video</a></li>
                  
                </ul>
              </li>
              
             
              
              <!--li.dropdown.navbar-cart-->
              <!--    a.dropdown-toggle(href='#', data-toggle='dropdown')-->
              <!--        span.icon-basket-->
              <!--        |-->
              <!--        span.cart-item-number 2-->
              <!--    ul.dropdown-menu.cart-list(role='menu')-->
              <!--        li-->
              <!--            .navbar-cart-item.clearfix-->
              <!--                .navbar-cart-img-->
              <!--                    a(href='#')-->
              <!--                        img(src='assets/images/shop/product-9.jpg', alt='')-->
              <!--                .navbar-cart-title-->
              <!--                    a(href='#') Short striped sweater-->
              <!--                    |-->
              <!--                    span.cart-amount 2 &times; $119.00-->
              <!--                    br-->
              <!--                    |-->
              <!--                    strong.cart-amount $238.00-->
              <!--        li-->
              <!--            .navbar-cart-item.clearfix-->
              <!--                .navbar-cart-img-->
              <!--                    a(href='#')-->
              <!--                        img(src='assets/images/shop/product-10.jpg', alt='')-->
              <!--                .navbar-cart-title-->
              <!--                    a(href='#') Colored jewel rings-->
              <!--                    |-->
              <!--                    span.cart-amount 2 &times; $119.00-->
              <!--                    br-->
              <!--                    |-->
              <!--                    strong.cart-amount $238.00-->
              <!--        li-->
              <!--            .clearfix-->
              <!--                .cart-sub-totle-->
              <!--                    strong Total: $476.00-->
              <!--        li-->
              <!--            .clearfix-->
              <!--                a.btn.btn-block.btn-round.btn-font-w(type='submit') Checkout-->
              <!--li.dropdown-->
              <!--    a.dropdown-toggle(href='#', data-toggle='dropdown') Search-->
              <!--    ul.dropdown-menu(role='menu')-->
              <!--        li-->
              <!--            .dropdown-search-->
              <!--                form(role='form')-->
              <!--                    input.form-control(type='text', placeholder='Search...')-->
              <!--                    |-->
              <!--                    button.search-btn(type='submit')-->
              <!--                        i.fa.fa-search-->
              
            </ul>
          </div>
        </div>
      </nav>