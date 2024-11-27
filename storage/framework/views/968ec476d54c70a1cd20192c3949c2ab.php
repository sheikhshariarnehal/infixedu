<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('accounts.fund_transfer'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        
        <style>
            div#bankList,
            div#toBankList {
                position: absolute;
                left: 50%;
                top: 10%;
            }

            table.dataTable thead th {
                padding: 10px 30px !important;
            }

            table.dataTable tbody th,
            table.dataTable tbody td {
                padding: 20px 30px 20px 30px !important;
            }

            table.dataTable tfoot th,
            table.dataTable tfoot td {
                padding: 10px 30px 6px 30px;
            }

            table#tableWithoutSort tr td {
                min-width: 150px;
            }

            table#tableWithoutSort thead tr th{
                padding-left: 30px!important;
            }

            table#tableWithoutSort thead tr th:nth-child(2){
                padding-left: 0px!important;
            }

            table#tableWithoutSort tbody tr td:first-child{
                padding-left: 30px!important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php
        @$setting = app('school_info');
        if (!empty(@$setting->currency_symbol)) {
            @$currency = @$setting->currency_symbol;
        } else {
            @$currency = '$';
        }
    ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('accounts.fund_transfer'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.fund_transfer'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fund-transfer-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="mb-10 section_sub_title"><?php echo app('translator')->get('common.add_information'); ?></h3>
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.amount'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e(@$errors->has('amount') ? ' is-invalid' : ''); ?>"
                                                type="text" name="amount" step="0.1" autocomplete="off"
                                                value="<?php echo e(old('amount')); ?>">


                                            <?php if($errors->has('amount')): ?>
                                                <span class="text-danger">
                                                    <strong><?php echo e(@$errors->first('amount')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-30">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('accounts.purpose'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e(@$errors->has('purpose') ? ' is-invalid' : ''); ?>"
                                                type="text" name="purpose" autocomplete="off"
                                                value="<?php echo e(old('purpose')); ?>">


                                            <?php if($errors->has('purpose')): ?>
                                                <span class="text-danger">
                                                    <strong><?php echo e(@$errors->first('purpose')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $tooltip = '';
                                    if (userPermission('fund-transfer-store')) {
                                        $tooltip = '';
                                    } else {
                                        $tooltip = 'You have no permission to add';
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('accounts.fund_transfer'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="section_sub_title"><?php echo app('translator')->get('accounts.from'); ?></h3>
                                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class=" radio-btn-flex ml-20">
                                        <div class="CustomPaymentMethod d-flex mb-2">
                                            <div class="primary_input custom-transfer-account  d-flex">
                                                <input type="radio" name="from_payment_method"
                                                    data-id="<?php echo e($payment_method->method); ?>"
                                                    id="from_method<?php echo e($payment_method->id); ?>"
                                                    value="<?php echo e($payment_method->id); ?>" class="common-radio relation">
                                                <label style="margin-left: 10px; margin-top: 8px;"
                                                    for="from_method<?php echo e($payment_method->id); ?>"><?php echo e($payment_method->method); ?>

                                                    <?php
                                                        $total = $payment_method->IncomeAmount - $payment_method->ExpenseAmount;
                                                    ?>
                                                    <?php if($payment_method->method != 'Bank'): ?>
                                                        (<?php echo e($total); ?>)
                                                    <?php else: ?>
                                                        (<?php echo e($bank_amount); ?>)
                                                    <?php endif; ?>
                                                </label>
                                            </div>
                                            <?php if($payment_method->method == 'Bank'): ?>
                                                <div class="d-none pl-3" id="bankList">
                                                    <?php $__currentLoopData = $bank_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="primary_input custom-transfer-account mb-10">
                                                            <input type="radio" name="from_bank_name"
                                                                id="from_bank<?php echo e($bank_account->id); ?>"
                                                                value="<?php echo e($bank_account->id); ?>" class="common-radio">
                                                            <label
                                                                for="from_bank<?php echo e($bank_account->id); ?>"><?php echo e($bank_account->bank_name); ?>

                                                                (<?php echo e($bank_account->current_balance); ?>)
                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($errors->has('from_payment_method')): ?>
                                    <span class="text-danger d-block mt-0" role="alert">
                                        <strong><?php echo e(@$errors->first('from_payment_method')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="section_sub_title"><?php echo app('translator')->get('accounts.to'); ?></h3>
                                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class=" radio-btn-flex ml-20">
                                        <div class="CustomPaymentMethod d-flex mb-2">
                                            <div
                                                class="primary_input custom-transfer-account remove<?php echo e($payment_method->id); ?> d-flex">
                                                <input style="bottom: 5px" type="radio" name="to_payment_method"
                                                    data-id="<?php echo e($payment_method->method); ?>"
                                                    id="to_method<?php echo e($payment_method->id); ?>"
                                                    value="<?php echo e($payment_method->id); ?>"
                                                    class="common-radio toRelation">
                                                <label style="margin-left: 10px; margin-top: 8px;"
                                                    for="to_method<?php echo e($payment_method->id); ?>"><?php echo e($payment_method->method); ?>

                                                    <?php
                                                        $total = $payment_method->IncomeAmount - $payment_method->ExpenseAmount;
                                                    ?>
                                                    <?php if($payment_method->method != 'Bank'): ?>
                                                        (<?php echo e($total); ?>)
                                                    <?php else: ?>
                                                        (<?php echo e($bank_amount); ?>)
                                                    <?php endif; ?>
                                                </label>


                                            </div>
                                            <?php if($payment_method->method == 'Bank'): ?>
                                                <div class="d-none pl-3" id="toBankList">
                                                    <?php $__currentLoopData = $bank_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="primary_input custom-transfer-account mb-10">
                                                            <input type="radio" name="to_bank_name"
                                                                id="tobank<?php echo e($bank_account->id); ?>"
                                                                value="<?php echo e($bank_account->id); ?>" class="common-radio">
                                                            <label
                                                                for="tobank<?php echo e($bank_account->id); ?>"><?php echo e($bank_account->bank_name); ?>

                                                                (<?php echo e($bank_account->current_balance); ?>)
                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($errors->has('to_payment_method')): ?>
                                    <span class="text-danger d-block mt-0" role="alert">
                                        <strong><?php echo e(@$errors->first('to_payment_method')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('accounts.amount_transfer_list'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
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
                                    <div class="table-responsive">
                                        <table id="tableWithoutSort" class="table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('accounts.purpose'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.from'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.to'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total = 0;
                                                ?>
                                                <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $total = $total + $transfer->amount;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo e($transfer->purpose); ?></td>
                                                        <td><?php echo e($transfer->amount); ?></td>
                                                        <td><?php echo e($transfer->fromPaymentMethodName->method); ?></td>
                                                        <td><?php echo e($transfer->toPaymentMethodName->method); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td><?php echo app('translator')->get('accounts.total'); ?></td>
                                                    <td><?php echo e(currency_format($total)); ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('change', '.relation', function() {
            let from_account_id = $(this).data('id');
            if (from_account_id == "Bank") {
                $("#bankList").addClass("d-block");
            } else {
                $("#bankList").removeClass("d-block");
            }

        })

        $(document).on('change', '.toRelation', function() {
            let to_account_id = $(this).data('id');
            if (to_account_id == "Bank") {
                $("#toBankList").addClass("d-block");
            } else {
                $("#toBankList").removeClass("d-block");
            }

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/accounts/fund_transfer.blade.php ENDPATH**/ ?>