
<style>
	
.table
{
	font-size: 12px;
}

</style>

@extends('layout/cmaster')
  @section('isi')


  <!-- Striped table start -->
                   
                                <h4 class="header-title mt-3">List Calon Siswa - {{$jurusan}}</h4><br>
                               
                               
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">nama</th>
                                                    <th scope="col">tanggal lahir</th>
                                                    <th scope="col">jalur pendaftaran</th>
                                                {{--     <th scope="col">jurusan</th> --}}
                                                   {{--  <th scope="col">jurusan 2</th> --}}
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	@forelse ($calon_siswa as $cs)
                                                @php
                                                    $id=$cs->id;
                                                @endphp
                                            		<tr>
                                                    <th scope="row">{{$cs->id}}</th>
                                                    <th scope="row">{{$cs->nama}}</th>
                                                    <th scope="row">{{$cs->tanggal_lhr}}</th>
                                                    <th scope="row">{{$cs->nama_jalur}}</th>
                                                  {{--   <th scope="row">{{$cs->jurusan1}} <br>{{$cs->jurusan2}}</th> --}}
                                                    {{-- <th scope="row">1</th> --}}
                                                    <td scope="row">  <a href=" {{route('detailcalonsiswa',$id)}} "><i class="ti-eye"></i></a>   &nbsp; </td>
                                                </tr>
                                                @empty
                                                Belum Ada Peserta Terdaftar
                                            	@endforelse
                                                
                                              
                                            </tbody>
                                        </table>
                                    </div>
                               
                         
                    <!-- Striped table end -->















  @endsection