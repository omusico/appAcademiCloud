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
<div class="register-container full-height sm-p-t-31">
    <div class="container-sm-height full-height">
        <div class="row row-sm-height">
            <div class="col-sm-12 col-sm-height m-t">
                <br><br>
                <div class="text-center"><img src="{{ asset('frontend/assets/img/reseteo.png') }}" data-src="{{ asset('frontend/assets/img/reseteo.png') }}" data-src-retina="{{ asset('frontend/assets/img/reseteo2x.png') }}" alt="reseteo"  width="170" ></div>

                <h4 class="font-montserrat no-margin text-uppercase">{!! $ie->denominacion !!}</h4>
                <p>
                    <small>
                        Para resetear su clave de acceso ingrese los siguientes datos:
                    </small>
                </p>

                {!! Form::open(array('url' => 'pc_reseteo', 'id' => 'frm_reseteo', 'class' => 'p-t-15' )) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>IDENTIFICACIÓN</label>
                                <input type="text" name="identificacion"  class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>CORREO ELECTRÓNICO</label>
                                <input type="email" name="email"  class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-12 text-right">
                            <a href="{{ url('/') }}" class="text-info small bold">Cancelar</a>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Resetear Clave de Acceso</button>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class=" full-width">
    <center>
        <img alt="" class="m-t-5" data-src="{{ asset('frontend/assets/img/logo_academicloud.png') }}" data-src-retina="{{ asset('frontend/assets/img/logo_academicloud.png') }}" src="{{ asset('frontend/assets/img/logo_academicloud.png') }}" width="149" height="44">
    </center>
</div>

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
<!-- END PAGE LEVEL JS -->
<script>
    $(function()
    {
        $('#frm_reseteo').validate()
    })
</script>
</body>
</html>