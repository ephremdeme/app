<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      @foreach ($tasks as $task)
            <a href="/task/{{$task->id}}"> <li>{{$task->body}}</li></a>
      @endforeach
    </ul>
  </body>
</html>
