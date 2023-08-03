require('./bootstrap');
require('alpinejs');

import Vue from 'vue'; // Importa Vue
import Vuetify from 'vuetify'; // Importa Vuetify
import 'vuetify/dist/vuetify.min.css'; // Importa los estilos de Vuetify
import { InertiaApp } from '@inertiajs/inertia-vue';

Vue.use(Vuetify); // Usa Vuetify en Vue

const app = document.getElementById('app');

new Vue({
    vuetify: new Vuetify(), // Instancia Vuetify
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);