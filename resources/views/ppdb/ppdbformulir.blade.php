

@extends('layout.master')

  @section('isi')


  <style>

    .module
    {
      font-size: 13px;
      color: #2D2D2D;
    }
    
    .form-control{
      text-transform: capitalize;
       letter-spacing: 2px;
      font-size: 14px;
      height: 36px;

    }

    .form-select {
      font-family: "Roboto Condensed", sans-serif;
      text-transform: capitalize;
      letter-spacing: 2px;
      font-size: 14px;
      height: 36px;
      border: 1px solid #EAEAEA;
      border-radius: 2px;
      transition: all 0.4s ease-in-out 0s;
      margin-right: 0px;
      padding-left: 10px;
      width: 100%;
    }

    .form-select:focus {
       border-color: #CACACA;
    }

    .font-pendaftaran {
      font-family: "Roboto Condensed", sans-serif;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-align: center;
      font-weight: bold;
       font-size: 25px;
    }

    .font-alt{
      font-weight: bold;
      
      font-size: 20px;
    }



  </style>

  @php
    $id=$formulir->id;
  @endphp


     <section class="module">
          <div class="container">
             <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                 <p class="font-pendaftaran" >formulir pendaftaran</p>


              <h4 class="font-alt mb-0">Detail Form</h4>
                   <hr class="divider-w mt-8 mb-30">

                  <div class="row">
                    <div class="col-md-3">
                      <label>Jalur Pendaftaran</label> 
                    </div>
                    <div class="col-md-9" style="text-transform: capitalize; " >
                       :&emsp;{{$jalur->nama_jalur}}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <label>Jurusan Yang Dipilih</label> 
                    </div>
                    <div class="col-md-9" style="text-transform: capitalize; ">:&emsp;{{$jurusan1->nama_jurusan}}&emsp;(Pilihan 1)
                      <br> &emsp; {{$jurusan2->nama_jurusan}}&emsp;(Pilihan 2)
                    </div>
                  </div>


                 <form class="form" role="form" action="{{route('storeform',$id)}}" enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
            

 
                  <br><br><br>
                    <h4 class="font-alt mb-0">Data Diri</h4>
                   <hr class="divider-w mt-10 mb-30">

                  <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input class="form-control input-lg" type="text" name="nama" placeholder="masukkan nama" required/>
                  </div>

                   <div class="form-group">
                    <label for="">Foto 3x4</label>
                    <input class=".form-control-file" type="file" name="file" required/>
                  </div>

                 

                   <div class="form-group">
                       <label for="">Jenis Kelamin</label><br>
                      <select class="form-select" id="" name="jenis_kelamin" required>
                        <option value="" selected>Pilih...</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>

                  <div class="form-group">
                    <label for="">Nomor Peserta UN</label>
                    <input class="form-control input-lg" type="text" name="no_un"  placeholder="Masukkan Nomor Peserta UN" required />
                  </div>

                  <div class="form-group">
                    <label for="">Hoby</label>
                    <input class="form-control input-lg" type="text" name="hoby" placeholder="Hoby" />
                  </div>

                  <div class="form-group">
                    <label for="">Cita- cita</label>
                    <input class="form-control input-lg" type="text" name="cita" placeholder="Cita- cita" />
                  </div>

                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="">NISN</label>
                        <input class="form-control input-lg" type="text" name="nisn" placeholder="masukkan NISN" required/>
                      </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">NIK</label>
                        <input class="form-control input-lg" type="text" name="nik" placeholder="masukkan NIk" required/>
                     </div>
                  </div>
                </div>

                 <div class="form-group">
                       <label for="">Apakah Pernah Paud</label><br>
                      <select class="form-select" id="" name="paud" required>
                        <option value="ya">ya</option>
                        <option value="tidak">Tidak</option>
                      </select>
                    </div>

                    <div class="form-group">
                       <label for="">Apakah Pernah TK</label><br>
                      <select class="form-select" id="" name="tk" required>
                        <option value="ya">ya</option>
                        <option value="tidak">Tidak</option>
                      </select>
                    </div>

                <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input class="form-control input-lg" type="text" name="tempat_lahir" placeholder="masukkan kota kelahiran" required/>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Tanggal lahir</label>
                      <input class="form-control input-lg" name="tanggal_lahir" type="date" required/>
                    </div>
                  </div>
                </div>


               

                 <div class="form-group">
                        <label for="">Kebutuhan Khusus </label>
                         <select name="kebutuhan_siswa" class="form-select" required>
                            <option value="Tidak" selected>Tidak ada</option>
                            <option value="Autis">Autis</option>
                            <option value="Bakat Istimewa">Bakat Istimewa</option>
                            <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                            <option value="Down Sindrome">Down Sindrome</option>
                            <option value="Hiper Aktif">Hiper Aktif</option>
                            <option value="Indigo">Indigo</option>
                            <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                            <option value="Narkoba">Narkoba</option>
                            <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                            <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                            <option value="Tuna Ganda">Tuna Ganda</option>
                            <option value="Tuna Grahita Ringan">Tuna Grahita Ringan</option>
                            <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                            <option value="Tuna Laras">Tuna Laras</option>
                            <option value="Tuna Netra"> Tuna Netra</option>
                            <option value="Tuna Rungu">Tuna Rungu</option>
                            <option value="Tuna Wicara">Tuna Wicara</option>
                          </select> 
                      </div>

               
                 
                  <div class="form-group">
                       <label for="">Agama</label><br>
                      <select class="form-select" id="" name="agama" required>
                        <option value="" selected>Pilih...</option>
                        <option value="islam">islam</option>
                        <option value="budha">budha</option>
                        <option value="hindu">hindu</option>
                        <option value="kristen">kristen</option>
                        <option value="katolik">katolik</option>
                        <option value="lainnya">lainnya</option>
                      </select>
                    </div>

                   <label for="">Alamat</label>
                  <textarea class="form-control" rows="5" name="alamat" placeholder="masukkan alamat" required></textarea><br>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">RT</label>
                          <input class="form-control input-lg" name="rt" type="text" required/>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">RW</label>
                          <input class="form-control input-lg" name="rw" type="text" required/>
                       </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Dusun</label>
                          <input class="form-control input-lg" name="dusun" type="text"/>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Desa</label>
                          <input class="form-control input-lg" name="desa" type="text" required/>
                       </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Kecamatan</label>
                          <input class="form-control input-lg" name="Kecamatan" type="text" required/>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Kabupaten/Kota</label>
                          <input class="form-control input-lg" name="kabupaten" type="text" required/>
                       </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="">Kode Pos</label>
                      <input class="form-control input-lg" name="kode_pos" type="text" />
                  </div>

                   <div class="form-group">
                       <label for="">Tempat Tinggal</label><br>
                      <select class="form-select" id="" name="tempat_tinggal" required>
                        <option value="" selected>Pilih...</option>
                        <option value="bersama orang tua">bersama orang tua</option>
                        <option value="asrama">asrama</option>
                        <option value="panti asuhan">panti asuhan</option>
                        <option value="kos">kos</option>
                        <option value="lainnya">lainnya</option>
                      </select>
                    </div>

                  <div class="form-group">
                    <label for="">Modal Transportasi</label><br>
                    <select  class="form-select" name="transportasi" required>
                       <option value="" selected>Pilih...</option>
                      <option value="Andong / Bendi / Sado / Dokar / Delman / Beca" >Andong / Bendi / Sado / Dokar / Delman / Beca</option>
                      <option value="Jalan Kaki" >Jalan Kaki</option>
                      <option value="Jemputan Sekolah" >Jemputan Sekolah</option>
                      <option value="Kendaraan Pribadi" >Kendaraan Pribadi</option>
                      <option value="Kendaraan Umum / angkot / pete-pete" >Kendaraan Umum / angkot / pete-pete</option>
                      <option value="Kereta Api" >Kereta Api</option>
                      <option value="Ojek" >Ojek</option>
                      <option value="Perahu Penyebrangan / Rakit / Getek" >Perahu Penyebrangan / Rakit / Getek</option>
                      <option value=">Lainnya" >Lainnya</option>
                    </select> 
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Nomor HP</label>
                          <input class="form-control input-lg" type="text" name="no_hp" placeholder="masukkan nomor HP" required/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Nomor Telepon </label>
                          <input class="form-control input-lg" type="text" name="no_telepon" placeholder="masukkan nomor telepon" />
                      </div>
                    </div>
                  </div>
                   
                   <div class="form-group">
                      <label for="">Email Pribadi</label>
                      <input class="form-control input-lg" type="email" name="email" placeholder="masukkan email" />
                  </div>

                  <div class="form-group">
                      <label for="">SKTM</label>
                      <input class="form-control input-lg" name="sktm" type="text" />
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">KKS</label>
                          <input class="form-control input-lg" name="kks" type="text" />
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="">KPS</label>
                        <input class="form-control input-lg" name="kps" type="text" />
                      </div>
                    </div>
                  </div>

                
                   <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <label for="">KIP</label>
                          <input class="form-control input-lg" name="kip" type="text" />
                      </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                          <label for="">KIS</label>
                          <input class="form-control input-lg" name="kis" type="text" />
                      </div>
                     </div>
                   </div>

                   <div class="form-group">
                       <label for="">Kewarganegaraan</label><br>
                      <select class="form-select"  name="warga"  required>
                        <option value="" selected>Pilih...</option>
                        <option value="warga negara indonesia">warga negara indonesia</option>
                          <option value="warga negara asing">warga negara asing</option>
                        
                      </select>
                    </div><br><br>





  
                
                <h4 class="font-alt mb-0">Data Periodik</h4>
                   <hr class="divider-w mt-10 mb-20">


             <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">Berat badan</label>
                        <input class="form-control input-lg" type="text" name="berat_badan" placeholder="berat badan (kilogram)" required/>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Tinggi badan</label>
                      <input class="form-control input-lg" name="tinggi_badan" type="text" placeholder="tinggi badan (centimeter)" required/>
                    </div>
                  </div>
                </div>

                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Jarak Tempat tinggal</label>
                          <input class="form-control input-lg" type="text" name="jarak_tinggal" placeholder="jarak tempat tinggal (kilometer)" required/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">waktu tempuh</label>
                          <input class="form-control input-lg" type="text" name="waktu_tempuh" placeholder=" waktu tempuh (menit)" />
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                      <label for="">Jumlah saudara</label>
                      <input class="form-control input-lg" name="jumlah_saudara" type="text" required/>
                    </div><br><br>






                  <h4 class="font-alt mb-0">Data Ayah</h4>
                   <hr class="divider-w mt-10 mb-20">
                      
                      <div class="form-group">
                          <label for="">Nama Ayah</label>
                          <input class="form-control input-lg" type="text" name="nama_ayah" placeholder="masukkan nama" required/>
                      </div>

                       <div class="form-group">
                          <label for="">Tanggal Lahir</label>
                           <input class="form-control" type="date" name="tgl_ayah" required>
                      </div>

                       <div class="form-group">
                         <label for="">Pendidikan </label><br>
                          <select class="form-select" id="" name="pendidikan_ayah" required>
                              <option value="" selected>Pilih...</option>
                              <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                 <option value="D3">D3</option>
                                  <option value="D4/S1">D4/S1</option>
                                   <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                     <option value="SD Sederajat">SD Sederajat</option>
                                      <option value="SMP Sederajat">SMP Sederajat</option>
                                       <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="Putus SD">Putus SD</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                          </select>
                      </div>

                       <div class="form-group">
                          <label for="">Pekerjaan Ayah</label>
                          <input class="form-control input-lg" type="text" name="pekerjaan_ayah" placeholder="tulis pekerjaan ayah" required/>
                      </div>

                    <div class="form-group">
                      <label for="">Penghasilan Bulanan</label>
                      <select name="penghasilan_ayah" id="" class="form-select" required>
                        <option  value="" selected>Pilih..</option>
                        <option value="Kurang Dari 500.000">Kurang Dari 500.000</option>
                        <option value="500.000 - 999.000">500.000 - 999.000</option>
                        <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                        <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                        <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                        <option value=">Lebih Dari 20 Juta">>Lebih Dari 20 Juta</option>
                      </select>
                    </div>


                      <div class="form-group">
                        <label for="">Kebutuhan Khusus Ayah</label>
                         <select name="kebutuhan_ayah" class="form-select" required>
                            <option value="Tidak" selected>Tidak ada</option>
                            <option value="Autis">Autis</option>
                            <option value="Bakat Istimewa">Bakat Istimewa</option>
                            <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                            <option value="Down Sindrome">Down Sindrome</option>
                            <option value="Hiper Aktif">Hiper Aktif</option>
                            <option value="Indigo">Indigo</option>
                            <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                            <option value="Narkoba">Narkoba</option>
                            <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                            <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                            <option value="Tuna Ganda">Tuna Ganda</option>
                            <option value="Tuna Grahita Ringan">Tuna Grahita Ringan</option>
                            <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                            <option value="Tuna Laras">Tuna Laras</option>
                            <option value="Tuna Netra"> Tuna Netra</option>
                            <option value="Tuna Rungu">Tuna Rungu</option>
                            <option value="Tuna Wicara">Tuna Wicara</option>
                          </select> 
                      </div><br><br>



 

                  <h4 class="font-alt mb-0">Data Ibu</h4>
                   <hr class="divider-w mt-10 mb-20">
                      
                      <div class="form-group">
                          <label for="">Nama Ibu</label>
                          <input class="form-control input-lg" type="text" name="nama_ibu" placeholder="masukkan nama" required/>
                      </div>

                       <div class="form-group">
                          <label for="">Tanggal Lahir</label>
                           <input class="form-control" type="date" name="tgl_ibu" required>
                      </div>

                       <div class="form-group">
                         <label for="">Pendidikan </label><br>
                          <select class="form-select" id="" name="pendidikan_ibu" required>
                              <option value="" selected>Pilih...</option>
                              <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                 <option value="D3">D3</option>
                                  <option value="D4/S1">D4/S1</option>
                                   <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                     <option value="SD Sederajat">SD Sederajat</option>
                                      <option value="SMP Sederajat">SMP Sederajat</option>
                                       <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="Putus SD">Putus SD</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                          </select>
                      </div>

                        <div class="form-group">
                          <label for="">Pekerjaan ibu</label>
                          <input class="form-control input-lg" type="text" name="pekerjaan_ibu" placeholder="tulis pekerjaan_ibu" required/>
                      </div>

                    <div class="form-group">
                      <label for="">Penghasilan Bulanan</label>
                      <select name="penghasilan_ibu" id="" class="form-select"required >
                        <option  value="" selected>Pilih..</option>
                        <option value="Kurang Dari 500.000">Kurang Dari 500.000</option>
                        <option value="500.000 - 999.000">500.000 - 999.000</option>
                        <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                        <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                        <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                        <option value=">Lebih Dari 20 Juta">>Lebih Dari 20 Juta</option>
                      </select>
                    </div>


                      <div class="form-group">
                        <label for="">Kebutuhan Khusus Ibu</label>
                         <select name="kebutuhan_ibu" class="form-select" required>
                            <option value="Tidak" selected>Tidak ada</option>
                            <option value="Autis">Autis</option>
                            <option value="Bakat Istimewa">Bakat Istimewa</option>
                            <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                            <option value="Down Sindrome">Down Sindrome</option>
                            <option value="Hiper Aktif">Hiper Aktif</option>
                            <option value="Indigo">Indigo</option>
                            <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                            <option value="Narkoba">Narkoba</option>
                            <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                            <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                            <option value="Tuna Ganda">Tuna Ganda</option>
                            <option value="Tuna Grahita Ringan">Tuna Grahita Ringan</option>
                            <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                            <option value="Tuna Laras">Tuna Laras</option>
                            <option value="Tuna Netra"> Tuna Netra</option>
                            <option value="Tuna Rungu">Tuna Rungu</option>
                            <option value="Tuna Wicara">Tuna Wicara</option>
                          </select> 
                      </div><br><br>
                       

 

                  <h4 class="font-alt mb-0">Data Wali</h4>
                   <hr class="divider-w mt-10 mb-20">
                      
                      <div class="form-group">
                          <label for="">Nama Wali</label>
                          <input class="form-control input-lg" type="text" name="nama_wali" placeholder="masukkan nama" required/>
                      </div>

                       <div class="form-group">
                          <label for="">Tanggal Lahir</label>
                           <input class="form-control" type="date" name="tgl_wali" required>
                      </div>

                       <div class="form-group">
                         <label for="">Pendidikan </label><br>
                          <select class="form-select" id="" name="pendidikan_wali" required>
                              <option value="" selected>Pilih...</option>
                              <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                 <option value="D3">D3</option>
                                  <option value="D4/S1">D4/S1</option>
                                   <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                     <option value="SD Sederajat">SD Sederajat</option>
                                      <option value="SMP Sederajat">SMP Sederajat</option>
                                       <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="Putus SD">Putus SD</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                          </select>
                      </div>


                        <div class="form-group">
                          <label for="">Pekerjaan wali</label>
                          <input class="form-control input-lg" type="text" name="pekerjaan_wali" placeholder="tulis pekerjaan_wali" required/>
                      </div>

                    <div class="form-group">
                      <label for="">Penghasilan Bulanan</label>
                      <select name="penghasilan_wali" id="" class="form-select" required>
                        <option  value="" selected>Pilih..</option>
                        <option value="Kurang Dari 500.000">Kurang Dari 500.000</option>
                        <option value="500.000 - 999.000">500.000 - 999.000</option>
                        <option value="1 Juta - 1.999.999">1 Juta - 1.999.999</option>
                        <option value="2 Juta - 4.999.999">2 Juta - 4.999.999</option>
                        <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                        <option value=">Lebih Dari 20 Juta">>Lebih Dari 20 Juta</option>
                      </select>
                    </div>


                      <div class="form-group">
                        <label for="">Kebutuhan Khusus wali</label>
                         <select name="kebutuhan_wali" class="form-select" required>
                            <option value="Tidak" selected>Tidak ada</option>
                            <option value="Autis">Autis</option>
                            <option value="Bakat Istimewa">Bakat Istimewa</option>
                            <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                            <option value="Down Sindrome">Down Sindrome</option>
                            <option value="Hiper Aktif">Hiper Aktif</option>
                            <option value="Indigo">Indigo</option>
                            <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                            <option value="Narkoba">Narkoba</option>
                            <option value="Tuna Daksa Ringan">Tuna Daksa Ringan</option>
                            <option value="Tuna Daksa Sedang">Tuna Daksa Sedang</option>
                            <option value="Tuna Ganda">Tuna Ganda</option>
                            <option value="Tuna Grahita Ringan">Tuna Grahita Ringan</option>
                            <option value="Tuna Grahita Sedang">Tuna Grahita Sedang</option>
                            <option value="Tuna Laras">Tuna Laras</option>
                            <option value="Tuna Netra"> Tuna Netra</option>
                            <option value="Tuna Rungu">Tuna Rungu</option>
                            <option value="Tuna Wicara">Tuna Wicara</option>
                          </select> 
                      </div><br>

                      <div style="text-align: center; font-size: 12px; " >
                         <button class="btn btn-d btn-round" type="submit">KIRIM</button>&nbsp;
                      </div>
  

                </form>
              </div>
            </div>
          </div>
        </section>


<br><br><br><br><br><br><br>


<br><br><br><br><br>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>


  @endsection

