
<style>
    /* for toastr dynamic start*/
    .toast-success {
        background-color: !important;
    }

    .toast-message {
        color: ;
    }

    .toast-title {
        color: ;

    }

    .toast {
        color: ;
    }

    .toast-error {
        background-color: !important;
    }

    .toast-warning {
        background-color: !important;
    }
</style>
<style>
:root {
    <?php
        $cyan_one = '#06b6d4';
        $cyan_two = '#22d3ee';
        $cyan_one_hover = '#06b6d4';
        $cyan_two_hover = '#22d3ee';
        $violet_one = '#8b5cf6';
        $violet_one_hover = '#8b5cf6';
        $violet_two = '#a78bfa';
        $violet_two_hover = '#a78bfa';
        $blue_one = '#3b82f6';
        $blue_one_hover = '#3b82f6';
        $blue_two = '#60a5fa';
        $blue_two_hover = '#60a5fa';
        $fuchsia_one = '#d946ef';
        $fuchsia_one_hover = '#d946ef';
        $fuchsia_two = '#e879f9';
        $fuchsia_two_hover = '#e879f9';
    ?>

    --base_font : <?php echo e(in_array(session()->get('locale', Config::get('app.locale')), ['ar']) ? 'Cairo,' : ''); ?>Poppins, sans-serif;
    --box_shadow : <?php echo e($color_theme->box_shadow ? 'var(--box_shadow)' : 'none'); ?>;
    
    <?php $__currentLoopData = $color_theme->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        --<?php echo e($color->name); ?>: <?php echo e($color->pivot->value); ?>;
        
        <?php if(in_array($color->name, ['success', 'danger'])): ?>
            --<?php echo e($color->name); ?>_with_opacity: <?php echo e($color->pivot->value); ?>23;
        <?php endif; ?>

        <?php if($color->name           == 'card-gradient-cyan_one'): ?>
            <?php $cyan_one          = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-cyan_two'): ?>
            <?php $cyan_two          = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-cyan_one_hover'): ?>
            <?php $cyan_one_hover    = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-cyan_two_hover'): ?>
            <?php $cyan_two_hover    = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-violet_one'): ?>
            <?php $violet_one        = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-violet_one_hover'): ?>
            <?php $violet_one_hover  = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-violet_two'): ?>
            <?php $violet_two        = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-violet_two_hover'): ?>
            <?php $violet_two_hover  = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-blue_one'): ?>
            <?php $blue_one          = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-blue_one_hover'): ?>
            <?php $blue_one_hover    = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-blue_two'): ?>
            <?php $blue_two          = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-blue_two_hover'): ?>
            <?php $blue_two_hover    = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-fuchsia_one'): ?>
            <?php $fuchsia_one       = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-fuchsia_one_hover'): ?>
            <?php $fuchsia_one_hover = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-fuchsia_two'): ?>
            <?php $fuchsia_two       = $color->pivot->value; ?>
        <?php elseif($color->name       == 'card-gradient-fuchsia_two_hover'): ?>
            <?php $fuchsia_two_hover = $color->pivot->value; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    --card-gradient-cyan: linear-gradient(to right, <?php echo e($cyan_one); ?>, <?php echo e($cyan_two); ?>);
    --card-gradient-cyan-hover: linear-gradient(to right, <?php echo e($cyan_one_hover); ?>, <?php echo e($cyan_two_hover); ?>);
    --card-gradient-violet: linear-gradient(to right, <?php echo e($violet_one); ?>, <?php echo e($violet_two); ?>);
    --card-gradient-violet-hover: linear-gradient(to right, <?php echo e($violet_one_hover); ?>, <?php echo e($violet_two_hover); ?>);
    --card-gradient-blue: linear-gradient(to right, <?php echo e($blue_one); ?>, <?php echo e($blue_two); ?>);
    --card-gradient-blue-hover: linear-gradient(to right, <?php echo e($blue_one_hover); ?>, <?php echo e($blue_two_hover); ?>);
    --card-gradient-fuchsia: linear-gradient(to right, <?php echo e($fuchsia_one); ?>, <?php echo e($fuchsia_two); ?>);
    --card-gradient-fuchsia-hover: linear-gradient(to right, <?php echo e($fuchsia_one_hover); ?>, <?php echo e($fuchsia_two_hover); ?>);
}
        
</style><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/components/root-css.blade.php ENDPATH**/ ?>