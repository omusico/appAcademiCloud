@extends('layouts.plantilla_principal')

@section('metas')

    <meta id="token" name="token" value="{{ csrf_token() }}">

@endsection


@section('content')

    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper" id="modulo">
        <!-- START PAGE CONTENT -->
        <div class="content">
            <div class="jumbotron page-cover" data-pages="parallax">
                <div class="container-fluid container-fixed-lg">
                    <div class="inner">
                        <h5 class=""><i class="fa fa-cogs"></i> Seguridades / <span class="semi-bold">Roles Permisos</span>
                            <div class="pull-right" style="margin-right: 20px">
                                <button class="btn btn-primary btn-xs" v-on:click="generar_dialogo_nuevo_permiso"><i class="fa fa-plus-square"></i> Asignar Permiso</button>
                            </div>
                        </h5>
                        <div class="container-md-height m-b-20">
                            <div class="row row-md-height">
                                <div class="col-lg-12 col-md-height col-md-12 col-top">
                                    <h4>Rol: <span class="semi-bold">{!! $rol->denominacion !!}</span> <span class="label label-info"><i class="fa fa-desktop"></i>  {!! $rol->subsistema->denominacion !!}</span> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-fixed-lg">

                <input type="hidden" v-model="rol_id" value="{!! $rol->rol_id !!}">
                <input type="hidden" v-model="base_url" value="{!! url('seguridades/rol_permisos') !!}">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default" v-for="permiso in permisos">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-sitemap"></i> @{{ permiso.grupo_opciones.denominacion }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="table-responsive" v-if="permiso.permisos.length > 0">
                                    <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                                        <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                                            <thead>
                                                <tr role="row">
                                                    <th>Módulo</th>
                                                    <th style="width: 100px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr role="row" v-for="permiso in permiso.permisos">
                                                    <td class="v-align-middle">@{{ permiso.denominacion }} <span class="label"><i class="fa fa-external-link"></i> @{{ permiso.controlador }}</span>  <span class="label label-info"><i class="fa fa-desktop"></i> @{{ permiso.denominacion_visual }}</span></td>
                                                    <td class="v-align-middle semi-bold"><button type="button" class="btn btn-xs btn-danger" v-on:click="sv_revocar_permiso(permiso.rol_modulo_id)"><i class="fa fa-trash-o"></i> Revocar</button> </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>





                <div class="modal fade stick-up" id="modalStickUpSmall" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header clearfix text-left">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                </button>
                                <h5>Asignar <span class="semi-bold">Nuevo Permiso</span></h5>
                            </div>
                            <div class="modal-body">

                                <div class="table-responsive" v-if="modulos.length > 0">
                                    <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                                        <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th style="width: 225px;">Grupo</th>
                                                <th>Módulo</th>
                                                <th style="width: 90px;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr role="row" v-for="modulo in modulos">
                                                <td class="v-align-middle semi-bold ">@{{ modulo.grupo }}</td>
                                                <td class="v-align-middle">@{{ modulo.denominacion }} <span class="label"><i class="fa fa-external-link"></i> @{{ modulo.controlador }}</span>  </td>
                                                <td class="v-align-middle semi-bold"><button type="button" class="btn btn-xs btn-primary" v-on:click="sv_nuevo_permiso(modulo.modulo_sistema_id)"><i class="fa fa-arrow-circle-right"></i> Asignar</button> </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /.modal-content -->
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

    <script src="{{ asset('frontend/assets/plugins/vue/vue.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/plugins/vue/vue-resource.js') }}" type="text/javascript"></script>

    <script src="{{ asset('apps/acceso/app_seguridades_rol_permisos.js') }}" type="text/javascript"></script>

@stop

@section('JS_SCRIPTS')
    <script>
        $(function()
        {


        })
    </script>

@stop


