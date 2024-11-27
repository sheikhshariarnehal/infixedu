<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.staff_attendance'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .note-field{
        min-width: 150px;
    }
    table thead th{
        white-space: nowrap;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.staff_attendance'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.human_resource'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.staff_attendance'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">

                    <div class="white-box">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a href="<?php echo e(route('staff-attendance-import')); ?>" class="primary-btn small fix-gr-bg pull-right "><span
                                        class="ti-plus pr-2"></span><?php echo app('translator')->get('hr.import_attendance'); ?></a>
                            </div>
                        </div>


                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'staff-attendance-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>


                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 mt-30-md col-md-6">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('hr.role'); ?> <span
                                        class="text-danger"> *</span></label>
                                <select class="primary_select  form-control<?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>"
                                    id="select_class" name="role">
                                    <option data-display="<?php echo app('translator')->get('hr.select_role'); ?> *" value=""><?php echo app('translator')->get('hr.select_role'); ?> *</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"
                                            <?php echo e(isset($role_id) ? ($role->id == $role_id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('role')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mt-30-md col-md-6">
                                <div class="primary_input mb-15">
                                    <label for="startDate"><?php echo app('translator')->get('hr.attendance_date'); ?><span class="text-danger"> *</span></label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input class="primary_input_field primary_input_field date form-control"
                                                        <?php echo e(isset($date) ? 'read-only-input' : ''); ?>" id="startDate"
                                                        type="text" name="attendance_date" autocomplete="off"
                                                        value="<?php echo e(isset($date) ? $date : date('m/d/Y')); ?>"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <button class="btn-date" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg" id='btnsubmit'>
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <?php if(isset($staffs)): ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('hr.staff_attendance'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 no-gutters">
                                    <?php if($attendance_type != '' && $attendance_type == 'H'): ?>
                                        <div class="alert alert-warning"><?php echo app('translator')->get('hr.attendance_already_submitted_as_holiday'); ?></div>
                                    <?php elseif($attendance_type != '' && $attendance_type != 'H'): ?>
                                        <div class="alert alert-success"><?php echo app('translator')->get('hr.attendance_already_submitted'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6  col-md-6 no-gutters text-md-left mark-holiday ">
                                    <?php if($attendance_type != 'H'): ?>
                                        <form action="<?php echo e(route('staff-holiday-store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="purpose" value="mark">
                                            <input type="hidden" name="role_id" value="<?php echo e($role_id); ?>">
                                            <input type="hidden" name="date" value="<?php echo e($date); ?>">
                                            <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                                <?php echo app('translator')->get('hr.mark_holiday'); ?>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('staff-holiday-store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="purpose" value="unmark">
                                            <input type="hidden" name="role_id" value="<?php echo e($role_id); ?>">
                                            <input type="hidden" name="date" value="<?php echo e($date); ?>">
                                            <button type="submit" class="primary-btn fix-gr-bg mb-20">
                                                <?php echo app('translator')->get('hr.unmark_holiday'); ?>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'staff-attendance-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <input class="staff_attendance_date" type="hidden" name="date"
                                value="<?php echo e(isset($date) ? $date : ''); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                    <table class="table school-table-style" cellspacing="0" width="100%">
                                        <thead>
    
                                            <tr>
                                                <th><?php echo app('translator')->get('hr.staff_no'); ?></th>
                                                <th><?php echo app('translator')->get('hr.staff_name'); ?></th>
                                                <th><?php echo app('translator')->get('hr.role'); ?></th>
                                                <th><?php echo app('translator')->get('hr.attendance'); ?></th>
                                                <th><?php echo app('translator')->get('hr.note'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($staff->staff_no); ?><input type="hidden" name="id[]"
                                                            value="<?php echo e($staff->id); ?>"></td>
                                                    <td><?php echo e($staff->first_name . ' ' . $staff->last_name); ?></td>
                                                    <td><?php echo e($staff->roles != '' ? $staff->roles->name : ''); ?></td>
                                                    <td>
                                                        <div class="d-flex radio-btn-flex">
                                                            <div class="mr-20">
                                                                <input type="radio" name="attendance[<?php echo e($staff->id); ?>]"
                                                                    id="attendanceP<?php echo e($staff->id); ?>" value="P"
                                                                    class="common-radio attendanceP attendance_type_staff"
                                                                    <?php echo e($staff->DateWiseStaffAttendance != null ? ($staff->DateWiseStaffAttendance->attendence_type == 'P' ? 'checked' : '') : 'checked'); ?>>
                                                                <label
                                                                    for="attendanceP<?php echo e($staff->id); ?>"><?php echo app('translator')->get('hr.present'); ?></label>
                                                            </div>
                                                            <div class="mr-20">
                                                                <input type="radio" name="attendance[<?php echo e($staff->id); ?>]"
                                                                    id="attendanceL<?php echo e($staff->id); ?>" value="L"
                                                                    class="common-radio attendance_type_staff"
                                                                    <?php echo e($staff->DateWiseStaffAttendance != null ? ($staff->DateWiseStaffAttendance->attendence_type == 'L' ? 'checked' : '') : ''); ?>>
                                                                <label
                                                                    for="attendanceL<?php echo e($staff->id); ?>"><?php echo app('translator')->get('hr.late'); ?></label>
                                                            </div>
                                                            <div class="mr-20">
                                                                <input type="radio" name="attendance[<?php echo e($staff->id); ?>]"
                                                                    id="attendanceA<?php echo e($staff->id); ?>" value="A"
                                                                    class="common-radio attendance_type_staff"
                                                                    <?php echo e($staff->DateWiseStaffAttendance != null ? ($staff->DateWiseStaffAttendance->attendence_type == 'A' ? 'checked' : '') : ''); ?>>
                                                                <label
                                                                    for="attendanceA<?php echo e($staff->id); ?>"><?php echo app('translator')->get('hr.absent'); ?></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="primary_input">
                                                            <textarea class="primary_input_field note-field form-control note_<?php echo e($staff->id); ?>" cols="0" rows="2"
                                                                name="note[<?php echo e($staff->id); ?>]" id=""><?php echo e($staff->DateWiseStaffAttendance != null ? $staff->DateWiseStaffAttendance->notes : ''); ?></textarea>
                                                            <label class="primary_input_label"
                                                                for=""><?php echo app('translator')->get('hr.add_note_here'); ?></label>
                                                            <span class="focus-border textarea"></span>
                                                            <span class="invalid-feedback">
                                                                <strong><?php echo app('translator')->get('hr.error'); ?></strong>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <button type="submit" class="primary-btn mr-40 fix-gr-bg nowrap submit">
                                                        <?php echo app('translator')->get('hr.save_attendance'); ?>
                                                    </button>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/humanResource/staff_attendance.blade.php ENDPATH**/ ?>