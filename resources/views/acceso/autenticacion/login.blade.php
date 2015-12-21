<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>AcademiCloud - {!! $ie->denominacion !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('frontend/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/plugins/boostrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('frontend/assets/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('frontend/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('frontend/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="{{ asset('frontend/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
    <link href="{{ asset('frontend/pages/css/ie9.css') }}" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/toastr/toastr.min.css') }}" type="text/css" />
    <script type="text/javascript">
        window.onload = function()
        {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>
<body class="fixed-header   ">
<!-- START PAGE-CONTAINER -->
<div class="login-wrapper " style="background-color: {!! $ie->bg_wrapper_css !!}" >
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        @if($bg != null)
                <img src="{{ asset('media/ui_institucional/' . $bg->path) }}" data-src="{{ asset('media/ui_institucional/' . $bg->path)  }}" data-src-retina="{{ asset('media/ui_institucional/' . $bg->path2x)  }}" alt="" class="lazy">
        @else
            <img src="{{ asset('frontend/assets/img/bg_fondo1.jpg') }}" data-src="{{ asset('frontend/assets/img/bg_fondo1.jpg') }}" data-src-retina="{{ asset('frontend/assets/img/bg_fondo1_2x.jpg') }}" alt="" class="lazy">
        @endif
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            @if($bg != null)
            <h2 class="semi-bold text-white">
                {!! $bg->slogan !!}
            </h2>
            @endif
            <p class="small">
                Todos los derechos reservados © 2012-2015 CloudLabs.
            </p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <img src="{{ asset('media/ui_institucional/' . $ie->path_logo ) }}" alt="logo" data-src="{{ asset('media/ui_institucional/' . $ie->path_logo ) }}" data-src-retina="{{ asset('media/ui_institucional/' . $ie->path_logo ) }}}" width="130" >
            <h5 class="font-montserrat no-margin text-uppercase">{!! $ie->denominacion !!}</h5>
            <p class="p-t-35">Inicio de Sesión</p>
            <!-- START Login Form -->

            {!! Form::open(array('url' => 'iniciar_sesion', 'id' => 'frmLogin', 'class' => 'p-t-15')) !!}

                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>Usuario</label>
                    <div class="controls">
                        {!! Form::text('username', Input::old('username') ? Input::old('username') : '', array('class' => 'form-control', 'required', 'placeholder' => 'usuario', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- END Form Control-->
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>clave de acceso</label>
                    <div class="controls">
                        <input type="password" class="form-control" name="password" placeholder="clave" required>
                    </div>
                </div>
                <!-- START Form Control-->
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <div class="checkbox ">
                            <input type="checkbox" id="rememberme_chk" name="rememberme_chk" >
                            <label for="rememberme_chk">Recordarme</label>
                        </div>
                        <input type="hidden" name="rememberme" id="rememberme" value="0">
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ url('/reseteo') }}" class="text-info small bold">Olvidó su clave?</a>
                    </div>
                </div>
                <!-- END Form Control-->
                <button class="btn {!! $ie->colores_css !!} btn-cons m-t-10" type="submit">Iniciar Sesión</button>
            {!! Form::close() !!}
            <!--END Login Form-->
            <div class="pull-bottom sm-pull-bottom">
                <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                    <div class="col-sm-712col-md-12 no-padding">
                        <img alt="" class="m-t-5" data-src="{{ asset('frontend/assets/img/logo_academicloud_bk.png') }}" data-src-retina="{{ asset('frontend/assets/img/logo_academicloud_bk.png') }}" src="{{ asset('frontend/assets/img/logo_academicloud_bk2x.png') }}" width="149" height="44">
                        <p>
                            <small>Sistema de Gestión Académica en la Nube </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Login Right Container-->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN VENDOR JS -->
<script src="{{ asset('frontend/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/boostrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-bez/jquery.bez.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/plugins/bootstrap-select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/plugins/classie/classie.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-validation/js/localization/messages_es.min.js') }}" type="text/javascript"></script>
<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{ asset('frontend/pages/js/pages.min.js') }}"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('frontend/assets/js/scripts.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
<script>
    $(function()
    {
        $('#frmLogin').validate();
        $('#rememberme_chk').change(function() {
            if($(this).is(":checked")) {
                $('#rememberme').val('1');
            }else{
                $('#rememberme').val('0');
            }
        });

    })
</script>


{!! Toastr::render() !!}


</body>
</html>