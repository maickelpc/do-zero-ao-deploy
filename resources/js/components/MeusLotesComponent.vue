<template>
    <div class="card">
                <div class="card-header">Meus Lotes</div>

                <div class="card-body">
                <a href="/meus-lotes/novo" class="btn btn-primary mb-2">Novo</a>
                    <form class="form-inline" @submit="buscar($event)">
                        <div class="form-group mx-sm-6 mb-2">
                          <label for="busca" class="sr-only">Busca</label>
                        <input type="text" @input="buscar()" v-model="filtro.texto" class="form-control" name="busca" id="busca" placeholder="Texto para busca">
                        </div>
                        <!-- <div class="form-group mx-sm-6 mb-2">
                            <label for="busca" class="sr-only">Busca</label>
                            <select name="bloqueado" id="">
                                <option {{ Request::get('bloqueado') == 'TODOS' ? 'selected' : '' }} value="TODOS">Todos</option>
                                <option {{ Request::get('bloqueado') == 'BLOQUEADOS' ? 'selected' : '' }} value="BLOQUEADOS">Somente Bloqueados</option>
                                <option {{ Request::get('bloqueado') == 'DESBLOQUEADOS' ? 'selected' : '' }} value="DESBLOQUEADOS">Desbloqueados</option>
                            </select>
                          </div> -->
                        <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
                      </form>
                    <hr>
                    <table class="table">
                        <thead class="thead-dark table-hover">
                          <tr>                            
                            <th scope="col">Lote</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Data Criação</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="lote in dados" :key="lote.id">
                            <td>{{ lote.numero ? lote.numero : 'Pendente' }}</td>
                            <td>{{ lote.titulo }}</td>
                            <td>{{ lote.created_at }}</td>
                            <td>{{ lote.status }}</td>
                            <td> 
                                <a :href="`/lote/${lote.id}`">Acessar</a>
                             </td>                            
                          </tr>
               
                         
                        </tbody>
                      </table>
                      <hr>
                      <paginacao-component :paginacao="paginacao" @alterou="buscarPagina($event)"></paginacao-component>
                      

                      <hr>
                </div>
            </div>
    
</template>
<script>

import PaginacaoComponent from './PaginacaoComponent'
// import {VMoney} from 'v-money'

export default {
    components:{
        PaginacaoComponent
    },
    data() {
        return {
            filtro: {
                texto: '',
                page: 1
            },

            dados: [],

            paginacao: {
                pagina: 1,
                total: 0,
                itensPorPagina: 10
            }
        }
    },

    methods: {

        buscarPagina(pagina){
            this.filtro.page = pagina;
            this.buscar();
        },
        
        buscar(event){
            if(event)
                event.preventDefault();

            let queryString = ''

            Object.keys( this.filtro ).forEach( (key) => {
                if( this.filtro[key] !== null && this.filtro[key] !== undefined && this.filtro[key] !== '' ){
                    if(queryString.length > 0)
                        queryString += '&';
                    
                    queryString += key + '=' +  this.filtro[key];
                }
            })
            
            axios.get('/api2/meus-lotes?' + queryString)
                .then( 
                    response => {
                        this.dados = response.data.data

                        let paginacao = {
                            pagina : response.data.current_page,
                            itensPorPagina : response.data.per_page,
                            total : response.data.total
                        }

                        this.paginacao = paginacao

                        console.log(this.paginacao);
                    }
                );

        }

    },
    mounted(){
        this.buscar();
    }
}

</script>