@include('partials.header')
    <div>
        <div class="container-fluid">
            <div class="row mh-100vh">
                <div class="col-10 col-sm-8 col-md-6 col-lg-12 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block" style="width:992px;">
                    <div class="m-auto w-lg-75 w-xl-50">
                        <h2 class="text-info font-weight-light mb-5"><i class="fa fa-user"></i>&nbspUser Profile</h2>
                        <form>
                          {{csrf_field()}}
                            <div class="form-group"><label class="text-secondary">User Name   : {{$user->name}}</label> </div>
                            <div class="form-group"><label class="text-secondary">Email       :  {{$user->email}}   </label></div>
                            <div class="form-group"><label class="text-secondary">Balance     :   {{$user->balance}}</label> </div>
                            <div class="form-group"><label class="text-secondary">Profile Pics: <img src="{{asset('uploads/'.$user->image) }}"  width="64" height="64" alt="Generic placeholder image"> </label></div>
                        </form>
                        <div class="well">
                          <h4>Movie Tickets</h4><br>
                          <ul class="list-unstyled">
                            @foreach ($user->ticket as $ticket)
                            <li class="media">

                              <div class="media-body">
                                <h5 class="mt-0 mb-1">Movie Name : {{$ticket->movie_name}}</h5>
                                <h5 class="mt-0 mb-1">Ticket Number : {{$ticket->ticket_number}}</h5>
                                <h5 class="mt-0 mb-1">Status : {{$ticket->status}}</h5>
                              </div>
                            </li>
                            <br>
                            @endforeach
                          <ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
