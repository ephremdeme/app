<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/fonts/ionicons.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/-Login-form-Page-BS4-.css') }}" rel="stylesheet" type="text/css" >
</head>

<body >

<nav class="navbar navbar-light navbar-expand-md" style="background-color:#102c41;">
    <div class="container-fluid"><a class="navbar-brand" href="/" style="color:white;width:60px;font-family:&#39;Aguafina Script&#39;, cursive;font-size:30px;height:45px;margin-left:18px;">CRMRS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon text-white bg-primary"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto nav navbar-nav mr-auto" style="width:780px;height:40px;font-size:18px;">
                <li class="nav-item" role="presentation"><a class="nav-link" href="/" style="color:white;"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                @if(Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout" style="color:white;"><i class="icon ion-log-out"></i>&nbsp;Profile</a></li>
                @endif

                <li class="nav-item" role="presentation"><a class="nav-link" href="/signup" style="color:white;"><i class="fa fa-sign-in"></i>&nbsp;Sign Up</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/login" style="color:white;"><i class="icon ion-log-in"></i>&nbsp;Login</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/logout" style="color:white;"><i class="icon ion-log-out"></i>&nbsp;LogOut</a></li>
            </ul>
            <form class="form-inline ml-auto" action="/movies/search" method="get" target="_self">
                <div class="form-group"><input class="form-control search-field" type="search" name="name" placeholder="search" id="search-field" style="background-color:rgba(255, 255, 255, 1);"><button class="btn btn-success btn btn-outline-success my-2 my-sm-2" type="submit" style="padding-left:12px;margin-left:8px;">Search</button></div>
            </form>
    </div>
    </div>
</nav>

<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="width:220px; height:100vh">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  Integrations
                </a>
              </li>
            </ul>


          </div>
        </nav>
