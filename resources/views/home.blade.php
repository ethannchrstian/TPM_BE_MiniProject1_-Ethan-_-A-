<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
  <body style="padding-left: 20px"> 
    <x-nav-bar  />
    <div class="container mt-4">
      <div class="row">
    @foreach ($products as $product)
    
    <div class="col-md-4 mb-4">

    <div class="card" style="width: 18rem;">
      <img src=" {{($product->ProductImage) }}" class="card-img-top" alt="{{ $product->ProductImage }}">
      <div class="card-body">
        <h5 class="card-title">{{ $product->id. ". " .$product->ProductName}}</h5>
        <p class="card-text">Job Title: {{ $product->ProductPrice }}</p>
        <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-primary me-3" style="width: 150px; height: 60px;">More Information</a>
          <a href="{{ route('getEditProductPage', $product->id) }}" class="btn btn-primary" style="width: 150px; height: 60px;">Edit Listing</a>
        </div>
        <br>
        <form action="{{ route('deleteProduct', $product->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger" style="width: 250px; height: 40px;">Delete</button>
        </form>
      

        <br>
      </div>
      <br>
    </div>
      </div>
    @endforeach

      </div>
    </div>
    {{ $products->onEachSide(1)->links() }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>