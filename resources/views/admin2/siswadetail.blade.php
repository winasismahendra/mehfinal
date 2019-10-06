
<style>
    
    .invoice-address{
        text-transform: capitalize;

    }

    .borderless th{
         border: none !important;
    }
     .borderless td{
         border: none !important;
    }

   

</style>



@extends('layout/cmaster')
  @section('isi')

                     


                     </div>
                        <div class="card mt-5 ml-5 mr-5 mb-5">
                            <div class="card-body">

                                  
                      @if (session('berhasil'))
                        <div class="alert alert-success">
                            {{ session('berhasil') }}
                        </div>
                      @endif


                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>Detail Peserta</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">

                                      <div class="col-md-3">
                                        <img src="{{ asset('storage/app/'.$calon_siswa->foto_path) }}" alt="" title="">

                                      </div>

                                       
                                        <div class="col-md-9">
                                            <div class="invoice-address">
                                                <h4>{{$calon_siswa->nama}}</h4><br>


                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label for=""> No Pendaftaran</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                       :&emsp;{{$calon_siswa->no_daftar}}
                                                    </div>
                                                  </div>
                                                
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jalur Pendaftaran</label> 
                                                    </div>
                                                    <div class="col-md-8" style="text-transform: capitalize; " >
                                                       :&emsp;{{$jalur->nama_jalur}}
                                                    </div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label>Jurusan Yang Dipilih</label> 
                                                    </div>
                                                    <div class="col-md-8" style="text-transform: capitalize; ">:&emsp;{{$jurusan1->nama_jurusan}}&emsp;(Pilihan 1)
                                                      <br> &emsp; {{$jurusan2->nama_jurusan}}&emsp;(Pilihan 2)
                                                    </div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <label for="">Tanggal Daftar</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      :&emsp;{{ \Carbon\Carbon::parse ($calon_siswa->created_at)->format('d/m/Y')}}
                                                      
                                                    </div>
                                                  </div>


{{-- 
                                                      <h5>No &emsp;:{{$calon_siswa->no_daftar}}</h5>
                                                        <p>Tanggal Daftar :&emsp;{{ \Carbon\Carbon::parse ($calon_siswa->created_at)->format('d/m/Y')}}</p>
 --}}
                                            </div>
                                        </div>


