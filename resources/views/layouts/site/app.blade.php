<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

	<meta property="og:site_name" content="" />
	<meta property="og:site" content="" />
	<meta property="og:title" content=""/>
	<meta property="og:description" content="" />
	<meta property="og:image" content="" /> 
	<meta property="og:url" content="" /> 
	<meta property="og:type" content="article" />

    <title>@yield('title', 'Home')</title>
    
    {{-- style --}}
    @include('layouts.site.includes.css')

    <link rel="icon" href="{{ URL::asset('assets/site/images/favicon.png') }}">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    
    @yield('content')
    
</body>
</html>