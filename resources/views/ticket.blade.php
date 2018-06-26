
@include('partials.header')
    <div>
        <div class="container-fluid">
            <div class="row mh-100vh">
                <div class="col-10 col-sm-8 col-md-6 col-lg-12 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block" style="width:992px;">
                    <div class="m-auto w-lg-75 w-xl-50">
                        <h2 class="text-info font-weight-light mb-5"><i class="fa fa-check"></i>&nbspApprove Tickets</h2>
                        <form>
                          {{csrf_field()}}
                          @foreach ($tickets as $ticket)
                            <div class="form-group"><label class="text-secondary">Movie Name    : {{$ticket->movie_name}}</label> </div>
                            <div class="form-group"><label class="text-secondary">Ticket Number : {{$ticket->ticket_number}}   </label></div>
                            <div class="form-group"><label class="text-secondary">Status        : {{$ticket->status}}</label> </div>
                            <a href="/agent/{{$ticket->id}}/approve"><button type="button" class="btn btn-sm btn-outline-secondary">Approve</button></a>
                            <hr>
                          @endforeach
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
