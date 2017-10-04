<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>API Doc EasyPedidos!</title>
    <link rel="icon" href="{{asset('/public/consoleV2/dist/img/app.jpeg')}}" type="image/x-icon" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('public/vendor/apidoc/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/vendor/apidoc/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/apidoc/plugins/iCheck/square/blue.css') }}">

    <style>
        /* Largura da barra de rolagem */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Fundo da barra de rolagem */
        ::-webkit-scrollbar-track-piece {
            background-color: #EEE;
            border-left: 1px solid #CCC
        }

        /* Cor do indicador de rolagem */
        ::-webkit-scrollbar-thumb:vertical,
        ::-webkit-scrollbar-thumb:horizontal {
            background-color: #3c8dbc;
        }

        /* Cor do indicador de rolagem - ao passar o mouse */
        ::-webkit-scrollbar-thumb:vertical:hover,
        ::-webkit-scrollbar-thumb:horizontal:hover {
            background-color: #717171
        }
    </style>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset('public/vendor/apidoc/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/apidoc/dist/css/skins/skin-green.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/apidoc/dist/css/skins/_all-skins.min.css') }}">

@yield('styles')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
</head>

<body class="hold-transition {{ config('apidoc.theme.doc') }} {{ implode(' ', config('apidoc.layouts.doc')) }} ">
<div class="wrapper">
    <!-- Main Header -->
@include('Apidoc::layouts._docs._header._index')

<!-- Left side column. contains the logo and sidebar -->
@include('Apidoc::layouts._docs._sidebar._index')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
@include('Apidoc::layouts._docs._footer')

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('public/vendor/apidoc/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/vendor/apidoc/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/vendor/apidoc/dist/js/app.min.js') }}"></script>
<script src="{{ asset('public/vendor/apidoc/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

@yield('scripts')

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

<!-- SlimScroll 1.3.0 -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script>

    $(document).ready(function() {
        function sendFile(file,editor,welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "http://localhost/painel.adm/admin/send",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    var image = url;
                    editor.insertImage(welEditable, url);
                    alert()
                },
                error: function(e){
                    alert(e)
                }
            });
        }

        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                  // set focus to editable area after initializing summernote
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0],editor,welEditable);
            }
        });

    });


</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
