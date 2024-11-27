    <?php $__env->startSection('title'); ?>
        <?php if(isset($editData)): ?>
            <?php echo app('translator')->get('front_settings.edit_page'); ?>
        <?php else: ?>
            <?php echo app('translator')->get('front_settings.add_page'); ?>
        <?php endif; ?>
        
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/editor/summernote-bs4.css')); ?>">
<style>
    .cust-class{
        font-size: 12px;
    }
</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('front_settings.create_page'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"> <?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('front_settings.create_page'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($editData)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-page-data', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="<?php echo e($editData->id); ?>">
                        <?php else: ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-page-data',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-7">
                                    <div class="main-title">
                                        <h3 class="mb-15">
                                            <?php if(isset($editData)): ?>
                                                <?php echo app('translator')->get('front_settings.edit_page'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('front_settings.add_page'); ?>
                                            <?php endif; ?>
                                         
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-8 col-5">
                                    <div class="row">
                                        <div class="col-lg-12 text-right col-md-12">
                                            <a href="<?php echo e(route('page-list')); ?>" class="primary-btn small fix-gr-bg">
                                                <span class="ti-angle-left pr-2"></span>
                                                <?php echo app('translator')->get('front_settings.back'); ?>
                                            </a>
                                            <?php if(isset($editData)): ?>
                                                <?php if(userPermission("save-page-data")): ?>
                                                    <a href="<?php echo e(route('create-page')); ?>" class="primary-btn small fix-gr-bg">
                                                        <span class="ti-plus pr-2"></span>
                                                        <?php echo app('translator')->get('common.add'); ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.title'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="title" onkeyup="processSlug(this.value, '#slug')" autocomplete="off" value="<?php echo e(isset($editData) ? $editData->title : old('title')); ?>">
                                           
                                            
                                            <?php if($errors->has('title')): ?>
                                            <span class="text-danger" >
                                                <?php echo e(@$errors->first('title')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-20">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.slug'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('slug') ? ' is-invalid' : ''); ?>"
                                                type="text" name="slug" id="slug" autocomplete="off" value="<?php echo e(isset($editData) ? $editData->slug : old('slug')); ?>">
                                            
                                            
                                            <?php if($errors->has('slug')): ?>
                                            <span class="text-danger" >
                                                <?php echo e(@$errors->first('slug')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                          
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"><?php echo e(__('front_settings.image_header_min')); ?></label>
                                                    <div class="primary_file_uploader">
                                                        <input
                                                        class="primary_input_field form-control <?php echo e($errors->has('header_image') ? ' is-invalid' : ''); ?>"
                                                        readonly="true" type="text"
                                                        placeholder="<?php echo e(isset($editData->header_image) && @$editData->header_image != ""? getFilePath3(@$editData->header_image):trans('front_settings.image_header_min')." (1420*450 PX)"); ?>"
                                                        id="placeholderUploadContent">
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg" for="addPageImage"><?php echo e(__('common.browse')); ?></label>
                                                            <input type="file" class="d-none" name="file" id="addPageImage">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(isset($editData)): ?>
                                            <a class="btn btn-primary cust-class pull-right" href="<?php echo e(route('view-page', ['slug'=>@$editData->slug])); ?>" target="blank"><?php echo app('translator')->get('front_settings.preview'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row  mt-20">
                                    <div class="col-lg-12">
                                        <img class="previewImageSize <?php echo e(@$editData->header_image ? '' : 'd-none'); ?>" src="<?php echo e(@$editData->header_image ? asset($editData->header_image) : ''); ?>" alt="" id="pageImageShow" height="100%" width="100%">
                                    </div>
                                </div>
                                <div class="row  mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.sub_title'); ?></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('sub_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="sub_title" autocomplete="off" value="<?php echo e(isset($editData) ? $editData->sub_title : old('sub_title')); ?>">
                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.details'); ?><span class="text-danger"> *</span></label>
                                            <textarea class="primary_input_field summer_note form-control<?php echo e($errors->has('details') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="details" ><?php echo e(isset($editData)? $editData->details: old('details')); ?></textarea>
                                            
                                            
                                            <?php if($errors->has('details')): ?>
                                                <span class="text-danger" ><?php echo e($errors->first('details')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            	<?php
                                  $tooltip = "";
                                  if(userPermission("save-page-data")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                    if(isset($editData)){
                                        if(userPermission("edit-page")){
                                            $tooltip = "";
                                        }else{
                                            $tooltip = "You have no permission to edit";
                                        }
                                    }
                                ?>
                                <div class="row mt-20">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
                                                <?php echo app('translator')->get('front_settings.update_page'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('front_settings.save_page'); ?>
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
        </div>
    </div>
    <div class="modal fade admin-query" id="viewImages">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <?php echo app('translator')->get('front_settings.image_preview'); ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <img src="<?php echo e(asset(@$editData->header_image)); ?>" width="100%" style="float: left">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>

    <script src="<?php echo e(asset('public/backEnd/vendors/editor/summernote-bs4.js')); ?>"></script>
    <script>
        function processSlug(value, slug_id){
            let data = value.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
            $(slug_id).val('');
            $(slug_id).val(data);
            $('#slug').addClass( "has-content" );
        }

        $(document).on('change', '#header_image', function(event){
            getFileName($(this).val(),'#placeholderUploadContent');
        });
    </script>
    <script>
        $(document).on('change', '#addPageImage', function(event) {
            $('#pageImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderUploadContent');
            imageChangeWithFile($(this)[0], '#pageImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/createPage.blade.php ENDPATH**/ ?>