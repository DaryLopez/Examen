<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('storage/css/Form_Styles.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/PersonTable_Styles.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/AdditionalInfo_Styles.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Welcome_Style.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    @livewireStyles
</head>
<body>
    @yield('content')
    @livewireScripts
</body>
</html>
