<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.speech_slider'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.speech_slider'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="<?php echo e(route('speech-slider')); ?>"><?php echo app('translator')->get('front_settings.speech_slider'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="row row-gap-24">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_speech_slider)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'speech-slider-update',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ])); ?>

                            <input type="hidden" value="<?php echo e(@$add_speech_slider->id); ?>" name="id">
                        <?php else: ?>
                            <?php if(userPermission('speech-slider-store')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'speech-slider-store',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php if(isset($add_speech_slider)): ?>
                                        <?php echo app('translator')->get('front_settings.edit_speech_slider'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.speech_slider'); ?>
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
                                                value="<?php echo e(isset($add_speech_slider) ? @$add_speech_slider->name : old('name')); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.designation'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('designation') ? ' is-invalid' : ''); ?>"
                                                type="text" name="designation" autocomplete="off"
                                                value="<?php echo e(isset($add_speech_slider) ? @$add_speech_slider->designation : old('designation')); ?>">
                                            <?php if($errors->has('designation')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('designation')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.speech'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('speech') ? ' is-invalid' : ''); ?>" type="text"
                                                name="speech" autocomplete="off" id="" cols="30" rows="4"><?php echo e(isset($add_speech_slider) ? @$add_speech_slider->speech : old('speech')); ?></textarea>
                                            <?php if($errors->has('speech')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('speech')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.image'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>"
                                                    type="text" id="placeholderFileOneName" name="image"
                                                    placeholder="<?php echo e(isset($add_speech_slider) ? (@$add_speech_slider->image != '' ? getFilePath3(@$add_speech_slider->image) : trans('front_settings.image') . ' *') : trans('front_settings.image') . ' *'); ?>"
                                                    id="placeholderUploadContent" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_1"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="image"
                                                        id="document_file_1">
                                                </button>
                                                <code>(jpg,png,jpeg are allowed for upload)</code>
                                            </div>
                                            <?php if($errors->has('image')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('image')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <?php if(isset($add_speech_slider)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.add'); ?>
                                            <?php endif; ?>
                                        </button>
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
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.speech_slider_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.name'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.designation'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.speech'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $speechSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e(@$value->name); ?></td>
                                                <td><?php echo e(@$value->designation); ?></td>
                                                <td><?php echo e(mb_strimwidth(@$value->speech, 0, 50, "...")); ?></td>
                                                <td><img src="<?php echo e(asset(@$value->image)); ?>" width="60px"
                                                    height="50px"></td>
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
                                                        <?php if($value->image): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(url(@$value->image)); ?>"
                                                                download><?php echo app('translator')->get('front_settings.download'); ?></a>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('speech-slider-edit', @$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <a href="<?php echo e(route('speech-slider-delete-modal', @$value->id)); ?>"
                                                            class="dropdown-item small fix-gr-bg modalLink"
                                                            title="<?php echo app('translator')->get('front_settings.delete_speech_slider'); ?>" data-modal-size="modal-md">
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
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/speech_slider/speech_slider.blade.php ENDPATH**/ ?>