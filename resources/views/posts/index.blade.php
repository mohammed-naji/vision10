<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .table td,
        .table th {
            vertical-align: middle
        }
    </style>
</head>
<body>

    <div class="container my-5">
        {{-- <i class="fas fa-heart"></i>
        <i class="far fa-heart"></i>
        <i class="fab fa-facebook"></i> --}}




        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>All Posts</h2>
            <a class="btn btn-primary px-5" href="{{ route('posts.create') }}"><i class="fas fa-plus"></i> Add New Post</a>
        </div>

        @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <form action="{{ route('posts.index') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search About Anything.." value="{{ request()->search }}">
                <button class="btn btn-success px-5" type="button" id="button-addon2"><i class="fas fa-search"></i> Search</button>
              </div>
        </form>
{{-- {{ $posts->count() }} --}}
        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>

            @forelse ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><img width="100" src="{{ asset('uploads/posts/'.$post->image) }}" alt=""></td>
                <td>{{ $post->created_at->format('F d, Y') }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                    {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="6">No Data Found</td>
            </tr>
            @endforelse

            {{-- @if ($posts->count() == 0)
                <tr>
                    <td class="text-center" colspan="6">No Data Found</td>
                </tr>
            @else
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img width="100" src="{{ $post->image }}" alt=""></td>
                    <td>{{ $post->created_at->format('F d, Y') }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            @endif --}}

        </table>
        {{-- {{ $posts->appends(['search' => request()->search])->links() }} --}}
        {{ $posts->appends($_GET)->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
