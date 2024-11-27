<section class="pb-themesection griddable <?php echo e(getClasses()); ?>" data-grid-name="<?php echo e($grid); ?>" data-cols=<?php echo json_encode($columns); ?>>
    <div <?php echo getContainerStyles(); ?>>
        <div class="row pb-tooltip">
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="<?php echo e($item); ?> droppable nested-sortable">
                <div class="pb-addsection pb-addsection-wrap removeable">
                    <div class="pb-addsection-info">
                        <svg class="pb-svg-border">
                            <rect width="100%" height="100%"></rect>
                        </svg>
                        <a href="javascript:;" class="iconPlus">
                            <i class="icon-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->startComponent('pagebuilder::components.grid-actions',['class'=>'','template_id'=>null,'id'=>'','droppable'=>false]); ?> <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\infixedu\packages\larabuild\pagebuilder\src/../resources/views/components/add-grid-placeholder.blade.php ENDPATH**/ ?>