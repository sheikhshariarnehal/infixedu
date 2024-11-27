<?php if(isset($feesGroups)): ?>
    <?php $__currentLoopData = $feesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$feesGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td>
            <td><?php echo e($feesGroup->name); ?> (<?php echo e($feesGroup->fessGroup->name); ?>)</td>
            <input type="hidden" name="groups[<?php echo e($key); ?>][feesType]" value="<?php echo e($feesGroup->id); ?>">
            <input type="hidden" name="groupId" value="<?php echo e($feesGroup->fessGroup->id); ?>">
            <td>
                <div class="primary_input">
                    <input class="primary_input_field form-control amount<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" min="0" oninput="this.value = Math.abs(this.value)" type="number" name="groups[<?php echo e($key); ?>][amount]" autocomplete="off" value="<?php echo e(old('amount')); ?>">
                    
                    <?php if($errors->has('amount')): ?>
                    <span class="text-danger" >
                        <?php echo e($errors->first('amount')); ?>

                    </span>
                    <?php endif; ?>
                </div>
            </td>
            <td>
                <div class="primary_input">
                    <input class="primary_input_field form-control weaver<?php echo e($errors->has('weaver') ? ' is-invalid' : ''); ?>" min="0" oninput="this.value = Math.abs(this.value)" type="number" name="groups[<?php echo e($key); ?>][weaver]" autocomplete="off" value="<?php echo e(old('weaver')); ?>">
                    
                    <?php if($errors->has('weaver')): ?>
                    <span class="text-danger" >
                        <?php echo e($errors->first('weaver')); ?>

                    </span>
                    <?php endif; ?>
                </div>
            </td>
            <td class="subTotal"></td>
            <input type="hidden" name="groups[<?php echo e($key); ?>][sub_total]" class="inputSubTotal">
            <?php if(!isset($editData)): ?>
                <td>
                    <input class="primary_input_field form-control paidAmount<?php echo e($errors->has('paid_amount') ? ' is-invalid' : ''); ?>" type="number" min="0" oninput="this.value = Math.abs(this.value)" name="groups[<?php echo e($key); ?>][paid_amount]" autocomplete="off" disabled>
                </td>
            <?php endif; ?>
            <td>
                <button class="primary-btn icon-only fix-gr-bg" data-toggle="modal" data-target="#addNotesModal<?php echo e($feesGroup->id); ?>" type="button"
                    data-tooltip="tooltip" data-placement="top" title="<?php echo app('translator')->get('common.add_note'); ?>">
                    <span class="ti-pencil-alt"></span>
                </button>
                <button class="primary-btn icon-only fix-gr-bg" type="button" data-tooltip="tooltip" title="<?php echo app('translator')->get('common.delete'); ?>" id="deleteField">
                    <span class="ti-trash"></span>
                </button>
                
                <div class="modal fade admin-query" id="addNotesModal<?php echo e($feesGroup->id); ?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo app('translator')->get('common.add_note'); ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="primary_input">
                                    <input class="primary_input_field form-control has-content" type="text" name="groups[<?php echo e($key); ?>][note]" autocomplete="off">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?></label>
                                    
                                </div>
                                </br>
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                    <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.save'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" class="fees" value="grp<?php echo e($feesGroup->fessGroup->id); ?>">
                <input type="hidden" class="fees" value="typ<?php echo e($feesGroup->id); ?>">
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($feesType)): ?>
    <tr>
        <td></td>
        <td><?php echo e($feesType->name); ?></td>
        <input type="hidden" name="types[<?php echo e($feesType->id); ?>][feesType]" value="<?php echo e($feesType->id); ?>">
        <td>
            <div class="primary_input">
                <input class="primary_input_field form-control amount<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" min="0" oninput="this.value = Math.abs(this.value)" type="number" name="types[<?php echo e($feesType->id); ?>][amount]" autocomplete="off" value="<?php echo e(old('amount')); ?>">
                
                <?php if($errors->has('amount')): ?>
                <span class="text-danger" >
                    <?php echo e($errors->first('amount')); ?>

                </span>
                <?php endif; ?>
            </div>
        </td>
        <td>
            <div class="primary_input">
                <input class="primary_input_field form-control weaver<?php echo e($errors->has('weaver') ? ' is-invalid' : ''); ?>" min="0" oninput="this.value = Math.abs(this.value)"  type="number" name="types[<?php echo e($feesType->id); ?>][weaver]" autocomplete="off" value="<?php echo e(old('weaver')); ?>">
                
                <?php if($errors->has('weaver')): ?>
                <span class="text-danger" >
                    <?php echo e($errors->first('weaver')); ?>

                </span>
                <?php endif; ?>
            </div>
        </td>
        <td class="subTotal"></td>
        <input type="hidden" name="types[<?php echo e($feesType->id); ?>][sub_total]" class="inputSubTotal">
        <?php if(!isset($editData)): ?>
            <td>
                <input class="primary_input_field form-control paidAmount<?php echo e($errors->has('paid_amount') ? ' is-invalid' : ''); ?>" min="0"  type="number" oninput="this.value = Math.abs(this.value)" name="types[<?php echo e($feesType->id); ?>][paid_amount]" autocomplete="off" disabled>
            </td>
        <?php endif; ?>
        <td>
            <button class="primary-btn icon-only fix-gr-bg" data-toggle="modal" data-target="#addNotesModal<?php echo e($feesType->id); ?>" type="button"
                data-tooltip="tooltip" data-placement="top" title="<?php echo app('translator')->get('common.add_note'); ?>">
                <span class="ti-pencil-alt"></span>
            </button>
            <button class="primary-btn icon-only fix-gr-bg" data-tooltip="tooltip" title="<?php echo app('translator')->get('common.delete'); ?>" type="button" id="deleteField">
                <span class="ti-trash"></span>
            </button>
            
            <div class="modal fade admin-query" id="addNotesModal<?php echo e($feesType->id); ?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo app('translator')->get('common.add_note'); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="primary_input">
                                <input class="primary_input_field form-control has-content" type="text" name="types[<?php echo e($feesType->id); ?>][note]" autocomplete="off">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?></label>
                                
                            </div>
                            </br>
                            <div class="mt-40 d-flex justify-content-between">
                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.save'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="hidden" class="fees" value="typ<?php echo e($feesType->id); ?>">
            <input type="hidden" class="fees" value="grp<?php echo e($feesType->fees_group_id); ?>">
        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\infixedu\Modules/Fees\Resources/views/_allFeesType.blade.php ENDPATH**/ ?>