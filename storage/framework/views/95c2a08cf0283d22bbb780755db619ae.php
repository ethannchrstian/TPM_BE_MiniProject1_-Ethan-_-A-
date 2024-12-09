<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
  <body> <div style="padding-left: 20px;"> 
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

    <form action="<?php echo e(route('editProduct',$product->id)); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <label for="ProductName">Company Name</label><br>
      <input id="ProductName" type="text" name="ProductName" value="<?php echo e($product->ProductName); ?>"><br>

      <?php $__errorArgs = ['ProductName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p style="color: red;"><?php echo e($message); ?> </p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      <label for="ProductPrice">Job Title</label><br>
      <input id="ProductPrice" type="text" name="ProductPrice" value="<?php echo e($product->ProductPrice); ?>"><br>

      <?php $__errorArgs = ['ProductPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p style="color: red;"><?php echo e($message); ?> </p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <label for="ProductImage">Company Image</label><br>
      <input id="ProductImage" type="file" name="ProductImage" value="<?php echo e($product->ProductImage); ?>"><br>

      <?php $__errorArgs = ['ProductImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p style="color: red;"><?php echo e($message); ?> </p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <br>
    <label for="">Category</label>
    <br>
    <select name="CategoryId">
        <option value="<?php echo e($product->CategoryId); ?>"><?php echo e($product->category->CategoryName); ?></option>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($category->id !== $product->categoryId): ?>
      <option value="<?php echo e($category->id); ?>"><?php echo e($category->CategoryName); ?></option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br>
    <br>
      <button  style="background-color: greenyellow" type="submit" >Submit</button>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html><?php /**PATH C:\Users\ethan\OneDrive\Documents\tpm36\belajar\resources\views\editProduct.blade.php ENDPATH**/ ?>