import Vue from 'vue'

import { VuePlugin } from 'vuera'
Vue.use(VuePlugin)

Vue.component('braft-editor', require('./components/BraftEditor.vue').default);

new Vue({
    el: '#app',
});
