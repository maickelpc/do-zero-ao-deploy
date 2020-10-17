@extends('layout.master')

@section('content')
<!-- slider_area_start -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    <form class="form-inline">                        
                        <div class="form-group mx-sm-6 mb-2">
                          <label for="busca" class="sr-only">Busca</label>
                        <input type="text" class="form-control" value="{{ Request::get('busca') }}" name="busca" id="busca" placeholder="Digite nome ou email">
                        </div>
                        <div class="form-group mx-sm-6 mb-2">
                            <label for="busca" class="sr-only">Busca</label>
                            <select name="bloqueado" id="">
                                <option {{ Request::get('bloqueado') == 'TODOS' ? 'selected' : '' }} value="TODOS">Todos</option>
                                <option {{ Request::get('bloqueado') == 'BLOQUEADOS' ? 'selected' : '' }} value="BLOQUEADOS">Somente Bloqueados</option>
                                <option {{ Request::get('bloqueado') == 'DESBLOQUEADOS' ? 'selected' : '' }} value="DESBLOQUEADOS">Desbloqueados</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
                      </form>
                    <hr>
                    <table class="table">
                        <thead class="thead-dark table-hover">
                          <tr>
                            
                            <th scope="col">Primeiro</th>
                            <th scope="col">Último</th>
                            <th scope="col">Email</th>
                            <th scope="col">Bloqueado</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario) 
                          <tr>
                            
                            <td>{{ $usuario->nome }}</td>
                            <td>{{ $usuario->sobrenome }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td> {{ $usuario->bloqueado ? 'Sim' : 'Não'}}</td>
                            <td> 
                            <a href="{{route('usuarios.ver', $usuario->id)}}"> <i class="fa fa-eye"></i> Ver</a>
                             </td>
                          </tr>
                        @endforeach
                         
                        </tbody>
                      </table>
                      <hr>

                      {{ $usuarios->links() }}

                      <hr>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection