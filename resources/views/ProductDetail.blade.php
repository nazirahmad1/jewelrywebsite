<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail</title>
  
    <link rel="stylesheet" href="/css/bootstrap.css">

</head>
<body>


    <div class="container  mt-3">
        <a class="btn btn-sm btn-primary text-left" href="/">Back</a>
        <h1 class="text-center text-black">Product detail</h1>
       <div class="card mx-5">
        <h2 class="text-center mb-3">{{$product->name}}</h2>
      
        <div class="text-center mb-3">
            <img src="/products/{{$product->image}}" alt="{{$product->name}}" class="">
        </div>
        <div class="text-center">
            <p class="badge badge-secondary col-1 p-2">${{$product->price}}</p>
           </div>
       <div class="text-center">
        <button class="btn btn-sm btn-success mt-3 px-3">Add to cart</button>
       </div>
       </div>
    </div>
    
</body>
</html>