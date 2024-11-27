<form class="tb-themeform" id="page_form">
    <div class="white-box">
        <div class="main-title">
            <h3 class="mb-15">
                <?php echo e($edit ? __('pagebuilder::pagebuilder.update_page') : __('pagebuilder::pagebuilder.add_page')); ?>

            </h3>
        </div>
        <div class="add-visitor">
            <?php echo csrf_field(); ?>
            <fieldset>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo e(__('pagebuilder::pagebuilder.page_name')); ?> <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="primary_input_field form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> tk-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="name"
                                value="<?php echo e($page->name ?? null); ?>" id="name"
                                placeholder="<?php echo e(__('pagebuilder::pagebuilder.page_name')); ?> *">
                            <?php if($edit): ?>
                                <input type="hidden" name="id" id="id" value="<?php echo e($page->id ?? null); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo e(__('pagebuilder::pagebuilder.page_title')); ?> <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="primary_input_field form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> tk-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="title"
                                id="title" value="<?php echo e($page->title ?? null); ?>"
                                placeholder="<?php echo e(__('pagebuilder::pagebuilder.page_title')); ?> *">
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <label
                                class="primary_input_label"><?php echo e(__('pagebuilder::pagebuilder.page_description')); ?></label>
                            <textarea class="primary_input_field form-control" name="description" id="description"
                                placeholder="<?php echo e(__('pagebuilder::pagebuilder.page_description')); ?>"><?php echo e($page->description ?? null); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo e(__('pagebuilder::pagebuilder.page_slug')); ?> <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="primary_input_field form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> tk-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="slug"
                                id="slug" value="<?php echo e($page->slug ?? null); ?>"
                                placeholder="<?php echo e(__('pagebuilder::pagebuilder.page_slug')); ?> *">
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-lg-12">
                        <div class="primary_input d-flex justify-content-between">
                            <label class="primary_input_label"><?php echo e(__('pagebuilder::pagebuilder.make_home_page')); ?></label>
                            <div class="tb-switchbtn">
                                <label for="home_page" id="tb-texthome" class="primary_input_label">
                                    <?php echo e(($page->home_page ?? null) == 1
                                        ? __('pagebuilder::pagebuilder.yes')
                                        : __('pagebuilder::pagebuilder.no')); ?>

                                </label>
                                <input type="checkbox" class="tb-checkactionhome" name="home_page" id="home_page"
                                    <?php echo e(($page->home_page ?? null) == 1 ? 'checked' : ''); ?> />
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($edit): ?>
                    <div class="row mt-20">
                        <div class="col-lg-12">
                            <div class="primary_input d-flex justify-content-between">
                                <label class="primary_input_label"><?php echo e(__('pagebuilder::pagebuilder.status')); ?>:</label>
                                <div class="tb-switchbtn">
                                    <label for="tb-pagestatus" id="tb-textdes" class="primary_input_label">
                                        <?php echo e(($page->status ?? null) == 'published'
                                            ? __('pagebuilder::pagebuilder.active')
                                            : __('pagebuilder::pagebuilder.deactive')); ?>

                                    </label>
                                    <input type="checkbox" class="tb-checkaction" name="status" id="status"
                                        <?php echo e(($page->status ?? null) == 'published' ? 'checked' : ''); ?> />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row mt-40">
                    <div class="col-lg-12 text-center">
                        <button class="primary-btn fix-gr-bg" type="submit"
                            id="form_submit_btn"><?php echo e($edit ? __('pagebuilder::pagebuilder.update_page') : __('pagebuilder::pagebuilder.add_page')); ?></button>

                        <?php if($edit): ?>
                            <button class="primary-btn fix-gr-bg goBack" type="button"
                                id="form_submit_btn"><?php echo e(__('pagebuilder::pagebuilder.back')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\infixedu\packages\larabuild\pagebuilder\src/../resources/views/components/update-page.blade.php ENDPATH**/ ?>