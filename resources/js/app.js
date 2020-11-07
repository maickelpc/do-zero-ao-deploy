require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';
import Vuetify from "vuetify";
import Vuelidate from 'vuelidate'

import LoteComponent from './components/LoteComponent.vue'
import MeusLotesComponent from './components/MeusLotesComponent.vue'
import LeilaoComponent from './components/LeilaoComponent.vue'


Vue.use(Vuetify);
Vue.use(Vuelidate);

const app = new Vue({
    components: {
        LoteComponent,
        LeilaoComponent,
        MeusLotesComponent,
        
    },
    el: '#app',

    mounted: function(){
        // alert("OPA App Funcionando");
    }
});

