<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
     <meta name="description"
         content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
     <meta name="robots" content="noindex,nofollow">
     <title>@yield('title')</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
     <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template' )}}/assets/images/favicon.png">
     <!-- chartist CSS -->
     <link href="{{ asset('template' )}}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
     <link href="{{ asset('template' )}}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
     <link href="{{ asset('template' )}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
     <!--This page css - Morris CSS -->
     <link href="{{ asset('template' )}}/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
     <!-- Custom CSS -->
     <link href="{{ asset('template/html' )}}/css/style.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-secondary">
     
     @yield('content')

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     
</body>
</html>
