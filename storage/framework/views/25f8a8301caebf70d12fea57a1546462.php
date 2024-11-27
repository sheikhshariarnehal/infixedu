<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/bootstrap-datetimepicker.min.css')); ?>" />
<style>
    .input-right-icon {
        z-index: inherit !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.visitor_book'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.visitor_book'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.visitor_book'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($visitor)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('visitor')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('common.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($visitor)): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'visitor_update',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                                <input type="hidden" name="id" value="<?php echo e($visitor->id); ?>">
                            <?php else: ?>
                                <?php if(userPermission('visitor_store')): ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'visitor_store',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="main-title">
                                        <h3 class="mb-15">
                                            <?php if(isset($visitor)): ?>
                                                <?php echo app('translator')->get('admin.edit_visitor'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('admin.add_visitor'); ?>
                                            <?php endif; ?>
        
                                        </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.purpose'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field <?php echo e($errors->has('purpose') ? ' is-invalid' : ''); ?>"
                                                    type="text" placeholder="<?php echo e(__('admin.purpose')); ?>"
                                                    value="<?php echo e(isset($visitor) ? $visitor->purpose : old('purpose')); ?>"
                                                    name="purpose">
                                                <span class="text-danger"><?php echo e($errors->first('purpose')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.name')); ?>

                                                    <span class="text-danger"> *</span></label>
                                                <input name="name" class="primary_input_field name"
                                                    placeholder="<?php echo e(__('common.name')); ?>" type="text"
                                                    value="<?php echo e(isset($visitor) ? $visitor->name : old('name')); ?>">
                                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"><?php echo app('translator')->get('admin.phone'); ?></label>
                                                <input oninput="phoneCheck(this)" placeholder="<?php echo e(__('admin.phone')); ?>"
                                                    class="primary_input_field" type="tel" name="phone"
                                                    value="<?php echo e(isset($visitor) ? $visitor->phone : old('phone')); ?>">

                                                <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"><?php echo app('translator')->get('admin.id'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input class="primary_input_field" type="text" name="visitor_id"
                                                    placeholder="<?php echo e(__('admin.id')); ?>"
                                                    value="<?php echo e(isset($visitor) ? $visitor->visitor_id : old('visitor_id')); ?>">
                                                <span class="text-danger"><?php echo e($errors->first('visitor_id')); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.no_of_person'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input class="primary_input_field"
                                                    placeholder="<?php echo e(__('admin.no_of_person')); ?>"
                                                    type="number"
                                                    onkeypress="return isNumberKey(event)" name="no_of_person"
                                                    value="<?php echo e(isset($visitor) ? $visitor->no_of_person : old('no_of_person')); ?>">


                                                <?php if($errors->has('no_of_person')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('no_of_person')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row no-gutters input-right-icon mt-15">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.date'); ?><span
                                                    class="text-danger"> *</span></label>
                                                <input class="primary_input_field  primary_input_field date form-control"
                                                    placeholder="<?php echo e(__('admin.date')); ?>" id="startDate" type="text"
                                                    name="date"
                                                    value="<?php echo e(isset($visitor) ? date('m/d/Y', strtotime($visitor->date)) : date('m/d/Y')); ?>">
                                                <?php if($errors->has('date')): ?>
                                                    <span class="text-danger d-block">
                                                        <?php echo e($errors->first('date')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <button class="" type="button">
                                            <label class="m-0 pt-2" for="startDate">
                                                <i class="ti-calendar" id="admission-date-icon"></i>
                                            </label>
                                        </button>
                                    </div>



                                    <div class="row mt-15">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.in_time'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input class="primary_input_field primary_input_field time"
                                                                    type="text" name="in_time" placeholder="-" id="in_time"
                                                                    value="<?php echo e(isset($visitor) ? $visitor->in_time : old('in_time')); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <label class="m-0 p-0" for="in_time">
                                                                <i class="ti-alarm-clock " id="admission-date-icon"></i>
                                                            </label>
                                                        </button>
                                                        
                                                    </div>
                                                    <?php if($errors->has('in_time')): ?>
                                                        <span class="text-danger mt-2">
                                                            <?php echo e($errors->first('in_time')); ?>

                                                        </span>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.out_time'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="-"
                                                                    class="primary_input_field primary_input_field time"
                                                                    type="text" name="out_time" id="out_time"
                                                                    placeholder="<?php echo e(__('admin.out_time')); ?>"
                                                                    value="<?php echo e(isset($visitor) ? $visitor->out_time : old('out_time')); ?>">

                                                                
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <label class="m-0 p-0" for="out_time">
                                                                <i class="ti-alarm-clock " id="admission-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                    <?php if($errors->has('out_time')): ?>
                                                        <span class="text-danger d-block">
                                                            <?php echo e($errors->first('out_time')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo e(trans('common.file')); ?></label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('upload_event_image') ? ' is-invalid' : ''); ?>" type="text" id="placeholderEventFile"
                                                        placeholder="<?php echo e(isset($visitor) ? ($visitor->file != '' ? getFilePath3($visitor->file) : trans('common.file')) : trans('common.file')); ?>"
                                                        readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="upload_event_image"><span
                                                                class="ripple rippleEffect"
                                                                style="width: 56.8125px; height: 56.8125px; top: -16.4062px; left: 10.4219px;"></span><?php echo app('translator')->get('common.browse'); ?></label>
                                                        <input type="file" class="d-none" name="upload_event_image"
                                                            id="upload_event_image">
                                                    </button>
                                                </div>
                                                <code>(PDF,DOC,DOCX,JPG,JPEG,PNG,TXT are allowed for upload)</code>
                                                <?php if($errors->has('upload_event_image')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('upload_event_image')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $tooltip = '';
                                        if (userPermission('visitor_store')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($visitor)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.save'); ?>
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

                <div class="col-lg-9">
                    <div class="white-box">
    
                        

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('admin.visitor_list'); ?></h3>
                                </div>
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
                                    <table id="table_id" class="Crm_table_active3 table data-table" cellspacing="0" width="100%">
    
                                        <thead>
    
                                            <tr>
                                                <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('admin.no_of_person'); ?></th>
                                                <th><?php echo app('translator')->get('admin.phone'); ?></th>
                                                <th><?php echo app('translator')->get('admin.purpose'); ?></th>
                                                <th><?php echo app('translator')->get('admin.date'); ?></th>
                                                <th><?php echo app('translator')->get('admin.in_time'); ?></th>
                                                <th><?php echo app('translator')->get('admin.out_time'); ?></th>
                                                <th><?php echo app('translator')->get('admin.created_by'); ?></th>
                                                <th><?php echo app('translator')->get('common.actions'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
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
        </div>
    </section>
    <!-- Start Delete Add Modal -->
    <div class="modal fade admin-query" id="deleteVisitorModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_visitor'); ?> </h4>
                    <button type="button" class="close"
                        data-dismiss="modal">&times;
                    </button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'visitor_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Delete Add Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function deleteQueryModal(id) {
            var modal = $('#deleteVisitorModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }

        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(url('visitor-datatable')); ?>",
                    data: {},
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                } ),
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},               
                    {data: 'name', name: 'name'},
                    {data: 'no_of_person', name: 'no_of_person'},
                    {data: 'phone', name: 'phone'},
                    {data: 'purpose', name: 'purpose'},
                    {data: 'query_date', name: 'query_date'},
                    {data: 'in_time', name: 'in_time'},
                    {data: 'out_time', name: 'out_time'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                bLengthChange: false,
                bDestroy: true,
                language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: window.jsLang('quick_search'),
                    paginate: {
                        next: "<i class='ti-arrow-right'></i>",
                        previous: "<i class='ti-arrow-left'></i>",
                    },
                },
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: "copyHtml5",
                        text: '<i class="fa fa-files-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('copy_table'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: window.jsLang('export_to_excel'),
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: window.jsLang('export_to_csv'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('export_to_pdf'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        margin: [0, 0, 0, 12],
                        alignment: "center",
                        header: true,
                        customize: function(doc) {
                            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: "center",
                                image: "data:image/png;base64," + $("#logo_img").val(),
                            });
                            doc.defaultStyle = {
                                font: 'DejaVuSans'
                            }
                        },
                    },
                    {
                        extend: "print",
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: window.jsLang('print'),
                        title: $("#logo_title").val(),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ["colvisRestore"],
                    },
                ],
                columnDefs: [
                    {
                        visible: false,
                    }, 
                ],
                responsive: true,
            });
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/admin/visitor.blade.php ENDPATH**/ ?>