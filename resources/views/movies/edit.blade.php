@include('../partials.dashboard')
    <div class="container" style="margin-top:5%;margin-right:0px;margin-left:0px;">
        <div class="row" style="margin-right:0px;margin-left:0px;">
            <div class="col-md-12 col-lg-8 offset-md-1 offset-lg-1 offset-xl-2">
                <form action="/movies/{{$movie->id}}/edit" method="post" enctype="multipart/form-data" >
                  {{csrf_field()}}
                    <div class="form-group"><label>Movie Name :&nbsp;</label><input class="form-control" value="{{$movie->movie_name}}" type="text" name="movie_name" required="" style="margin-right:0px;background-color:rgb(255, 255, 255, 0.75);"></div>
                    <div class="form-group">
                      <div class="form-row">
                          <div class="col-3"><label class="col-form-label">Movie Catagory :&nbsp;</label></div>
                          <div class="col"><select class="form-control" name="genere"><optgroup label="Select Gener">
                            <option value="Action"  selected="">Action</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Romantic">Romantic</option>
                            <option value="Drama">Drama</option></optgroup></select></div>
                      </div>
                    </div>
                    <div class="form-group"><label>Movie Price:&nbsp;</label><input class="form-control" type="number" name="price" required=""  value="{{$movie->price}}"></div>
                    <div class="form-group"><label>Movie Description:&nbsp;</label><textarea class="form-control" name="description" value="{{$movie->description}}"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary" type="Submit" style="margin-top:5px;width:99px;">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</body>

</html>
