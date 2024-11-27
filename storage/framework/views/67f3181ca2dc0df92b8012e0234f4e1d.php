<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('academics.assign_class_teacher'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .primary-btn.fix-gr-bg.submit{
        font-size: 11px;
        padding: 0 16px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.assign_class_teacher'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.assign_class_teacher'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($assign_class_teacher)): ?>
          <?php if(userPermission("assign-class-teacher-store")): ?> 
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('assign-class-teacher')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('academics.assign'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
             <div class="col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($assign_class_teacher)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => array('assign-class-teacher-update',@$assign_class_teacher->id), 'method' => 'PUT'])); ?>

                        <?php else: ?>
                         <?php if(userPermission("assign-class-teacher-store")): ?> 
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'assign-class-teacher-store', 'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($assign_class_teacher)): ?>
                                        <?php echo app('translator')->get('academics.edit_assign_class_teacher'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('academics.assign_class_teacher'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.class')); ?>

                                                <span class="text-danger"> *</span>
                                        </label>
                                        <select class="primary_select form-control <?php echo e(@$errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php if(isset($assign_class_teacher)): ?> 
                                            <option value="<?php echo e(@$class->id); ?>" <?php echo e(@$class->id == @$assign_class_teacher->class_id? 'selected':''); ?>><?php echo e(@$class->class_name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e(@$class->id); ?>"><?php echo e(@$class->class_name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('class')); ?>

                                        </span>
                                        <?php endif; ?>

                                        
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo e(isset($assign_class_teacher)? $assign_class_teacher->id: ''); ?>">

                                <div class="row  mt-15">
                                    <div class="col-lg-12" id="select_section_div">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select class="primary_select form-control<?php echo e(@$errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?> *</option>
                                        <?php if(isset($assign_class_teacher)): ?>
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$section->id); ?>" <?php echo e(@$section->id == @$assign_class_teacher->section_id? 'selected':''); ?>><?php echo e(@$section->section_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.teacher'); ?> <span class="text-danger"> *</span></label>
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($assign_class_teacher)): ?>
                                        <div class="">
                                            <input type="radio" id="tecaher<?php echo e(@$teacher->id); ?>" class="common-checkbox" name="teacher" value="<?php echo e(@$teacher->id); ?>" <?php echo e(in_array($teacher->id, $teacherId)? 'checked':''); ?>>
                                            <label for="tecaher<?php echo e(@$teacher->id); ?>"><?php echo e(@$teacher->full_name); ?></label>
                                        </div>
                                        <?php else: ?>
                                        <div class="">
                                            <input type="radio" id="tecaher<?php echo e(@$teacher->id); ?>" class="common-checkbox" name="teacher" value="<?php echo e(@$teacher->id); ?>">
                                            <label for="tecaher<?php echo e(@$teacher->id); ?>"><?php echo e(@$teacher->full_name); ?></label>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($errors->has('teacher')): ?>
                                            <span class="text-danger" role="alert">
                                                <?php echo e(@$errors->first('teacher')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php 
                                  $tooltip = "";
                                  if(userPermission("assign-class-teacher-store")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($assign_class_teacher)): ?>
                                                <?php echo app('translator')->get('academics.update_class_teacher'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('academics.save_class_teacher'); ?>
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

            <div class="col-lg-8 col-xl-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('academics.class_teacher_list'); ?></h3>
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
                                <table id="table_id" class="table Crm_table_active3" cellspacing="0" width="100%">
    
                                    <thead>
                                      
                                        <tr>
                                            <th><?php echo app('translator')->get('common.class'); ?></th>
                                            <th><?php echo app('translator')->get('common.section'); ?></th>
                                            <th><?php echo app('translator')->get('common.teacher'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $assign_class_teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_class_teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td valign="top"><?php echo e(@$assign_class_teacher->class !=""? @$assign_class_teacher->class->class_name:""); ?></td>
                                            <td valign="top"><?php echo e(@$assign_class_teacher->section != ""? @$assign_class_teacher->section->section_name:""); ?></td>
                                            <td valign="top">
                                                
                                                    <?php
                                                      @$classTeachers = @$assign_class_teacher->classTeachers;
                                                    ?>
                                                    <?php if($classTeachers !=""): ?>
                                                            <?php $__currentLoopData = $classTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php 
                                                                    @$teacher = @$classTeacher->teacher;
                                                                ?>
                                                                    <?php echo e(@$teacher->full_name); ?>

                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                            </td>
                                            
                                            <td valign="top">
                                                
                                                <?php
                                                $routeList = [
                                                    userPermission('assign-class-teacher-edit') ?
                                                    '<a class="dropdown-item" href="'.route('assign-class-teacher-edit', [$assign_class_teacher->id]).'">'.__('common.edit').'</a>':null,
                                                    userPermission('assign-class-teacher-delete') ?
                                                    '<a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal'.$assign_class_teacher->id.'"  href="#">'.__('common.delete').'</a>' : null,
                                                ]
                                            ?>
                                             <?php if (isset($component)) { $__componentOriginal13b64aae043a41ed039098cb8f7bff7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13b64aae043a41ed039098cb8f7bff7d = $attributes; } ?>
<?php $component = App\View\Components\DropDownActionComponent::resolve(['routeList' => $routeList] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down-action-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDownActionComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13b64aae043a41ed039098cb8f7bff7d)): ?>
<?php $attributes = $__attributesOriginal13b64aae043a41ed039098cb8f7bff7d; ?>
<?php unset($__attributesOriginal13b64aae043a41ed039098cb8f7bff7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13b64aae043a41ed039098cb8f7bff7d)): ?>
<?php $component = $__componentOriginal13b64aae043a41ed039098cb8f7bff7d; ?>
<?php unset($__componentOriginal13b64aae043a41ed039098cb8f7bff7d); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteClassModal<?php echo e(@$assign_class_teacher->id); ?>" >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('academics.delete_assign_teacher'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
        
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
        
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <?php echo e(Form::open(['route' => array('assign-class-teacher-delete',@$assign_class_teacher->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                             <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/academics/assign_class_teacher.blade.php ENDPATH**/ ?>