<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <strong>{{ $message }}</strong>
            </div>
        @endif

            <form method="POST" action="/dashboard/create" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                  @if ($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                    @if ($errors->has('price'))
                    <span class="text-danger">{{$errors->first('price')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-check-label" for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if ($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add product</button>
              </form> 
        </div>
</body>
</html>