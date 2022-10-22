<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container my-5">
        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-warning"><i class="fas fa-arrow-left"></i> Return Back</a>
        <div class="row justify-content-center text-center">

            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <img class="w-50 my-4" src="{{ asset('uploads/posts/'.$post->image) }}" alt="">
                <br>
                <div>
                    {{-- {{ $post->content }} --}}
                    {!! $post->content !!}
                </div>

                <hr>

                <div class="text-start">
                    {{-- @dump($post->mycomments) --}}
                    <h3>Comments (<span class="count">{{ $post->mycomments->count() }}</span>)</h3>

                    <div class="comments-section">
                        @if ($post->mycomments->count() > 0)
                            @foreach ($post->mycomments as $abc)
                            <div class="d-flex align-items-center mb-2">
                                <h5 class="m-0">{{ $abc->user->name }}</h5>
                                <small class="mx-3">{{ $abc->created_at->diffForHumans() }}</small>
                            </div>
                            <p>{{ $abc->comment }}</p>
                            <hr>
                            @endforeach
                        @else
                            <p>There is no comments yet. Be the first one</p>
                        @endif
                    </div>


                    <br>
                    <h4>Add New Comment</h4>
                    <form action="{{ route('posts.add_comment', $post->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <textarea rows="5" name="comment" class="form-control" placeholder="Comment here.."></textarea>
                        </div>

                        <button class="btn btn-dark">Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();

            let com = $('form textarea').val();

            $.ajax({
                type: 'post',
                url: '{{ route("posts.add_comment", $post->id) }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment: com
                },
                success: function(res) {
                    console.log(res);
                    $('form textarea').val('')

                    let item = `
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="m-0">${res.user}</h5>
                            <small class="mx-3">${res.time}</small>
                        </div>
                        <p>${res.comment}</p>
                        <hr>
                    `

                    $('.comments-section').append(item)

                    var count = parseInt($('span.count').text()) + 1;

                    // console.log(count);
                    $('span.count').text(count)
                }
            })

            // console.log(comment);
        })
    </script>

</body>
</html>
