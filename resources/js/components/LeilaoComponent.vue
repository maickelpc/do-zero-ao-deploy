<template>
    <div>
      <div class="card" >
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">

            <h5 class="card-title">Lote N° {{ lotesObj.numero ? lotesObj.numero : 'Pendente' }}: {{lotesObj.titulo}}</h5>
            <p class="card-text">{{lotesObj.descricao}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Valor: {{ lotesObj.lance_inicial }} / Incremento: {{lotesObj.valor_incremento}}</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        </div>
    </div>
</template>
<script>

import { required, minLength, maxLength, requiredIf } from 'vuelidate/lib/validators'
// import {Money} from 'v-money';
// import {VMoney} from 'v-money'

export default {
    props : {
        lote: {
            type: Object,
            default: {}
        }
    },

    data(){
        return {
            lotesObj: {},


            titulo: '',
            descricao: '',
            lance_inicial: 0,
            valor_incremento: 0,
            nota_fiscal: '',
            justificativa_nao_envio_nota_fiscal: '',
            tipo: 'INDETERMINADO',
            tempo: 5,
            localidade: '',


            money:  {
                decimal: ',',
                thousands: '.',
                prefix: 'R$ ',
                suffix: '',
                precision: 2,
                masked: false
            },
            success: null,
            errors: null
        }
    },


    validations: {
        titulo: { required, minLength: minLength(5), maxLength: maxLength(100)},  
        descricao: { required, minLength: minLength(5), maxLength: maxLength(10000)},  
        lance_inicial: { required },  
        valor_incremento: { required },
        nota_fiscal: { required: requiredIf( function(){
            return this.justificativa_nao_envio_nota_fiscal.length == 0;
        } )  },
        justificativa_nao_envio_nota_fiscal: { required: requiredIf ( function(){
            return this.nota_fiscal.length == 0;
        } ) },
        tipo: { required },
        tempo: { required },
        localidade: { required, minLength: minLength(5), maxLength: maxLength(50)},  
    },

    mounted(){
        this.lotesObj = JSON.parse(this.$props.lote);
    },



    methods:{

        submit: function(evento){

            evento.preventDefault();

            this.$v.$touch();
            if(this.$v.$invalid){
                alert("Alguns campos estão inválidos");
                return false;
            };

            let headers = {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                };

            axios.post('/meus-lotes', this.$data, {headers: headers})
                .then(
                    response => {
                        console.log(response.data);
                })
                .catch(
                    erros => {
                        if(erros.response.status == 403){
                            alert("Seu pedido não foi aceito, Verifique se você confirmou seu email!")
                        }
                        console.log(erros, erros.response)
                    }
                )
        }

    },
    computed: {
    }
}
</script>