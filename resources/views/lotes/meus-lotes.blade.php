@extends('layout.master')

@section('content')
<!-- slider_area_start -->

<div class="container" id="app-vue">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">

                    [[  message ]]
                    <input type="text" v-model="message" class="form-control"  name="busca" id="busca" placeholder="Digite nome ou email">

                    {{-- <form class="form-inline">                        
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
                      </form> --}}
                    <hr>
                    <table class="table">
                        <thead class="thead-dark table-hover">
                          <tr>
                            
                            <th scope="col">Lote</th>
                            <th scope="col">Data Criação</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>                            
                            <td>Lote </td>
                            <td>Data Criação</td>
                            <td>Status</td>
                            <td> Ação </td>                            
                          </tr>
               
                         
                        </tbody>
                      </table>
                      <hr>

                      

                      <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>

var app = new Vue({
  el: '#app-vue',

  data: {
    message: 'Hello Vue!'
  },





  delimiters: [ '[[', ']]' ]
})

</script>


@endsection