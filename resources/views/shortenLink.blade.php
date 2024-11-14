<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link Shortner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h2>Laravel Create URL Shortner</h2>    
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        <div class="card">
            <div class="card-header">
                <form action=" {{ route('generate.shorten.link.post') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL">
                        <div class="input-group-addon">
                            <button class="btn btn-success">Generate Shorten Link</button>
                        </div>
                        @error('link') <p class="m-0 p-0 text-danger">{{ $message }}</p> @enderror
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                </tr>
            </thead>

            <tbody>
                @foreach($shortLinks as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                        <td>{{ $row->link }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </body>
</html>