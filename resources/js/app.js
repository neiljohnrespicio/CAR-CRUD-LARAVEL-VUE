import './bootstrap';
window.Vue = require('vue').default;

import { createApp } from 'vue';

import App from './carscomponents/Main.vue';

createApp(App)
.mount('#app');
