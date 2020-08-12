<!doctype html>
<html lang="en">
    <head>
        <title>Hello, world!</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- Material Dashboard CSS -->
        <link rel="stylesheet" href="{{URL::to('assets/css/material-dashboard.css')}}">
        @yield('page_css')
        @yield('page_head_js')
    </head>
    <body style="background-color: #FFFFFF;">
        <div style="height: 100vh">
            <div class="container-fluid flex-column">
                @yield('main_container', 'Home Page')  
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{URL::to('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>


        <!--  Plugin for Sweet Alert -->
        <script src="{{URL::to('assets/js/plugins/sweetalert2.js')}}"></script>

        <!-- Forms Validations Plugin -->
        <script src="{{URL::to('assets/js/plugins/jquery.validate.min.js')}}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
        <!-- <script src="assets/js/plugins/jquery.datatables.min.js"></script> -->

        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{URL::to('assets/js/material-dashboard.min.js?v=2.1.2')}}" type="text/javascript"></script>

    </body>
</html>