@extends('layouts.plantilla_principal')


@section('content')
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">

            <div class="jumbotron bg-success-dark" data-pages="parallax">
                <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                    <div class="inner">
                        <h5 class="text-white"><i class="fa fa-cogs"></i> Seguridades / <span class="semi-bold">Módulos de Sistema: Acciones</span> / Eliminar</h5>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-fixed-lg">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title text-danger"><i class="fa fa-trash-o"></i> Eliminar Registro</div>
                            </div>

                            <div class="panel-body">

                                {!! Form::open(array('url' => 'seguridades/modulos_acciones/grabar_eliminar', 'id' => 'frm_data')) !!}

                                {!! Form::hidden('id', Crypt::encrypt($registro->modulo_sistema_accion_id)) !!}
                                {!! Form::hidden('modulo_sistema_id', Crypt::encrypt($registro->modulo_sistema_id)) !!}

                                <h4>Desea eliminar el registro: <strong>{!! $registro->denominacion !!}</strong>?</h4>
                                <p class="pull-right">
                                    <a href="{{ url('seguridades/modulos_acciones/listar/' . Crypt::encrypt($registro->modulo_sistema_id)) }}" class="btn btn-default" >Cancelar</a>
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
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
                    denominacion: "required",
                    denominacion_visual: "required",
                    thumbnail: "required"
                }
            });
        })
    </script>

@stop