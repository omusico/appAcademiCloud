@extends('layouts.plantilla_principal')


@section('PAGE_SUBHEADER')

    <div class="jumbotron bg-complete-light" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <h5 class="text-white"><i class="fa fa-unlock"></i> Usuario / <span class="semi-bold">Actualizar Clave de Acceso</span></h5>
            </div>
        </div>
    </div>
@stop


@section('content')
    <div class="container-fluid container-fixed-lg">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Form Options
                        </div>
                        <div class="tools">
                            <a class="collapse" href="javascript:;"></a>
                            <a class="config" data-toggle="modal" href="#grid-config"></a>
                            <a class="reload" href="javascript:;"></a>
                            <a class="remove" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h5>
                            Por favor ingrese los siguientes datos:
                        </h5>
                        {!! Form::open(array('url' => 'usuario/actualizar_clave', 'id' => 'frm_actualizacion')) !!}

                        <div class="form-group form-group-default required ">
                            <label>Clave Actual</label>
                            <input type="password" name="password_actual" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group form-group-default required ">
                            <label>Nueva Clave</label>
                            <input type="password" name="password_nuevo" id="password_nuevo" class="form-control">
                        </div>
                        <div class="form-group form-group-default required ">
                            <label>Confirmas Nueva Clave</label>
                            <input type="password" name="password_confirmacion" class="form-control">
                        </div>
                        <p class="pull-right">
                            <a href="{{ url('inicio') }}" class="btn btn-default" >Cancelar</a>
                            <button class="btn btn-primary" type="submit">Actualizar Clave</button>
                        </p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop


@section('JS_SCRIPTS')
    <script>
        $(function()
        {
            $('#frm_actualizacion').validate({
                rules: {
                    password_actual: "required",
                    password_nuevo: "required",
                    password_confirmacion: {
                        equalTo: "#password_nuevo"
                    }
                }
            });

        })
    </script>

@stop


