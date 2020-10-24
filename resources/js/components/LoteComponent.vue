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

import { required, minLength, maxLength } from 'vuelidate/lib/validators'

export default {

    data(){
        return {
            titulo: '',
        }
    },

    validations: {
        titulo: { required, minLength: minLength(5), maxLength: maxLength(100)},  
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
            }


            alert('Pagina Submetida');
        }

    }
}
</script>