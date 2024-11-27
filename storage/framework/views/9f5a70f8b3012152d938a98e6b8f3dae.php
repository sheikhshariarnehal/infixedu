<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('fees.fees_type'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees.fees_type'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees'); ?></a>
                <?php if(isset($feesType)): ?>
                    <a href="#"><?php echo app('translator')->get('fees.edit_fees_type'); ?></a>
                <?php else: ?>
                    <a href="#"><?php echo app('translator')->get('fees.fees_type'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($feesType)): ?>
            <?php if(userPermission('fees.fees-type-store')): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('fees.fees-type')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('common.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($feesType)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal','route' => 'fees.fees-type-update', 'method' => 'POST'])); ?>

                            <input type="hidden" name="id" value="<?php echo e(isset($feesType)? $feesType->id: ''); ?>">
                        <?php else: ?>
                            <?php if(userPermission('fees.fees-type-store')): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'fees.fees-type-store', 'method' => 'POST'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($feesType)): ?>
                                        <?php echo app('translator')->get('fees.edit_fees_type'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('fees.add_fees_type'); ?>
                                    <?php endif; ?>
                                     
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" name="name" autocomplete="off" value="<?php echo e(isset($feesType)? $feesType->name: old('name')); ?>">
                                            
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('fees.fees_group')); ?>

                                                <span class="text-danger"> *</span>
                                        </label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('fees_group') ||  session()->has('message-exist')? ' is-invalid' : ''); ?>" name="fees_group" id="fees_group" <?php echo e(isset($fees_master)? 'disabled': ''); ?>>
                                            <option data-display="<?php echo app('translator')->get('fees.fees_group'); ?>" value=""><?php echo app('translator')->get('fees.fees_group'); ?></option>
                                            <?php $__currentLoopData = $feesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($feesType)): ?>
                                                    <option value="<?php echo e($feesGroup->id); ?>"<?php echo e($feesGroup->id == $feesType->fees_group_id? 'selected':''); ?>><?php echo e($feesGroup->name); ?> </option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($feesGroup->id); ?>"  <?php echo e(old('fees_group')!=''? (old('fees_group') == $feesGroup->id? 'selected':''):''); ?> ><?php echo e($feesGroup->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if(session()->has('message-exist')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <strong><?php echo e(session()->get('message-exist')); ?>

                                        </span>
                                        <?php endif; ?>
                                        <?php if($errors->has('fees_group')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('fees_group')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4"
                                                name="description"><?php echo e(isset($feesType)? $feesType->description: old('description')); ?></textarea>
                                                
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $tooltip = "";
                                if(userPermission("fees.fees-type-store")){
                                      $tooltip = "";
                                  }elseif(isset($feesType) && userPermission('fees.fees-type-edit')){
                                    $tooltip = "";
                                  }else{
                                      $tooltip = "You have no permission to add";
                                  }
                            ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                         <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                         title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check">
                                            </span>
                                            <?php if(userPermission('fees.fees-type-edit') && userPermission('fees.fees-type-store')): ?>
                                                <?php if(isset($feesType)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.save'); ?>
                                                <?php endif; ?>
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

            <div class="col-lg-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"> <?php echo app('translator')->get('fees.fees_type_list'); ?></h3>
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
                                <table id="table_id" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th> <?php echo app('translator')->get('common.name'); ?></th>
                                            <th> <?php echo app('translator')->get('fees.fees_group'); ?></th>
                                            <th> <?php echo app('translator')->get('common.description'); ?></th>
                                            <th> <?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $feesTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($feesType->name); ?></td>
                                            <td><?php echo e(@$feesType->fessGroup->name); ?></td>
                                            <td><?php echo e(@$feesType->description); ?></td>
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                        <?php if(userPermission('fees.fees-type-edit')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('fees.fees-type-edit', [$feesType->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission("fees.fees-type-delete")): ?>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteFeesTypeModal<?php echo e($feesType->id); ?>" href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                        <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
    
                                        <div class="modal fade admin-query" id="deleteFeesTypeModal<?php echo e($feesType->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('fees.delete_fees_type'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <?php echo e(Form::open(['route' => 'fees.fees-type-delete', 'method' => 'POST',])); ?>

                                                                <input type="hidden" name="id" value="<?php echo e($feesType->id); ?>">
                                                                <button class="primary-btn fix-gr-bg" type="submit"> <?php echo app('translator')->get('common.delete'); ?></button>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\Modules/Fees\Resources/views/feesType.blade.php ENDPATH**/ ?>