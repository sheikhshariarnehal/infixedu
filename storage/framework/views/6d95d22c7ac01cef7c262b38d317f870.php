<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.phone_call_log'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <style>
        .check_box_table table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child::before,
        .check_box_table table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child::before {
            top: 30px !important;
    }
    </style>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.phone_call_log'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.phone_call_log'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($phone_call_log)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('phone-call')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('common.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($phone_call_log)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['phone-call_update', @$phone_call_log->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('phone-call-store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'phone-call-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($phone_call_log)): ?>
                                            <?php echo app('translator')->get('admin.edit_phone_call'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('admin.add_phone_call'); ?>
                                        <?php endif; ?>
    
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">

                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?></label>

                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text" name="name"
                                                    value="<?php echo e(isset($phone_call_log) ? $phone_call_log->name : old('name')); ?>">

                                                <?php if($errors->has('name')): ?>
                                                    <span class="text-danger"><?php echo e(@$errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <input type="hidden" name="id"
                                        value="<?php echo e(isset($phone_call_log) ? $phone_call_log->id : ''); ?>">
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.phone'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <input oninput="phoneCheck(this)"
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('phone') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="tel" name="phone"
                                                    value="<?php echo e(isset($phone_call_log) ? $phone_call_log->phone : old('phone')); ?>">


                                                <?php if($errors->has('phone')): ?>
                                                    <span class="text-danger"><?php echo e(@$errors->first('phone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?>
                                                    <span></span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field  primary_input_field date form-control"
                                                                    id="startDate" type="text" name="date"
                                                                    value="<?php echo e(isset($phone_call_log) ? $phone_call_log->date : date('m/d/Y')); ?>"
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#startDate" type="button">
                                                            <label class="m-0 p-0" for="startDate">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.follow_up_date'); ?>
                                                    <span></span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field  primary_input_field date form-control<?php echo e(@$errors->has('follow_up_date') ? ' is-invalid' : ''); ?>"
                                                                    id="follow_up_date" type="text" name="follow_up_date"
                                                                    value="<?php echo e(isset($phone_call_log) ? $phone_call_log->next_follow_up_date : date('m/d/Y')); ?>"
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#follow_up_date" type="button">
                                                            <label class="m-0 p-0" for="follow_up_date">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('follow_up_date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.call_duration'); ?></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('call_duration') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text" name="call_duration"
                                                    value="<?php echo e(isset($phone_call_log) ? $phone_call_log->call_duration : old('call_duration')); ?>">


                                                <?php if($errors->has('call_duration')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e(@$errors->first('call_duration')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.description'); ?>
                                                    <span></span></label>
                                                <?php if(isset($phone_call_log)): ?>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"> <?php echo e(@$phone_call_log->description); ?></textarea>
                                                <?php else: ?>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"><?php echo e(old('description')); ?></textarea>
                                                    <?php endif; ?>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-30">
                                            <div class="col-lg-12 d-flex">
                                                <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('common.type'); ?></p>
                                                <div class=" radio-btn-flex ml-20">
                                                    <?php if(isset($phone_call_log)): ?>
                                                        <div class="mr-30 mb-4">
                                                            <input type="radio" name="call_type" id="relationFather"
                                                                value="I"
                                                                <?php echo e(@$phone_call_log->call_type == 'I' ? 'checked' : ''); ?>

                                                                class="common-radio relationButton">
                                                            <label for="relationFather"><?php echo app('translator')->get('admin.incoming'); ?></label>
                                                        </div><br>
                                                        <div class="mr-30 mb-2">
                                                            <input type="radio" name="call_type" id="relationMother"
                                                                value="O"
                                                                <?php echo e(@$phone_call_log->call_type == 'O' ? 'checked' : ''); ?>

                                                                class="common-radio relationButton">
                                                            <label for="relationMother"><?php echo app('translator')->get('admin.outgoing'); ?></label>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="mr-30 mb-4">
                                                            <input type="radio" name="call_type" id="relationFather"
                                                                value="I" class="common-radio relationButton" checked>
                                                            <label for="relationFather"><?php echo app('translator')->get('admin.incoming'); ?></label>
                                                        </div>
                                                        <div class="mr-30 mb-2">
                                                            <input type="radio" name="call_type" id="relationMother"
                                                                value="O" class="common-radio relationButton">
                                                            <label for="relationMother"><?php echo app('translator')->get('admin.outgoing'); ?></label>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $tooltip = '';
                                            if (userPermission('phone-call-store')) {
                                                $tooltip = '';
                                            } else {
                                                $tooltip = 'You have no permission to add';
                                            }
                                        ?>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                    title="<?php echo e(@$tooltip); ?>"
                                                    onclick="this.disabled=true; this.form.submit();">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($phone_call_log)): ?>
                                                        <?php echo app('translator')->get('admin.update_phone_call'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('admin.save_phone_call'); ?>
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

                    <div class="col-lg-8 col-xl-9">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('admin.phone_call_list'); ?></h3>
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
                                        <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                                    <th><?php echo app('translator')->get('common.phone'); ?></th>
                                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.follow_up_date'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.call_duration'); ?></th>
                                                    <th><?php echo app('translator')->get('common.description'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.call_type'); ?></th>
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
        <div class="modal fade admin-query" id="deleteCallLogModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_phone_call'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                        </div>
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                            <?php echo e(Form::open(['route' => 'phone-call_delete', 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

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
    <?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('script'); ?>
        <script>
            function deleteQueryModal(id) {
                var modal = $('#deleteCallLogModal');
                modal.find('input[name=id]').val(id)
                modal.modal('show');
            }
    
            $(document).ready(function() {
                $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    "ajax": $.fn.dataTable.pipeline( {
                        url: "<?php echo e(url('phone-call-datatable')); ?>",
                        data: {},
                        pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                    } ),
                    columns: [            
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'query_date', name: 'query_date'},
                        {data: 'next_follow_up_date', name: 'next_follow_up_date'},
                        {data: 'call_duration', name: 'call_duration'},
                        {data: 'description', name: 'description'},
                        {data: 'call_type', name: 'call_type'},
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/admin/phone_call.blade.php ENDPATH**/ ?>