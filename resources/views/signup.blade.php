@include('partials.header')
    <div>
        <div class="container-fluid">
            <div class="row mh-100vh">
                <div class="col-10 col-sm-8 col-md-6 col-lg-12 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block" style="width:992px;">
                    <div class="m-auto w-lg-75 w-xl-50">
                        <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbspSign Up</h2>
                        <form action="/signup" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                            <div class="form-group"><label class="text-secondary">User Name</label>
                              <input class="form-control" type="text" name="name" placeholder="Full Name"  style="width:372px;"></div>
                            <div class="form-group"><label class="text-secondary">Email</label><input class="form-control" type="text" name="email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email" style="width:372px;"></div>
                            <div class="form-group"><label class="text-secondary" >Balance</label>
                              <input class="form-control" type="number" name="balance" placeholder="balane" min="0" max="10000"  value="0" style="width:372px;"></div>


                            <div class="form-group"><label class="text-secondary">Password</label><input class="form-control" type="password" name="password" required="" style="width:372px;"></div>
                            <div class="form-group"><label>Profile Pics:&nbsp;</label><input type="file" accept="image/*" name="file" required=""></div>
                            <button class="btn btn-info mt-2" type="submit">Sign Up</button></form>
                        <p class="mt-3 mb-0"><a href="#" class="text-info small">Forgot your email or password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
