<template>
    <div>
        <div class="card">
                <div class="card-header">Cadastro de Novo Lote</div>

                <div class="card-body">
                    <form method="POST" @submit="submit($event)">
                        
                        <div class="form-group row">
                            <label for="Titulo" class="col-md-4 col-form-label text-md-right">Titulo:</label>
                            <div class="col-md-8">
                                <input @input="$v.titulo.$touch"
                                 type="text" class="form-control" :class="{'is-invalid': $v.titulo.$invalid && $v.titulo.$dirty}"  v-model="titulo"
                                  autocomplete="Titulo" autofocus>
                                
                                    <span v-if="$v.titulo.$invalid && $v.titulo.$dirty" class="invalid-feedback" role="alert">
                                        
                                        <ul>
                                            <li v-if="!$v.titulo.required">Campo Obrigatório</li>
                                            <li v-if="!$v.titulo.minLength">Mínimo 5 Caracteres ({{titulo.length}} caracteres)</li>
                                            <li v-if="!$v.titulo.maxLength">Máximo 100 Caracteres ({{titulo.length}} caracteres)</li>
                                        </ul>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Descricao" class="col-md-4 col-form-label text-md-right">Decrição:</label>
                            <div class="col-md-8">
                                <textarea name="descricao" id="Descricao" class="form-control"  @input="$v.descricao.$touch"
                                :class="{'is-invalid': $v.descricao.$invalid && $v.descricao.$dirty}"  v-model="descricao" rows="10"></textarea>
                                    <span v-if="$v.descricao.$invalid && $v.descricao.$dirty" class="invalid-feedback" role="alert">
                                        
                                        <ul>
                                            <li v-if="!$v.descricao.required">Campo Obrigatório</li>
                                            <li v-if="!$v.descricao.minLength">Mínimo 5 Caracteres ({{descricao.length}} caracteres)</li>
                                            <li v-if="!$v.descricao.maxLength">Máximo 100 Caracteres ({{descricao.length}} caracteres)</li>
                                        </ul>
                                    </span>
                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="lance_inicial" class="col-md-4 col-form-label text-md-right">Lance Inicial:</label>
                            <div class="col-md-8">
                                 <input type="text" id="lance_inicial" class="form-control"  @input="$v.lance_inicial.$touch"
                                    :class="{'is-invalid': $v.lance_inicial.$invalid && $v.lance_inicial.$dirty}"
                                    v-model.lazy="lance_inicial" v-money="money" />
                                <span v-if="$v.lance_inicial.$invalid && $v.lance_inicial.$dirty" class="invalid-feedback" role="alert">    
                                    <ul>
                                        <li v-if="!$v.lance_inicial.required">Campo Obrigatório</li>
                                    </ul>
                                </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor_incremento" class="col-md-4 col-form-label text-md-right">Valor Mínimo de Incremento:</label>
                            <div class="col-md-8">
                                 <input type="text" id="valor_incremento" class="form-control"  @input="$v.valor_incremento.$touch"
                                    :class="{'is-invalid': $v.valor_incremento.$invalid && $v.valor_incremento.$dirty}"
                                    v-model.lazy="valor_incremento" v-money="money" />
                                <span v-if="$v.valor_incremento.$invalid && $v.valor_incremento.$dirty" class="invalid-feedback" role="alert">    
                                    <ul>
                                        <li v-if="!$v.valor_incremento.required">Campo Obrigatório</li>
                                    </ul>
                                </span>
                                
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="Nota Fiscal" class="col-md-4 col-form-label text-md-right">Nota Fiscal:</label>
                            <div class="col-md-8">
                                <input @input="$v.nota_fiscal.$touch"
                                 type="text" class="form-control" :class="{'is-invalid': $v.nota_fiscal.$invalid && $v.nota_fiscal.$dirty}"  v-model="nota_fiscal">
                                
                                <span v-if="$v.nota_fiscal.$invalid && $v.nota_fiscal.$dirty" class="invalid-feedback" role="alert">
                                    
                                    <ul>
                                        <li v-if="!$v.nota_fiscal.required">Campo Obrigatório</li>
                                    </ul>
                                </span>
                                
                            </div>
                        </div>

                        <div class="row">
                            <label for="Justificativa para não informação de nota fiscal" class="col-md-4 col-form-label text-md-right">Justificativa para não informação de nota fiscal:</label>
                            <div class="col-md-8">
                                <input @input="$v.justificativa_nao_envio_nota_fiscal.$touch"
                                 type="text" class="form-control" :class="{'is-invalid': $v.justificativa_nao_envio_nota_fiscal.$invalid && $v.justificativa_nao_envio_nota_fiscal.$dirty}"  v-model="justificativa_nao_envio_nota_fiscal">
                                
                                <span v-if="$v.justificativa_nao_envio_nota_fiscal.$invalid && $v.justificativa_nao_envio_nota_fiscal.$dirty" class="invalid-feedback" role="alert">
                                    
                                    <ul>
                                        <li v-if="!$v.justificativa_nao_envio_nota_fiscal.required">Campo Obrigatório</li>
                                    </ul>
                                </span>                                
                            </div>
                        </div>

                        <div class="row">
                            <label for="Tipo" class="col-md-4 col-form-label text-md-right">Tipo de Leilão / Tempo do Leilão:</label>
                            <div class="col-md-4">

                                <select class="form-control" :class="{'is-invalid': $v.tipo.$invalid && $v.tipo.$dirty}"  v-model="tipo"
                                @change="$v.tipo.$touch">
                                    <option :value="'DETERMINADO'" >Tempo determinado</option>
                                    <option :value="'INDETERMINADO'">Minutos após último lance</option>
                                </select>

                                
                                <span v-if="$v.tipo.$invalid && $v.tipo.$dirty" class="invalid-feedback" role="alert">
                                    
                                    <ul>
                                        <li v-if="!$v.tipo.required">Campo Obrigatório</li>
                                    </ul>
                                </span>                                
                            </div>

                            <div class="col-md-4">

                                <input type="number" class="form-control" :class="{'is-invalid': $v.tempo.$invalid && $v.tempo.$dirty}"  v-model="tempo"
                                @change="$v.tempo.$touch" />                                    
                                
                                <span v-if="$v.tempo.$invalid && $v.tempo.$dirty" class="invalid-feedback" role="alert">
                                    <ul>
                                        <li v-if="!$v.tempo.required">Campo Obrigatório</li>
                                    </ul>
                                </span>                                
                            </div>
                        </div>
                        <div class="row">
                            <label for="Tipo" class="col-md-4 col-form-label text-md-right">Localidade do Produto:</label>

                            <div class="col-md-8">
                                <input @input="$v.localidade.$touch"
                                 type="text" class="form-control" :class="{'is-invalid': $v.localidade.$invalid && $v.localidade.$dirty}"  v-model="localidade"
                                  autocomplete="localidade" autofocus>
                                
                                    <span v-if="$v.localidade.$invalid && $v.localidade.$dirty" class="invalid-feedback" role="alert">
                                        
                                        <ul>
                                            <li v-if="!$v.localidade.required">Campo Obrigatório</li>
                                            <li v-if="!$v.localidade.minLength">Mínimo 5 Caracteres ({{localidade.length}} caracteres)</li>
                                            <li v-if="!$v.localidade.maxLength">Máximo 50 Caracteres ({{localidade.length}} caracteres)</li>
                                        </ul>
                                    </span>
                                
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Criar Lote
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</template>
<script>

import { required, minLength, maxLength, requiredIf } from 'vuelidate/lib/validators'
// import {Money} from 'v-money';
import {VMoney} from 'v-money'

export default {
    directives: {
        VMoney
    },

    data(){
        return {
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