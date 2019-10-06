@extends('layout.master')

@section('isi')
        <section class="module bg-dark-30 about-page-header" data-background="assets/images/about_bg.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Visi Misi</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h4><p>@php echo $visimisi->isi @endphp</p></h4>
              </div>
            </div>
          </div>
        </section>
@endsection        