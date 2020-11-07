@extends('layout.master')

@section('content')
<!-- slider_area_start -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        
        <leilao-component lote="{{ $lote }}"></leilao-component>

        </div>
    </div>
</div>

@endsection
