@if (isset($message))
<div class="alert alert-{{ $message_type }}" role="alert">
  {{ $message }}
</div>
@endif
<form action="/register" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username" name="username">
    <small id="usernameHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" id="Email" aria-describedby="EmailHelp" placeholder="Email"  name="email">
    <small id="EmailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  @csrf
  <div class="text-right">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>