<div class="container-fluid">
    <div class="text-center">
        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
    </div>
    <div class="mt-40 d-flex justify-content-between">
        <button type="button" class="primary-btn tr-bg"
            data-dismiss="modal">
            <?php echo app('translator')->get('common.cancel'); ?>
        </button>
        <a href="<?php echo e(route('home-slider-delete', [@$homeSlider->id])); ?>"
            class="text-light">
            <button class="primary-btn fix-gr-bg" type="submit">
                <?php echo app('translator')->get('common.delete'); ?>
            </button>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/home_slider/home_slider_delete_modal.blade.php ENDPATH**/ ?>