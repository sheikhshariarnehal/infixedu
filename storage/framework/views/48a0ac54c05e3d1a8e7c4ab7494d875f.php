<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.add_testimonial'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5em;
            justify-content: space-around;
            text-align: center;
            width: 5em;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ccc;
            cursor: pointer;
        }

        .star-rating :checked~label {
            color: #f90;
        }

        article {
            background-color: #ffe;
            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
            color: #006;
            font-family: cursive;
            font-style: italic;
            margin: 4em;
            max-width: 30em;
            padding: 2em;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.add_testimonial'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.add_testimonial'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($add_testimonial)): ?>
                <?php if(userPermission('store_testimonial')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('testimonial_index')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_testimonial)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'update_testimonial',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'id' => 'add-income-update',
                            ])); ?>

                        <?php else: ?>
                            <?php if(userPermission('store_testimonial')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'store_testimonial',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                    'id' => 'add-income',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($add_testimonial)): ?>
                                        <?php echo app('translator')->get('front_settings.edit_testimonial'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.add_testimonial'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span
                                                    class="text-danger"> *</span></label>

                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off"
                                                value="<?php echo e(isset($add_testimonial) ? @$add_testimonial->name : old('name')); ?>">
                                            <input type="hidden" name="id"
                                                value="<?php echo e(isset($add_testimonial) ? @$add_testimonial->id : ''); ?>">

                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>



                                    </div>
                                </div>
                                <div class="row no-gutters input-right-icon mt-15">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.designation'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('designation') ? ' is-invalid' : ''); ?>"
                                                type="text" name="designation" autocomplete="off"
                                                value="<?php echo e(isset($add_testimonial) ? @$add_testimonial->designation : old('designation')); ?>">


                                            <?php if($errors->has('designation')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('designation')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters input-right-icon mt-15">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.institution_name'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('institution_name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="institution_name" autocomplete="off"
                                                value="<?php echo e(isset($add_testimonial) ? @$add_testimonial->institution_name : old('institution_name')); ?>">


                                            <?php if($errors->has('institution_name')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('institution_name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-15">

                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.image'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>"
                                                    type="text" id="placeholderFileOneName" name="image"
                                                    placeholder="<?php echo e(isset($add_testimonial) ? (@$add_testimonial->image != '' ? getFilePath3(@$add_testimonial->image) : trans('common.image') . ' *') : trans('common.image') . ' *'); ?>"
                                                    readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="addTestimonialImage"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="image" id="addTestimonialImage">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <img class="previewImageSize <?php echo e(@$add_testimonial->image ? '' : 'd-none'); ?>" src="<?php echo e(@$add_testimonial->image ? asset($add_testimonial->image) : ''); ?>" alt="" id="testimonialImageShow" height="100%" width="100%">
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?><span
                                                    class="text-danger"> *</span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4"
                                                name="description"><?php echo e(isset($add_testimonial) ? @$add_testimonial->description : old('description')); ?></textarea>


                                            <?php if($errors->has('description')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('description')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.rating'); ?><span
                                                    class="text-danger"> *</span></label>
                                            <div class="star-rating d-flex">
                                                <input type="radio"
                                                    id="5-stars"
                                                    name="rating" value="5"
                                                    <?php echo e(@$add_testimonial->star_rating == 5 ? "checked" : ''); ?> />
                                                <label for="5-stars"
                                                    class="star">&#9733;</label>
                                                <input type="radio"
                                                    id="4-stars"
                                                    name="rating" value="4"
                                                    <?php echo e(@$add_testimonial->star_rating == 4 ? "checked" : ''); ?> />
                                                <label for="4-stars"
                                                    class="star">&#9733;</label>
                                                <input type="radio"
                                                    id="3-stars"
                                                    name="rating" value="3"
                                                    <?php echo e(@$add_testimonial->star_rating == 3 ? "checked" : ''); ?> />
                                                <label for="3-stars"
                                                    class="star">&#9733;</label>
                                                <input type="radio"
                                                    id="2-stars"
                                                    name="rating" value="2"
                                                    <?php echo e(@$add_testimonial->star_rating == 2 ? "checked" : ''); ?> />
                                                <label for="2-stars"
                                                    class="star">&#9733;</label>
                                                <input type="radio"
                                                    id="1-star"
                                                    name="rating" value="1"
                                                    <?php echo e(@$add_testimonial->star_rating == 1 ? "checked" : ''); ?> />
                                                <label for="1-star"
                                                    class="star">&#9733;</label>
                                            </div>
                                            <?php if($errors->has('rating')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('rating')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $tooltip = '';
                                    if (userPermission('store_testimonial')) {
                                        $tooltip = '';
                                    } else {
                                        $tooltip = 'You have no permission to add';
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">

                                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                title="Disabled For Demo "> <button
                                                    class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;"
                                                    type="button"><?php echo app('translator')->get('front_settings.submit'); ?> </button></span>
                                        <?php else: ?>
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <?php if(isset($add_testimonial)): ?>
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

            <div class="col-lg-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.testimonial_list'); ?></h3>
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
                                <table id="table_id" class="table" cellspacing="0" width="100%">
    
                                    <thead>
    
                                        <tr>
                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.designation'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.institution_name'); ?></th>
                                            <th><?php echo app('translator')->get('common.rating'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(@$value->name); ?></td>
                                                <td><?php echo e(@$value->designation); ?></td>
                                                <td><?php echo e(@$value->institution_name); ?></td>
    
                                                <td>
                                                    <div class="star-rating">
                                                        <input type="radio"
                                                            id="5-stars<?php echo e($value->id); ?>"
                                                            name="rating<?php echo e($value->id); ?>" value="5"
                                                            <?php echo e($value->star_rating == 5 ? 'checked' : ''); ?>

                                                            disabled />
                                                        <label for="5-stars<?php echo e($value->id); ?>"
                                                            class="star">&#9733;</label>
    
                                                        <input type="radio"
                                                            id="4-stars<?php echo e($value->id); ?>"
                                                            name="rating<?php echo e($value->id); ?>" value="4"
                                                            <?php echo e($value->star_rating == 4 ? 'checked' : ''); ?>

                                                            disabled />
                                                        <label for="4-stars<?php echo e($value->id); ?>"
                                                            class="star">&#9733;</label>
    
                                                        <input type="radio"
                                                            id="3-stars<?php echo e($value->id); ?>"
                                                            name="rating<?php echo e($value->id); ?>" value="3"
                                                            <?php echo e($value->star_rating == 3 ? 'checked' : ''); ?>

                                                            disabled />
                                                        <label for="3-stars<?php echo e($value->id); ?>"
                                                            class="star">&#9733;</label>
    
                                                        <input type="radio"
                                                            id="2-stars<?php echo e($value->id); ?>"
                                                            name="rating<?php echo e($value->id); ?>" value="2"
                                                            <?php echo e($value->star_rating == 2 ? 'checked' : ''); ?>

                                                            disabled />
                                                        <label for="2-stars<?php echo e($value->id); ?>"
                                                            class="star">&#9733;</label>
    
                                                        <input type="radio"
                                                            id="1-star<?php echo e($value->id); ?>"
                                                            name="rating<?php echo e($value->id); ?>" value="1"
                                                            <?php echo e($value->star_rating == 1 ? 'checked' : ''); ?>

                                                            disabled />
                                                        <label for="1-star<?php echo e($value->id); ?>"
                                                            class="star">&#9733;</label>
                                                    </div>
                                                </td>
                                                <td><img src="<?php echo e(asset(@$value->image)); ?>" width="60px" height="50px">
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
                                                        <?php if(userPermission('testimonial-details')): ?>
                                                            <a href="<?php echo e(route('testimonial-details', @$value->id)); ?>"
                                                                class="dropdown-item small fix-gr-bg modalLink"
                                                                title="<?php echo app('translator')->get('front_settings.testimonial_details'); ?>" data-modal-size="modal-lg">
                                                                <?php echo app('translator')->get('common.view'); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission('edit-testimonial')): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('edit-testimonial', @$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <?php endif; ?>
    
                                                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                            <span tabindex="0" data-toggle="tooltip"
                                                                title="Disabled For Demo"> <a href="#"
                                                                    class="dropdown-item small fix-gr-bg  demo_view"
                                                                    style="pointer-events: none;"><?php echo app('translator')->get('common.delete'); ?></a></span>
                                                        <?php else: ?>
                                                            <?php if(userPermission('for-delete-testimonial')): ?>
                                                                <a href="<?php echo e(route('for-delete-testimonial', @$value->id)); ?>"
                                                                    class="dropdown-item small fix-gr-bg modalLink"
                                                                    title="<?php echo app('translator')->get('front_settings.delete_testimonial'); ?>" data-modal-size="modal-md">
                                                                    <?php echo app('translator')->get('common.delete'); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
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
    <script>
        $(document).on('change', '#addTestimonialImage', function(event) {
            $('#testimonialImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderFileOneName');
            imageChangeWithFile($(this)[0], '#testimonialImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/testimonial/testimonial_page.blade.php ENDPATH**/ ?>