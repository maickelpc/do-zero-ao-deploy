@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    
                    @if($confirmado)
                    <div class="alert alert-success" role="alert">
                        <p>Parabéns {{$usuario->nome}}, seu email foi confirmado!!!!</p>
                      </div>
                    @else
                    <div class="alert alert-danger" role="alert">
                        <p>{{$usuario->nome}}, os dados não conferem, envie o email de confirmação novamente, ou verifique se digitou o código corretamente!!!</p>
                      </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
