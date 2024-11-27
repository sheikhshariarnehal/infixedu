<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('accounts.add_income'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('accounts.add_income'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                <a href="#"><?php echo app('translator')->get('accounts.add_income'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($add_income)): ?>
        <?php if(userPermission("add_income_store")): ?>

        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('add_income')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
           
            <div class="col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_income)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'add_income_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income-update'])); ?>

                        <?php else: ?>
                         <?php if(userPermission("add_income_store")): ?>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'add_income_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($add_income)): ?>
                                        <?php echo app('translator')->get('accounts.edit_income'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('accounts.add_income'); ?>
                                    <?php endif; ?>
                                    
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($add_income)? $add_income->name: old('name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($add_income)? $add_income->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.a_c_Head'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e(@$errors->has('income_head') ? ' is-invalid' : ''); ?>" name="income_head">
                                            <option data-display="<?php echo app('translator')->get('accounts.a_c_Head'); ?> *" value=""><?php echo app('translator')->get('accounts.a_c_Head'); ?> *</option>
                                            <?php $__currentLoopData = $income_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($add_income)): ?>
                                                <option value="<?php echo e(@$income_head->id); ?>"
                                                    <?php echo e(@$add_income->income_head_id == @$income_head->id? 'selected': ''); ?>><?php echo e(@$income_head->head); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e(@$income_head->id); ?>" <?php echo e(old('income_head') == @$income_head->id? 'selected' : ''); ?>><?php echo e(@$income_head->head); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if(@$errors->has('income_head')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('income_head')); ?>

                                        </span>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                                
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.payment_method'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e(@$errors->has('payment_method') ? ' is-invalid' : ''); ?>" name="payment_method" id="payment_method">
                                            <option data-display="<?php echo app('translator')->get('accounts.payment_method'); ?> *" value=""><?php echo app('translator')->get('accounts.payment_method'); ?> *</option>
                                            <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($add_income)): ?>
                                            <option data-string="<?php echo e($payment_method->method); ?>" value="<?php echo e(@$payment_method->id); ?>"<?php echo e(@$add_income->payment_method_id == @$payment_method->id? 'selected': ''); ?>>
                                                <?php echo e(@$payment_method->method); ?>

                                            </option>
                                            <?php else: ?>
                                            <option data-string="<?php echo e($payment_method->method); ?>" value="<?php echo e(@$payment_method->id); ?>"><?php echo e(@$payment_method->method); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if(@$errors->has('payment_method')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                           <?php echo e(@$errors->first('payment_method')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-15 d-none" id="bankAccount">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.bank_accounts'); ?> <span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e(@$errors->has('accounts') ? ' is-invalid' : ''); ?>" name="accounts">
                                            <option data-display="<?php echo app('translator')->get('accounts.bank_accounts'); ?> *" value=""><?php echo app('translator')->get('accounts.bank_accounts'); ?> *</option>
                                            <?php $__currentLoopData = $bank_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($add_income)): ?>
                                            <option value="<?php echo e(@$bank_account->id); ?>"
                                                <?php echo e(@$add_income->account_id == @$bank_account->id? 'selected': ''); ?>><?php echo e(@$bank_account->account_name); ?> (<?php echo e(@$bank_account->bank_name); ?>)</option>
                                            <?php else: ?>
                                            <option value="<?php echo e(@$bank_account->id); ?>"><?php echo e(@$bank_account->account_name); ?> (<?php echo e(@$bank_account->bank_name); ?>)</option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                         <?php if($errors->has('accounts')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('accounts')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.date'); ?><span></span></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e(@$errors->has('date') ? ' is-invalid' : ''); ?>"
                                                id="startDate" type="text" placeholder="<?php echo app('translator')->get('common.date'); ?> *" name="date" value="<?php echo e(isset($add_income)? date('m/d/Y', strtotime($add_income->date)): date('m/d/Y')); ?>">
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
                                <div class="row  mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>) <span class="text-danger"> *</span></label>
                                            <input oninput="numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e(@$errors->has('amount') ? ' is-invalid' : ''); ?>"
                                                type="text" step="0.1" name="amount" value="<?php echo e(isset($add_income)? $add_income->amount: old('amount')); ?>">
                                        
                                            
                                            <?php if($errors->has('amount')): ?>
                                            <span class="text-danger" >
                                                <?php echo e(@$errors->first('amount')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">                                     
                                    <div class="col-lg-12 mt-15">
                                        <div class="primary_input">
                                            <div class="primary_file_uploader">
                                                <input class="primary_input_field" type="text" id="placeholderInput" placeholder="<?php echo e(isset($add_income)? ($add_income->file != ""? getFilePath3($add_income->file):trans('common.file')):trans('common.file')); ?>" readonly
                                                        >
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="file" id="browseFile">
                                                </button>
                                            </div>
                                        </div>
                                        <code>(PDF,DOC,DOCX,JPG,JPEG,PNG are allowed for upload)</code>
                                        <?php if($errors->has('file')): ?>
                                        <span class="text-danger d-block">
                                            <?php echo e($errors->first('file')); ?>

                                        </span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span></label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"><?php echo e(isset($add_income)? $add_income->description: old('description')); ?></textarea>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                 				<?php 
                                  $tooltip = "";
                                  if(userPermission("add_income_store") || userPermission("add_income_edit")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(@$add_income): ?>
                                                 <?php echo app('translator')->get('accounts.update_income'); ?>
                                            <?php else: ?>                                               
                                                <?php echo app('translator')->get('accounts.save_income'); ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('accounts.income_list'); ?></h3>
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
                                        <th>si</th>
                                        <th><?php echo app('translator')->get('common.name'); ?></th>
                                        <th><?php echo app('translator')->get('accounts.payment_method'); ?></th>
                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('accounts.a_c_Head'); ?> 
                                        </th>
                                        <th><?php echo app('translator')->get('accounts.amount'); ?></th>
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


 

 <div class="modal fade admin-query" id="deleteIncomeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_income'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                    <?php echo e(Form::open(['route' => 'add_income_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

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

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
   $('.data-table').DataTable({
                 processing: true,
                 serverSide: true,
                 "ajax": $.fn.dataTable.pipeline( {
                       url: "<?php echo e(route('ajaxIncomeList')); ?>",
                       data: { 
                            un_semester_label_id: $('#un_semester_label_id').val(), 
                            class: $('#class').val(), 
                            section: $('#section').val(), 
                            payment_date: $('#p_date').val(), 
                            approve_status: $('#status').val()
                        },
                       pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                       
                   } ),
                   columns: [
                        {data: 'DT_RowIndex', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'payment_method.method', name: 'paymentMethod.method'},
                        {data: 'date', name: 'date'},
                        {data: 'a_c_head.head', name: 'ACHead.head'},
                        {data: 'amount', name: 'amount'},
                       {data: 'action', name: 'action',orderable: false, searchable: true},
                       
                    ],
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).closest('tr').attr('e_id', data.id);
                    },
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
                                font: "DejaVuSans",
                            };
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
        } );
        datableArrange('.data-tablett', 'sm_add_incomes');
        function deleteIncome(id){
            var modal = $('#deleteIncomeModal');
            modal.find('input[name=id]').val(id);
            modal.modal('show');
        }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/accounts/add_income.blade.php ENDPATH**/ ?>