<?php if(!$pages->isEmpty()): ?>
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
                <div class="table-responsive">
                    <table id="table_id" class="table page-list-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo e(__('common.sl')); ?></th>
                                <th><?php echo e(__('pagebuilder::pagebuilder.name')); ?></th>
                                <th><?php echo e(__('pagebuilder::pagebuilder.url')); ?></th>
                                <th><?php echo e(__('pagebuilder::pagebuilder.status')); ?></th>
                                <th><?php echo e(__('pagebuilder::pagebuilder.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-label=""><span><?php echo e($key + 1); ?></span></td>
                                    <td data-label="<?php echo e(__('pagebuilder::pagebuilder.name')); ?>">
                                        <span><?php echo $page->name; ?></span> <?php if($page->home_page): ?> <span class="badge badge-primary">Home</span> <?php endif; ?> 
                                    </td>
                                    <td data-label="<?php echo e(__('pagebuilder::pagebuilder.url')); ?>">
                                        <span><?php echo e(url(!empty($page->slug) ? $page->slug : '/')); ?></span>
                                    </td>
                                    <td data-label="<?php echo e(__('pagebuilder::pagebuilder.status')); ?>">
                                        <div class="tb-switchbtn">
                                            <input type="checkbox" class="tb-checkactionhome publish_status" id="home_page<?php echo e($page->id); ?>" data-id="<?php echo e($page->id); ?>" <?php echo e($page->status == 'published' ? 'checked' : ''); ?>/>
                                        </div>
                                    </td>
                                    <td data-label="<?php echo e(__('pagebuilder::pagebuilder.actions')); ?>">
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
                                            <a class="dropdown-item" id="page_edit_btn"
                                                data-page-id=<?php echo e($page->id); ?>>
                                                <?php echo app('translator')->get('common.edit'); ?>
                                            </a>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('pagebuilder.build', ['id' => $page->id])); ?>"
                                                target="_blank">
                                                <?php echo app('translator')->get('common.build'); ?>
                                            </a>
                                            <a class="dropdown-item" <?php echo $page->status != 'published' ? 'style="pointer-events: none;"' : ''; ?>

                                                href="<?php echo e(url(!empty($page->slug) ? $page->slug : '/')); ?>"
                                                target="_blank">
                                                <?php echo app('translator')->get('common.view'); ?>
                                            </a>
                                            <a class="dropdown-item deletePage"
                                                data-page-id="<?php echo e($page->id); ?>">
                                                <?php echo app('translator')->get('common.delete'); ?>
                                            </a>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
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
    <?php echo $pages->links('pagebuilder::pagination.pb-pagination'); ?>

<?php else: ?>
    <?php $__env->startComponent('pagebuilder::components.no-record'); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\infixedu\packages\larabuild\pagebuilder\src/../resources/views/components/pages-list.blade.php ENDPATH**/ ?>