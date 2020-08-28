<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DesenioCT</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body>
        <div class="container">
            <div class="half-height top"></div>
            <div class="half-height bottom"></div>
            <div id="button"> 
                <span id="button-text">Click here</span>
                <span class="hidden" id="loading">
                    <i class="fa fa-spin fa-spinner"></i>
                </span>
            </div>
        </div>
    </body>
</html>
