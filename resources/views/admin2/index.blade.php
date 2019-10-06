
@extends('layout/cmaster')
        
        @section('isi')
        				
                        <div class="alert alert-success" role="alert">
                            <h3>Selamat Datang! {{Auth::user()->name}}</h3>
                        </div>
        				
                   
    @endsection