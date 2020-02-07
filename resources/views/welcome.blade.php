<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{  asset('css/app.css') }}" rel="stylesheet">
        <style type="text/css">
            .error{
                color: red;font-size: 14px;
            }
            .custom-error-class{
                color: red;font-size: 14px;
            }
        </style>
        
    </head>
    <body>
        <div id="app">
             <example-component></example-component>
             <!-- <userinfo-component></userinfo-component> -->
            <!-- <router-view></router-view> -->
        </div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    </body>
</html>
