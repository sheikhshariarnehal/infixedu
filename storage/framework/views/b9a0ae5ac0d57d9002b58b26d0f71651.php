<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo e(env('APP_NAME')); ?> </title>
    <link rel="icon" href="#" type="image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo $__env->yieldPushContent(config('optionbuilder.style_var')); ?>
</head>

<body class="lara-admin">
    <?php echo $__env->yieldContent(config('optionbuilder.section')); ?>

    <?php echo $__env->yieldPushContent(config('optionbuilder.script_var')); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/layouts/builder.blade.php ENDPATH**/ ?>