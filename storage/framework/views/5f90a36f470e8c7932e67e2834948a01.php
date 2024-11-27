<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.photo_gallery'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.photo_gallery'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="<?php echo e(route('photo-gallery')); ?>"><?php echo app('translator')->get('front_settings.photo_gallery'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="row row-gap-24">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_photo_gallery)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'photo-gallery-update',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ])); ?>

                            <input type="hidden" value="<?php echo e(@$add_photo_gallery->id); ?>" name="id">
                        <?php else: ?>
                            <?php if(userPermission('photo-gallery-store')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'photo-gallery-store',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($add_photo_gallery)): ?>
                                        <?php echo app('translator')->get('front_settings.edit_photo_gallery'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.photo_gallery'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.name'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off"
                                                value="<?php echo e(isset($add_photo_gallery) ? @$add_photo_gallery->name : old('name')); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.description'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0"
                                                rows="4" name="description" id="address"><?php echo e(isset($add_photo_gallery) ? @$add_photo_gallery->description : old('description')); ?></textarea>
                                            <?php if($errors->has('description')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('description')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.feature_image'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('feature_image') ? ' is-invalid' : ''); ?>"
                                                    type="text" id="placeholderFileOneName" name="feature_image"
                                                    placeholder="<?php echo e(isset($add_photo_gallery) ? (@$add_photo_gallery->feature_image != '' ? getFilePath3(@$add_photo_gallery->feature_image) : trans('front_settings.feature_image') . ' *') : trans('front_settings.feature_image') . ' *'); ?>"
                                                    id="placeholderUploadContent" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="addPhotoGalleryImage"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="feature_image"
                                                        id="addPhotoGalleryImage">
                                                </button>
                                            </div>
                                            <?php if($errors->has('feature_image')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('feature_image')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <img class="previewImageSize <?php echo e(@$add_photo_gallery->feature_image ? '' : 'd-none'); ?>" src="<?php echo e(@$add_photo_gallery->feature_image ? asset($add_photo_gallery->feature_image) : ''); ?>" alt="" id="photoGalleryImageShow" height="100%" width="100%">
                                    </div>
                                </div>
                                <div class="row mt-40 align-items-center">
                                    <div class="col-lg-10 col-9">
                                        <div class="main-title mt-0">
                                            <h5><?php echo app('translator')->get('front_settings.add_gallery_photos'); ?> </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-3 text-right">
                                        <a href="javascript:void(0)" class="primary-btn icon-only fix-gr-bg"
                                            id="addRowBtn">
                                            <span class="ti-plus"></span>
                                        </a>
                                    </div>
                                </div>
                                <div id="galleryImages">
                                    <?php if(@$add_photo_gallery): ?>
                                        <?php $__currentLoopData = @$add_photo_galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row mt-10 gallery-div-row">
                                                <div class="col-lg-10">
                                                    <div class="primary_input">
                                                        <label
                                                            class="primary_input_label"><?php echo app('translator')->get('front_settings.gallery_image'); ?><span></span></label>
                                                        <div class="primary_file_uploader">
                                                            <input
                                                                class="primary_input_field form-control <?php echo e($errors->has('gallery_image') ? ' is-invalid' : ''); ?> file-upload-multi-placeholder"
                                                                readonly="true" type="text"
                                                                id="placeholderInputUpdate<?php echo e(@$galleryImage->id); ?>"
                                                                placeholder="<?php echo e(isset($galleryImage->gallery_image) && @$galleryImage->gallery_image != '' ? getFilePath3(@$galleryImage->gallery_image) : 'Upload File'); ?>">
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                    for="upload_update_file<?php echo e(@$galleryImage->id); ?>"><?php echo app('translator')->get('common.browse'); ?></label>
                                                                <input type="file"
                                                                    class="d-none form-control file-upload-multi"
                                                                    name="gallery_image[<?php echo e(@$galleryImage->id); ?>][image]"
                                                                    id="upload_update_file<?php echo e(@$galleryImage->id); ?>">
                                                                <input type="hidden"
                                                                    name="gallery_image[<?php echo e(@$galleryImage->id); ?>][image]"
                                                                    value="<?php echo e(@$galleryImage->gallery_image); ?>">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mt-35">
                                                    <button class="primary-btn icon-only fix-gr-bg remove-gallery-image"
                                                        type="button">
                                                        <span class="ti-trash"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <?php if(config('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('common.add'); ?></button></span>
                                        <?php else: ?>
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <?php if(isset($add_photo_gallery)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.add'); ?>
                                            <?php endif; ?>
                                        </button>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.photo_gallery_list'); ?></h3>
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
                                <table id="table_id" class="table photoGallery" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.name'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.description'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $photoGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" id="url" value="<?php echo e(URL::to('/')); ?>">
                                            <input type="hidden" id="photo_gallery_id" value="<?php echo e(@$value->id); ?>">
                                            <tr e_id="<?php echo e($value->id); ?>">
                                                <td><span class="mr-2" style="cursor: grab"><i class="ti-menu"></i></span><?php echo e($key + 1); ?></td>
                                                <td><?php echo e(@$value->name); ?></td>
                                                <td><?php echo e(@$value->description); ?></td>
                                                <td><img src="<?php echo e(asset(@$value->feature_image)); ?>" width="60px"
                                                        height="50px">
                                                </td>
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
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#photogallery<?php echo e(@$value->id); ?>"
                                                            onclick="getPhotoGallery(<?php echo e(@$value->id); ?>)"
                                                            href="#">
                                                            <?php echo app('translator')->get('common.view'); ?>
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('photo-gallery-edit', @$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <a href="<?php echo e(route('photo-gallery-delete-modal', @$value->id)); ?>"
                                                            class="dropdown-item small fix-gr-bg modalLink"
                                                            title="<?php echo app('translator')->get('front_settings.delete_photo_gallery'); ?>" data-modal-size="modal-md">
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
                                            <div class="modal fade admin-query" id="photogallery<?php echo e(@$value->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered large-modal">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('front_settings.view_images'); ?></h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-lg-12" id="photo_gallery_list">

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
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        function getPhotoGallery(galleryId) {
            var url = $('#url').val();
            $.ajax({
                type: "GET",
                data: {
                    galleryId: galleryId
                },
                url: url+"/photo-gallery-view-modal/" + galleryId,
                dataType: "html",
                success: function(response) {
                    $('#photo_gallery_list').html(response);
                },
                error: function(error) {
                    toastr.error(error.message, 'Error');
                }
            });
        }
        var totalData = 0;
        $(document).ready(function() {
            $(document).on('click', '#addRowBtn', function(event) {
                event.preventDefault();
                $('#galleryImages').append(
                    `<div class="row mt-10 gallery-div-row">
                    <div class="col-lg-10">
                        <div class="primary_input">
                            <label class="primary_input_label"><?php echo app('translator')->get('front_settings.gallery_image'); ?><span></span></label>
                            <div class="primary_file_uploader">
                                <input
                                    class="primary_input_field form-control <?php echo e($errors->has('gallery_image') ? ' is-invalid' : ''); ?> file-upload-multi-placeholder"
                                    readonly="true" type="text"
                                    id="placeholderInputUpdate${totalData}"
                                    placeholder="<?php echo app('translator')->get('front_settings.upload_file'); ?>">
                                <button class="" type="button">
                                    <label class="primary-btn small fix-gr-bg"
                                        for="upload_update_file${totalData}"><?php echo app('translator')->get('common.browse'); ?></label>
                                    <input type="file"
                                        class="d-none form-control file-upload-multi" data-id="${totalData}"
                                        name="gallery_image[${totalData}][image]"
                                        id="upload_update_file${totalData}">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-35">
                        <button class="primary-btn icon-only fix-gr-bg remove-gallery-image"
                            type="button">
                            <span class="ti-trash"></span>
                        </button>
                    </div>
                </div>`
                );
                totalData += 1;
            });

            $(document).on('click', '.remove-gallery-image', function(e) {
                e.preventDefault();
                $(this).parents('.gallery-div-row').remove();
            });
        });

        $(document).on('change', '.file-upload-multi', function(e) {
            let fileName = e.target.files[0].name;
            $(this).parent().parent().find('.file-upload-multi-placeholder').attr('placeholder', fileName);
        });

        datableArrange('.photoGallery', 'sm_photo_galleries');
        
        $(document).on('change', '#addPhotoGalleryImage', function(event) {
            $('#photoGalleryImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderFileOneName');
            imageChangeWithFile($(this)[0], '#photoGalleryImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/frontSettings/photo_gallery/photo_gallery.blade.php ENDPATH**/ ?>