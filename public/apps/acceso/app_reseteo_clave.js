/**
 * Created by Edisson Mendieta on 07/12/2015.
 */
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');




new Vue ({

    el: '#modulo',


    data: {
        base_url: '',
        username: '',
        correo: ''
    },

    ready: function() {

    },

    methods:{

        pc_reseteo: function() {
            var vm = this;

            if($('#frm_reseteo').valid())
            {
                $('#modalFillIn').modal('show');
                this.$http.post('pc_reseteo', { username: this.username, correo: this.correo }, function(resultset){

                    if(resultset[0] == 1)
                    {
                        swal({   title: "Correcto!",   text: resultset[1],   type: "success",   confirmButtonText: "Aceptar", confirmButtonColor: '#8a7dbe', allowEscapeKey: false, allowOutsideClick: false }, function(){
                            window.location.href = vm.base_url;
                        });
                    }else
                    {
                        swal({   title: "Ha ocurrido un error!",   text: resultset[1],   type: "error",   confirmButtonText: "Aceptar", confirmButtonColor: '#8a7dbe' }, function(){
                            $('#modalFillIn').modal('hide');
                        });
                    }
                });



                //this.$http.get('registro_docente/buscar_asignaciones_estandar/' + this.periodo_id, function(asignaciones){
                //    this.asignaciones =  asignaciones;
                //});
                //this.$http.get('registro_docente/buscar_asignaciones_comportamiento/' + this.periodo_id, function(asignaciones){
                //    this.asignaciones_comp =  asignaciones;
                //});
                //this.$http.get('registro_docente/buscar_asignaciones_proyectos/' + this.periodo_id, function(asignaciones){
                //    this.asignaciones_proy =  asignaciones;
                //});
            }

        },







    }

});