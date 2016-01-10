@extends('layouts.plantilla_principal')


@section('content')
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">

            <div class="jumbotron bg-success-dark" data-pages="parallax">
                <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                    <div class="inner">
                        <h5 class="text-white"><i class="fa fa-cogs"></i> Seguridades / <span class="semi-bold">Módulos de Sistema: Acciones</span> / Editar</h5>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-fixed-lg">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-edit"></i> Editar Registro: <span class="text-primary"> {!! $registro->denominacion !!}</span></div>
                    </div>

                    <div class="panel-body">
                        <h5>Grupo de Opciones: <strong>{!! $modulo->denominacion !!}</strong></h5>

                        {!! Form::open(array('url' => 'seguridades/modulos_acciones/grabar_actualizar', 'id' => 'frm_data')) !!}

                        {!! Form::hidden('grupo_opciones_id', Crypt::encrypt($modulo->grupo_opciones_id)) !!}
                        {!! Form::hidden('id', Crypt::encrypt($registro->modulo_sistema_accion_id)) !!}
                        {!! Form::hidden('modulo_sistema_id', Crypt::encrypt($registro->modulo_sistema_id)) !!}

                        <div class="form-group form-group-default required ">
                            <label>Denominación</label>
                            {!! Form::text('denominacion', Input::old('denominacion') ? Input::old('denominacion') : $registro->denominacion, array('class' => 'form-control', 'id' => 'denominacion', 'autocomplete' => 'off')) !!}
                        </div>


                        <p class="pull-right">
                            <a href="{{ url('seguridades/modulos_acciones/listar/' . Crypt::encrypt($modulo->modulo_sistema_id) ) }}" class="btn btn-default" >Regresar</a>
                            <button class="btn btn-primary" type="submit" data-loading-text="Grabando..." id="cmd_submit">Actualizar</button>

                        </p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


    </div>

        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@stop



@section('CSS')



@stop

@section('JS')


@stop

@section('JS_SCRIPTS')
    <script>
        $(function()
        {
            $("#subsistema_id").select2();


            $('#frm_data').validate({
                rules: {
                    orden: {
                        required: true,
                        digits: true
                    },
                    identificador_acceso: "required",
                    denominacion: "required",
                    denominacion_visual: "required",
                    controlador: "required",
                    thumbnail: "required"
                },
                submitHandler: function(form) {
                    $("#cmd_submit").attr('disabled', true);
                    form.submit();
                }
            });
        })
    </script>

@stop