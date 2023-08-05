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
<h2 class="text-center my-5 text-uppercase">{{$title}}</h2>
@if($errors->any())
<div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
@endif
<form action="" method="POST">
<div class="form-group">
  <label for="">Name</label>
  <input type="text"
    class="form-control" name="name"  placeholder="Enter name..." value="{{old('name')}}">
    @error('name')
       <span class="text-danger">{{$message}}</span>
    @enderror
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inpEmail">Email</label>
      <input type="email" name="email" class="form-control" id="inpEmail" placeholder="Enter email..." value="{{old('email')}}">
      @error('email')
       <span class="text-danger">{{$message}}</span>
       @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inpPassword">Password</label>
      <input type="password" name="password" class="form-control" id="inpPassword" placeholder="Enter password..." 
      value="{{old('password')}}">
       @error('password')
        <span class="text-danger">{{$message}}</span>
       @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Thêm mới</button>
  <a href="{{route('users.')}}" type="submit" class="btn btn-warning">quay lại</a>
  @csrf
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>