<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('page_title', 'Material Design for Bootstrap | Homepage') </title>
        <!-- MDB icon -->
        <link rel="icon" href="{{URL::to('material/img/mdb-favicon.ico')}}" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{URL::to('material/css/bootstrap.min.css')}}">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="{{URL::to('material/css/mdb.min.css')}}">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="{{URL::to('material/css/style.css')}}">
        @yield('page_css')
        @yield('page_head_js')
    </head>

    <body>
        <!-- Start your project here-->  
        <div style="height: 100vh">
            <div class="container flex-column">
                @yield('main_container', 'Home Page')  
            </div>
        </div>
        <!-- End your project here-->

        <!-- jQuery -->
        <script type="text/javascript" src="{{URL::to('material/js/jquery.min.js')}}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{URL::to('material/js/popper.min.js')}}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{URL::to('material/js/bootstrap.min.js')}}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{URL::to('material/js/mdb.min.js')}}"></script>
        <!-- Your custom scripts (optional) -->
        @yield('page_bottom_js')
    </body>

</html>
