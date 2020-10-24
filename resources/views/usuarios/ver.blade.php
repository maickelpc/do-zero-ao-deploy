@extends('layout.master')

@section('content')
<!-- slider_area_start -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{route('usuarios')}}" class="btn btn-primary mb-2">Voltar</a>
            <div class="card">
                <div class="card-header">
                  @if($usuario->bloqueado)
                  <span style="font-size: 16px;" class="badge badge-danger">Bloqueado</span>
                @else
                  <span style="font-size: 16px;" class="badge badge-success">Liberado</span>
                @endif 
                Cadastro de Usuário: <strong>{{$usuario->nome}} {{$usuario->sobrenome}}</strong>
                </div>

                <div class="card-body">
                  <form class="form-inline" method="POST" action="{{ route('usuarios.mudaBloqueio', $usuario->id) }}" >    
                      @csrf
                      @method('PUT')
                      @if($usuario->bloqueado)                    
                        <button type="submit" class="btn btn-success mb-2">Desbloquear</button>
                      @else
                        <button type="submit" class="btn btn-danger mb-2">Bloquear</button>
                      @endif
                    </form>
                    <hr>
                    
                    <p id="nome"> 
                      <strong>Nome: </strong> {{$usuario->nome}}
                    </p>
                    <p> 
                      <strong>Sobrenome: </strong> {{$usuario->sobrenome}}
                    </p>
                    <p> 
                      <strong>Email: </strong> {{$usuario->email}}
                    </p>
                    <p> 
                      <strong>Telefone: </strong> {{$usuario->telefone}}
                    </p>
                    <p> 
                      <strong>Data Confirmação Email: </strong> {{$usuario->data_confirmacao->format('d/m/Y H:i:s') }}
                    </p>

                    <p> 
                      <strong>Data de Cadastro: </strong> {{$usuario->created_at->format('d/m/Y H:i:s') }}
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- @section('scripts')

<script>

document.addEventListener("DOMContentLoaded", function(event) { 
  setTimeout(() => {
    document.getElementById('nome').innerHTML = 'OUTRA COISA';  
  }, 2000);
  
});
  

</script>


@endsection --}}