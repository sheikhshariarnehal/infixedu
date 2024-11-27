<?php if (! $__env->hasRenderedOnce('ae93527a-d652-48d0-b54e-20a27ed0cd77')): $__env->markAsRenderedOnce('ae93527a-d652-48d0-b54e-20a27ed0cd77');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/packages/zeynep/zeynep.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/themify/themify-icons.min.css')); ?>">
<?php $__env->stopPush(); endif; ?>
<?php
    $generalSetting = generalSetting();
    $is_registration_permission = false;
    if (moduleStatusCheck('ParentRegistration')) {
        $reg_setting = Modules\ParentRegistration\Entities\SmRegistrationSetting::where('school_id', $generalSetting->school_id)->first();
        $is_registration_position = $reg_setting ? $reg_setting->position : null;
        $is_registration_permission = $reg_setting ? $reg_setting->registration_permission == 1 : false;
    }
?>
<header class="heading">
    <div class="heading_sub">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <nav class="heading_sub_left">
                        <ul>
                            <?php if(!empty(pagesetting('header-left-menus'))): ?>
                                <?php $__currentLoopData = pagesetting('header-left-menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rightMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(gv($rightMenu, 'header-left-menu-icon-url')); ?>">
                                            <i class="<?php echo e(gv($rightMenu, 'header-left-menu-icon-class')); ?>"></i>
                                            <?php echo e(gv($rightMenu, 'header-left-menu-label')); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="text-end">
                    <nav class="heading_sub_right">
                        <ul class='social-links'>
                            <?php if(!empty(pagesetting('header-right-menus'))): ?>
                                <?php $__currentLoopData = pagesetting('header-right-menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class='social-links-list'>
                                        <a href="<?php echo e(gv($icon, 'header-right-icon-url')); ?>" target='_blank' class='social-links-list-link'>
                                            <i class="<?php echo e(gv($icon, 'header-right-icon-class')); ?>"></i>
                                            <?php echo e(gv($icon, 'header-right-menu-label')); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>

                        <ul>
                            <li>
                                <?php if(!auth()->check()): ?>
                                    <a href="<?php echo e(url('/login')); ?>">
                                        <i class="far fa-user"></i>
                                        <span><?php echo e(__('edulia.login')); ?></span>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/admin-dashboard')); ?>">
                                        <i class="far fa-user"></i>
                                        <span><?php echo e(__('edulia.dashboard')); ?></span>
                                    </a>
                                <?php endif; ?>
                            </li>

                            <?php if(moduleStatusCheck('ParentRegistration') && $is_registration_permission == 1): ?> 
                                <?php if(pagesetting('header-parent-registration-is-show-menu') == 1): ?>
                                    <li>
                                        <a href="<?php echo e(route('parentregistration/registration', $reg_setting->url)); ?>" target="<?php echo e(pagesetting('header-parent-registration-redirect-menu') == '1' ? '_self' : '_blank'); ?>">
                                            <i class="<?php echo e(pagesetting('header-right-parent-registration-menu-icon-class')); ?>"></i>
                                            <?php echo e(pagesetting('header-parent-registration-menu-label')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        
                            <?php if(moduleStatusCheck('Saas') && session('domain') == 'school'): ?>
                                <?php if(pagesetting('header-school-is-show-menu') == 1): ?>
                                    <li>
                                        <a href="<?php echo e(route('institution-register-new')); ?>" target="<?php echo e(pagesetting('header-school-redirect-menu') == '1' ? '_self' : '_blank'); ?>">
                                            <i class="<?php echo e(pagesetting('header-school-menu-icon-class')); ?>"></i>
                                            <?php echo e(pagesetting('header-school-menu-label')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div class="heading_mobile">
        <div>
            <div class="heading_mobile_thum"><i class="far fa-bars"></i></div>
        </div>
        <div class='text-center'>
            <a href='<?php echo e(url('/')); ?>' class="heading_logo">
                <img src="<?php echo e(pagesetting('header_menu_image') ? pagesetting('header_menu_image')[0]['thumbnail'] : defaultLogo($generalSetting->logo)); ?>" alt="">
            </a>
        </div>
        <form action="#" class='heading_main_search m_s'>
            <div class="input-control">
                <label for="search" class="input-control-icon"><i class="far fa-search"></i></label>
                <input type="search" name='search' id='search' class="input-control-input"
                    placeholder='Search for course, skills and Videos' required>
            </div>
        </form>
    </div>

    <div class="heading_main">
        <div class="container">
            <div class="row">
                <div class="col-md-2 my-auto">
                    <a href="<?php echo e(url('/')); ?>" class="heading_main_logo mobile-menu-left">
                        <img src="<?php echo e(pagesetting('header_menu_image') ? pagesetting('header_menu_image')[0]['thumbnail'] : defaultLogo($generalSetting->logo)); ?>" alt="">
                    </a>
                </div>
                <div class="col-md-7">
                    <?php if (isset($component)) { $__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a = $attributes; } ?>
<?php $component = App\View\Components\HeaderContentMenu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-content-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HeaderContentMenu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a)): ?>
<?php $attributes = $__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a; ?>
<?php unset($__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a)): ?>
<?php $component = $__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a; ?>
<?php unset($__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a); ?>
<?php endif; ?>
                </div>
                <?php if(!empty(pagesetting('header_menu_search')) && pagesetting('header_menu_search') == 1): ?>
                    <div class="col-md-3 text-end mobile-none">
                        <form action='#' methods='GET' class="heading_main_search">
                            <div class="input-control">
                                <input type="search" class="input-control-input" placeholder='<?php echo e(pagesetting('header_menu_search_placeholder')); ?>' required>
                                <button type='submit' class="input-control-icon"><i class="far fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<div class="clear_head"></div>


<!-- mobile menu -->
<div class="heading_mobile_menu zeynep">
    <?php if (isset($component)) { $__componentOriginal0d898a5792386818de89a20070606c42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d898a5792386818de89a20070606c42 = $attributes; } ?>
<?php $component = App\View\Components\HeaderContentMobileMenu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-content-mobile-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HeaderContentMobileMenu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d898a5792386818de89a20070606c42)): ?>
<?php $attributes = $__attributesOriginal0d898a5792386818de89a20070606c42; ?>
<?php unset($__attributesOriginal0d898a5792386818de89a20070606c42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d898a5792386818de89a20070606c42)): ?>
<?php $component = $__componentOriginal0d898a5792386818de89a20070606c42; ?>
<?php unset($__componentOriginal0d898a5792386818de89a20070606c42); ?>
<?php endif; ?>
</div>
<!-- mobile menu -->


<?php if (! $__env->hasRenderedOnce('3f76aedb-fb68-4ad5-ab98-b4d60fe9203e')): $__env->markAsRenderedOnce('3f76aedb-fb68-4ad5-ab98-b4d60fe9203e');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/'.activeTheme().'/packages/zeynep/zeynep.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            // MOBILE MENU ACTIVE JS
            var zeynep = $('.zeynep').zeynep({})
            $('.heading_mobile_thum').on('click', function() {
                zeynep.open()
                $('.bg-shade').fadeIn();
            })
            $('.bg-shade').on('click', function() {
                zeynep.close()
                $('.bg-shade').fadeOut();
            })

            $('[data-mobile-search]').on('click', function(e) {
                e.stopPropagation();
                $('.m_s').fadeToggle('fast')
            });
            $(document).on('click', function(e) {
                if (!$(e.target).is('.m_s *')) {
                    $('.m_s').fadeOut('fast')
                }
            })
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/themes/edulia/pagebuilder/header-content/view.blade.php ENDPATH**/ ?>