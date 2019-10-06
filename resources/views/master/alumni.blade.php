@extends('layout/master')

@section('isi')
	<section class="module" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Pendaftaran Alumni</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <form  action="{{ route('up_alumni') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label class="sr-only" for="name">Nama</label>
                    <input class="form-control" type="text" id="name" name="nama" placeholder="Masukkan Nama*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Tahun Lulus</label>
                    <input class="form-control" type="text" id="email" name="tahun" placeholder="Tahun Kelulusan* ex(2017)" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="pesan" placeholder="Pesan*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                  	<label>Foto</label>
                    <input type="file" name="file">
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d"  type="submit">Submit</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>

	<section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Alumni SMK Ulul Albab</h2>
                <div class="module-subtitle font-serif">The languages only differ in their grammar, their pronunciation and their most common words.</div>
              </div>
            </div>
            <div class="row">
              <div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">
                  @foreach($alumni as $alumni)
                <div class="owl-item">
                  <div class="col-sm-12">
                    <div class="ex-product"><img src="{{ url('gambar/alumni/'.$alumni->file) }}" width="203.99px" alt="{{$alumni->file}}"/>
                      <h3 class="shop-item-title font-alt">{{$alumni->nama}}</h3>
                      <h5>{{$alumni->tahun}}</h5>
                      {{$alumni->pesan}}
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </section>

@endsection