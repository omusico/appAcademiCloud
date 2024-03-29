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
<body class="fixed-header error-page  ">
<div class="container-xs-height full-height">
    <div class="row-xs-height">
        <div class="col-xs-height col-middle">
            <div class="error-container text-center">
                <h1 class="error-number">500</h1>
                <h2 class="semi-bold">Sorry but we couldnt find this page</h2>
                <p>This page you are looking for does not exsist <a href="#">Report this?</a>
                </p>
                <div class="error-container-innner text-center">
                    <form>
                        <div class="form-group form-group-default input-group transparent text-left">
                            <label>Search</label>
                            <input class="form-control" placeholder="Try searching the missing page" type="email">
                            <span class="input-group-addon pg-search"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pull-bottom sm-pull-bottom full-width">
    <div class="error-container">
        <div class="error-container-innner">
            <div class="m-b-30 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                <div class="col-sm-3 no-padding">
                    <img alt="" class="m-t-5" data-src="assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png" height="60" src="assets/img/demo/pages_icon.png" width="60">
                </div>
                <div class="col-sm-9 no-padding">
                    <p><small>Create a pages account. If you have a facebook account, log into it for this process.
                            Sign in with <a href="#">Facebook</a> or <a href="#">Google</a></small>
                    </p>
                </div>
            </div>
        </div>
    </div>
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
<!-- END PAGE LEVEL JS -->
<script>
    $(function()
    {
        $('#frm_reseteo').validate()
    })
</script>
</body>
</html>