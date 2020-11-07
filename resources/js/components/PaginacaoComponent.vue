<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li v-for="pagina in paginas" :key="pagina" class="page-item">
                <span  class="page-link" @click="clicou(pagina)" 
                    :class="{'active': pagina == paginacao.pagina}"
                >{{pagina}}</span>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    
    props: ['paginacao'],
    
    data(){
        return {
            paginas: []
        }
    
    },

    watch: {
        paginacao(){
            this.gerarPaginas()            
        }  
    },

    methods: {

        gerarPaginas(){
            let totalPaginas = (this.$props.paginacao.total / this.$props.paginacao.itensPorPagina);    
            if( this.$props.paginacao.total % this.$props.paginacao.itensPorPagina  > 0)
                totalPaginas++;

            this.paginas = [];
            for(let i = 1; i <= totalPaginas; i++){
                this.paginas.push(i);
            }                

        },

        clicou: function(pagina){
            this.$emit('alterou', pagina)
        }
    },
    mounted() {
        console.log(this.$props.paginacao)
        this.gerarPaginas();
    },
}
</script>