<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.generate_certificate'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
        table.dataTable thead .sorting_asc::after {
            left: 38px !important;
        }

        .QA_section .QA_table thead th:first-child{
            padding-left: 30px!important;
        }

        .QA_section .QA_table thead th:first-child::after{
            left: 20px!important;
        }
    </style>
<?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('admin.generate_certificate'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.generate_certificate'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'generate_certificate_search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    [
                                        'hide' => ['USUB', 'UA', 'US', 'USL', 'USEC'],
                                        'required' => ['US'],
                                        'div' => 'col-lg-3',
                                    ]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    [
                                        'hide' => ['USUB', 'UA', 'US', 'USL', 'USEC'],
                                        'required' => ['US'],
                                        'div' => 'col-lg-3',
                                    ]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <div class="col-lg-4 mt-30-md">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?> <span
                                            class="text-danger"> *</span></label>
                                    <select
                                        class="primary_select  form-control <?php echo e(@$errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>*" value="">
                                            <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$class->id); ?>"
                                                <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md" id="select_section_div">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?> <span
                                            class="text-danger"> </span></label>
                                    <select class="primary_select " id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value="">
                                            <?php echo app('translator')->get('common.select_section'); ?></option>
                                    </select>
                                    <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('section')); ?>

                                        </span>
                                    <?php endif; ?>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                            alt="loader">
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-30-md">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.certificate'); ?> <span
                                            class="text-danger"> *</span></label>
                                    <select
                                        class="primary_select  form-control <?php echo e(@$errors->has('certificate') ? ' is-invalid' : ''); ?>"
                                        name="certificate" id="certificate">
                                        <option data-display="<?php echo app('translator')->get('admin.select_certificate'); ?> *" value="">
                                            <?php echo app('translator')->get('admin.select_certificate'); ?> *</option>
                                        <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$certificate->id); ?>"
                                                <?php echo e(isset($certificate_id) ? ($certificate_id == $certificate->id ? 'selected' : '') : (old('certificate') == $certificate->id ? 'selected' : '')); ?>>
                                                <?php echo e(@$certificate->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('certificate')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('certificate')); ?>

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
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>


    <?php if(isset($students)): ?>
        <section class="admin-visitor-area up_admin_visitor">
            <div class="container-fluid p-0">
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-2 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('student.student_list'); ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <a href="javascript:;" id="genearte-certificate-print-button"
                                        class="primary-btn small fix-gr-bg">
                                        <?php echo app('translator')->get('admin.generate'); ?>
                                    </a>
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
                                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="10%">
                                                        <input type="checkbox" id="checkAll"
                                                            class="common-checkbox generate-certificate-print-all"
                                                            name="checkAll"
                                                            value="">
                                                        <label for="checkAll"><?php echo app('translator')->get('admin.all'); ?></label>
                                                    </th>
                                                    <th><?php echo app('translator')->get('admin.admission_no'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.name'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.class_Sec'); ?></th>
                                                    <th><?php echo app('translator')->get('common.father_name'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.date_of_birth'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.gender'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.mobile'); ?></th>
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="student.<?php echo e(@$record->id); ?>"
                                                                class="common-checkbox generate-certificate-print"
                                                                name="student_checked[]" value="<?php echo e(@$record->id); ?>">
                                                            <label for="student.<?php echo e(@$record->id); ?>"></label>
                                                        </td>
                                                        <td><?php echo e(@$record->student->admission_no); ?></td>
                                                        <td><?php echo e(@$record->student->full_name); ?></td>
                                                        <td><?php echo e(@$record->class != '' ? @$record->class->class_name : ''); ?>

                                                            (<?php echo e(@$record->section != '' ? @$record->section->section_name : ''); ?>)
                                                        </td>
    
                                                        <td><?php echo e(@$record->student->parents != '' ? @$record->student->parents->fathers_name : ''); ?>

                                                        </td>
                                                        <td>
    
                                                            <?php echo e(@$record->student->date_of_birth != '' ? dateConvert(@$record->student->date_of_birth) : ''); ?>

    
                                                        </td>
                                                        <td><?php echo e(@$record->student->gender != '' ? @$record->student->gender->base_setup_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e(@$record->student->mobile); ?></td>
    
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
            </div>
        </section>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/admin/generate_certificate.blade.php ENDPATH**/ ?>