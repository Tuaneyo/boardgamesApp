<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Title   -->
    <title>Alleen voor de Liefhebber</title>
    <title>Boardgamesapp 2.0</title>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <!-- Font Awesome -->
    <!-- Bootstrap core CSS -->

    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('bootstrap/css/mdb.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--<link href="https://fonts.googleapis.com/css?family=Anton|Francois+One|Gudea" rel="stylesheet">--}}

    <link href="https://fonts.googleapis.com/css?family=Staatliches|Orbitron" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style type="text/css">

        html,
        body{
            height: 100%;
        }

        #carousel-header{
            height: 40vh;
        }

        .select2-container *:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(199, 125, 72,.2);
            border-radius: 0;
        }

        @media (max-width: 740px) {
            html,
            body,
            .carousel {
                height: 100vh;
            }
            #carousel-header{
                height: 70vh;
            }

            main{
                padding: 1em;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            .carousel {
                height: 100vh;
            }

        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #2b2b2b!important;
            }

        }

        @font-face {
            font-family: 'Glyphicons Halflings';

            src: url({{asset('/font/glyphicons-halflings-regular.eot')}});
            src: url({{asset('/font/glyphicons-halflings-regular.eot?#iefix')}}) format('embedded-opentype'),
            url({{asset('/font/glyphicons-halflings-regular.woff2')}}) format('woff2'),
            url({{asset('/font/glyphicons-halflings-regular.woff')}}) format('woff'),
            url({{asset('/font/glyphicons-halflings-regular.ttf')}}) format('truetype'),
            url({{asset('/font/glyphicons-halflings-regular.svg#glyphicons_halflingsregular')}}) format('svg');
        }
        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: normal;
            line-height: 1;

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

    </style>
</head>

