<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Post</h2>
            <a class="btn btn-dark px-5" href="{{ route('posts.index') }}"><i class="fas fa-arrow-left"></i> All Posts</a>
        </div>

        @include('forms.errors')

        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title', $post->title) }}" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
                <img width="100" src="{{ asset('uploads/posts/'.$post->image) }}" alt="">
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea id="mytextarea" name="content" class="form-control" placeholder="Content" rows="5">{{ old('content', $post->content) }}</textarea>
            </div>
            <button class="btn btn-success">Add</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
      </script>
</body>
</html>
