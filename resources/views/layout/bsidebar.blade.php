 <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="/admin"><img src="{{asset('master/assets/images/logo2.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        @if (Auth::user()->role == 1)
                        <ul class="metismenu" id="menu">
                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Halamann Depan</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Slidebar</a>
                                        <ul class="collapse">
                                            <li><a href="{{ route ('input_slidebar')}}">Input SlideBar</a></li>
                                            <li><a href="{{ route ('data_slidebar')}}">Data SlideBar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route ('kata_depan')}}">Kata Depan</a></li>
                                    <li><a href="{{ route ('statistik')}}">Statistik</a></li>
                                    <li><a href="{{ route ('hal_video')}}">Video</a></li>
                                    <li><a href="{{ route ('kepala')}}">Kepala Sekolah</a></li>
                                    <li><a href="#" aria-expanded="true">Keunggulan</a>
                                        <ul class="collapse">
                                            <li><a href="{{route ('input_keunggulan')}}">Input Keunggulan</a></li>
                                            <li><a href="{{ route ('data_keunggulan')}}">Data Keunggulan</a></li>
                                            
                                        </ul>
                                    </li>

                                    <li><a href="{{route('profilsekolah')}}">Profil Sekolah</a></li>
                                    <li><a href="{{route('visimisi')}}">Visi Misi</a></li>

                                </ul>
                            </li>
                        
                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i> <span>Gallery</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Gallery Foto</a>
                                        <ul class="collapse">
                                            <li><a href="{{ route ('input_gallery_foto')}}">Input Foto</a></li>
                                            <li><a href="{{ route ('data_gallery_foto')}}">Data Foto</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Gallery Video</a>
                                        <ul class="collapse">
                                            <li><a href="#"> Input Video</a></li>
                                            <li><a href="#"> Data Video</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comment-alt"></i> <span>Berita</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('berita_add')}}">Input Berita</a></li>
                                    <li><a href="{{route('berita_data')}}">Data Berita</a></li>
                                </ul>
                            </li>

                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i> <span>Alumni</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route ('input_alumni')}}">Input Alumni</a></li>
                                    <li><a href="{{ route ('data_alumni')}}">Data Alumni</a></li>
                                </ul>
                            </li>

                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i> <span>Jurusan</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route ('input_jurusan')}}">Input Jurusan</a></li>
                                    @for($i=0; $i<count($coba); $i++)
                                    
                                    <li><a href="{{ route ('data_jurusan', $coba[$i]->id)}}">{{$coba[$i]->nama_jurusan}}</a></li>

                                    @endfor
                                </ul>
                            </li>
                          
                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i> <span>GTK</span></a>
                                <ul class="collapse">
                                   
                                    <li><a href="{{ route ('input_gtk')}}">Input GTK</a></li>
                                    <li><a href="{{ route ('data_gtk')}}">Data GTK</a></li>
                                    <li><a href="{{ route ('input_lab')}}">Input Keahlian LAB</a></li>
                                </ul>
                            </li>
                               <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i> <span>Filez</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('filesmapel')}}">Input Files</a></li>
                                    <li><a href="{{route('filesmapelcontroller')}}">Kontrol Files</a></li>
                                    
                                </ul>
                            </li>    

                        
                           <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i> <span>PPDB</span></a>
                                <ul class="collapse">
                                 

                                    <li><a href="#">Seleksi Siswa</a>
                                        <ul class="collapse">
                                            @foreach ($jurusan as $j)
                                                 <li><a href=" {{route ('calonsiswa',$j->id)}}">{{$j->nama_jurusan}}</a></li>
                                            @endforeach
                                         </ul>
                                    </li>

                                      <li><a href="#">Siswa Diterima</a>
                                        <ul class="collapse">
                                            @foreach ($jurusan as $j)
                                                 <li><a href=" {{route ('siswa',$j->id)}}">{{$j->nama_jurusan}}</a></li>
                                            @endforeach
                                         </ul>
                                    </li>

                                     <li><a href="{{route ('siswaditolak')}} ">Siswa Ditolak</a></li> 
                                        {{-- <ul class="collapse">
                                            @foreach ($jurusan as $j)
                                                 <li><a href=" {{route ('siswa',$j->id)}}">{{$j->nama_jurusan}}</a></li>
                                            @endforeach
                                         </ul> --}}
                                    </li>c


                        @endif
                        @if (Auth::user()->role == 2)
                        <ul class="metismenu" id="menu">
                            <li >
                               
                           
                              <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i> <span>Files</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('filesmapel')}}">Input Files</a></li>
                                    <li><a href="{{route('filesmapelcontroller')}}">Kontrol Files</a></li>
                                    
                                </ul>
                            </li>    
                         @endif   
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->