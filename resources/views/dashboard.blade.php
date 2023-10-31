<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
      <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="/showall">All</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/dashboard/create">Create</a>
    </li>
  </ul>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($product as $prod)
         <tr>
          <th scope="row">{{$loop->index}}</th>
          <td>{{$prod->name}}</td>
          <td>{{$prod->price}}</td>
          <td> 
            <img src="products/{{$prod->image}}" alt="{{$prod->name}}" width="50"> 
            
          </td>
          <td><a href="/dashboard/{{$prod->_id}}/edit">
          <button class="btn btn-sm btn-primary">Edit</button>
          </a></td>
          <td>
            <form action="/dashboard/{{$prod->_id}}/delete" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
         @endforeach
         
        </tbody>
      </table>
</body>
</html>