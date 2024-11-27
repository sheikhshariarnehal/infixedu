<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('academics.assign_subject_create'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.assign_subject_create'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="<?php echo e(route('assign_subject')); ?>"><?php echo app('translator')->get('academics.assign_subject'); ?></a>
                <a href="<?php echo e(route('assign_subject_create')); ?>"><?php echo app('translator')->get('academics.assign_subject_create'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign_subject_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <select class="primary_select form-control <?php echo e(@$errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e(@$errors->first('class')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mb-3 mb-lg-0" id="select_section_div">
                                <select class="primary_select form-control <?php echo e(@$errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e(@$errors->first('section')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php if(isset($assign_subjects) && $assign_subjects->count() > 0): ?>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6 col-9">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('academics.assign_subject_create'); ?> </h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 text-right col-3">
                <button class="primary-btn icon-only fix-gr-bg" id="addNewSubject" type="button">
                    <span class="ti-plus" ></span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign-subject-store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'assign_subject'])); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="assign-subject" id="assign-subject">
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
                                    <input type="hidden" name="section_id" id="class_id" value="<?php echo e(@$section_id); ?>">
                                    <input type="hidden" name="update" value="1">
                                    <?php $i = 4; ?>
                                    <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-12 mb-30" id="assign-subject-<?php echo e($i); ?>">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5 mb-3 mb-lg-0">
                                                <select class="primary_select form-control subject" name="subjects[]">
                                                    <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?>" value=""><?php echo app('translator')->get('common.select_subjects'); ?></option>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($subject->id); ?>" <?php echo e(@$assign_subject->subject_id == $subject->id? 'selected': ''); ?>><?php echo e(@$subject->subject_name); ?>(<?php echo e(@$subject->subject_code); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-5 mb-3 mb-lg-0">
                                                <select class="primary_select form-control" name="teachers[]">
                                                    <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?>" value=""><?php echo app('translator')->get('common.select_teacher'); ?></option>
                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$teacher->id); ?>" <?php echo e(@$assign_subject->teacher_id == @$teacher->id? 'selected': ''); ?>><?php echo e(@$teacher->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-2 col-12 text-center text-lg-left">
                                                <button class="primary-btn icon-only fix-gr-bg" id="removeSubject" onclick="deleteSubject(<?php echo e($i); ?>)" type="button">
                                                    <span class="ti-trash" ></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                             <?php if(userPermission('assign-subject-store')): ?>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg submit">
                                    <span class="ti-save pr-2"></span>
                                    <?php echo app('translator')->get('academics.save'); ?>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php elseif(isset($assign_subjects) && $assign_subjects->count() == 0): ?>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6 col-9">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('academics.assign_subject'); ?></h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 text-right col-3">
                <button class="primary-btn icon-only fix-gr-bg" id="addNewSubject" type="button">
                    <span class="ti-plus" ></span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign-subject-store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'assign_subject'])); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="assign-subject" id="assign-subject">
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
                                    <input type="hidden" name="section_id" id="class_id" value="<?php echo e(@$section_id); ?>">
                                    <input type="hidden" name="update" value="0">
                                    <div class="col-lg-12 mb-30" id="assign-subject-4">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5 mb-3 mb-lg-0">
                                                <select class="primary_select form-control" name="subjects[]" id="subjects">
                                                    <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?>" value=""><?php echo app('translator')->get('common.select_subjects'); ?></option>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$subject->id); ?>"><?php echo e(@$subject->subject_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-5 mb-3 mb-lg-0">
                                                <select class="primary_select form-control" name="teachers[]">
                                                    <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?>" value=""><?php echo app('translator')->get('common.select_teacher'); ?></option>
                                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$teacher->id); ?>"><?php echo e(@$teacher->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-2 col-12 text-center text-lg-left">
                                                <button class="primary-btn icon-only fix-gr-bg" type="button">
                                                    <span class="ti-trash" id="removeSubject" onclick="deleteSubject(4)"></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg submit">
                                    <span class="ti-save pr-2"></span>
                                    <?php echo app('translator')->get('academics.save'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>


<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/academics/assign_subject_create.blade.php ENDPATH**/ ?>