    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('fees.fees_forward'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php  $setting = generalSetting(); 
if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }
else{ $currency = '$'; } 
?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.fees_forward'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees_forward'); ?></a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees-forward-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_studentA'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
                                    <?php if ($__env->exists(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL','USEC']]
                                    )) echo $__env->make(
                                        'university::common.session_faculty_depart_academic_semester_level',
                                        ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USL','USEC']]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mt-30-md" id="select_section_div">
                                    <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                    </select>
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
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
        <?php if(isset($students)): ?>
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'route' => 'fees-forward-store', 'enctype' => 'multipart/form-data'])); ?>

                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('fees.previous_Session_Balance_Fees'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="update" value="<?php echo e(isset($update)? 1 : ''); ?>">
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
                                                <?php if(isset($update)): ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="alert">
                                                            <h4 class="mb-0"> <?php echo app('translator')->get('fees.previous_balance_can_only_update_now.'); ?> </h4>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                    <tr>
                                                        <th width="15%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('student.roll_no'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('student.father_name'); ?></th>
                                                        <th width="15%"><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                        <th width="25%"><?php echo app('translator')->get('fees.short_note'); ?></th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($student->studentDetail->full_name); ?> <input type="hidden" name="id[]" value="<?php echo e(isset($update)? @$student->studentDetail->forwardBalance->id: $student->student_id); ?>"></td>
                                                        <td><?php echo e($student->studentDetail->admission_no); ?></td>
                                                        <td><?php echo e($student->studentDetail->roll_no); ?></td>
                    
                                                        <td><?php echo e($student->studentDetail->parents !=""?$student->studentDetail->parents->fathers_name:""); ?></td>
                                                        <td>
                                                            <div class="primary_input">
                                                                <input oninput="numberCheckWithDot(this)" type="text" class="primary_input_field form-control" cols="0" rows="1" name="balance[<?php echo e(isset($update)? @$student->studentDetail->forwardBalance->id:@$student->student_id); ?>]" maxlength="8" value="<?php echo e(isset($update)?
                                                                @$student->studentDetail->forwardBalance->balance: ''); ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary_input">
                                                                <input type="text" class="primary_input_field form-control" cols="0" rows="1" name="notes[<?php echo e(isset($update)? @$student->studentDetail->forwardBalance->id:$student->student_id); ?>]" value="<?php echo e(isset($update)?
                                                                @$student->studentDetail->forwardBalance->notes: 'Fees Carry Forward'); ?>">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="text-center">
                                                        <button type="submit" class="primary-btn fix-gr-bg mb-0 submit">
                                                            <span class="ti-save pr"></span>
                                                                <?php echo app('translator')->get('common.save'); ?>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
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
            <?php echo e(Form::close()); ?>

        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/feesCollection/fees_forward.blade.php ENDPATH**/ ?>