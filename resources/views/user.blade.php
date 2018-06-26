@include('partials.header')
<div class="album py-5 bg-light">
      <div class="container" >
        <div class="row">
          @foreach($users as $user)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="rounded img-fluid" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                src="{{asset('uploads/'.$user->image) }}" data-holder-rendered="true">
                <div class="card-body">
                  <p>{{$user->name}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/admin/{{$user->id}}/agent"><button type="button" class="btn btn-sm btn-outline-secondary">make agent</button></a>
                      <a href="/admin/{{$user->id}}/delete"><button type="button" class="btn btn-sm btn-outline-secondary">delete</button></a>
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
