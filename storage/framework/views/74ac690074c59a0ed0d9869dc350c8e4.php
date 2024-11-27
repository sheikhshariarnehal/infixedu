<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('Modules\Fees\Resources\assets\css\feesStyle.css')); ?>" />
<?php $__env->stopPush(); ?>
<?php if(!userPermission('fees.fees-invoice-store')): ?>
    <?php $__env->startPush('css'); ?>
        <style>
            div#table_id_wrapper {
                margin-top: 40px;
            }
        </style>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('fees::feesModule.fees_invoice'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees.fees'); ?></a>
                <a href="#"><?php echo app('translator')->get('fees::feesModule.fees_invoice'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="white-box">
            <?php if(isset($role) && $role == 'admin'): ?>
                <?php if(userPermission('fees.fees-invoice-store')): ?>
                    <div class="row">
                        <div class="col-lg-12 text-left col-md-12">
                            <a href="<?php echo e(route('fees.fees-invoice')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row mt-40">

                <?php if((isset($role) && $role == 'admin') || $role == 'lms'): ?>
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
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('common.student'); ?></th>
                                        <th><?php echo app('translator')->get('admin.admission_no'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                        <th><?php echo app('translator')->get('fees::feesModule.waiver'); ?></th>
                                        <th><?php echo app('translator')->get('fees.fine'); ?></th>
                                        <th><?php echo app('translator')->get('fees.paid'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.balance'); ?></th>
                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
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
                <?php else: ?>
                    <div class="col-lg-12 student-details up_admin_visitor mt-0">
                        <ul class="nav nav-tabs tabs_scroll_nav mt-0 ml-0" role="tablist">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item mb-0">
                                    <a class="nav-link mb-0 <?php if($key == 0): ?> active <?php endif; ?> "
                                        href="#tab<?php echo e($key); ?>" role="tab"
                                        data-toggle="tab"><?php echo e(moduleStatusCheck('University') ? $record->unSemesterLabel->name : $record->class->class_name); ?>

                                        (<?php echo e($record->section->section_name); ?>)
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="tab-content" style="margin-top:70px">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div role="tabpanel"
                                    class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                                    id="tab<?php echo e($key); ?>">
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
                                        <table id="table_id" class="table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                    <th><?php echo app('translator')->get('common.student'); ?></th>
                                                    <th><?php echo app('translator')->get('student.class_section'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                    <th><?php echo app('translator')->get('fees::feesModule.waiver'); ?></th>
                                                    <th><?php echo app('translator')->get('fees.fine'); ?></th>
                                                    <th><?php echo app('translator')->get('fees.paid'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.balance'); ?></th>
                                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $record->feesInvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $studentInvoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $amount = $studentInvoice->Tamount;
                                                        $weaver = $studentInvoice->Tweaver;
                                                        $fine = $studentInvoice->Tfine;
                                                        $paid_amount = $studentInvoice->Tpaidamount;
                                                        $sub_total = $studentInvoice->Tsubtotal;
                                                        $balance = $amount + $fine - ($paid_amount + $weaver);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo e($key + 1); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view'])); ?>"
                                                                target="_blank">
                                                                <?php echo e(@$studentInvoice->studentInfo->full_name); ?>

                                                            </a>
                                                        </td>
                                                        <td><?php echo e(@$studentInvoice->recordDetail->class->class_name); ?>

                                                            (<?php echo e(@$studentInvoice->recordDetail->section->section_name); ?>)
                                                        </td>
                                                        <td><?php echo e($amount); ?></td>
                                                        <td><?php echo e($weaver); ?></td>
                                                        <td><?php echo e($fine); ?></td>
                                                        <td><?php echo e($paid_amount); ?></td>
                                                        <td><?php echo e($balance); ?></td>
                                                        <td>
                                                            <?php if($balance == 0): ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('fees.paid'); ?></button>
                                                            <?php else: ?>
                                                                <?php if($paid_amount > 0): ?>
                                                                    <button
                                                                        class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('fees.partial'); ?></button>
                                                                <?php else: ?>
                                                                    <button
                                                                        class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('fees.unpaid'); ?></button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e(dateConvert($studentInvoice->create_date)); ?></td>
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
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view'])); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                                <?php if($balance != 0): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('fees.student-fees-payment', $studentInvoice->id)); ?>"><?php echo app('translator')->get('inventory.add_payment'); ?></a>
                                                                <?php endif; ?>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<div class="modal fade admin-query"
    id="deleteFeesPayment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.delete_fees_invoice'); ?></h4>
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg"
                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                    <?php echo e(Form::open(['method' => 'POST', 'route' => 'fees.fees-invoice-delete'])); ?>

                    <input type="hidden" name="feesInvoiceId" value="">
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade admin-query" id="viewFeesPayment">
    <div class="modal-dialog modal-dialog-centered max_modal">
        <div class="modal-content">
        </div>
    </div>
</div>


<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    function feesInvoiceDelete(id) {
        var modal = $('#deleteFeesPayment');
        modal.find('input[name=feesInvoiceId]').val(id)
        modal.modal('show');
    }

    function viewPaymentDetailModal(id) {
        $('#viewFeesPayment').modal('show');
        let invoiceId = id;
        console.log(invoiceId);
        $.ajax({
            url: "<?php echo e(route('fees.fees-view-payment')); ?>",
            method: "POST",
            data: {
                invoiceId: invoiceId
            },
            success: function(response) {
                $('#viewFeesPayment .modal-content').html(response);
            },
        });
    }
    $(document).ready(function() {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": $.fn.dataTable.pipeline({
                url: "<?php echo e(url('fees/fees-invoice-datatable')); ?>",
                data: {},
                pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'student_name',
                    name: 'student_name',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'admission_no',
                    name: 'admission_no',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'amount',
                    name: 'amount',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'weaver',
                    name: 'weaver',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'fine',
                    name: 'fine',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'paid_amount',
                    name: 'paid_amount',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'balance',
                    name: 'balance',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'create_date',
                    name: 'create_date',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                // {
                //     data: 'full_name',
                //     name: 'studentInfo.full_name',
                //     visible: false
                // },
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
            buttons: [{
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
            columnDefs: [{
                visible: false,
            }, ],
            responsive: true,
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\infixedu\Modules/Fees\Resources/views/_allFeesList.blade.php ENDPATH**/ ?>