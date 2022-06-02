/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 const { xor } = require('lodash');

 require('./bootstrap');
 
 window.Vue = require('vue');
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 Vue.component('mostrar-btn', {
     props: ['id_muestra'],
     data: function () {
 
         return {
            respuesta_consulta: 0
 
         }
 
     },
     template: `
     <div>
 
         <a v-if="respuesta_consulta == 0"
         class="btn btn-secondary" 
         :href="'http://127.0.0.1:8000/registro_resultado_muestra/'+id_muestra">
         <i class="bi bi-clipboard-plus"></i>
         </a>
 
     </div>
     `,
     methods: {
         consultarResultado_c: function (id_muestra) {
 
             axios.get('http://127.0.0.1:8000/consultarResultado/' + id_muestra).then((respuesta) => {
 
                 console.log("respuesta.data: " + respuesta.data)
 
                 this.respuesta_consulta = respuesta.data
 
             });
 
         }
 
     },
     mounted() {
 
         this.consultarResultado_c(this.id_muestra)
 
     }
 })
 
 const app = new Vue({
     el: '#app',
     data: {
 
         id_departamento: 0,
 
         departamentos: [],
 
         municipios: [],
 
         contador: 0,
 
         departamento: '',
         textoMuestra: '',
 
         tomaMuestra: [],
 
         respuesta_consulta: 0,
 
         index: '',
 
         id_unidad: 0,
 
         contador: 0,
 
         unidad: [],
 
         textoUsuario: '',
 
         textoEncargado: '',
 
         encargado_muestra: [],
 
         usuario_cliente: [],
 
         textoParametro: '',
 
         parametro: [],
 
         textoAnalisis: '',
 
         analisis: [],
 
         textoUsers: '',
 
         users: [],
 
         textoResultado: '',
 
         resultado: []
     },
     methods: {
 
         counsultarDepartamentos: function () {
             axios.get('http://127.0.0.1:8000/departamento/').then((respuesta) => {
 
                 this.departamentos = respuesta.data;
 
             });
         },


         consultarMunicipiosDepartamento: function () {
             axios.get('http://127.0.0.1:8000/municipios/' + this.id_departamento).then((respuesta) => {
 
                 this.municipios = respuesta.data;
 
             });
             this.contador = this.contador + 1;
 
         },
         consultarMunicipios: function () {
             axios.get('http://127.0.0.1:8000/Vista_Municipios/').then((respuesta) => {
                 this.municipios = respuesta.data;
             });
         },
 
         eliminarMuestra: function (id_muestra) {
             var eliminar = confirm("Hey we enserio quieres eliminarme ;(");
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/tomaMuestras/' + id_muestra).then((respuesta) => {
                     console.log(respuesta);
                     console.log('respuesta');
                     window.location.href = "/tomaMuestras";
                 });
             }
         },
 
         buscarMuestra: function () {
             if (this.textoMuestra.length > 0) {
                 axios.get('/buscarMuestra/' + this.textoMuestra).then((respuesta) => {
                     this.tomaMuestra = respuesta.data;
                 });
             } else {
                 axios.get('/buscarMuestra/-').then((respuesta) => {
                     this.tomaMuestra = respuesta.data;
                 });
             }
         },
 
         arregloNombreUnidad: function () {
 
             axios.get('http://127.0.0.1:8000/unidad/').then((respuesta) => {
 
                 this.unidad = respuesta.data;
             });
             this.contador = this.contador + 1;
         },
 
         eliminarEncargado: function (id_encargado) {
             var eliminar = confirm("Desea Eliminar Este Registro?");
 
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/encargado_muestra/' + id_encargado).then((respuesta) => {
                     console.log(respuesta);
                     window.location.href = "http://127.0.0.1:8000/encargado_muestra/";
                 });
             }
         },
 
         eliminarUsuario: function (idCliente) {
             var eliminar = confirm("Desea Eliminar Este Registro?");
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/usuario_cliente/' + idCliente).then((respuesta) => {
                     console.log(respuesta);
                     window.location.href = "http://127.0.0.1:8000/usuario_cliente/";
                 });
             }
         },
 
         eliminarParametro: function (id_parametro) {
             var eliminar = confirm("Desea Eliminar Este Registro?");
 
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/parametro/' + id_parametro).then((respuesta) => {
                     console.log(respuesta);
                     window.location.href = "http://127.0.0.1:8000/parametro/";
                 });
             }
         },
 
         eliminarAnalisis: function (id_analisis) {
             var eliminar = confirm("Desea Eliminar Este Registro?");
 
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/analisis/' + id_analisis).then((respuesta) => {
                     console.log(respuesta);
                     window.location.href = "http://127.0.0.1:8000/analisis/";
                 });
             }
         },
 
         eliminarUsers: function (id) {
             var eliminar = confirm("Desea Eliminar Este Registro?");
 
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/users/' + id).then((respuesta) => {
                     console.log(respuesta);
                     window.location.href = "http://127.0.0.1:8000/users/";
                 });
             }
         },
 
         eliminarResultado: function (id_resultado) {
             var eliminar = confirm("Desea Eliminar Este Registro?");
 
             if (eliminar == true) {
                 axios.delete('http://127.0.0.1:8000/resultado/' + id_resultado).then((respuesta) => {
                     console.log(respuesta);
                     window.location.href = "http://127.0.0.1:8000/resultado/";
                 });
             }
         },
 
         buscarResultado: function () {
 
             if (this.textoResultado.length > 0) {
 
                 axios.get('http://127.0.0.1:8000/resultadoBuscar/' + this.textoResultado).then((respuesta) => {
                     this.resultado = respuesta.data
                     console.log(this.resultado)
 
                 });
             } else {
 
                 axios.get('http://127.0.0.1:8000/resultadoBuscar/-').then((respuesta) => {
                     this.resultado = respuesta.data;
 
                 })
             }
         },
 
         buscarUsers: function () {
 
             if (this.textoUsers.length > 0) {
 
                 axios.get('http://127.0.0.1:8000/usersBuscar/' + this.textoUsers).then((respuesta) => {
                     this.users = respuesta.data
                     console.log(this.users)
 
 
                 });
             } else {
 
                 axios.get('http://127.0.0.1:8000/usersBuscar/-').then((respuesta) => {
                     this.users = respuesta.data;
 
                 })
             }
         },
 
         buscarAnalisis: function () {
 
             if (this.textoAnalisis.length > 0) {
 
                 axios.get('http://127.0.0.1:8000/analisisBuscar/' + this.textoAnalisis).then((respuesta) => {
                     this.analisis = respuesta.data
                     console.log(this.analisis)
 
 
                 });
             } else {
 
                 axios.get('http://127.0.0.1:8000/analisisBuscar/-').then((respuesta) => {
                     this.analisis = respuesta.data;
 
                 })
             }
         },
 
         buscarParametro: function () {
 
             if (this.textoParametro.length > 0) {
 
                 axios.get('http://127.0.0.1:8000/parametroBuscar/' + this.textoParametro).then((respuesta) => {
                     this.parametro = respuesta.data
                     console.log(this.parametro)
 
 
                 });
             } else {
 
                 axios.get('http://127.0.0.1:8000/parametroBuscar/-').then((respuesta) => {
                     this.parametro = respuesta.data;
 
                 })
             }
         },
 
 
         buscarEncargado: function () {
 
             if (this.textoEncargado.length > 0) {
 
                 axios.get('http://127.0.0.1:8000/encargado_muestraBuscar/' + this.textoEncargado).then((respuesta) => {
                     this.encargado_muestra = respuesta.data
                     console.log(this.encargado_muestra)
 
 
                 });
             } else {
 
                 axios.get('http://127.0.0.1:8000/encargado_muestraBuscar/-').then((respuesta) => {
                     this.encargado_muestra = respuesta.data;
 
                 })
             }
         },
 
         buscarUsuario: function () {
 
             if (this.textoUsuario.length > 0) {
 
                 axios.get('http://127.0.0.1:8000/usuario_clienteBuscar/' + this.textoUsuario).then((respuesta) => {
                     this.usuario_cliente = respuesta.data
                     console.log(this.usuario_cliente)
 
 
                 });
             } else {
 
                 axios.get('http://127.0.0.1:8000/usuario_clienteBuscar/-').then((respuesta) => {
                     this.usuario_cliente = respuesta.data;
 
                 })
             }
         },
 
 
 
     },
     mounted() {
         this.arregloNombreUnidad()
         this.buscarParametro()
         this.buscarEncargado()
         this.buscarUsuario()
         this.buscarAnalisis()
         this.buscarUsers()
         this.buscarResultado()
         this.counsultarDepartamentos()
         this.consultarMunicipios()
         this.buscarMuestra()
     }
 
 });
 