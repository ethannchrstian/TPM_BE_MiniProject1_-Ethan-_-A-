<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
  <body style="padding-left: 20px"> 
    <?php if (isset($component)) { $__componentOriginalf59c6f96767458fe6aff06a16aa4d53a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a = $attributes; } ?>
<?php $component = App\View\Components\NavBar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavBar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a)): ?>
<?php $attributes = $__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a; ?>
<?php unset($__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf59c6f96767458fe6aff06a16aa4d53a)): ?>
<?php $component = $__componentOriginalf59c6f96767458fe6aff06a16aa4d53a; ?>
<?php unset($__componentOriginalf59c6f96767458fe6aff06a16aa4d53a); ?>
<?php endif; ?>
    <?php echo e(Cookie::get('email')); ?>

    <div class="container mt-4">
      <div class="row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="col-md-4 mb-4">

    <div class="card" style="width: 18rem;">
      <img src="<?php echo e(asset('storage/ProductImage/' . $product->ProductImage)); ?>" class="card-img-top" alt="<?php echo e($product->ProductImage); ?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo e($product->id. ". " .$product->ProductName); ?></h5>
        <p class="card-text">Job Title: <?php echo e($product->ProductPrice); ?></p>
        <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-primary me-3" style="width: 150px; height: 60px;">More Information</a>
          <a href="<?php echo e(route('getEditProductPage', $product->id)); ?>" class="btn btn-primary" style="width: 150px; height: 60px;">Edit Listing</a>
        </div>
        <br>
        <form action="<?php echo e(route('deleteProduct', $product->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <button type="submit" class="btn btn-danger" style="width: 250px; height: 40px;">Delete</button>
        </form>
      
        <br>
      </div>
      <br>
    </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
    <?php echo e($products->onEachSide(1)->links()); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html><?php /**PATH C:\Users\ethan\OneDrive\Documents\tpm36\belajar\resources\views\home.blade.php ENDPATH**/ ?>