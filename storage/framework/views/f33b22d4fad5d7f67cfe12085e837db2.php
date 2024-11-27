<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.expert_staff'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.expert_staff'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="<?php echo e(route('expert-teacher')); ?>"><?php echo app('translator')->get('front_settings.expert_staff'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_expert_teacher)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'expert-teacher-update',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ])); ?>

                            <input type="hidden" value="<?php echo e(@$add_expert_teacher->id); ?>" name="id">
                        <?php else: ?>
                            <?php if(userPermission('expert-teacher-store')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'expert-teacher-store',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15">
                                <?php if(isset($add_expert_teacher)): ?>
                                    <?php echo app('translator')->get('front_settings.edit_expert_staff'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('front_settings.add_expert_staff'); ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12 mb-15">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('hr.role'); ?></label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('member_type') ? ' is-invalid' : ''); ?>"
                                            name="member_type" id="member_type">
                                            <option data-display=" <?php echo app('translator')->get('leave.select_role'); ?>" value="">
                                                <?php echo app('translator')->get('leave.select_role'); ?></option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('member_type')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('member_type')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-15" id="selectStaffsDiv">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('hr.staff'); ?> <span
                                                class="text-danger"> *</span></label>
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('staff_id') ? ' is-invalid' : ''); ?>"
                                            name="staff" id="selectStaffs">
                                            <option data-display="<?php echo app('translator')->get('common.name'); ?> *" value=""><?php echo app('translator')->get('common.name'); ?> *
                                            </option>
                                            <?php $__currentLoopData = $expertTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->satff): ?>
                                                <option value="<?php echo e($value->satff_id); ?>"><?php echo e($value->satff->full_name); ?>

                                                </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12 text-center">
                                        <?php if(config('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('common.add'); ?></button></span>
                                        <?php else: ?>
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <?php if(isset($add_expert_teacher)): ?>
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
                            <h3 class="mb-15"><?php echo app('translator')->get('front_settings.expert_staff_list'); ?></h3>
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
                            <table id="table_id" class="table expertTeacher" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.name'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.designation'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $expertTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr e_id="<?php echo e($value->id); ?>">
                                            <td><span class="mr-2" style="cursor: grab"><i
                                                        class="ti-menu"></i></span><?php echo e($key + 1); ?></td>
                                            <td><?php echo e(@$value->staff->full_name); ?></td>
                                            <td><?php echo e(@$value->staff->designations->title); ?></td>
                                            <td><img src="<?php echo e(@$value->staff->staff_photo ? asset(@$value->staff->staff_photo) : asset('public/uploads/staff/staff.jpg')); ?>"
                                                    width="50px" height="50px">
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
                                                    <a href="<?php echo e(route('expert-teacher-delete-modal', @$value->id)); ?>"
                                                        class="dropdown-item small fix-gr-bg modalLink"
                                                        title="<?php echo app('translator')->get('front_settings.delete_expert_staff'); ?>" data-modal-size="modal-md">
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
        datableArrange('.expertTeacher', 'sm_expert_teachers');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/expert_teacher/expert_teacher.blade.php ENDPATH**/ ?>