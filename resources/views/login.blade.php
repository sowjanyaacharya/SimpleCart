<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Cart Login')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style> 
      .login-container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .card{
        width: 100%;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
      }
      .btn-custom{
        width: 100%;
      }
    </style>   
    </head>
    <body>
<div class="login-container">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
             {{session('error')}}
            </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"  required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="justify-content-center">
                    <button type="submit" class="btn btn-primary btn-custom">Login</button><br/>
                    <a href="" class="btn btn-link" >Register If You Are A New User</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
