<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @foreach($settings as $setting)
                {{ $setting->website_name }} {{-- @yield('title') --}} {{-- isset($page_title) ? $page_title : '' --}}
            @endforeach  
        </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        {{-- Font Awesome Icon --}}
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        {{-- Icon style --}}
        <link rel="stylesheet" href="{{ asset('admin-panel/css/icon_style.css') }}">
        {{-- Theme style --}}
        <link rel="stylesheet" href="{{ asset('admin-panel/css/main.css') }}">
        {{-- Google Font --}}
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
<!-- Start Body-->
    <body class="app sidebar-mini">
