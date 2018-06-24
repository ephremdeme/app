@include('partials.header')
<style media="screen">
  body {
    background-color:  #F8F9FA;
  }
</style>
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="width=220px;">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link active" href="/movies/search?name=a">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link " href="/movies/search?popular=popular">
                  Most viewed
                </a>
              </li>
              <!-- <li class="nav-item">
                <div class="dropdown show">
                  <button class="btn btn-info dropdown-toggle" id="dropid" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Genere
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropid">
                    <a class="dropdown-item" href="/movies/search?genere=Action">Action</a>
                    <a class="dropdown-item" href="/movies/search?genere=Comedy">Comedy</a>
                    <a class="dropdown-item" href="/movies/search?genere=Drama">Drama</a>
                    <a class="dropdown-item" href="/movies/search?genere=Romantic">Romantic</a>
                  </div>
                </div>
              </li> -->
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link " href="/movies/search?genere=Action">
                  Action
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link " href="/movies/search?genere=Comedy">
                  Comedy
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link  " href="/movies/search?genere=Drama">
                  Drama
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="/movies/search?genere=Romantic">
                  Romantic
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="#">
                  featured
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="#">
                  SIFI
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="#">
                horror
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="#">
                  Reality
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="#">
              family
                </a>
              </li>
              <li class="nav-item btn btn-outline-success" style="background-color:  #102C41;">
                <a class="nav-link" href="#">
                Biography
                </a>
              </li>
            </ul>
          </div>
        </nav>

<div class="album py-5 bg-light">
      <div class="container" >
        <div class="row">
          @foreach($movies as $movie)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="rounded img-fluid" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                src="{{asset('uploads/'.$movie->image) }}" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/movies/{{$movie->id}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>

                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
