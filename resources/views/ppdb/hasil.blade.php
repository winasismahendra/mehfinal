
@extends('layout.master')

 @section('isi')


 <style>
 	.batas{
 		margin-top: 200px;
 		margin-bottom:  450px;

 	}

 	.card-header
 	{
 		font-size: 16px;
 	}

 	.card-body
 	{
 		text-transform: capitalize;
 		font-size: 14px;
 	}



 </style>


<div class="container">
	

	<div class="batas">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				
				 <div class="card text-center">
				  <div class="card-header">
				    Hasil Seleksi PPDB 2019
				  </div>
				  <div class="card-body">
				    <h2 class="card-title">{{$status}}</h2>
				    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
					

					@if ($hasil)
						

						  <div class="row text-left ">   
					    	<div class="col-md-6 text-right ">No Pendaftaran</div>
					    	<div class="col-md-6 text-left ">:&emsp;{{$hasil->no_daftar}}</div>
					    </div>

					    <div class="row text-left ">   
					    	<div class="col-md-6 text-right ">Nama</div>
					    	<div class="col-md-6 text-left ">:&emsp;{{$hasil->nama}}</div>
					    </div>

					    <div class="row text-left ">   
					    	<div class="col-md-6 text-right ">Tanggal Lahir</div>
					    	<div class="col-md-6 text-left ">:&emsp;{{$hasil->tanggal_lhr}}</div>
					    </div>

					    
						@if ($hasil->status=="diterima")
							 <div class="row text-left ">   
					    		<div class="col-md-6 text-right ">Jurusan Diterima</div>
					    		<div class="col-md-6 text-left ">:&emsp;{{$hasil->jurusan_diterima}}</div>
					    	</div>
						@endif

				   
					@endif
					  

				    @if (empty ($hasil) )
				    	<br> <a href="{{route ('hasil')}}" class="btn btn-d btn-round">Kembali</a>
				    @endif
				   
				  </div>
				  <br><br>
				  <div class="card-footer text-muted">
				    {{$pesan}}
				  </div>
				</div>
			</div>
			<div class="col-md-3"></div>


				
			
		</div>
		


	</div>


</div>



@endsection