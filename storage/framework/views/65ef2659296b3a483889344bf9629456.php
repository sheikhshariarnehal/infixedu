<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('admin.generate_id_card'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .forStudentWrapper{
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1> <?php echo app('translator')->get('admin.generate_id_card'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.generate_id_card'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'generate_id_card_bulk_search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('admin.select_criteria'); ?> </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.role'); ?> <span class="text-danger"> *</span></label>
                                <select class="primary_select" name="role" id="role_id">
                                    <option data-display="<?php echo app('translator')->get('admin.select_role'); ?> *" value=""><?php echo app('translator')->get('admin.select_role'); ?> *</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$role->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                               
                                <?php if($errors->has('role')): ?>
                                <span class="text-danger" >
                                    <?php echo e(@$errors->first('role')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            
                            
                            <div class="col-lg-4 mt-30-md" id="id-card-div">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.id_card'); ?> <span class="text-danger"> *</span></label>
                                <select class="primary_select" id="id_card_list" name="id_card">
                                    <option data-display=" <?php echo app('translator')->get('admin.select_id_card'); ?> *" value=""> <?php echo app('translator')->get('admin.select_id_card'); ?> *</option>
                                  
                                </select>
                                <div class="pull-right loader loader_style" id="select_id_card_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php if($errors->has('id_card')): ?>
                                <span class="text-danger">
                                    <?php echo e(@$errors->first('id_card')); ?>

                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.grid_gap'); ?> (px) <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field" type="number" name="grid_gap" autocomplete="off" value="<?php echo e(old('grid_gap')); ?>">
                                    <?php if($errors->has('grid_gap')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('grid_gap')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="forStudentWrapper col-lg-12 mt-20">
                                <div class="row">
                                    <div class="col-lg-6 mb-30">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.class')); ?> <span class="text-danger"> </span>
                                        </label>
                                        <select
                                            class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                            id="select_class" name="class">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> " value="">
                                                <?php echo app('translator')->get('common.select_class'); ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('studentInfo.student_list'); ?></h3>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <a href="javascript:;" id="genearte-id-card-print-button" class="primary-btn small fix-gr-bg" >
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
                                <table class="table school-table-style" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">
                                                <input type="checkbox" id="checkAll" class="common-checkbox generate-id-card-print-all" name="checkAll" value="">
                                                <label for="checkAll"><?php echo app('translator')->get('admin.all'); ?></label>
                                            </th>
                                            <th><?php echo app('translator')->get('studentInfo.admission_no'); ?></th>
                                            <th><?php echo app('translator')->get('common.name'); ?></th>
                                            <th><?php echo app('translator')->get('admin.class_Sec'); ?></th>
                                            <th><?php echo app('translator')->get('common.father_name'); ?></th>
                                            <th><?php echo app('translator')->get('studentInfo.date_of_birth'); ?></th>
                                            <th><?php echo app('translator')->get('admin.gender'); ?></th>
                                            <th><?php echo app('translator')->get('studentInfo.mobile'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                            <td>
                                                <input type="checkbox" id="student.<?php echo e(@$student->id); ?>" class="common-checkbox generate-id-card-print" name="student_checked[]" value="<?php echo e(@$student->id); ?>">
                                                    <label for="student.<?php echo e(@$student->id); ?>"></label>
                                                </td>
                                            <td>
                                                <?php echo e(@$student->admission_no); ?>

                                            </td>
                                            <td><?php echo e(@$student->full_name); ?></td>
                                            <td><?php echo e(@$student->class !=""?@$student->class->class_name:""); ?> (<?php echo e(@$student->section!=""?@$student->section->section_name:""); ?>)</td>
                                            <td><?php echo e(@$student->parents !=""?@$student->parents->fathers_name:""); ?></td>
                                            <td> 
                                                <?php echo e(@$student->date_of_birth != ""? dateConvert(@$student->date_of_birth):''); ?>

                                            </td>
                                            <td><?php echo e(@$student->gender!=""?@$student->gender->base_setup_name:""); ?></td>
                                            <td><?php echo e(@$student->mobile); ?></td>
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
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function() {
    $("#role_id").on("change", function() {
        var url = $("#url").val();
        var i = 0;

        var formData = {
            role_id: $(this).val(),
          
        };
     
        $.ajax({
            type: "GET",
            data: formData,
            dataType: "json",
            url: url + "/bulkprint/" + "ajaxIdCard",
            beforeSend: function() {
                $('#select_id_card_loader').addClass('pre_loader');
                $('#select_id_card_loader').removeClass('loader');
            },
            success: function(data) {            
                $.each(data, function(i, item) {
                    if (item.length) {
                        $("#id_card_list").find("option").not(":first").remove();
                        $("#id-card-div ul").find("li").not(":first").remove();

                        $.each(item, function(i, idcard) {
                            $("#id_card_list").append(
                                $("<option>", {
                                    value: idcard.id,
                                    text: idcard.title,
                                })
                            );

                            $("#id-card-div ul").append(
                                "<li data-value='" +
                                idcard.id +
                                "' class='option'>" +
                                idcard.title +
                                "</li>"
                            );
                        });
                    } else {
                        $("#id-card-div .current").html("ID Card *");
                        $("#id_card_list").find("option").not(":first").remove();
                        $("#id-card-div ul").find("li").not(":first").remove();
                    }
                });
            },
            error: function(data) {
                console.log("Error:", data);
            },
            complete: function() {
                i--;
                if (i <= 0) {
                    $('#select_id_card_loader').removeClass('pre_loader');
                    $('#select_id_card_loader').addClass('loader');
                }
            }
        });
    });
});
</script>
<script>
    $(document).ready(function() {
        $("body").on("change", "#role_id", function(e) {
            e.preventDefault();
            var role_id = $(this).val();
            if (role_id == "2") {
                $(".forStudentWrapper").slideDown();
            } else {
                $(".forStudentWrapper").slideUp();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/admin/idCard/generate_id_card.blade.php ENDPATH**/ ?>