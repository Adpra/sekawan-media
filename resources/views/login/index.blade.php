<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="text-center m-5">
      <h1>Login</h1>
    </div>

    <form method="post" action="{{route('login') }}">
      @csrf
      <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
          <div class="col-md-6">
                   <!-- Email input -->
                   <div class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" name="email"/>
                    <label class="form-label" for="form2Example1">Email address</label>
                  </div>
                
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="password"/>
                    <label class="form-label" for="form2Example2">Password</label>
                  </div>
              
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
          </div>
        </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
