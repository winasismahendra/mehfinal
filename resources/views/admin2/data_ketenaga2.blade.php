
@extends('layout/cmaster')

    @section('css')
       <!--  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

    @endsection
	

    @section('isi')

    	<div class="col-10 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Textual inputs</h4>

                                    

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('edit_ketenagaan', $gtk->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}


         <div class="form-group">
                <label for="example-text-input" class="col-form-label">Nomor Surat Tugas</label>
                <input class="form-control" type="text" name="no_srt_tgs" value="{{$gtk->no_srt_tgs}}"  id="example-text-input">
            </div>
            <!-- <div class="form-group">
                <label for="example-text-input" class="col-form-label">Tanggal Surat Tugas</label>
                <input class="form-control" type="date" name="tgl_srt_tgs"  id="example-text-input">
            </div> -->
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Tanggal Surat Tugas</label>
                <div class="input-group date" data-provide="datepicker">  
                    <input type="text" class="form-control" name="tgl_srt_tgs" value="{{$gtk->tgl_srt_tgs}}">
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
                    <input type="text" class="form-control" name="tmt_tgs" value="{{$gtk->tmt_tgs}}">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Status Sekolah</label>
                
                <select class="form-control"  name="s_sklh" >
                    <option>{{$gtk->stts_sklh}}</option>
                    <option>Ya</option>
                    <option>Tidak</option>
                </select>
         </div>

         <div class="form-group">
                <label for="example-text-input" class="col-form-label">Nama</label>
                <input class="form-control" type="text" name="nama" value="{{$gtk->nama}}" required="wajib diisi"  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Jenis Kelamin</label>
                <select class="form-control"  name="j_kel">
                    <option>{{$gtk->jns_kel}}</option>
                    <option>Laki - Laki</option>
                    <option>Perempuan</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Nomor Induk Keluarga</label>
                <input class="form-control" type="text" name="nik" value="{{$gtk->nik}}" required="wajib diisi"  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Tempat Lahir</label>
                <input class="form-control" type="text" name="tmp_lhr" value="{{$gtk->tmpt_lhr}}"  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Nama Ibu</label>
                <input class="form-control" type="text" name="n_ibu" value="{{$gtk->nama_ibu}}"  id="example-text-input">
            </div>
            <!-- <div class="form-group">
                <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tgl_lhr"  id="example-text-input">
            </div> -->
            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                <div class="input-group date" data-provide="datepicker">  
                    <input type="text" class="form-control" value="{{$gtk->tgl_lhr}}" name="tgl_lhr">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
             <div class="form-group">
                <label for="example-text-input" class="col-form-label">Foto</label>
                 <img src="{{ url('gambar/profil/gtk/'.$gtk->file) }}" width="33px ">
                <input  type="file"  name="file"  id="example-text-input">
                <input type="hidden" value="{{$gtk->file}}" name="file2">
        </div>

        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Alamat</label>
            <input class="form-control" type="text" name="alamat" value="{{$gtk->alamat}}" id="example-text-input">
        </div>
        
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">RT</label>
            <input class="form-control" type="text" name="rt" value="{{$gtk->rt}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">RW</label>
            <input class="form-control" type="text" name="rw" value="{{$gtk->rw}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Dusun</label>
            <input class="form-control" type="text" name="dusun" value="{{$gtk->dusun}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Desa</label>
            <input class="form-control" type="text" name="desa" value="{{$gtk->desa}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Kecamatan</label>
            <input class="form-control" type="text" name="kecamatan" value="{{$gtk->kecamatan}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Kabupaten</label>
            <input class="form-control" type="text" name="kabupaten" value="{{$gtk->kabupaten}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Kode Pos</label>
            <input class="form-control" type="text" name="k_pos" value="{{$gtk->kodepos}}" id="example-text-input">
        </div>

        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Agama</label>
            <select class="form-control"  name="agama">
                <option>{{$gtk->agama}}</option>
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
                <option>{{$gtk->s_nikah}}</option>
                <option>Lajang</option>
                <option>Menikah</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Nama Pasangan</label>
            <input class="form-control" type="text" name="n_pasangan" value="{{$gtk->nama_psgn}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Pekerjaan Pasangan</label>
            <select class="form-control"  name="p_pasangan">
                <option>{{$gtk->pkrjn_psgn}}</option>
                <option>Pegawai Negeri Sipil</option>
                <option>Wiraswasta</option>
                <option>Lain - Lain</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Kewarganegaraan</label>
            <select class="form-control"  name="kewarganegaraan">
                <option>{{$gtk->negara}}</option>
                <option>Indonesia</option>
                <option>Lain - Lain</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">NPWP</label>
            <input class="form-control" type="text" name="npwp"  value="{{$gtk->npwp}}" id="example-text-input">
        </div>

        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Status Kepegawaian</label>
            <select class="form-control"  name="s_pegawai">
                <option>{{$gtk->status}}</option>
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
            <input class="form-control" type="text" name="nip" value="{{$gtk->nip}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">NIY/NIGK</label>
            <input class="form-control" type="text" name="niy" value="{{$gtk->niy}}"  id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Jenis GTK</label>
            <select class="form-control"  name="j_gtk">
                <option>{{$gtk->j_gtk}}</option>
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
            <input class="form-control" type="text" name="sk_pengangkatan" value="{{$gtk->sk_pengankatan}}" id="example-text-input">
        </div>
        <!-- <div class="form-group">
            <label for="example-text-input" class="col-form-label">TMT Pengangkatan</label>
            <input class="form-control" type="date" name="tmt_pengangkatan"  id="example-text-input">
        </div> -->
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">TMT Pengangkatan</label>
            <div class="input-group date" data-provide="datepicker">  
                <input type="text" class="form-control" name="tmt_pengangkatan" value="{{$gtk->tmt_pengangkatan}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Lembaga Pengangkat</label>
            <select class="form-control"  name="l_pengangkatan">
                <option>{{$gtk->lmbg_pengangkatan}}</option>
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
            <input class="form-control" type="text" name="sk_cpns" value="{{$gtk->sk_cpns}}" id="example-text-input">
        </div>
        <!-- <div class="form-group">
            <label for="example-text-input" class="col-form-label">TMT PNS</label>
            <input class="form-control" type="date" name="tmt_pns"  id="example-text-input">
        </div> -->
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">TMT PNS</label>
            <div class="input-group date" data-provide="datepicker">  
                <input type="text" class="form-control" name="tmt_pns" value="{{$gtk->tmt_pns}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Pangkat / Golongan</label>
            <select class="form-control"  name="pangkat">
                <option>{{$gtk->golongan}}</option>
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
            <select class="form-control"  name="s_gaji" value="{{$gtk->s_gaji}}">

                <option>{{$gtk->s_gaji}}j</option>
                <option>APBN</option>
                <option>APBD Provinsi</option>
                <option>APBD KAb/Kota</option>
                <option>Yayasan</option>
                <option>Sekolah</option>
                <option>Lembaga Donor</option>
                <option>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Punya Lisensi Kepala Sekolah</label>
            <select class="form-control"  name="lisensi">
                <option>{{$gtk->lisensi}}</option>
                <option>Ya</option>
                <option>Tidak</option>
               
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Keahlian Laboratorium</label>
            <select class="form-control"  name="k_lab">
                <option>{{$gtk->k_laborat}}</option>
                @foreach($laborat as $l)
                <option>{{$l->laborat}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Mampu Menangani Kebutuhan Khusus</label>
            <select class="form-control"  name="k_khusus">
                <option>{{$gtk->keb_khusus}}</option>
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
                <option>{{$gtk->k_brailer}}</option>
                <option>Ya</option>
                <option>Tidak</option>
               
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Keahlian Bahasa Isyarat</label>
            <select class="form-control"  name="k_bahasa">
                <option>{{$gtk->k_bahasa}}</option>
                <option>Ya</option>
                <option>Tidak</option>
               
            </select>
        </div>

        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Nomor Telp Rumah</label>
            <input class="form-control" type="text" name="no_rm" value="{{$gtk->no_rumah}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Nomor HP</label>
            <input class="form-control" type="text" name="no_hp" value="{{$gtk->no_hp}}" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">email</label>
            <input class="form-control" type="text" name="email" value="{{$gtk->email}}" required="wajib disi" placeholder=" *Wajib Diisi "  id="example-text-input">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>


        </form>
    </div>
  </div>
</div>

                                 

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Penugasan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Identitas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Alamat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#alamat" role="tab" aria-controls="contact" aria-selected="false">Data Pribadi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kepegawaian" role="tab" aria-controls="contact" aria-selected="false">Kepegawaian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#khusus" role="tab" aria-controls="contact" aria-selected="false">K. Khusus</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kontak" role="tab" aria-controls="contact" aria-selected="false">Kontak</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>No Surat Tugas</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->no_srt_tgs}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Tanggal Surat Tugas</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->tgl_srt_tgs}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>TMT Tugas</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->tmt_tgs}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Status Sekolah</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->stts_sklh}}</label>
                                                </div>       
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                       <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Nama</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->nama}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Jenis Kelamin</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->jns_kel}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Nomor Induk Keluarga</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->nik}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Tempat Lahir</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->tmpt_lhr}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Nama Ibu</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->nama_ibu}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Tanggal Lahir</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->tgl_lhr}}</label>
                                                </div>       
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Alamat</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->alamat}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>RT</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->rt}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>RW</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->rw}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Dusun</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->dusun}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Desa</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->desa}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Kecamatan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->kecamatan}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Kabupaten</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->kabupaten}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Kode Pos</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->kodepos}}</label>
                                                </div>       
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Agama</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->agama}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Status Nikah</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->s_nikah}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Nama Pasangan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->nama_psgn}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Pekerjaan Pasangan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->pkrjn_psgn}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Kewarganegaraan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->negara}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>NPWP</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->npwp}}</label>
                                                </div>       
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kepegawaian" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Status Kepegawaian</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->status}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>NIP</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->nip}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>NIY/NIGK</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->niy}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Jenis GTK</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->j_gtk}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>SK Pengangkatan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->sk_pengankatan}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>TMT Pengangkatan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->tmt_pengangkatan}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Lembaga Pengangkat</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->lmbg_pengangkatan}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>SK CPNS</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->sk_cpns}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>TMT PNS</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->tmt_pns}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Pangkat / Golongan</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->golongan}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Sumber Gaji</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->s_gaji}}</label>
                                                </div>       
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="khusus" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Punya Lisensi Sekolah</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->lisensi}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Keahlian Laboratorium</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->k_laborat}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Mampu Menangani Kebutuhan Khusus</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->keb_khusus}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Keahlian Bralle</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->k_brailer}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Keahlian Bahasa Isyarat</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->k_bahasa}}</label>
                                                </div>       
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Nomor Telp Rumah</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->no_rumah}}</label>
                                                </div>       
                                        </div><br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Nomor HP</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->no_hp}}</label>
                                                </div>       
                                        </div> <br> 
                                        <div class="form-row">
                                                <div class="col-3">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02">: {{$gtk->email}}</label>
                                                </div>       
                                        </div>


                                    </div>
                                </div>
                           
                                         
                                        
                                    </div>
                                </div>
                            </div>

    <div class="col-2 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    @if ($gtk->file == 0)
                                    <img src="{{asset('/images/user.png')}}" width="333px "> <br><br>
                                        <h4 class="header-title">{{$gtk->nama}}</h4>
                                        @else
                                        <img src="{{ url('gambar/profil/gtk/'.$gtk->file) }}" width="333px "> <br><br>
                                        <h4 class="header-title">{{$gtk->nama}}</h4>
                                    @endif

<div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>

<!-- <div class="container">

    <h1>Laravel Bootstrap Datepicker</h1>

    <input class="date form-control" type="text">

</div> -->

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Edit Data</button>


    </div></div></div>

    @endsection

    @section('js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script> 

    @endsection