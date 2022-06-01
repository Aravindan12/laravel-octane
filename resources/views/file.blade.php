<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="container">
        <form action="file-upload" method="POST" enctype="multipart/form-data" name="form" id="form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="file" name="file" class="form-control" id="file">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        </form>
        <div id="heading">
            @if(isset($data))
            {{count($data)}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">col1</th>
                        <th scope="col">col2</th>
                      </tr>
                </thead>
                @foreach($data as $b)
                <tbody id="tbody">
                <tr>
                        <td scope="col">{{$b[0]['name']}}</td>
                        <td scope="col">{{$b[0]['email']}}</td>
                </tr>
                </tbody>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</body>
</html>