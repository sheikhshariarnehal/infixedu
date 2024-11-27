<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.video_gallery'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.video_gallery'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="<?php echo e(route('video-gallery')); ?>"><?php echo app('translator')->get('front_settings.video_gallery'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_video_gallery)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'video-gallery-update',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ])); ?>

                            <input type="hidden" value="<?php echo e(@$add_video_gallery->id); ?>" name="id">
                        <?php else: ?>
                            <?php if(userPermission('video-gallery-store')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'video-gallery-store',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15">
                                <?php if(isset($add_video_gallery)): ?>
                                    <?php echo app('translator')->get('front_settings.edit_video_gallery'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('front_settings.video_gallery'); ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.name'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off"
                                                value="<?php echo e(isset($add_video_gallery) ? @$add_video_gallery->name : old('name')); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.description'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4" name="description" id="address"><?php echo e(isset($add_video_gallery) ? @$add_video_gallery->description : old('description')); ?></textarea>
                                            <?php if($errors->has('description')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('description')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.video_link'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('video_link') ? ' is-invalid' : ''); ?>"
                                                type="text" name="video_link" autocomplete="off"
                                                value="<?php echo e(isset($add_video_gallery) ? @$add_video_gallery->video_link : old('video_link')); ?>">
                                            <?php if($errors->has('video_link')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('video_link')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <?php if(config('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('common.add'); ?></button></span>
                                        <?php else: ?>
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <?php if(isset($add_video_gallery)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.add'); ?>
                                                <?php endif; ?>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="white-box">
                <div class="row">
                    <div class="col-xl-4 col-sm-6 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('front_settings.video_gallery_list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <table id="table_id" class="table videoGallery" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.name'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.description'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.thumbnail'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $videoGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $variable = substr($value->video_link, 32, 11);
                                        ?>
                                        <tr e_id="<?php echo e($value->id); ?>">
                                            <td><span class="mr-2" style="cursor: grab"><i class="ti-menu"></i></span><?php echo e($key + 1); ?></td>
                                            <td><?php echo e(@$value->name); ?></td>
                                            <td><?php echo e(@$value->description); ?></td>
                                            <td><img style="background-image: url(http://img.youtube.com/vi/<?php echo e($variable); ?>/default.jpg);"
                                                    width="120px" height="90px">
                                            </td>
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <a href="<?php echo e(route('video-gallery-view-modal', @$value->id)); ?>"
                                                        class="dropdown-item small fix-gr-bg modalLink"
                                                        title="<?php echo app('translator')->get('front_settings.view_video'); ?>" data-modal-size="modal-lg">
                                                        <?php echo app('translator')->get('common.view'); ?>
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('video-gallery-edit', @$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <a href="<?php echo e(route('video-gallery-delete-modal', @$value->id)); ?>"
                                                        class="dropdown-item small fix-gr-bg modalLink"
                                                        title="<?php echo app('translator')->get('front_settings.delete_video_gallery'); ?>" data-modal-size="modal-md">
                                                        <?php echo app('translator')->get('common.delete'); ?>
                                                    </a>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        datableArrange('.videoGallery', 'sm_video_galleries');
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/video_gallery/video_gallery.blade.php ENDPATH**/ ?>