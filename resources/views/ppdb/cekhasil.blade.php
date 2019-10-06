
@extends('layout.master')

 @section('isi')


 <style>
 	.batas{
 		margin-top: 200px;
 		margin-bottom:  450px;
 		text-align: center;

 	}

 	.title{
 		text-align: center;
 		font-weight: bold;
 		font-size: 16px;
 	}

 	.form-control {
      font-family: "Roboto Condensed", sans-serif;
     text-transform: capitalize;
      letter-spacing: 2px;
      font-size: 14px;
      height: 36px;
     border: 1px solid #8B8B8B;
      border-radius: 2px;
      transition: all 0.4s ease-in-out 0s;
      margin-right: 0px;
      padding-left: 10px;
      width: 100%;
      color: #797979;
	  
    }


 </style>


<div class="container">
	

	<div class="batas">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				
				 <form class="form" role="form" action="{{route ('cekhasil')}}" enctype="multipart/form-data" method="post">
           		 {{ csrf_field() }}
				
					 <div class="form-group">
					    <p class="title" >Masukkan Nomor Pendaftaran Untuk Melihat Hasil Seleksi</p><br>
					    <input class="form-control input-lg" type="text" name="no_daftar" placeholder="Tulis Nomor Pendaftaran" required/>
					  </div>

					  
		             <div style="text-align: center; font-size: 12px; " >
		                 <button class="btn btn-d btn-round" type="submit">Lihat Hasil Seleksi</button>
		             </div>

		         </form>
			</div>
			<div class="col-md-3"></div>


				
			
		</div>
		


	</div>


</div>



@endsection