<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    {{-- @dump($std->subjects->find(3)) --}}

    <div class="container my-5">
        <h2>Welcome {{ $std->name }}</h2>
        <form action="{{ route('register_subjects_data') }}" method="POST">
            @csrf

            <table class="table table-bordered table-hover table-striped">
                <tr class="table-dark">
                    <th></th>
                    <th>Name</th>
                    <th>Hours</th>
                </tr>
                @foreach ($subjects as $subject)
                <tr>
                    <td> <input {{ $std->subjects->find($subject->id) ? 'checked' : '' }} type="checkbox" name="new_subjects[]" value="{{ $subject->id }}" > {{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->hours }}</td>
                </tr>
                @endforeach

            </table>

            <button class="btn btn-success btn-lg">Register</button>
        </form>
    </div>

</body>
</html>
