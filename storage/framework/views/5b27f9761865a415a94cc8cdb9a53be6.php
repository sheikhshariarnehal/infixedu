<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('accounts.bank_account'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('accounts.bank_account'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.bank_account'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($bank_account)): ?>
            <?php if(userPermission("bank-account-store")): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('bank-account')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('common.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($bank_account)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => array('bank-account-update',@$bank_account->id), 'method' => 'PUT'])); ?>

                        <?php else: ?>
                            <?php if(userPermission("bank-account-store")): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'bank-account-store', 'method' => 'POST'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($bank_account)): ?>
                                        <?php echo app('translator')->get('accounts.edit_bank_account'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('accounts.add_bank_account'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.bank_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('bank_name') ? ' is-invalid' : ''); ?>" type="text" name="bank_name" autocomplete="off" value="<?php echo e(isset($bank_account)? $bank_account->bank_name : old('bank_name')); ?>">
                                           
                                            
                                            <?php if($errors->has('bank_name')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('bank_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.account_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('account_name') ? ' is-invalid' : ''); ?>" type="text" name="account_name" autocomplete="off" value="<?php echo e(isset($bank_account)? $bank_account->account_name:old('account_name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($add_income)? $add_income->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('account_name')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('account_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.account_number'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('account_number') ? ' is-invalid' : ''); ?>" type="tel" name="account_number" autocomplete="off" value="<?php echo e(isset($bank_account)? $bank_account->account_number:old('account_number')); ?>">
                                           
                                            
                                            <?php if($errors->has('account_number')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('account_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.account_type'); ?></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('account_type') ? ' is-invalid' : ''); ?>" type="text" name="account_type" autocomplete="off" value="<?php echo e(isset($bank_account)? $bank_account->account_type:old('account_type')); ?>">
                                          
                                            
                                            <?php if($errors->has('account_type')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('account_type')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.opening_balance'); ?><span class="text-danger"> *</span></label>
                                            <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e(@$errors->has('opening_balance') ? ' is-invalid' : ''); ?>" type="text" step="0.1" name="opening_balance" autocomplete="off" value="<?php echo e(isset($bank_account)? $bank_account->opening_balance:old('opening_balance')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($bank_account)? $bank_account->id: ''); ?>">
                                           
                                            
                                            <?php if($errors->has('opening_balance')): ?>
                                                <span class="text-danger" >
                                                    <strong><?php echo e(@$errors->first('opening_balance')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="note"><?php echo e(isset($bank_account)? $bank_account->note: old('note')); ?></textarea>
                                           
                                            
                                        </div>
                                    </div>
                                </div>

                            	<?php 
                                  $tooltip = "";
                                  if(userPermission("bank-account-store")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>

                                <div class="row mt-25">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg submit submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($bank_account)): ?>
                                                <?php echo app('translator')->get('accounts.update_account'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('accounts.save_account'); ?>
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
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('accounts.bank_account_list'); ?></h3>
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
                                        <th><?php echo app('translator')->get('accounts.bank_name'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.account_name'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.opening_balance'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.current_balance'); ?></th>
                                        <th><?php echo app('translator')->get('common.note'); ?></th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="modal fade admin-query" id="deleteBankAccountModal" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('accounts.delete_bank_account'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'bank-account-delete', 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function deleteBankModal(id) {
            var modal = $('#deleteBankAccountModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }

        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(url('bank-account-datatable')); ?>",
                    data: {},
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                } ),
                columns: [            
                    {data: 'bank_name', name: 'bank_name'},
                    {data: 'account_name', name: 'account_name'},
                    {data: 'opening_balance', name: 'opening_balance'},
                    {data: 'current_balance', name: 'current_balance'},
                    {data: 'note', name: 'note'},
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/accounts/bank_account.blade.php ENDPATH**/ ?>