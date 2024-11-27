<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.generate_payroll'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        element.style {
            width: 190px !important;
        }

        table.dataTable thead th {
            /* padding: 10px 30px !important; */
            padding-left: 25px !important;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 20px 10px 20px 15px !important;
        }

        table.dataTable thead .sorting::after {
            left: 10px !important;
            top: 10px;
        }

        table.dataTable thead .sorting_asc::after {
            left: 10px !important;
            top: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.generate_payroll'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.human_resource'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.generate_payroll'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(userPermission('payroll-search')): ?>
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
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'payroll', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row">
                                <div class="col-lg-4 mt-30-lg">
                                    <select
                                        class="primary_select  form-control <?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>"
                                        name="role_id" id="role_id">
                                        <option data-display="<?php echo app('translator')->get('hr.role'); ?> *" value=""><?php echo app('translator')->get('hr.select_role'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"
                                                <?php echo e(isset($role_id) ? ($role_id == $value->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('role_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('role_id')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php $month = date('F'); ?>
                                <div class="col-lg-4 mt-30-lg">
                                    <select
                                        class="primary_select  form-control <?php echo e($errors->has('payroll_month') ? 'is-invalid' : ''); ?>"
                                        name="payroll_month" id="payroll_month">
                                        <option data-display="<?php echo app('translator')->get('student.select_month'); ?> *" value=""><?php echo app('translator')->get('student.select_month'); ?> *
                                        </option>
                                        <option value="January"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'January' ? 'selected' : '') : ($month == 'January' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.january'); ?></option>
                                        <option value="February"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'February' ? 'selected' : '') : ($month == 'February' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.february'); ?></option>
                                        <option value="March"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'March' ? 'selected' : '') : ($month == 'March' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.march'); ?></option>
                                        <option value="April"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'April' ? 'selected' : '') : ($month == 'April' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.april'); ?></option>
                                        <option value="May"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'May' ? 'selected' : '') : ($month == 'May' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.may'); ?></option>
                                        <option value="June"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'June' ? 'selected' : '') : ($month == 'June' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.june'); ?></option>
                                        <option value="July"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'July' ? 'selected' : '') : ($month == 'July' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.july'); ?></option>
                                        <option value="August"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'August' ? 'selected' : '') : ($month == 'August' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.august'); ?></option>
                                        <option value="September"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'September' ? 'selected' : '') : ($month == 'September' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.september'); ?></option>
                                        <option value="October"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'October' ? 'selected' : '') : ($month == 'October' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.october'); ?></option>
                                        <option value="November"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'November' ? 'selected' : '') : ($month == 'November' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.november'); ?></option>
                                        <option value="December"
                                            <?php echo e(isset($payroll_month) ? ($payroll_month == 'December' ? 'selected' : '') : ($month == 'December' ? 'selected' : '')); ?>>
                                            <?php echo app('translator')->get('student.december'); ?></option>
                                    </select>
                                    <?php if($errors->has('payroll_month')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('payroll_month')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-lg">
                                    <select
                                        class="primary_select form-control<?php echo e($errors->has('payroll_year') ? ' is-invalid' : ''); ?>"
                                        name="payroll_year" id="payroll_year">
                                        <option data-display="<?php echo app('translator')->get('hr.select_year'); ?> *" value=""><?php echo app('translator')->get('hr.select_year'); ?> *
                                        </option>
                                        <?php
                                            $year = date('Y');
                                            $ini = date('y');
                                            $limit = $ini + 30;
                                        ?>
                                        <?php for($i = $ini; $i <= $limit; $i++): ?>
                                            <option value="<?php echo e($year); ?>"
                                                <?php echo e(isset($payroll_year) ? ($payroll_year == $year ? 'selected' : '') : (date('Y') == $year ? 'selected' : '')); ?>>
                                                <?php echo e($year--); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <?php if($errors->has('payroll_year')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('payroll_year')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($staffs)): ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('hr.staff_list'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="table_id" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('hr.staff_no'); ?></th>
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('hr.role'); ?></th>
                                                <th><?php echo app('translator')->get('hr.department'); ?></th>
                                                <th><?php echo app('translator')->get('common.description'); ?></th>
                                                <th><?php echo app('translator')->get('common.mobile'); ?></th>
                                                <th><?php echo app('translator')->get('hr.paid'); ?></th>
                                                <th style="width: 190px !important;"><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $getPayrollDetails = $value->payrollStatus;
                                                    ?>
                                                <tr>
                                                    <td><?php echo e($value->staff_no); ?></td>
                                                    <td><?php echo e($value->first_name); ?>&nbsp;<?php echo e($value->last_name); ?></td>
                                                    <td><?php echo e($value->roles != '' ? $value->roles->name : ''); ?></td>
                                                    <td><?php echo e($value->departments != '' ? $value->departments->name : ''); ?></td>
                                                    <td><?php echo e($value->designations != '' ? $value->designations->title : ''); ?>

                                                    </td>
                                                    <td><?php echo e($value->mobile); ?></td>
                                                    <td>
                                                        <?php echo e($getPayrollDetails ?  $getPayrollDetails->payrollPayments->sum('amount') : __('hr.not_generated')); ?>

                                                    </td>
                                                    <td>
                                                        
                                                        <?php if(!empty($getPayrollDetails)): ?>
                                                            <?php if($getPayrollDetails->payroll_status == 'G'): ?>
                                                          
                                                                <?php if(count($getPayrollDetails->payrollPayments) > 0): ?>
                                                                    <button
                                                                    class="primary-btn small bg-warning text-white border-0">
                                                                    <?php echo app('translator')->get('fees.partial'); ?></button>
                                                                <?php else: ?>
                                                                    <button
                                                                        class="primary-btn small bg-warning text-white border-0">
                                                                        <?php echo app('translator')->get('hr.generated'); ?></button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <?php if($getPayrollDetails->payroll_status == 'P'): ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0">
                                                                    <?php echo app('translator')->get('fees.paid'); ?> </button>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            
                                                            <button
                                                                class="primary-btn small bg-danger text-white border-0 nowrap"><?php echo app('translator')->get('hr.not_generated'); ?></button>
                                                        <?php endif; ?>
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
                                                            <?php if(!empty($getPayrollDetails)): ?>
                                                                <?php if($getPayrollDetails->payroll_status == 'G'): ?>
                                                                    <?php if(userPermission('pay-payroll')): ?>
                                                                        <a class="dropdown-item modalLink"
                                                                            data-modal-size="modal-lg"
                                                                            title="<?php echo app('translator')->get('hr.proceed_to_pay'); ?>"
                                                                            href="<?php echo e(route('pay-payroll', [$getPayrollDetails->id, $value->role_id])); ?>"><?php echo app('translator')->get('hr.proceed_to_pay'); ?></a>
                                                                    <?php endif; ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('print-payslip', $getPayrollDetails->id)); ?>"><?php echo app('translator')->get('hr.print'); ?></a>
                                                                <?php endif; ?>
                                                                <?php if($getPayrollDetails->payroll_status == 'P'): ?>
                                                                    <?php if(userPermission('view-payslip')): ?>
                                                                        <a class="dropdown-item modalLink"
                                                                            data-modal-size="modal-md"
                                                                            title="<?php echo app('translator')->get('hr.view_payslip'); ?>"
                                                                            href="<?php echo e(route('view-payslip', $getPayrollDetails->id)); ?>"><?php echo app('translator')->get('hr.view_payslip'); ?></a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <?php if($getPayrollDetails->payrollPayments): ?>
                                                                    <a class="dropdown-item modalLink" title="View Payroll Payment"
                                                                    data-modal-size="modal-xl"
                                                                  
                                                                href="<?php echo e(route('view-payroll-payment', $getPayrollDetails->id)); ?>"><?php echo app('translator')->get('hr.view Payment'); ?></a>
    
                                                                
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php if(userPermission('generate-Payroll')): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('generate-Payroll', [@$value->id, @$payroll_month, @$payroll_year])); ?>"><?php echo app('translator')->get('hr.generate_payroll'); ?></a>
                                                                <?php endif; ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/humanResource/payroll/index.blade.php ENDPATH**/ ?>