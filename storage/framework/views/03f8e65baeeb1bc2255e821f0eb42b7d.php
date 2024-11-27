<?php if (! $__env->hasRenderedOnce('d5f7590d-b03f-4ddc-a0e5-cd2d1e501669')): $__env->markAsRenderedOnce('d5f7590d-b03f-4ddc-a0e5-cd2d1e501669');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        iframe {
            width: 100% !important;
            height: 100% !important;
        }
        .google_map{
            height: 200px;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<div class="contacts_info mt-5">
    <p><?php echo pagesetting('google_map_editor'); ?></p>
    <div class="google_map w-100">
        <?php echo pagesetting('google_map_key'); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\infixedu\resources\views/themes/edulia/pagebuilder/google-map/view.blade.php ENDPATH**/ ?>