<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    {{-- link sass --}}
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
<div class="container">
@if(session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
<h2 class="text-center my-5 text-uppercase">{{$title}}</h2>
<a name="" class="btn btn-primary my-3" href="{{route('users.add')}}" role="button">Thêm mới</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
    @if(!@empty($usersList))
    @foreach ($usersList as $key => $item)
      <tr>
        <td>{{$key + 1}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->password}}</td>
        <td>
        <a href="{{route('users.edit', ['id' => $item->id])}}" class="btn btn-primary" role="button">Sửa</a>
        <a onclick="return confirm('bạn có chắc chắn muốn xóa ??')" href="{{route('users.delete', ['id' => $item->id])}}" class="btn btn-danger" role="button">Xóa</a>
        </td>
      </tr>
        @endforeach
      @else
      <tr>
        <td colspan="4">không có người dùng</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
