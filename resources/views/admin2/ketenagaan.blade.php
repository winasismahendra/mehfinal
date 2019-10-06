
@extends('layout/cmaster')
    @section('css')
<!--         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    @endsection
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


    	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Penambahan Jurusan</h4>
                                        
<div id="accordion">
<form action="{{ route('up_ketenagaan') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
  <div class="card">
    <div class="card-header" id="headingOne">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" > Penugasan</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        

                                        
                                         <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nomor Surat Tugas</label>
                                            <input class="form-control" type="text" name="no_srt_tgs"  id="example-text-input">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tanggal Surat Tugas</label>
                                            <input class="form-control" type="date" name="tgl_srt_tgs"  id="example-text-input">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tanggal Surat Tugas</label>
                                            <div class="input-group date" data-provide="datepicker">  
                                                <input type="text" class="form-control" name="tgl_srt_tgs">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">TMT Tugas</label>
                                            <input class="form-control" type="date" name="tmt_tgs"  id="example-text-input">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">TMT Tugas</label>
                                            <div class="input-group date" data-provide="datepicker">  
                                                <input type="text" class="form-control" name="tmt_tgs">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Status Sekolah</label>
                                            
                                            <select class="form-control"  name="s_sklh">
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                            </select>
                                        </div>
                                        

                                    
      </div>
    </div>
  
  <div class="card-header" id="heading2">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2" > Identitas</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
      <div class="card-body">
        

                                        
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama</label>
                                            <input class="form-control" type="text" name="nama" required="wajib diisi"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Jenis Kelamin</label>
                                            <select class="form-control"  name="j_kel">
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nomor Induk Keluarga</label>
                                            <input class="form-control" type="text" name="nik" required="wajib diisi"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tempat Lahir</label>
                                            <input class="form-control" type="text" name="tmp_lhr"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Ibu</label>
                                            <input class="form-control" type="text" name="n_ibu"  id="example-text-input">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lhr"  id="example-text-input">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                                            <div class="input-group date" data-provide="datepicker">  
                                                <input type="text" class="form-control" name="tgl_lhr">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Foto</label>
                                            <input  type="file" name="file"  id="example-text-input">
                                        </div>
                                        

                                    
      </div>
    </div>
  
  <div class="card-header" id="heading3">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3" > Alamat</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
      <div class="card-body">
                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Alamat</label>
                                            <input class="form-control" type="text" name="alamat"  id="example-text-input">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">RT</label>
                                            <input class="form-control" type="text" name="rt"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">RW</label>
                                            <input class="form-control" type="text" name="rw"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Dusun</label>
                                            <input class="form-control" type="text" name="dusun"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Desa</label>
                                            <input class="form-control" type="text" name="desa"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Kecamatan</label>
                                            <input class="form-control" type="text" name="kecamatan"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Kabupaten</label>
                                            <input class="form-control" type="text" name="kabupaten"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Kode Pos</label>
                                            <input class="form-control" type="text" name="k_pos"  id="example-text-input">
                                        </div>
                                                                        
      </div>
    </div>
    <div class="card-header" id="heading4">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4" > Data Pribadi</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
      <div class="card-body">
                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Agama</label>
                                            <select class="form-control"  name="agama">
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Khatolik</option>
                                                <option>Hindu</option>
                                                <option>Budha</option>
                                                <option>Khong Hucu</option>
                                                <option>Lain - Lain</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Status Nikah</label>
                                            <select class="form-control"  name="s_nikah">
                                                <option>Lajang</option>
                                                <option>Menikah</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Pasangan</label>
                                            <input class="form-control" type="text" name="n_pasangan"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Pekerjaan Pasangan</label>
                                            <select class="form-control"  name="p_pasangan">
                                                <option>Pegawai Negeri Sipil</option>
                                                <option>Wiraswasta</option>
                                                <option>Lain - Lain</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Kewarganegaraan</label>
                                            <select class="form-control"  name="kewarganegaraan">
                                                <option>Indonesia</option>
                                                <option>Lain - Lain</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">NPWP</label>
                                            <input class="form-control" type="text" name="npwp"   id="example-text-input">
                                        </div>
                                        
                                                                        
      </div>
    </div>
    <div class="card-header" id="heading5">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5" > Kepegawaian</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
      <div class="card-body">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Status Kepegawaian</label>
                                            <select class="form-control"  name="s_pegawai">
                                                <option>PNS</option>
                                                <option>PNS Diperbantukan</option>
                                                <option>PNS Depag</option>
                                                <option>GTY/PTY</option>
                                                <option>GTY/PTT Provinsi</option>
                                                <option>GTY/PTT Kabupaten/Kota</option>
                                                <option>Guru Bantu Pusat</option>
                                                <option>Guru Honor Sekolah</option>
                                                <option>CPNS</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">NIP</label>
                                            <input class="form-control" type="text" name="nip"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">NIY/NIGK</label>
                                            <input class="form-control" type="text" name="niy"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Jenis GTK</label>
                                            <select class="form-control"  name="j_gtk">
                                                <option>Guru Kelas</option>
                                                <option>Guru Mata Pelajaran</option>
                                                <option>Guru BK</option>
                                                <option>Guru Inklusi</option>
                                                <option>Tenaga Administrasi Sekolah</option>
                                                <option>Guru Pendamping</option>
                                                <option>Guru Magang</option>
                                                <option>Guru TIK</option>
                                                <option>Laboran</option>
                                                <option>Pustakawan</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">SK Pengangkatan</label>
                                            <input class="form-control" type="text" name="sk_pengangkatan"  id="example-text-input">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">TMT Pengangkatan</label>
                                            <input class="form-control" type="date" name="tmt_pengangkatan"  id="example-text-input">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">TMT Pengangkatan</label>
                                            <div class="input-group date" data-provide="datepicker">  
                                                <input type="text" class="form-control" name="tmt_pengangkatan">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Lembaga Pengangkat</label>
                                            <select class="form-control"  name="l_pengangkatan">
                                                <option>Pemerintah Pusat</option>
                                                <option>Pemerintah Provinsi</option>
                                                <option>Pemerintah Kab/Kota</option>
                                                <option>Ketua Yayasan</option>
                                                <option>Kepala Sekolah</option>
                                                <option>Komite Sekolah</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">SK CPNS</label>
                                            <input class="form-control" type="text" name="sk_cpns"  id="example-text-input">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">TMT PNS</label>
                                            <input class="form-control" type="date" name="tmt_pns"  id="example-text-input">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">TMT PNS</label>
                                            <div class="input-group date" data-provide="datepicker">  
                                                <input type="text" class="form-control" name="tmt_pns">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Pangkat / Golongan</label>
                                            <select class="form-control"  name="pangkat">
                                                <option>I/A</option>
                                                <option>I/B</option>
                                                <option>I/C</option>
                                                <option>I/D</option>
                                                <option>II/A</option>
                                                <option>II/B</option>
                                                <option>II/C</option>
                                                <option>II/D</option>
                                                <option>III/A</option>
                                                <option>III/B</option>
                                                <option>III/C</option>
                                                <option>III/D</option>
                                                <option>IV/A</option>
                                                <option>IV/B</option>
                                                <option>IV/C</option>
                                                <option>IV/D</option>
                                                <option>IV/E</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Sumber Gaji</label>
                                            <select class="form-control"  name="s_gaji">
                                                <option>APBN</option>
                                                <option>APBD Provinsi</option>
                                                <option>APBD KAb/Kota</option>
                                                <option>Yayasan</option>
                                                <option>Sekolah</option>
                                                <option>Lembaga Donor</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        
                                                                        
      </div>
    </div>
    <div class="card-header" id="heading6">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6" > Kompetensi</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
      <div class="card-body">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Punya Lisensi Kepala Sekolah</label>
                                            <select class="form-control"  name="lisensi">
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                               
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Keahlian Laboratorium</label>
                                            <select class="form-control"  name="k_lab">
                                                @foreach($laborat as $l)
                                                <option>{{$l->laborat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Mampu Menangani Kebutuhan Khusus</label>
                                            <select class="form-control"  name="k_khusus">
                                                <option>Tidak</option>
                                                <option>Tuna Netra</option>
                                                <option>Tuna Rungu</option>
                                                <option>Tuna Grahita Ringan</option>
                                                <option>Tuna Grahita Sedang</option>
                                                <option>Tuna Daksa Ringan</option>
                                                <option>Tuna Daksa Sedang</option>
                                                <option>Tuna Laras</option>
                                                <option>Tuna Wicara</option>
                                                <option>Tuna Ganda</option>
                                                <option>Hiper Aktif</option>
                                                <option>Tuna Daksa Ringan</option>
                                                <option>Cerdas Istimewa</option>
                                                <option>Bakat Istimewa</option>
                                                <option>Kesulitan Belajar</option>
                                                <option>Narkoba</option>
                                                <option>Indigo</option>
                                                <option>Down Sindrome</option>
                                                <option>Autis</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Keahlian Bralle</label>
                                            <select class="form-control"  name="k_bralle">   

                                                <option>Ya</option>
                                                <option>Tidak</option>
                                               
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Keahlian Bahasa Isyarat</label>
                                            <select class="form-control"  name="k_bahasa">
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                               
                                            </select>
                                        </div>

                                        
                                                                        
      </div>
    </div>
    <div class="card-header" id="heading7">
      <h6 class="mb-0">
      <a data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7" > Kontak</a>
       
         
        </button>
      </h6>
    </div>

    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
      <div class="card-body">
                        
                                        
                                       
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nomor Telp Rumah</label>
                                            <input class="form-control" type="text" name="no_rm"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nomor HP</label>
                                            <input class="form-control" type="text" name="no_hp"  id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">email</label>
                                            <input class="form-control" type="text" name="email" required="wajib disi" placeholder=" *Wajib Diisi "  id="example-text-input">
                                        </div>
                                        
                                                                        
      </div>
    </div>



  </div>
 <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
</form>
</div>

                                    
                                        
                                    </div>
                                </div>
                            </div>

    @endsection

    @section('js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">

    $('.date').datepicker({  

       

       format: 'yyyy-mm-dd'

     });  

</script> 

    @endsection