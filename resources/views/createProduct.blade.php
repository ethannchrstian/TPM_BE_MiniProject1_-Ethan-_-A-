<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
  <body>
    <x-nav-bar  />

    <form action="{{ route('createProduct') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label for="ProductName">Company Name</label><br>
      <input id="ProductName" type="text" name="ProductName" value="{{ old("ProductName") }}"><br>

      @error('ProductName')
        <p style="color: red;">{{ $message }} </p>
      @enderror

      <label for="ProductPrice">Job Title</label><br>
      <input id="ProductPrice" type="text" name="ProductPrice" value="{{ old("ProductPrice") }}"><br>

      @error('ProductPrice')
      <p style="color: red;">{{ $message }} </p>
    @enderror

    <label for="ProductImage">Company Image</label><br>
      <input id="ProductImage" type="file" name="ProductImage" value="{{ old("ProductImage") }}"><br>

      @error('ProductImage')
      <p style="color: red;">{{ $message }} </p>
    @enderror
      <br>
    <label for="">Category</label>
    <br>
    <select name="CategoryId">
      @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->CategoryName }}</option>
      @endforeach
    </select>
    <br>
      <button type="submit">Submit</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>