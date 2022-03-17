<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">

      <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    </head>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
    <body>


    </body>
</html>