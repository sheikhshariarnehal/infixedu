    <?php $__env->startSection('title'); ?> 
        <?php if(isset($invoiceInfo)): ?>
            <?php echo app('translator')->get('common.edit'); ?>
        <?php else: ?>
            <?php echo app('translator')->get('common.add'); ?>
        <?php endif; ?> 
            <?php echo app('translator')->get('fees.fees_invoice'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <link rel="stylesheet" href="<?php echo e(url('Modules\Fees\Resources\assets\css\feesStyle.css')); ?>"/>
        <style>
            .ti-calendar:before {
                position: relative !important;
                top: 5px !important;
            }
            .school-table-style tr th {
                padding: 10px 18px 10px 10px !important;
            }
            .school-table-style tr td {
                padding: 20px 10px 20px 10px !important;
            }
            .school-table-style tfoot tr td {
                padding: 10px 10px 10px 10px !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php if(isset($invoiceInfo)): ?>
                    <?php echo app('translator')->get('common.edit'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('common.add'); ?>
                <?php endif; ?> 
                    <?php echo app('translator')->get('fees.fees_invoice'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees'); ?></a>
                    <a href="<?php echo e(route('fees.fees-invoice-list')); ?>"><?php echo app('translator')->get('fees.fees_invoice'); ?></a>
                    <a href="#">
                        <?php if(isset($invoiceInfo)): ?>
                            <?php echo app('translator')->get('common.edit'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('common.add'); ?>
                        <?php endif; ?>
                            <?php echo app('translator')->get('fees.fees_invoice'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($invoiceInfo)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => 'fees.fees-invoice-update'])); ?>

                <input type="hidden" name="id" class="editValue" value="<?php echo e($invoiceInfo->id); ?>">
            <?php else: ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => 'fees.fees-invoice-store'])); ?>

            <?php endif; ?>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="white-box">

                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($invoiceInfo)): ?>
                                            <?php echo app('translator')->get('common.edit'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('common.add'); ?>
                                        <?php endif; ?>
                                            <?php echo app('translator')->get('fees.fees_invoice'); ?>
                                    </h3>
                                </div>

                                    <div class="add-visitor">                              
                                        <div class="row">
                                            <div class="col-lg-12 d-flex">
                                                <div><?php echo app('translator')->get('fees.invoice'); ?>- &nbsp;</div>
                                                <div class="d-flex" id="showValue"></div>
                                                <input type="hidden" id="fees_invoice_prefix" value="<?php echo e(@$invoiceSettings->prefix); ?>">
                                            </div>
                                        </div>

                                    <?php if(moduleStatusCheck('University')): ?>
                                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                        ['required' => 
                                            ['USN', 'UD', 'UA', 'US', 'USL','USEC'],'hide'=> ['USUB'],
                                            'div'=>'col-lg-12','row'=>1,
                                             'mt'=>'mt-0'
                                        ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                        ['required' => 
                                            ['USN', 'UD', 'UA', 'US', 'USL','USEC'],'hide'=> ['USUB'],
                                            'div'=>'col-lg-12','row'=>1,
                                             'mt'=>'mt-0'
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                                        <div class="row">
                                            <div class="col-lg-12 mt-15" id="select_un_student_div">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('common.student')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <?php echo e(Form::select('student_id', @$students ?? [""=>__('common.select_student').'*'], isset($invoiceInfo) ? $invoiceInfo->student_id : null , ['class' => 'primary_select  form-control'. ($errors->has('student_id') ? ' is-invalid' : ''), 'id'=>'select_un_student',  isset($invoiceInfo) ? 'disabled' : ''])); ?>


                                                
                                                <div class="pull-right loader loader_style" id="select_un_student_loader">
                                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                                </div>
                                                <?php if($errors->has('student_id')): ?>
                                                    <span class="text-danger custom-error-message" role="alert">
                                                        <?php echo e(@$errors->first('student_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="row">
                                            <div class="col-lg-12 mt-30-md" id="id-card-div">
                                                <label for="class"> <?php echo e(__('common.class')); ?>  <span class="text-danger">*</span></label>
                                                <select class="primary_select form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                    id="select_class" name="class">
                                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($class->id); ?>"
                                                            <?php echo e(isset($invoiceInfo) ? ($invoiceInfo->class_id == $class->id ? 'selected' : '') : ''); ?>>
                                                            <?php echo e(@$class->class_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('class')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('class')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row mt-15">
                                            <div class="col-lg-12" id="selectStudentDiv">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('common.select_student')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="selectStudent" name="student">
                                                <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *" value=""><?php echo app('translator')->get('common.select_student'); ?>*</option>
                                                <?php if(isset($invoiceInfo)): ?>
                                                <?php dump($students); ?>
                                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($student->id); ?>" <?php echo e(($student->id == $invoiceInfo->record_id)? 'selected':''); ?>><?php echo e($student->studentDetail->full_name); ?> (<?php echo e($student->section->section_name); ?> - <?php echo e($student->roll_no); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="pull-right loader" id="selectStudentLoader" style="margin-top: -30px;padding-right: 21px;">
                                                <img src="<?php echo e(asset('Modules/Fees/Resources/assets/img/pre-loader.gif')); ?>" alt="" style="width: 28px;height:28px;">
                                            </div>
                                            <?php if($errors->has('student')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('student')); ?>

                                                </span>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                        <div class="row mt-15">
                                          
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.create_date'); ?> <span class="text-danger"> *</span></label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('create_date') ? ' is-invalid' : ''); ?>" id="create_date" type="text" name="create_date" value="<?php echo e(isset($invoiceInfo)? date('m/d/Y', strtotime($invoiceInfo->create_date)) : date('m/d/Y')); ?>">
                                                                </div>
                                                            </div>
                                                            <button class="btn-date" data-id="#create_date" type="button">
                                                                <label for="create_date">
                                                                    <i class="ti-calendar" id="create_date"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php if($errors->has('create_date')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('create_date')); ?>

                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row mt-15">
                                           
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('fees.due_date'); ?> <span class="text-danger"> *</span></label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('due_date') ? ' is-invalid' : ''); ?>" id="due_date" type="text" name="due_date" value="<?php echo e(isset($invoiceInfo)? date('m/d/Y', strtotime($invoiceInfo->due_date)) : date('m/d/Y')); ?>">
                                                                </div>
                                                            </div>
                                                            <button class="btn-date" data-id="#due_date" type="button">
                                                                <label for="due_date">
                                                                    <i class="ti-calendar" id="due_date"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php if($errors->has('due_date')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('due_date')); ?>

                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-15 <?php echo e(isset($invoiceInfo) ? 'd-none' : ''); ?>">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('fees.payment_status')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <select class="primary_select  form-control<?php echo e($errors->has('payment_status') ? ' is-invalid' : ''); ?>" name="payment_status" id="paymentStatus">
                                                    <option data-display="<?php echo app('translator')->get('fees.payment_status'); ?> *" value=""><?php echo app('translator')->get('fees.payment_status'); ?> *</option>
                                                    <option value="not" <?php echo e(isset($invoiceInfo)? ($invoiceInfo->payment_status == "not"?'selected':''):(old('payment_status') == 'not' ? 'selected' : '')); ?>><?php echo app('translator')->get('fees.not_paid'); ?></option>
                                                    <option value="partial" <?php echo e(isset($invoiceInfo)? ($invoiceInfo->payment_status == "partial"?'selected':''):(old('payment_status') == 'partial' ? 'selected' : '')); ?>><?php echo app('translator')->get('fees.partial_paid'); ?></option>
                                                    <option value="full" <?php echo e(isset($invoiceInfo)? ($invoiceInfo->payment_status == "full"?'selected':''):(old('payment_status') == 'full' ? 'selected' : '')); ?>><?php echo app('translator')->get('fees.full_paid'); ?></option>
                                                </select>
                                                <?php if($errors->has('payment_status')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('payment_status')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row mt-15 d-none" id="paymentMethod">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('fees.payment_method')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <select class="primary_select  form-control<?php echo e($errors->has('payment_method') ? ' is-invalid' : ''); ?>" name="payment_method" id="paymentMethodName">
                                                    <option data-display="<?php echo app('translator')->get('fees.payment_method'); ?>*" value=""><?php echo app('translator')->get('fees.payment_method'); ?>*</option>
                                                    <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($paymentMethod->method); ?>" <?php echo e(isset($invoiceInfo)? ($invoiceInfo->payment_method == $paymentMethod->method?'selected':''):(old('payment_method') == $paymentMethod->method ? 'selected' : '')); ?>><?php echo e($paymentMethod->method); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('payment_method')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('payment_method')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row mt-15 d-none" id="bankPayment">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('fees.bank')); ?>

                                                        <span class="text-danger"> *</span>
                                                </label>
                                                <select class="primary_select  form-control<?php echo e($errors->has('bank') ? ' is-invalid' : ''); ?>" name="bank">
                                                    <option data-display="<?php echo app('translator')->get('fees.select_bank'); ?>*" value=""><?php echo app('translator')->get('fees.select_bank'); ?>*</option>
                                                    <?php $__currentLoopData = $bankAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($bankAccount->id); ?>" <?php echo e(isset($invoiceInfo)? ($invoiceInfo->bank_id == $bankAccount->id?'selected':''):(old('bank') == $bankAccount->id ? 'selected' : '')); ?>><?php echo e($bankAccount->bank_name); ?> (<?php echo e($bankAccount->account_number); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('bank')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('bank')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <?php 
                                        $tooltip = "";
                                        
                                        ?>
                                        <input type="hidden" value="<?php echo e(@$invoiceInfo->id); ?>" id="newFeesEditId">

                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="primary-btn fix-gr-bg submit fmInvoice" data-tooltip="tooltip" title="<?php echo e($tooltip); ?>">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($invoiceInfo)): ?>
                                                        <?php echo app('translator')->get('common.update'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('common.save'); ?>
                                                    <?php endif; ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-lg-9">
                        <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('fees.fees_type_list'); ?></h3>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-15">
                            <div class="col-lg-12">
                                <div class="pb-0 fees_invoice_type_div">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select class="primary_select  form-control<?php echo e($errors->has('fees_type') ? ' is-invalid' : ''); ?>" id="selectFeesType" name="fees_type">
                                                <option data-display="<?php echo app('translator')->get('fees.fees_type'); ?> *" value=""><?php echo app('translator')->get('fees.fees_type'); ?> *</option>
                                                <option value="" disabled><?php echo app('translator')->get('fees.fees_group'); ?></option>
                                                <?php $__currentLoopData = $feesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="grp<?php echo e($feesGroup->id); ?>"><?php echo e($feesGroup->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <option value="" disabled><?php echo app('translator')->get('fees.fees_type'); ?></option>
                                                <?php $__currentLoopData = $feesTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="typ<?php echo e($feesType->id); ?>"><?php echo e($feesType->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('fees_type')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('fees_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-lg-12 justify-content-end d-flex">
                                            <div class="text-right">
                                                <input type="checkbox" name="singleInvoice" id="singleInvoice" class="common-checkbox form-control" value="1">
                                                <label for="singleInvoice"><?php echo app('translator')->get('fees::feesModule.group_fees_generate_seperate_invoice'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-lg-12 justify-content-end d-flex">
                                            <div class="text-right">
                                                <input type="checkbox" id="cloneAmount" class="common-checkbox form-control permission-checkAll">
                                                <label for="cloneAmount"><?php echo app('translator')->get('fees::feesModule.clone_amount'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="weaverType" value="amount">
                                <div class="big-table">
                                    <table class="table school-table-style fees_invoice_type_table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                                <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                <th><?php echo app('translator')->get('fees.waiver'); ?></th>
                                                <th><?php echo app('translator')->get('fees.sub_total'); ?></th>
                                                <?php if(!isset($invoiceInfo)): ?>
                                                    <th><?php echo app('translator')->get('fees.paid_amount'); ?></th>
                                                <?php endif; ?>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="allFeesTypes">
                                            <?php if(isset($invoiceInfo)): ?>
                                                <?php $__currentLoopData = $invoiceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$invoiceDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo e($invoiceDetail->feesType->name); ?></td>
                                                        <input type="hidden" name="feesType[]" value="<?php echo e($invoiceDetail->fees_type); ?>">
                                                        <td>
                                                            <div class="primary_input">
                                                                <input class="primary_input_field form-control amount<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" type="number" name="amount[]" autocomplete="off" value="<?php echo e(isset($invoiceDetail)? $invoiceDetail->amount: old('amount')); ?>">
                                                                
                                                                <?php if($errors->has('amount')): ?>
                                                                <span class="text-danger" >
                                                                    <?php echo e($errors->first('amount')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary_input">
                                                                <input class="primary_input_field form-control weaver<?php echo e($errors->has('weaver') ? ' is-invalid' : ''); ?>" type="number" name="weaver[]" autocomplete="off" value="<?php echo e(isset($invoiceDetail)? $invoiceDetail->weaver: old('weaver')); ?>">
                                                                
                                                                <?php if($errors->has('weaver')): ?>
                                                                <span class="text-danger" >
                                                                    <?php echo e($errors->first('weaver')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                        <td class="subTotal"><?php echo e(isset($invoiceDetail)? $invoiceDetail->sub_total: ""); ?></td>
                                                        <input type="hidden" name="sub_total[]" class="inputSubTotal" value="<?php echo e(isset($invoiceDetail)? $invoiceDetail->sub_total: ""); ?>">
                                                        <?php if(!isset($invoiceDetail)): ?>
                                                            <td>
                                                                <input class="primary_input_field form-control paidAmount<?php echo e($errors->has('paid_amount') ? ' is-invalid' : ''); ?>" type="number" name="paid_amount[]" autocomplete="off" disabled value="<?php echo e(isset($invoiceDetail)? $invoiceDetail->paid_amount: old('paid_amount')); ?>">
                                                            </td>
                                                        <?php endif; ?>
                                                        <td>
                                                            <button class="primary-btn icon-only fix-gr-bg" data-toggle="modal" data-tooltip="tooltip" data-target="#addNotesModal<?php echo e($invoiceDetail->fees_type); ?>" type="button"
                                                                title="<?php echo app('translator')->get('common.edit_note'); ?>">
                                                                <span class="ti-pencil-alt"></span>
                                                            </button>
                                                            <button class="primary-btn icon-only fix-gr-bg" type="button" data-tooltip="tooltip" title="<?php echo app('translator')->get('common.delete'); ?>" id="deleteField">
                                                                <span class="ti-trash"></span>
                                                            </button>
                                                            
                                                            <div class="modal fade admin-query" id="addNotesModal<?php echo e($invoiceDetail->fees_type); ?>">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><?php echo app('translator')->get('common.edit_note'); ?></h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="primary_input">
                                                                                <input class="primary_input_field form-control has-content" type="text" name="note[]" autocomplete="off" value="<?php echo e(isset($invoiceDetail)? $invoiceDetail->note: ""); ?>">
                                                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?></label>
                                                                                
                                                                            </div>
                                                                            </br>
                                                                            <div class="mt-40 d-flex justify-content-between">
                                                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                                <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.update'); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <input type="hidden" class="fees" value="grp<?php echo e($invoiceDetail->feesType->fees_group_id); ?>">
                                                            <input type="hidden" class="fees" value="typ<?php echo e($invoiceDetail->fees_type); ?>">
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><?php echo app('translator')->get('exam.result'); ?></td>
                                                <td></td>
                                                <td class="showTotalAmount">0.00</td>
                                                <td class="showTotalWeaver">0.00</td>
                                                <td class="showSubTotalDiscount">0.00</td>
                                                <?php if(!isset($invoiceInfo)): ?>
                                                    <td class="showPaidAmount">0.00</td>
                                                <?php endif; ?>
                                                <td></td>
                                                <input class="totalPaidAmount" type="hidden" name="total_paid_amount">
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script type="text/javascript" src="<?php echo e(url('Modules\Fees\Resources\assets\js\app.js')); ?>"></script>
    <script>
        selectPosition(<?php echo feesInvoiceSettings()->invoice_positions; ?>);
    </script>
    <script>
        $(document).ready(function() {
            $("#select_semester_label").on("change", function() {

                var url = $("#url").val();
                var i = 0;
                let semester_id = $(this).val();
                let academic_id = $('#select_academic').val();  
                let session_id = $('#select_session').val();
                let faculty_id = $('#select_faculty').val();
                let department_id = $('#select_dept').val();
                let un_semester_label_id = $('#select_semester_label').val();

                if (session_id =='') {
                    setTimeout(function() {
                        toastr.error(
                        "Session Not Found",
                        "Error ",{
                            timeOut: 5000,
                    });}, 500);
                
                    $("#select_semester option:selected").prop("selected", false)
                    return ;
                }
                if (department_id =='') {
                    setTimeout(function() {
                        toastr.error(
                        "Department Not Found",
                        "Error ",{
                            timeOut: 5000,
                    });}, 500);
                    $("#select_semester option:selected").prop("selected", false)

                    return ;
                }
                if (semester_id =='') {
                    setTimeout(function() {
                        toastr.error(
                        "Semester Not Found",
                        "Error ",{
                            timeOut: 5000,
                    });}, 500);
                    $("#select_semester option:selected").prop("selected", false)

                    return ;
                }
                if (academic_id =='') {
                    setTimeout(function() {
                        toastr.error(
                        "Academic Not Found",
                        "Error ",{
                            timeOut: 5000,
                    });}, 500);
                    return ;
                }
                if (un_semester_label_id =='') {
                    setTimeout(function() {
                        toastr.error(
                        "Semester Label Not Found",
                        "Error ",{
                            timeOut: 5000,
                    });}, 500);
                    return ;
                }

                var formData = {
                    semester_id : semester_id,
                    academic_id : academic_id,
                    session_id : session_id,
                    faculty_id : faculty_id,
                    department_id : department_id,
                    un_semester_label_id : un_semester_label_id,
                };
            
                // Get Student
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/university/" + "get-university-wise-student",
                    beforeSend: function() {
                        $('#select_un_student_loader').addClass('pre_loader').removeClass('loader');
                    },
                    success: function(data) {
                        var a = "";
                        $.each(data, function(i, item) {
                            if (item.length) {
                                $("#select_un_student").find("option").not(":first").remove();
                                $("#select_un_student_div ul").find("li").not(":first").remove();

                                $("#select_un_student").append(
                                    $("<option>", {
                                        value: 'all_student',
                                        text: "All Student",
                                    })
                                );

                                $.each(item, function(i, students) {
                                    $("#select_un_student").append(
                                        $("<option>", {
                                            value: students.student.id,
                                            text: students.student.full_name,
                                        })
                                    );

                                    $("#select_un_student_div ul").append(
                                        "<li data-value='" +
                                        students.student.id +
                                        "' class='option'>" +
                                        students.student.full_name +
                                        "</li>"
                                    );
                                });
                                $("#select_un_student").niceSelect('update');
                            } else {
                                $("#select_un_student").find("option").not(":first").remove();
                                $("#select_un_student_div ul").find("li").not(":first").remove();
                            }
                        });
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    },
                    complete: function() {
                        i--;
                        if (i <= 0) {
                            $('#select_un_student_loader').removeClass('pre_loader').addClass('loader');
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\Modules/Fees\Resources/views/feesInvoice/feesInvoice.blade.php ENDPATH**/ ?>