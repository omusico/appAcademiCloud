@extends('layouts.plantilla_principal')


@section('content')
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">

            <div class="jumbotron bg-success-dark" data-pages="parallax">
                <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                    <div class="inner">
                        <h5 class="text-white"><i class="fa fa-cogs"></i> Seguridades / <span class="semi-bold">Módulos de Sistema: Acciones</span>
                            <div class="pull-right" style="margin-right: 20px">
                                <a href="{{ url('seguridades/modulos_sistema/listar/' . Crypt::encrypt($modulo->grupo_opciones_id)) }}" class="btn btn-default btn-xs"><i class="fa fa-undo"></i> Regresar</a>
                                <a href="{{ url('seguridades/modulos_acciones/crear/' .  Crypt::encrypt($modulo->modulo_sistema_id)) }}" class="btn btn-default btn-xs"><i class="fa fa-plus-square"></i> Crear Nuevo</a>
                            </div>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="container-fluid container-fixed-lg">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel ">
                            <div class="panel-heading">
                                <div class="panel-title">Registros</div>
                                <div class="pull-right">
                                    <div class="col-xs-12">
                                        <input type="text" id="search-table" class="form-control pull-right" placeholder="buscar">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <h5>Módulo: <strong>{!! $modulo->denominacion !!}</strong> <small class="text-muted">({!! $modulo->grupo_opciones->denominacion !!})</small></h5>
                                {!!
                                Datatable::table()
                                    ->addColumn('Denominación', '')
                                    ->setUrl(URL::to('seguridades/modulos_acciones/buscar_registros_dt' . '/' . Crypt::encrypt($modulo->modulo_sistema_id)))
                                    ->noScript()
                                    ->render('seguridades.catalogos.modulos_acciones.dt_template')
                                !!}
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

    <link href="{{ asset('frontend/assets/plugins/jquery-datatable/media/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />

@stop
@section('JS')
    <script src="{{ asset('frontend/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>

@stop

@section('JS_SCRIPTS')
    <script>
        $(function()
        {


        })
    </script>

@stop