{{-- 
                                        <div class="col-md-3 text-md-left">

                                            
                                                      <h5>No &emsp;:{{$calon_siswa->no_daftar}}</h5>
                                                        <p>Tanggal Daftar &emsp;: {{ \Carbon\Carbon::parse ($calon_siswa->created_at)->format('d/m/Y')}}</p>
                                                
                                        </div> --}}

                                    </div>



                                    <hr class="divider-w mt-10 mb-30">
                                     
                                             
                                                
                            <h5 class="font-alt mb-0">Data Diri</h5>
                            <div class="data-diri">
                                <div class="row">
                                    <div class="col-md-8 offset-2">
                                        


                                    </div>
                                </div>
                                <table class="table borderless">
                                    <thead>
                                        <tr style=" " >
                                        <th style="width: 210px; " ></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                    <tr>
                                        <td>Nama Lengkap</td> <td>:&emsp;{{$calon_siswa->nama}}</td>
                                    </tr>
                                     <tr>
                                        <td>Jenis Kelamin</td> <td>:&emsp;{{$calon_siswa ->jenis_kelamin}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td> <td>:&emsp;{{$calon_siswa ->tempat_lhr}} </td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal lahir</td> <td>:&emsp;{{$calon_siswa ->tanggal_lhr}} </td>
                                    </tr>

                                     <tr>
                                        <td>Hoby</td> <td>:&emsp;{{$calon_siswa ->hobi}} </td>
                                    </tr>
                                     <tr>
                                        <td>Cita- cita</td> <td>:&emsp;{{$calon_siswa ->cita_cita}} </td>
                                    </tr>
                                     <tr>
                                        <td>Nomor Peserta UN</td> <td>:&emsp;{{$calon_siswa ->no_un}} </td>
                                    </tr>
                                     <tr>
                                        <td>NISN</td> <td>:&emsp;{{$calon_siswa ->nisn}} </td>
                                    </tr>
                                     <tr>
                                        <td>NIK</td> <td>:&emsp;{{$calon_siswa ->nik}} </td>
                                    </tr>
                                     <tr>
                                        <td>Apakah Pernah Paud</td> <td>:&emsp;{{$calon_siswa ->ktrgn_paud}} </td>
                                    </tr>
                                     <tr>
                                        <td>Apakah Pernah TK</td> <td>:&emsp;{{$calon_siswa ->ktrgn_tk}} </td>
                                    </tr>
                                     
                                    <tr>
                                        <td>Kebutuhan Khusus</td> <td>:&emsp;{{ $calon_siswa ->kebutuhan}} </td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td> <td>:&emsp;{{$calon_siswa ->agama}} </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor HP</td> <td>:&emsp;{{$calon_siswa ->no_hp}} </td>
                                    </tr>
                                     <tr>
                                        <td>Nomor Telepon</td> <td>:&emsp;{{$calon_siswa ->no_tlp}} </td>
                                    </tr>
                                     <tr>
                                        <td>Email Pribadi</td> <td>:&emsp;{{$calon_siswa ->email}} </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td> <td>:&emsp;{{$calon_siswa ->alamat}} </td>
                                    </tr>
                                    <tr>
                                        <td>RT</td> <td>:&emsp;{{$calon_siswa ->rt}} </td>
                                    </tr>
                                    <tr>
                                        <td>RW</td> <td>:&emsp;{{$calon_siswa ->rw}} </td>
                                    </tr>
                                     <tr>
                                        <td>Dusun</td> <td>:&emsp;{{$calon_siswa ->nama_dusun}} </td>
                                    </tr>
                                     <tr>
                                        <td>Desa</td> <td>:&emsp;{{ $calon_siswa ->nama_desa}} </td>
                                    </tr>
                                     <tr>
                                        <td>Kecamatan</td> <td>:&emsp;{{$calon_siswa ->kecamatan}} </td>
                                    </tr>
                                     <tr>
                                        <td>Kabupaten/Kota</td> <td>:&emsp;{{$calon_siswa ->kota}} </td>
                                    </tr>
                                     <tr>
                                        <td>Kode Pos</td> <td>:&emsp;{{$calon_siswa ->kode_pos}} </td>
                                    </tr>
                                     <tr>
                                        <td>Tempat Tinggal</td> <td>:&emsp;{{$calon_siswa ->tempat_tinggal}} </td>
                                    </tr>
                                     <tr>
                                        <td>Modal Transportasi</td> <td>:&emsp;{{$calon_siswa ->modal_transport}} </td>
                                    </tr>
                                  
                                     <tr>
                                        <td>SKTM</td> <td>:&emsp;{{ $calon_siswa ->no_sktm}} </td>
                                    </tr>
                                     <tr>
                                        <td>KKS</td> <td>:&emsp;{{$calon_siswa ->no_kks}} </td>
                                    </tr>
                                     <tr>
                                        <td>KPS</td> <td>:&emsp;{{$calon_siswa ->no_kps}} </td>
                                    </tr>
                                     <tr>
                                        <td>KIP</td> <td>:&emsp;{{$calon_siswa ->no_kip}} </td>
                                    </tr>
                                     <tr>
                                        <td>KIS</td> <td>:&emsp;{{$calon_siswa ->no_kis}} </td>
                                    </tr>
                                      <tr>
                                        <td>Kewarganegaraan</td> <td>:&emsp;{{$calon_siswa ->kewarganegaraan}} </td>

                                    </tbody>
                                    
                                </table> 
                            </div><br> <hr class="divider-w mt-10 mb-30"><br>



                            <h5 class="font-alt mb-0">Data Periodik</h5>
                            <div class="data-Periodik">
                                <table class="table borderless">
                                    <thead>
                                        <tr style=" " >
                                        <th style="width: 210px; " ></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                    <tr>
                                        <td>Berat badan</td> <td>:&emsp;{{$calon_siswa ->berat_badan}}&ensp;kg</td>
                                    </tr>
                                     <tr>
                                        <td>Tinggi badan</td> <td>:&emsp;{{$calon_siswa ->tinggi_badan}}&ensp;cm</td>
                                    </tr>
                                    <tr>
                                        <td>Jarak Tempat tinggal</td> <td>:&emsp;{{$calon_siswa ->jarak_rmh}}&ensp;km</td>
                                    </tr>
                                     <tr>
                                        <td>waktu tempuh</td> <td>:&emsp;{{ $calon_siswa ->waktu_tempuh}}&ensp;menit</td>
                                    </tr>
                                     <tr>
                                        <td>Jumlah saudara</td> <td>:&emsp;{{$calon_siswa ->jumlah_sdr}}</td>
                                    </tr>
                                    
                                

                                    </tbody>
                                    
                                </table> 


                            </div><br> <hr class="divider-w mt-10 mb-30"><br>


                        


                            <h5 class="font-alt mb-0">Data Ayah</h5>
                            <div class="data-ayah">
                                <table class="table borderless">
                                    <thead>
                                        <tr style=" " >
                                        <th style="width: 210px; " ></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                     <tr>
                                        <td>Nama Ayah</td> <td>:&emsp;{{$calon_siswa ->nama_ayah}} </td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal Lahir</td> <td>:&emsp;{{$calon_siswa ->tgllahir_ayah}} </td>
                                    </tr>
                                     <tr>
                                        <td>Pendidikan</td> <td>:&emsp;{{$calon_siswa ->pendidikan_ayah}} </td>
                                    </tr>
                                     <tr>
                                        <td>Pekerjaan Ayah</td> <td>:&emsp;{{$calon_siswa ->pekerjaan_ayah}}  </td>
                                    </tr>
                                     <tr>
                                        <td>Penghasilan Bulanan</td> <td>:&emsp;{{$calon_siswa ->penghasilan_ayah}} </td>
                                    </tr>
                                     <tr>
                                        <td>Kebutuhan Khusus Ayah</td> <td>:&emsp;{{$calon_siswa ->kebutuhan_ayah}} </td>
                                    </tr>
                                

                                    </tbody>
                                    
                                </table> 


                            </div><br> <hr class="divider-w mt-10 mb-30"><br>


                             <h5 class="font-alt mb-0">Data ibu</h5>
                            <div class="data-ibu">
                                <table class="table borderless">
                                    <thead>
                                        <tr style=" " >
                                        <th style="width: 210px; " ></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                     <tr>
                                        <td>Nama ibu</td> <td>:&emsp;{{$calon_siswa ->nama_ibu}} </td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal Lahir</td> <td>:&emsp;{{$calon_siswa ->tgllahir_ibu}} </td>
                                    </tr>
                                     <tr>
                                        <td>Pendidikan</td> <td>:&emsp;{{$calon_siswa ->pendidikan_ibu}} </td>
                                    </tr>
                                     <tr>
                                        <td>Pekerjaan ibu</td> <td>:&emsp;{{$calon_siswa ->pekerjaan_ibu}} </td>
                                    </tr>
                                     <tr>
                                        <td>Penghasilan Bulanan</td> <td>:&emsp;{{$calon_siswa ->penghasilan_ibu}} </td>
                                    </tr>
                                     <tr>
                                        <td>Kebutuhan Khusus ibu</td> <td>:&emsp;{{$calon_siswa ->kebutuhan_ibu}} </td>
                                    </tr>
                                

                                    </tbody>
                                    
                                </table> 


                            </div><br> <hr class="divider-w mt-10 mb-30"><br>



                            <h5 class="font-alt mb-0">Data Wali</h5>
                            <div class="data-wali">
                                <table class="table borderless">
                                    <thead>
                                        <tr style=" " >
                                        <th style="width: 210px; " ></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                     <tr>
                                        <td>Nama Wali</td> <td>:&emsp;{{$calon_siswa ->nama_wali}} </td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal Lahir</td> <td>:&emsp;{{$calon_siswa ->tgllahir_wali}} </td>
                                    </tr>
                                     <tr>
                                        <td>Pendidikan</td> <td>:&emsp;{{$calon_siswa ->pendidikan_wali}} </td>
                                    </tr>
                                     <tr>
                                        <td>Pekerjaan Wali</td> <td>:&emsp;{{$calon_siswa ->pekerjaan_wali}} </td>
                                    </tr>
                                     <tr>
                                        <td>Penghasilan Bulanan</td> <td>:&emsp;{{$calon_siswa ->penghasilan_wali}} </td>
                                    </tr>
                                     <tr>
                                        <td>Kebutuhan Khusus Wali</td> <td>:&emsp;{{$calon_siswa ->kebutuhan_wali}} </td>
                                    </tr>
                                

                                    </tbody>
                                    
                                </table> 


                            </div><br> <br><br>        
                                </div>



                          {{--   <div class="row">
                              <div class="col-md-4 offset-4 ">
                                <div class="row">
                                  <div class="col-md-6">
                                    
                                      <form class="form-horizontal" action="{{ route('tolaksiswa',$calon_siswa ->id) }}" method="post">
                                          {{ csrf_field()}}      
                                              <input type="hidden" class="form-control" name="status" value="ditolak">

                                              <button type="submit" class="btn btn-dark mb-3" style="width: 110px !important;" onclick=" return confirm(' Anda Yakin Untuk Tidak Menerima Peserta Ini ?') ">Tolak</button>

                                              <input type="hidden" name="_method" value="PUT">
                                      </form>

                                  </div>
                                  <div class="col-md-6">

                                      <form class="form-horizontal" action="{{ route('terimasiswa',$calon_siswa ->id) }}" method="post">
                                          {{ csrf_field()}}      
                                              <input type="hidden" class="form-control" name="status" value="diterima">

                                              <button type="submit" class="btn btn-primary mb-3" style="width: 110px !important;" onclick=" return confirm(' Anda Yakin Untuk Menerima Peserta Ini ?') ">Terima</button>

                                              <input type="hidden" name="_method" value="PUT">
                                     </form>
                                  </div>
                                </div>
                              </div>
                            </div> --}}


                              

                            

                      

<br><br><br><br>


  @endsection