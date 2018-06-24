<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Untitled</title>
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/fonts/ionicons.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/-Login-form-Page-BS4-.css') }}" rel="stylesheet" type="text/css" >

    <link rel="stylesheet" href="{{ asset('assets/css/themes/fontawesome-stars.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themes/css-stars.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themes/bootstrap-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themes/fontawesome-stars-o.css')   }}">



</head>

<body >

<nav class="navbar navbar-light navbar-expand-md" style="background-color:#102c41;">
    <div class="container-fluid"><a class="navbar-brand" href="/" style="color:white;width:60px;font-family:&#39;Aguafina Script&#39;, cursive;font-size:30px;height:45px;margin-left:18px;">CRMRS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white bg-primary"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto nav navbar-nav mr-auto" style="width:780px;height:40px;font-size:18px;">
                <li class="nav-item" role="presentation"><a class="nav-link" href="/" style="color:white;"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                @if(Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/logout" style="color:white;"><i class="icon ion-log-out"></i>&nbsp;LogOut</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/profile" style="color:white;"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
                @endif
                <li class="nav-item" role="presentation"><a class="nav-link" href="/signup" style="color:white;"><i class="fa fa-sign-in"></i>&nbsp;Sign Up</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/login" style="color:white;"><i class="icon ion-log-in"></i>&nbsp;Login</a></li>
            </ul>
            <form class="form-inline ml-auto" action="/movies/search" method="get" target="_self">
                <div class="form-group"><input class="form-control search-field" type="search" name="name" placeholder="search" id="search-field" style="background-color:rgba(255, 255, 255, 1);">
                  <button class="btn btn-success btn btn-outline-success my-2 my-sm-2" type="submit" style="padding-left:12px;margin-left:8px;">Search</button>
                </div>
            </form>
    </div>
    </div>
</nav>

@if($flash=session('message'))
  <div class=" alert alert-success" style="text-align:center;" role="alert">
    {{$flash}}
  </div>
@endif
