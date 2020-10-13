<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'MemoriesOf, app')); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <?php echo \Livewire\Livewire::styles(); ?>


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
        <script src="E:\wamp64\www\dans2\public\js\ChangeDescription.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">


            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                </div>
            </header>

            <!-- Page Content -->
            <main>

                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->yieldSection(); ?>

            </main>
        </div>



        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html>
<?php /**PATH E:\wamp64\www\dans2\resources\views/layouts/app.blade.php ENDPATH**/ ?>