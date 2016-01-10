@extends('layouts.plantilla_principal')


@section('content')
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
            <div class="jumbotron bg-success-dark" data-pages="parallax">
                <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                    <div class="inner">
                        <h5 class="text-white"><i class="fa fa-cogs"></i> Seguridades / <span class="semi-bold">Grupos de Opciones</span> / Crear</h5>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-fixed-lg">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Nuevo Registro</div>
                            </div>

                            <div class="panel-body">

                                {!! Form::open(array('url' => 'seguridades/grupos_opciones/grabar_nuevo', 'id' => 'frm_data')) !!}

                                <div class="form-group form-group-default form-group-default-select2 required ">
                                    <label>SubSistema</label>
                                    {!! Form::select('subsistema_id', $subsistemas, Input::old('subsistema_id') ? Input::old('subsistema_id') : null, array('class' => 'full-width', 'id' => 'subsistema_id')) !!}
                                </div>
                                <div class="form-group form-group-default required ">
                                    <label>Orden</label>
                                    {!! Form::text('orden', Input::old('orden') ? Input::old('orden') : '', array('class' => 'form-control', 'id' => 'orden', 'autocomplete' => 'off')) !!}
                                </div>
                                <div class="form-group form-group-default required ">
                                    <label>Denominación</label>
                                    {!! Form::text('denominacion', Input::old('denominacion') ? Input::old('denominacion') : '', array('class' => 'form-control', 'id' => 'denominacion', 'autocomplete' => 'off')) !!}
                                </div>
                                <div class="form-group form-group-default required ">
                                    <label>Denominación Visual</label>
                                    {!! Form::text('denominacion_visual', Input::old('denominacion_visual') ? Input::old('denominacion_visual') : '', array('class' => 'form-control', 'id' => 'denominacion_visual', 'autocomplete' => 'off')) !!}
                                </div>
                                <div class="form-group form-group-default required ">
                                    <label>Thumbnail</label>
                                    {!! Form::text('thumbnail', Input::old('thumbnail') ? Input::old('thumbnail') : '', array('class' => 'form-control', 'id' => 'thumbnail', 'autocomplete' => 'off')) !!}
                                </div>
                                <p class="pull-right">
                                    <a href="{{ url('seguridades/grupos_opciones') }}" class="btn btn-default" >Cancelar</a>
                                    <button class="btn btn-primary" type="submit" data-loading-text="Grabando..." id="cmd_submit">Grabar</button>
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
                },
                submitHandler: function(form) {
                    $("#cmd_submit").attr('disabled', true);
                    form.submit();
                }
            });
        })
    </script>

@stop