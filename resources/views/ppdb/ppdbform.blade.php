
@extends('layout.master')

 @section('isi')



  <style>

    .module
    {
      font-size: 12px;
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
      border: 1px solid #CBCBCB;
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
      font-size: 22px;
    }

    .font-span{
      font-size: 14px;
      text-transform: capitalize;
      font-weight: normal;
      letter-spacing: 1px;
    }

  </style>


       <section class="module">
          <div class="container">
          	<div class="row">
              <div class="col-sm-6 col-sm-offset-3">
            <p class="font-pendaftaran" >FORM PPDB 2019 <br> <span class="font-span" >isi form berikut untuk melanjutkan ke formulir pendaftaran</span> </p>




                      @if (session('gagal'))
                        <div class="alert alert-danger">
                            {{ session('gagal') }}
                        </div>
                      @endif

            {{--  <div class="alert alert-warning" role="alert">
                                            <strong>Warning!</strong> Better check yourself, you're not looking too good.
                                        </div>
 --}}

 
           <hr class="divider-w mt-10 mb-20">
           <form class="form" role="form" action="{{route('addform')}}" enctype="multipart/form-data" method="post">
           	 {{ csrf_field() }}


		     		 {{--   <div class="form-group" >
		               <label for="">Jenis pendaftaran</label><br>
		              <select class="form-select input-lg" id="" name="jenis_pendaftaran" required>
		                <option value="" selected>Pilih...</option>
		                <option value="1">opsi 1</option>
		                <option value="2">opsi 2</option>
		              </select>
		            </div> --}}

		            <div class="form-group">
		               <label for="">Jalur pendaftaran</label><br>
		              <select class="form-select input-lg" id="" name="jalur_pendaftaran" required>
		                <option value="" selected>Pilih...</option>
		                 @foreach($jalur as $ja)
                    <option value="{{$ja->id}}">{{$ja->nama_jalur}}</option>
                    @endforeach
		              </select>
		            </div>

		             <div class="form-group">
		               <label for="">Jurusan Pilihan Pertama</label><br>
		              <select class="form-select input-lg" id="" name="jurusan1" required>
		                <option value="" selected>Pilih...</option>

		                @foreach($jurusan as $j)
		                <option value="{{$j->id}}">{{$j->nama_jurusan}}</option>
                    
		                @endforeach

		              </select>
		            </div>

		             <div class="form-group">
                   <label for="">Jurusan Pilihan Kedua</label><br>
                  <select class="form-select input-lg" id="" name="jurusan2" required>
                    <option value="" selected>Pilih...</option>

                    @foreach($jurusan as $j)
                    <option value="{{$j->id}}">{{$j->nama_jurusan}}</option>
                   
                    @endforeach

                   
                  </select>
                </div>


            {{--      <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="">NISN</label>
                        <input class="form-control input-lg" type="text" name="nisn" placeholder="masukkan NISN" required/>
                      </div>
                  </div> --}}

                <br><br>
		             <div style="text-align: center; font-size: 12px; " >
		                 <button class="btn btn-d btn-round" type="submit">lanjutkan ke formulir</button>
		              </div>
				</form>
			        </div>
			    </div>
			</div>
    </section>

<br><br><br><br><br><br><br><br><br><br>











@endsection