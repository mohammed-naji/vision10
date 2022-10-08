<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h2>Simple Contact Us</h2>
        {{-- @include('forms.errors') --}}
        <form action="{{ route('contact_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}" placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror " name="phone" value="{{ old('phone') }}" placeholder="Phone">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control @error('subject') is-invalid @enderror " name="subject" value="{{ old('subject') }}" placeholder="Subject">
                    @error('subject')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label>CV</label>
                    <input type="file" class="form-control @error('cv') is-invalid @enderror " name="cv">
                    @error('cv')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <textarea class="form-control @error('message') is-invalid @enderror " placeholder="Message" name="message" rows="5">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary w-100">Send</button>
                </div>

            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
