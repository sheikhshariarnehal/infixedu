<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.front_result'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.front_result'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="<?php echo e(route('front-result')); ?>"><?php echo app('translator')->get('front_settings.front_result'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <?php if(isset($add_front_result)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'front-result-update',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ])); ?>

                            <input type="hidden" value="<?php echo e(@$add_front_result->id); ?>" name="id">
                        <?php else: ?>
                            <?php if(userPermission('front-result-store')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'front-result-store',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($add_front_result)): ?>
                                        <?php echo app('translator')->get('front_settings.edit_front_result'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.front_result'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.title'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="title" autocomplete="off"
                                                value="<?php echo e(isset($add_front_result) ? @$add_front_result->title : old('title')); ?>">
                                            <?php if($errors->has('title')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('title')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for="publish_date"><?php echo e(__('common.publish_date')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input
                                                                class="primary_input_field date form-control<?php echo e($errors->has('publish_date') ? ' is-invalid' : ''); ?>"
                                                                id="publish_date" type="text" name="publish_date"
                                                                value="<?php echo e(isset($add_front_result) ? date('m/d/Y', strtotime(@$add_front_result->publish_date)) : date('m/d/Y')); ?>"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <button class="btn-date" style="top: 55% !important;"
                                                        data-id="#publish_date" type="button">
                                                        <label class="m-0 p-0" for="publish_date">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php if($errors->has('publish_date')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('publish_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.content_type'); ?></label>
                                        <select id="content_type"
                                            class="primary_select form-control"
                                            name="content_type">
                                            <option data-display="<?php echo app('translator')->get('front_settings.link'); ?>" value="link"
                                                <?php echo e(@$add_front_result->link ? 'selected' : (old('content_type') == 'link' ? 'selected' : '')); ?>>
                                                <?php echo app('translator')->get('front_settings.link'); ?>
                                            </option>
                                            <option data-display="<?php echo app('translator')->get('front_settings.file'); ?>" value="file"
                                                <?php echo e(@$add_front_result->result_file ? 'selected' : (old('content_type') == 'file' ? 'selected' : '')); ?>>
                                                <?php echo app('translator')->get('front_settings.file'); ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-20" id="linkSection">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.link'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>"
                                                type="text" name="link" autocomplete="off"
                                                value="<?php echo e(isset($add_front_result) ? @$add_front_result->link : old('link')); ?>">
                                            <?php if($errors->has('link')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('link')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20 d-none" id="fileSection">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.file'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>"
                                                    type="text" id="placeholderFileOneName" name="file"
                                                    placeholder="<?php echo e(isset($add_front_result) ? (@$add_front_result->result_file != '' ? getFilePath3(@$add_front_result->result_file) : trans('front_settings.file') . ' *') : trans('front_settings.file') . ' *'); ?>"
                                                    id="placeholderUploadContent" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_1"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="file"
                                                        id="document_file_1">
                                                </button>
                                                <code>(jpg,png,jpeg,pdf are allowed for upload)</code>
                                            </div>
                                            <?php if($errors->has('file')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('file')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <?php if(isset($add_front_result)): ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.front_result_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('front_settings.title'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.date'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $frontResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e(@$value->title); ?></td>
                                                <td><?php echo e(date('m/d/Y', strtotime(@$value->publish_date))); ?></td>
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
                                                        <?php if($value->result_file): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(url(@$value->result_file)); ?>"
                                                                download><?php echo app('translator')->get('front_settings.download'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($value->link): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(@$value->link); ?>"
                                                                target="_blank"><?php echo app('translator')->get('front_settings.link'); ?></a>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('front-result-edit', @$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <a href="<?php echo e(route('front-result-delete-modal', @$value->id)); ?>"
                                                            class="dropdown-item small fix-gr-bg modalLink"
                                                            title="<?php echo app('translator')->get('front_settings.delete_front_result'); ?>" data-modal-size="modal-md">
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
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            errorShowHide($("#content_type").val());

            $("#content_type").change(function() {
                errorShowHide($(this).val());
            });

            function errorShowHide(selector) {
                if (selector == "link") {
                    $("#fileSection").addClass('d-none');
                    $("#linkSection").removeClass('d-none');
                } else {
                    $("#fileSection").removeClass('d-none');
                    $("#linkSection").addClass('d-none');
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/front_result/front_result.blade.php ENDPATH**/ ?>