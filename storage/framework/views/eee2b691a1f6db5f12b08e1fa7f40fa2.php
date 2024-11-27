<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('academics.optional_subject'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.optional_subject'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.optional_subject'); ?></a>
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
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign_optional_subject_search', 'method' => 'GET', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                          
                            <?php echo $__env->make('backEnd.common.search_criteria', [
                                'div'=>'col-lg-4',
                                'subject'=>true,
                                'visiable'=>['class', 'section', 'subject'], 
                                'required'=>['class', 'section', 'subject'], 
                                
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
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
 <?php if(isset($students)): ?>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row mt-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('academics.assign_optional_subject'); ?> - (<?php echo e(@$subject_info->subject_name); ?>)  </h3>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                         
                    </div>
                </div>
                <style>
                .all_check{
                    background: var(--primary-color);
                    color: #ffffff;
                    background-size: 200% auto;
                }
                </style>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="white-box"> 
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign-optional-subject-store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'formid'])); ?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="assign-subject" id="assign-subject">
                                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                            <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
                                            <input type="hidden" name="section_id" id="class_id" value="<?php echo e(@$section_id); ?>">
                                            <input type="hidden" name="subject_id" id="" value="<?php echo e(@$subject_id); ?>">
                                            <input type="hidden" name="update" value="1"> 
                                            <div class="table-responsive">
                                            
                                            <table id="" class="table" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><span class="all_check btn btn-sm fix-gr-bg" id="all_check" tyle="width: 143.715px; height: 143.715px; top: -48.611px; left: -26.5173px;" > Select All </span> </th> 
                                                        <th class="nowrap p-2" ><?php echo app('translator')->get('student.admission_no'); ?>.</th>
                                                        <th class="nowrap p-2"><?php echo app('translator')->get('student.name'); ?></th>
                                                        <th class="nowrap p-2"><?php echo app('translator')->get('academics.optional_subject'); ?></th>   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count=1; ?>
                                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php 
                                                        $subjects =  $student->studentDetail->subjectAssign->subject ?? null;
                                                    ?> 
                                                    <tr>
                                                        <td>  
                                                            <div class="col-lg-12"> 
                                                                <div class="primary_input">
                                                                    <input type="checkbox" id="optional_subject_<?php echo e(@$count); ?>" class="common-checkbox optional_subject fix-gr-bg small" name="student_id[]" <?php echo e((@$subjects->subject_name == @$subject_info->subject_name? 'checked': '' )); ?> value="<?php echo e(@$student->id); ?>">
                                                                    <label for="optional_subject_<?php echo e(@$count); ?>"> <?php echo e(@$count++); ?> </label>
                                                                </div> 
                                                            </div> 
                                                        </td> 
                                                        <td><?php echo e(@$student->studentDetail->admission_no); ?></td>
                                                        <td class="nowrap"><?php echo e(@$student->studentDetail->full_name); ?></td> 
                                                        <td>
                                                            <span class="" style="border-bottom: 2px dashed #ddd !important;"><?php echo e(@$subject_info->subject_name); ?></span>
                                                        </td>   
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table> 
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(userPermission('assign-subject-store')): ?>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn small fix-gr-bg">
                                            <span class="ti-save pr-2"></span>
                                            <?php echo app('translator')->get('academics.assign_subject'); ?>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<script language="JavaScript">
function checkAll() {
    console.log("clicked");
        
        $('input:checkbox').prop('checked', this.checked);
} 


</script>
 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/academics/assign_optional_subject.blade.php ENDPATH**/ ?>