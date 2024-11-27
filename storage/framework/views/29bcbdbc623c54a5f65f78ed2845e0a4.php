<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.staff_import'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.staff_import'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.human_resource'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.staff_import'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <div class="offset-lg-3 col-lg-3 text-right">
                                <a href="<?php echo e(url('/public/backEnd/bulksample/staffs.xlsx')); ?>">
                                    <button class="primary-btn tr-bg text-uppercase bord-rad">
                                        <?php echo app('translator')->get('student.download_sample_file'); ?>
                                        <span class="pl ti-download"></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <div class="box-body">
                                            1. <?php echo app('translator')->get('hr.point1'); ?> <br>
                                            2. <?php echo app('translator')->get('hr.point2'); ?> <br>
                                            3. <?php echo app('translator')->get('hr.point3'); ?> (<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e('"'.$role->name.'"'); ?>  <?php echo e(!$loop->last ? ',' :''); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>)<br>
                                            4. <?php echo app('translator')->get('hr.point4'); ?> (<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e('"'.$department->name.'"'); ?>  <?php echo e(!$loop->last ? ',' :''); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>)<br>
                                            5. <?php echo app('translator')->get('hr.point5'); ?> <?php if(count($designations) > 0): ?>
                                                <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e('"'.$designation->title.'"'); ?>  <?php echo e(!$loop->last ? ',' :''); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <br>
                                            <?php endif; ?>

                                            6. <?php echo app('translator')->get('hr.point6'); ?>(
                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($gender->id . '=' . $gender->base_setup_name . ','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            ).<br>
                                            7. <?php echo app('translator')->get('hr.point7'); ?>. ("married", "unmarried")<br>
                                            8. <?php echo app('translator')->get('hr.point8'); ?>. ("permanent", "contract")<br>

                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'staff-bulk-store',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'id' => 'staff_import_form',
                            ])); ?>

                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="row mb-40 mt-30">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <div class="primary_file_uploader">
                                                <input class="primary_input_field form-control<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>"
                                                    type="text" id="placeholderInput" placeholder="Excel file" readonly>
                                                
                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('file')); ?></span>
                                                    <?php endif; ?>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="file" id="browseFile">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('hr.save_bulk_staffs'); ?>
                                        </button>
                                    </div>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/humanResource/import_staff.blade.php ENDPATH**/ ?>