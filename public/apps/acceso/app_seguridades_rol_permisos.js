/**
 * Created by Edisson Mendieta on 07/12/2015.
 */
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');




new Vue ({

    el: '#modulo',


    data: {
        base_url: '',
        rol_id: '',
        permisos: [],
        modulos: [],
    },

    ready: function() {
        this.buscar_permisos();

    },

    methods:{

        buscar_permisos: function() {

            this.$http.get(this.base_url + '/buscar_permisos/' + this.rol_id, function(resultset){
                this.permisos =  resultset;
            });

        },

        generar_dialogo_nuevo_permiso: function () {
            this.$http.get(this.base_url + '/buscar_modulos/' + this.rol_id, function(resultset){
                this.modulos =  resultset;
            });
            $('#modalStickUpSmall').modal('show');
        },

        sv_nuevo_permiso: function (modulo_sistema_id) {

            this.$http.post(this.base_url + '/grabar_nuevo', { rol_id: this.rol_id, modulo_sistema_id: modulo_sistema_id }, function(resultset){
                if(resultset.resultado == "ok")
                {
                    toastr.success(resultset.mensaje, '');
                    this.buscar_permisos();
                    $('#modalStickUpSmall').modal('hide');
                }else
                {
                    toastr.error(resultset.mensaje, '');
                }
            });
        },

        sv_revocar_permiso: function (rol_modulo_id) {

            this.$http.post(this.base_url + '/grabar_eliminar', { rol_modulo_id: rol_modulo_id }, function(resultset){
                if(resultset.resultado == "ok")
                {
                    toastr.success(resultset.mensaje, '');
                    this.buscar_permisos();
                }else
                {
                    toastr.error(resultset.mensaje, '');
                }
            });
        },



    }

});