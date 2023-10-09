@include('header-login')
@error('error')
<div class="alert alert-danger" role="alert">
  {{ $message }}
</div>

@enderror
<form  method="POST">
  @csrf
  <hr>
  <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" class="form-control" name="name" placeholder="your name here">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="your email here">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <hr>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
@include('footer')