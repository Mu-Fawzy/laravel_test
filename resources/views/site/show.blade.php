@extends('layouts.site.app')

@section('content')

    {{-- navhome --}}
    @include('layouts.site.includes.navhome')

    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $post->title }}</h1>
                    <p style="color:#ffffff">Viewes : {{ $post->views }}</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="{{ route('website.home') }}">Home</a><i class="fa fa-angle-double-right"></i><span>{{ $post->title }}</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->


    <!-- Privacy Content -->
    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="image-container-large">
                        <img class="img-fluid" src="{{ URL::asset($post->image) }}" alt="{{ $post->title }}">
                    </div> <!-- end of image-container-large -->
                    <div class="text-container">
                        {!! $post->content !!}
                    </div>

                    <a class="btn-outline-reg" href="{{ route('website.home') }}">BACK</a>
                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
    <!-- end of privacy content -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="{{ route('website.home') }}">Home</a><i class="fa fa-angle-double-right"></i><span>{{ $post->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    {{-- footer --}}
    <svg class="ex-footer-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 79"><defs><style>.cls-2{fill:#5f4def;}</style></defs><title>footer-frame</title><path class="cls-2" d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z" transform="translate(0 -0.188)"/></svg>
    @include('layouts.site.includes.footer')

    {{-- copyright --}}
    @include('layouts.site.includes.copyright')
    
    {{-- js --}}
    @include('layouts.site.includes.js')
    
@endsection