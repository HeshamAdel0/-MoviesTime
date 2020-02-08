<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- Logo --}}
        @foreach($settings as $setting)
            <link rel="icon" type="image/png" href="{{ $setting->logo_path }}"/>
        @endforeach
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>
            @foreach($settings as $setting)
                {{ $setting->website_name }} {{-- @yield('title') --}} {{-- isset($page_title) ? $page_title : '' --}}
            @endforeach    
        </title>
        
        <!-- plugins -->
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/fonts/iconic/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/animate/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/plugins/animsition/css/animsition.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('front-end-file/css/util.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-file/css/main.css') }}">
        
    </head>
    <!-- Start Body -->
    <body {{-- class="animsition" --}}>