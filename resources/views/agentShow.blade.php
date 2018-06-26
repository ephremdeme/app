@include('partials.dashboard')
<style media="screen">
  body {
    background-color:  #F8F9FA;
  }
</style>
<div class="album py-5 bg-light">
  @if($flash=session('message'))
    <div class=" alert alert-success" style="text-align:center;" role="alert">
      {{$flash}}
    </div>
  @endif
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
                      <a href="/movies/{{$movie->id}}/delete"><button type="button" class="btn btn-sm btn-outline-secondary">Delete</button></a>

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
