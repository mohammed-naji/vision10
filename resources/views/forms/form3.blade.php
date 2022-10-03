<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <form action="{{ route('form3_data') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" name="name" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" placeholder="Email" name="email" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" placeholder="Age" name="age" class="form-control" />
            </div>

            <button class="btn btn-success">Send</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
