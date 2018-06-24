@include('partials.header')
<script type="text/javascript">
$.ajaxSetup({
  headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
</script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.barrating.min.js') }}"></script>
<div class="container" style="padding-top:  20px;">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <div class="thumbnail">
                <img class="img-fluid" src="{{asset('uploads/'.$movie->image) }}">
                <div class="caption-full">

                    <h4><a>{{$movie->movie_name}}</a></h4>
                    <p>{{$movie->description }}</p>
                </div>
            </div>
            <form class="" action="/movies/{{$movie->id}}/reserve" method="post">
              {{ csrf_field() }}
                <button class="btn btn-primary text-right" >Reserve</button>
            </form>
            <div class="well" style="padding-top: 20px;">
                <div class="star-ratings start-ratings-main clearfix">
                  <h1>How about star ratings?</h1>
                  <div class="stars stars-example-css">
                    <select id="example" name="rating" autocomplete="off">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                    <span > Average rating so far {{$rate}} from {{$count}} rates</span>
                  </div>
                </div>


              <div class="text-right">
                  <button class="btn btn-success" id="#add" onclick="show()">Add New Comment</button>
              </div>
              <hr>
              <br>
              <form  >
                <div id="comment" >
                  {{csrf_field()}}
                    <div class="form-group"><label class="text-secondary">Comment</label>
                      <input class="form-control" type="textarea" id="commentId" name="comment" required="" style="width:372px; height:120px "></div>
                    <button class="btn btn-info mt-2"  id="ajaxSubmit">Submit</button>
                </div>

              </form>
              <ul class="list-unstyled">
                @foreach ($movie->comment as $comment)
                <li class="media">
                  <img class="mr-3" src="{{asset('uploads/'.$comment->image) }}" width="64" height="64" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">{{$comment->username}}</h5>
                    {{$comment->comment}}
                  </div>
                </li>
                <br>
                @endforeach
              <ul>
            </div>
        </div>

      </div>
    </div>
    <script>
    $("#comment").hide();
    $("#add").on("click", function() {
      alert("clicked");
      $("#comment").show();

    });
    function show() {
      $("#comment").show();
    }
  $(function() {

    $('#example').barrating({
      theme: 'fontawesome-stars',
      onSelect: function (value, text, event){
        if (typeof(event) !== 'undefined') {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "/movies/{{$movie->id}}/rate ",
            method: 'post',
            dataType:'json',
            data: {
              rate: value
            },
            success: function(result){
              var rate=parseFloat(result['average']);
              $('#example').barrating('set', rate.toFixed());
              $('span').html("Average rating so far "+result['average']+" from " +result['count']+ " rates");
              console.log(result);
            }
          })
        }
      }
      })
      <?php if($rate){ ?>
        var val={{$rate}};
        val=(val).toFixed();
        console.log(val);
        $('#example').barrating('set', val);
      <?php } ?>
    });
    </script>
    <script type="text/javascript">

    $(document).ready(function(){

      $('#ajaxSubmit').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
        $.ajax({
          url: "/movies/{{$movie->id}}/comment ",
          method: 'post',
          data: {
            comment: $('#commentId').val()
          },
          success: function(result){
            alert("worked");
          }
        })
      })

 });
</script>



</body>

</html>
