import Vue from 'vue';
import Edit from './components/edit';
import viewalumnos from './components/viewAlumnos.vue';
import update from './components/update.vue';

new Vue({
    el: '#app',
    components: { Edit,viewalumnos,update }
});