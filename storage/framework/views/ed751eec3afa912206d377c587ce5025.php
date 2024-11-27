<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('rolepermission::role.login_permission'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    
    

<style>
    table.dataTable thead .sorting_asc:after {
        top: 18px;
    }

    table.dataTable thead .sorting_asc {
    vertical-align: text-top;
}

    table.dataTable thead .sorting:after {
        top: 18px;
    }

    @media(max-width: 991px){
        .up_admin_visitor .dataTables_filter>label{
            left: 50%!important;
        }
    }

</style>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css/login_access_control.css')); ?>" />
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('rolepermission::role.login_permission'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('rolepermission::role.role_permission'); ?></a>
                <a href="#"><?php echo app('translator')->get('rolepermission::role.login_permission'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="white-box">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'login-access-control-search', 'enctype' => 'multipart/form-data', 'method' => 'POST'])); ?>

                            <div>
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12 mb-20">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>"
                                                name="role" id="member_type">
                                                <option data-display=" <?php echo app('translator')->get('common.select_role'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.select_role'); ?> *
                                                </option>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$value->id); ?>">
                                                        <?php echo e(@$value->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('role')): ?>
                                                <div class="error text-danger mb-2"><?php echo e($errors->first('role')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="forStudentWrapper col-lg-12">
                                            <div class="row">
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <?php if ($__env->exists(
                                                        'university::common.session_faculty_depart_academic_semester_level',
                                                        [
                                                            'hide' => ['USUB', 'USN'],
                                                            'slb_mt' => 'mt-25',
                                                            'se_mt' => 'mt-0',
                                                            'mt' => 'mt-25',
                                                        ]
                                                    )) echo $__env->make(
                                                        'university::common.session_faculty_depart_academic_semester_level',
                                                        [
                                                            'hide' => ['USUB', 'USN'],
                                                            'slb_mt' => 'mt-25',
                                                            'se_mt' => 'mt-0',
                                                            'mt' => 'mt-25',
                                                        ]
                                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php else: ?>
                                                    <div class="col-lg-6 mb-30">
                                                        <label class="primary_input_label" for="">
                                                            <?php echo e(__('common.class')); ?> <span class="text-danger"> *</span>
                                                        </label>
                                                        <select
                                                            class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                            id="select_class" name="class">
                                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                                <?php echo app('translator')->get('common.select_class'); ?>*
                                                            </option>
                                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e(@$class->id); ?>"
                                                                    <?php echo e(old('class') == @$class->id ? 'selected' : ''); ?>>
                                                                    <?php echo e(@$class->class_name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('class')): ?>
                                                            <span class="text-danger">
                                                                <?php echo e(@$errors->first('class')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-lg-6 mb-30" id="select_section_div">
                                                        <label class="primary_input_label" for="">
                                                            <?php echo e(__('common.section')); ?><span class="text-danger"> </span>
                                                        </label>
                                                        </label>
                                                        <select
                                                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                            id="select_section" name="section">
                                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value="">
                                                                <?php echo app('translator')->get('common.select_section'); ?>
                                                            </option>
                                                        </select>
                                                        <?php if($errors->has('section')): ?>
                                                            <span class="text-danger">
                                                                <?php echo e(@$errors->first('section')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                        </div>
                                        <div class="col-lg-12 mt-20 text-right">
                                            <button type="submit" class="primary-btn small fix-gr-bg">
                                                <span class="ti-search pr-2"></span>
                                                <?php echo app('translator')->get('common.search'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-box mt-40">
            <?php if(isset($students)): ?>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-3"><?php echo app('translator')->get('common.student_list'); ?> (<?php echo e(@$students->count()); ?>)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 ">
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
                                    <table id="table_id"
                                        class="table data-table Crm_table_active3 no-footer dtr-inline collapsed"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('student.admission'); ?> </th>
                                                <th><?php echo app('translator')->get('student.roll'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('common.class'); ?></th>
                                                <th><?php echo app('translator')->get('rolepermission::role.student_permission'); ?></th>
                                                <th style="width: 200px;"><?php echo app('translator')->get('rolepermission::role.student_password'); ?></th>
                                                <th><?php echo app('translator')->get('rolepermission::role.parents_permission'); ?></th>
                                                <th style="width: 200px;"><?php echo app('translator')->get('rolepermission::role.parents_password'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="<?php echo e(@$student->user_id); ?>">
                                                    <td class="pl-3">
                                                        <input type="hidden" id="id"
                                                            value="<?php echo e(@$student->user_id); ?>">
                                                        <input type="hidden" id="role"
                                                            value="<?php echo e(@$role); ?>">
                                                        <?php echo e(@$student->admission_no); ?>

                                                    </td>
                                                    <td class="pl-3"> <?php echo e(@$student->roll_no); ?></td>
                                                    <td class="pl-1">
                                                        <?php echo e(@$student->first_name . ' ' . @$student->last_name); ?>

                                                    </td>
                                                    <td class="pl-1">
                                                        <?php $__currentLoopData = $student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e(!empty(@$record->class) ? @$record->class->class_name : ''); ?>

                                                            (<?php echo e(!empty(@$record->section) ? @$record->section->section_name : ''); ?>)
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="id"
                                                            value="<?php echo e($student->user_id); ?>">
                                                        <label class="switch_toggle">
                                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                <input type="checkbox" disabled
                                                                    id="ch<?php echo e(@$student->user_id); ?>"
                                                                    onclick="lol(<?php echo e(@$student->user_id); ?>,<?php echo e(@$role); ?>)"
                                                                    class="switch-input11"
                                                                    <?php echo e(@$student->user->access_status == 0 ? '' : 'checked'); ?>>
                                                                <span class="slider round" data-toggle="tooltip"
                                                                    title="Disabled For Demo"></span>
                                                            <?php else: ?>
                                                                <input type="checkbox" id="ch<?php echo e(@$student->user_id); ?>"
                                                                    onclick="lol(<?php echo e(@$student->user_id); ?>,<?php echo e(@$role); ?>)"
                                                                    class="switch-input11"
                                                                    <?php echo e(@$student->user->access_status == 0 ? '' : 'checked'); ?>>
                                                                <span class="slider round"></span>
                                                            <?php endif; ?>
                                                        </label>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'reset-student-password', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                        <input type="hidden" name="id"
                                                            value="<?php echo e(@$student->user_id); ?>">
                                                        <div class="row mt-10">
                                                            <div class="col-lg-6">
                                                                <div class="primary_input md_mb_20">
                                                                    <input class="primary_input_field read-only-input"
                                                                        type="text"
                                                                        name="new_password" required="true"
                                                                        minlength="6">
                                                                    <label class="primary_input_label"
                                                                        for=""><?php echo app('translator')->get('common.password'); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                    <span class="d-inline-block" tabindex="0"
                                                                        data-toggle="tooltip"
                                                                        title="Disabled For Demo ">
                                                                        <button
                                                                            class="primary-btn small tr-bg icon-only mt-10"
                                                                            style="pointer-events: none;"
                                                                            type="button">
                                                                            <span class="ti-save"> </span>
                                                                        </button>
                                                                    <?php else: ?>
                                                                        <button type="submit"
                                                                            class="primary-btn small tr-bg icon-only mt-10"
                                                                            data-toggle="tooltip"
                                                                            title="<?php echo app('translator')->get('rolepermission::role.update_password'); ?>">
                                                                            <span class="ti-save"></span>
                                                                        </button>
                                                                <?php endif; ?>
                                                                <button data-toggle="tooltip"
                                                                    title="Reset Password as Default"
                                                                    type="button"
                                                                    class="primary-btn small tr-bg icon-only mt-10"
                                                                    onclick="changePassword(<?php echo e(@$student->user_id); ?>,<?php echo e(@$role); ?>)">
                                                                    <span class="ti-reload"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <?php echo e(Form::close()); ?>

                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="ParentID"
                                                            value="<?php echo e(@$student->parents->user_id); ?>"
                                                            id="ParentID">
                                                        <label class="switch_toggle">
                                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                <input type="checkbox" disabled
                                                                    class="parent-login-disable"
                                                                    <?php echo e(@$student->parents->parent_user->access_status == 0 ? '' : 'checked'); ?>>
                                                                <span class="slider round" data-toggle="tooltip"
                                                                    title="Disabled For Demo"></span>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="parent-login-disable"
                                                                    <?php echo e(@$student->parents->parent_user->access_status == 0 ? '' : 'checked'); ?>>
                                                                <span class="slider round"></span>
                                                            <?php endif; ?>
                                                        </label>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'reset-student-password', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                        <input type="hidden" name="id"
                                                            value="<?php echo e(@$student->parents->user_id); ?>">
                                                        <div class="row mt-10">
                                                            <div class="col-lg-6">
                                                                <div class="primary_input md_mb_20">
                                                                    <input class="primary_input_field read-only-input"
                                                                        type="text"
                                                                        name="new_password" required="true"
                                                                        minlength="6">
                                                                    <label class="primary_input_label"
                                                                        for=""><?php echo app('translator')->get('common.password'); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                    <span class="d-inline-block" tabindex="0"
                                                                        data-toggle="tooltip"
                                                                        title="Disabled For Demo ">
                                                                        <button
                                                                            class="primary-btn small tr-bg icon-only mt-10"
                                                                            style="pointer-events: none;"
                                                                            type="button">
                                                                            <span class="ti-save"> </span>
                                                                        </button>
                                                                    <?php else: ?>
                                                                        <button type="submit"
                                                                            class="primary-btn small tr-bg icon-only mt-10"
                                                                            data-toggle="tooltip"
                                                                            title="<?php echo app('translator')->get('rolepermission::role.update_password'); ?>">
                                                                            <span class="ti-save"></span>
                                                                        </button>
                                                                <?php endif; ?>
                                                                <button data-toggle="tooltip"
                                                                    title="Reset Password as Default"
                                                                    type="button"
                                                                    class="primary-btn small tr-bg icon-only mt-10"
                                                                    onclick="changePassword(<?php echo e(@$student->parents->user_id); ?>,<?php echo e(@$role); ?>)">
                                                                    <span class="ti-reload"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <?php echo e(Form::close()); ?>

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
        <?php endif; ?>

        <?php if(isset($staffs)): ?>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('hr.staff_list'); ?></h3>
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
                                    <table id="table_id"
                                        class="table data-table Crm_table_active3 no-footer dtr-inline collapsed"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('hr.staff_no'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('common.role'); ?></th>
                                                <th><?php echo app('translator')->get('common.email'); ?></th>
                                                <th><?php echo app('translator')->get('rolepermission::role.login_permission'); ?></th>
                                                <th><?php echo app('translator')->get('common.password'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="<?php echo e(@$value->user_id); ?>">
                                                    <input type="hidden" id="id"
                                                        value="<?php echo e(@$value->user_id); ?>">
                                                    <input type="hidden" id="role"
                                                        value="<?php echo e(@$role); ?>">
                                                    <td class="pl-3"><?php echo e(@$value->staff_no); ?></td>
                                                    <td><?php echo e(@$value->first_name); ?>&nbsp;<?php echo e(@$value->last_name); ?></td>
                                                    <td><?php echo e(!empty(@$value->roles->name) ? @$value->roles->name : ''); ?>

                                                    </td>
                                                    <td><?php echo e(@$value->email); ?></td>
                                                    <td class="pl-3">
                                                        <?php
                                                            if (@$value->staff_user->access_status == 0) {
                                                                $permission_id = 'login-access-control-on';
                                                            } else {
                                                                $permission_id = 'login-access-control-off';
                                                            }
                                                        ?>
                                                        <?php if(userPermission($permission_id)): ?>
                                                            <label class="switch_toggle">
                                                                <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                    <input type="checkbox" disabled
                                                                        class="switch-input"
                                                                        <?php echo e(@$value->staff_user->access_status == 0 ? '' : 'checked'); ?>>
                                                                    <span class="slider round" data-toggle="tooltip"
                                                                        title="Disabled For Demo"></span>
                                                                <?php else: ?>
                                                                    <input type="checkbox" class="switch-input"
                                                                        <?php echo e(@$value->staff_user->access_status == 0 ? '' : 'checked'); ?>>
                                                                    <span class="slider round"></span>
                                                                <?php endif; ?>
                                                            </label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'reset-student-password', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                        <input type="hidden" name="id"
                                                            value="<?php echo e($value->user_id); ?>">
                                                        <div class="row mt-10">
                                                            <div class="col-lg-6">
                                                                <div class="primary_input md_mb_20">
                                                                    <input class="primary_input_field read-only-input"
                                                                        type="text"
                                                                        name="new_password" required="true"
                                                                        minlength="6">
                                                                    <label class="primary_input_label"
                                                                        for=""><?php echo app('translator')->get('common.password'); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                    <span class="d-inline-block" tabindex="0"
                                                                        data-toggle="tooltip"
                                                                        title="Disabled For Demo ">
                                                                        <button
                                                                            class="primary-btn small tr-bg icon-only mt-10"
                                                                            style="pointer-events: none;"
                                                                            type="button">
                                                                            <span class="ti-save"></span>
                                                                        </button>
                                                                    <?php else: ?>
                                                                        <button type="submit"
                                                                            class="primary-btn small tr-bg icon-only mt-10"
                                                                            data-toggle="tooltip"
                                                                            title="<?php echo app('translator')->get('rolepermission::role.update_password'); ?>">
                                                                            <span class="ti-save"></span>
                                                                        </button>
                                                                <?php endif; ?>

                                                                <button data-toggle="tooltip"
                                                                    title="Reset Password as Default"
                                                                    type="button"
                                                                    class="primary-btn small tr-bg icon-only mt-10"
                                                                    onclick="changePassword(<?php echo e(@$value->user_id); ?>,<?php echo e(@$role); ?>)">
                                                                    <span class="ti-reload"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <?php echo e(Form::close()); ?>

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
        <?php endif; ?>

        <?php if(isset($parents)): ?>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.parents_list'); ?></h3>
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
                                    <table id="table_id"
                                        class="table data-table Crm_table_active3 no-footer dtr-inline collapsed"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('student.guardian_phone'); ?> </th>
                                                <th><?php echo app('translator')->get('student.father_name'); ?> </th>
                                                <th><?php echo app('translator')->get('student.father_phone'); ?> </th>
                                                <th><?php echo app('translator')->get('student.mother_name'); ?> </th>
                                                <th><?php echo app('translator')->get('student.mother_phone'); ?> </th>
                                                <th><?php echo app('translator')->get('rolepermission::role.login_permission'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="<?php echo e(@$parent->user_id); ?>">
                                                    <input type="hidden" id="id"
                                                        value="<?php echo e(@$parent->user_id); ?>">
                                                    <input type="hidden" id="role"
                                                        value="<?php echo e(@$role); ?>">
                                                    <td><?php echo e(@$parent->guardians_mobile); ?></td>
                                                    <td><?php echo e(@$parent->fathers_name); ?></td>
                                                    <td><?php echo e(@$parent->fathers_mobile); ?></td>
                                                    <td><?php echo e(@$parent->mothers_name); ?></td>
                                                    <td><?php echo e(@$parent->mothers_mobile); ?></td>
                                                    <td>
                                                        <?php
                                                            if (@$value->staff_user->access_status == 0) {
                                                                $permission_id = 422;
                                                            } else {
                                                                $permission_id = 423;
                                                            }
                                                        ?>
                                                        <?php if(userPermission($permission_id)): ?>
                                                            <label class="switch_toggle">
                                                                <input type="checkbox" class="switch-input"
                                                                    <?php echo e(@$parent->parent_user->access_status == 0 ? '' : 'checked'); ?>>
                                                                <span class="slider round"></span>
                                                            </label>
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
        <?php endif; ?>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline({
                    url: "<?php echo e(url('student-list-datatable')); ?>",
                    data: {
                        academic_year: $('#academic_id').val(),
                        class: $('#class').val(),
                        section: $('#section').val(),
                        roll_no: $('#roll').val(),
                        name: $('#name').val(),
                        un_session_id: $('#un_session').val(),
                        un_academic_id: $('#un_academic').val(),
                        un_faculty_id: $('#un_faculty').val(),
                        un_department_id: $('#un_department').val(),
                        un_semester_label_id: $('#un_semester_label').val(),
                        un_section_id: $('#un_section').val(),
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                }),
                columns: [{
                        data: 'admission_no',
                        name: 'admission_no'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    <?php if(!moduleStatusCheck('University') && generalSetting()->with_guardian): ?>
                        {
                            data: 'parents.fathers_name',
                            name: 'parents.fathers_name'
                        },
                    <?php endif; ?> {
                        data: 'dob',
                        name: 'dob'
                    },
                    <?php if(moduleStatusCheck('University')): ?>
                        {
                            data: 'semester_label',
                            name: 'semester_label'
                        }, {
                            data: 'class_sec',
                            name: 'class_sec'
                        },
                    <?php else: ?>
                        {
                            data: 'class_sec',
                            name: 'class_sec'
                        },
                    <?php endif; ?> {
                        data: 'gender.base_setup_name',
                        name: 'gender.base_setup_name'
                    },
                    {
                        data: 'category.category_name',
                        name: 'category.category_name'
                    },
                    {
                        data: 'mobile',
                        name: 'sm_students.mobile'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'first_name',
                        name: 'first_name',
                        visible: false
                    },
                    {
                        data: 'last_name',
                        name: 'last_name',
                        visible: false
                    },
                ],
                bLengthChange: false,
                bDestroy: true,
                language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: window.jsLang('quick_search'),
                    paginate: {
                        next: "<i class='ti-arrow-right'></i>",
                        previous: "<i class='ti-arrow-left'></i>",
                    },
                },
                dom: "Bfrtip",
                buttons: [{
                        extend: "copyHtml5",
                        text: '<i class="fa fa-files-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('copy_table'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: window.jsLang('export_to_excel'),
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: window.jsLang('export_to_csv'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('export_to_pdf'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        margin: [0, 0, 0, 12],
                        alignment: "center",
                        header: true,
                        customize: function(doc) {
                            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: "center",
                                image: "data:image/png;base64," + $("#logo_img").val(),
                            });
                            doc.defaultStyle = {
                                font: 'DejaVuSans'
                            }
                        },
                    },
                    {
                        extend: "print",
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: window.jsLang('print'),
                        title: $("#logo_title").val(),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ["colvisRestore"],
                    },
                ],
                columnDefs: [{
                    visible: false,
                }, ],
                responsive: true, 
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/systemSettings/login_access_control.blade.php ENDPATH**/ ?>