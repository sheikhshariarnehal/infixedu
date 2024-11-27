    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('academics.subject'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.subject'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.subject'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($subject)): ?>
          <?php if(userPermission('subject_store')): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('subject')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
           
            <div class="col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($subject)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'subject_update', 'method' => 'POST'])); ?>

                        <?php else: ?>
                        <?php if(userPermission('subject_store')): ?>
      
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'subject_store', 'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($subject)): ?>
                                        <?php echo app('translator')->get('academics.edit_subject'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('academics.add_subject'); ?>
                                    <?php endif; ?>
                                  
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.subject_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('subject_name') ? ' is-invalid' : ''); ?>" 
                                            type="text" name="subject_name" autocomplete="off" value="<?php echo e(isset($subject)? $subject->subject_name: old('subject_name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($subject)? $subject->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('subject_name')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e(@$errors->first('subject_name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="d-flex radio-btn-flex">
                                            <?php if(isset($subject)): ?>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationFather" value="T" class="common-radio relationButton" <?php echo e(@$subject->subject_type == 'T'? 'checked':''); ?>>
                                                <label for="relationFather"><?php echo app('translator')->get('academics.theory'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationMother" value="P" class="common-radio relationButton" <?php echo e(@$subject->subject_type == 'P'? 'checked':''); ?>>
                                                <label for="relationMother"><?php echo app('translator')->get('academics.practical'); ?></label>
                                            </div>
                                            <?php else: ?>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationFather" value="T" class="common-radio relationButton" checked>
                                                <label for="relationFather"><?php echo app('translator')->get('academics.theory'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="subject_type" id="relationMother" value="P" class="common-radio relationButton">
                                                <label for="relationMother"><?php echo app('translator')->get('academics.practical'); ?></label>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                           
                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.subject_code'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('subject_code') ? ' is-invalid' : ''); ?>" type="text" name="subject_code" autocomplete="off" value="<?php echo e(isset($subject)? $subject->subject_code: old('subject_code')); ?>">
                                            
                                            
                                            <?php if($errors->has('subject_code')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e(@$errors->first('subject_code')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if(@generalSetting()->result_type == 'mark'): ?>
                                    <div class="row  mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.pass_mark'); ?> <span class="text-danger"> *</span></label>
                                                <input class="primary_input_field form-control<?php echo e($errors->has('pass_mark') ? ' is-invalid' : ''); ?>" type="text" name="pass_mark" autocomplete="off" value="<?php echo e(isset($subject)? $subject->pass_mark: old('pass_mark')); ?>">
                                              
                                                
                                                <?php if($errors->has('pass_mark')): ?>
                                                    <span class="text-danger" ><?php echo e(@$errors->first('pass_mark')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                 <?php 
                                  $tooltip = "";
                                  if(userPermission('subject_store')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($subject)): ?>
                                                <?php echo app('translator')->get('academics.update_subject'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('academics.save_subject'); ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('academics.subject_list'); ?></h3>
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
                                            <th> <?php echo app('translator')->get('common.sl'); ?></th>
                                            <th> <?php echo app('translator')->get('academics.subject'); ?></th>
                                            <th> <?php echo app('translator')->get('academics.subject_type'); ?></th>
                                            <th><?php echo app('translator')->get('academics.subject_code'); ?></th>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                <th><?php echo app('translator')->get('academics.pass_mark'); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php $i=0; ?>
                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            <td><?php echo e(@$subject->subject_name); ?></td>
                                            <td><?php echo e(trans('academics.'.($subject->subject_type == 'T'? 'theory':'practical'))); ?> </td>
                                            <td><?php echo e(@$subject->subject_code); ?></td>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                <td><?php echo e(@$subject->pass_mark); ?></td>
                                            <?php endif; ?>
                                            <td>
                                                <?php
                                                    $routeList = [
                                                        userPermission('subject_edit') ?
                                                        '<a class="dropdown-item" href="'.route('subject_edit', [@$subject->id]).'">'.__('common.edit').'</a>':null,
                                                        userPermission('subject_delete') ?
                                                        '<a class="dropdown-item" data-toggle="modal" data-target="#deleteSubjectModal'.$subject->id.'"  href="#">'.__('common.delete').'</a>' : null,
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
                                        <div class="modal fade admin-query" id="deleteSubjectModal<?php echo e(@$subject->id); ?>" >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('academics.delete_subject'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
        
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
        
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <a href="<?php echo e(route('subject_delete', [@$subject->id])); ?>" class="text-light">
                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                             </a>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/academics/subject.blade.php ENDPATH**/ ?>