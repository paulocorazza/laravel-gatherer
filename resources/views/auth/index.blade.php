@include('header-login')
{{-- @error('errors')
<div class="alert alert-danger" role="alert">
 <p>Invalid email or password</p>
</div>
@enderror --}}
<form  method="POST">
  @csrf
  <hr>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="your email here">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <hr>
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="/register" class="btn btn-secondary">register</a>
</form>
@include('footer')