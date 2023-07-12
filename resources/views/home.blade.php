<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>{{ setting('site.title') }}</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health Care Medical Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Algoritim Informatics">
    <meta name="generator" content="Algoritim Informatics CHON HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="chon" />

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/CHON_fav_comp.svg') }}">

</head>

<body id="top" class="{{ setting('site.theme') }}">
    <main>
        <x-docs />
        <h1>İçeriği buraya ekleyerek başlayabilirsiniz.</h1>

    </main>
    @stack('styles')
    @stack('scripts')

</body>

</html>
