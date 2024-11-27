<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(__('Class Routine')); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/print/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap.min.js"></script>
</head>
<style>
    @page {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    table,
    th,
    tr,
    td {
        font-size: 11px !important;
    }

    .routineBorder {
        /* border-bottom: 1px solid; */
    }
</style>

<body style="font-family: 'dejavu sans', sans-serif;">
    <div class="container-fluid" id="pdf">
        <table cellspacing="0" width="100%">
            <tr>
                <td>
                    <img src="<?php echo e(url('/')); ?>/<?php echo e(@generalSetting()->logo); ?>" style="padding-top: 20px;"
                        alt="">
                </td>
                <td style="text-aligh:left">
                    <h3 style="font-size:20px !important; margin-bottom : 0;margin-top: 0px;" class="text-white mb-0">
                        <?php echo app('translator')->get('academics.class_routine'); ?> </h3>
                    <span style="font-size:11px !important;margin-right:10px;" align="left"
                        class="text-white"><?php echo app('translator')->get('common.class_Sec'); ?>:
                        <?php echo e(@$class->class_name . '(' . $section->section_name . ')'); ?>

                    </span>
                    <span style="font-size:11px !important;" align="left"
                        class="text-white"><?php echo app('translator')->get('common.academic_year'); ?>: <?php echo e(@$academic_year->title); ?>

                        (<?php echo e(@$academic_year->year); ?>) </span>
                </td>
                <td style="text-aligh:center">
                    <h3 style="font-size:20px !important; margin-bottom : 0;margin-top: 0px;"
                        class="text-white mb-0">
                        <?php echo e(isset(generalSetting()->school_name) ? generalSetting()->school_name : 'Infix School Management ERP'); ?>

                    </h3>
                    <span style="font-size:11px !important;margin:0px"
                        class="text-white ">
                        <?php echo e(isset(generalSetting()->address) ? generalSetting()->address : 'Infix School Address'); ?>

                    </span>
                </td>
            </tr>
        </table>
        <hr style="margin-bottom: 6px;margin-top: 6px;">
        <table class="table table-bordered table-striped" style="width: 100%; table-layout: fixed">
            <tr>
                <th style="width:7%;padding: 2px; padding-left:8px;">
                </th>
                <?php
                    $height = 0;
                    $tr = [];
                ?>
                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sm_weekend->classRoutine->count() > $height): ?>
                        <?php
                            $height = $sm_weekend->classRoutine->count();
                        ?>
                    <?php endif; ?>
                    <th style="margin-top: 0px;padding: 2px; padding-left:8px"><?php echo e(@$sm_weekend->name); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php
                $used = [];
                $tr = [];
            ?>
            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $i = 0;
                ?>
                <?php $__currentLoopData = $sm_weekend->classRoutine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if (!in_array($routine->id, $used)) {
                            $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->subject ? $routine->subject->subject_name : '';
                            $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->subject ? $routine->subject->subject_code : '';
                            $tr[$i][$sm_weekend->name][$loop->index]['class_room'] = $routine->classRoom ? $routine->classRoom->room_no : '';
                            $tr[$i][$sm_weekend->name][$loop->index]['teacher'] = $routine->teacherDetail ? $routine->teacherDetail->full_name : '';
                            $tr[$i][$sm_weekend->name][$loop->index]['start_time'] = $routine->start_time;
                            $tr[$i][$sm_weekend->name][$loop->index]['end_time'] = $routine->end_time;
                            $tr[$i][$sm_weekend->name][$loop->index]['is_break'] = $routine->is_break;
                            $used[] = $routine->id;
                        }
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $i++;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php for($i = 0; $i < $height; $i++): ?>
                <tr style="border-bottom:1px solid #000000">
                    <td style="padding-top:0px;padding-bottom:0px;font-size:10px !important;"><?php echo app('translator')->get('common.time'); ?></td>
                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td style="padding-top:0px ;padding-bottom:0px;">
                                <?php
                                    $classes = gv($days, $sm_weekend->name);
                                ?>
                                <?php if($classes && gv($classes, $i)): ?>
                                    <span style="font-size:10px !important;">
                                        <?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?> -
                                        <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?> </span>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('common.details'); ?></td>
                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td style="padding-top:0px ;padding-bottom:0px;">
                                <?php
                                    $classes = gv($days, $sm_weekend->name);
                                ?>
                                <?php if($classes && gv($classes, $i)): ?>
                                    <?php if($classes[$i]['is_break']): ?>
                                        <strong class="routineBorder"> <?php echo app('translator')->get('common.break'); ?> </strong>
                                    <?php else: ?>
                                        <?php if($classes[$i]['subject']): ?>
                                            <span class=""> <strong> <?php echo e($classes[$i]['subject']); ?> </strong>
                                                <?php if($classes[$i]['class_room']): ?>
                                                    (<?php echo e($classes[$i]['class_room']); ?>)
                                                <?php endif; ?> <br>
                                            </span>
                                        <?php endif; ?>

                                        <?php if($classes[$i]['teacher']): ?>
                                            <span class=""> <?php echo e($classes[$i]['teacher']); ?> <br> </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</body>
<script src="<?php echo e(asset('public/vendor/spondonit/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/pdf/html2pdf.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/pdf/html2canvas.min.js')); ?>"></script>
<script>
    function generatePDF() {
        const element = document.getElementById('pdf');
        var opt = {
            margin: 0.5,
            pagebreak: {
                mode: ['avoid-all', 'css', 'legacy'],
                before: '#page2el'
            },
            filename: 'class-routine.pdf',
            image: {
                type: 'jpeg',
                quality: 100
            },
            html2canvas: {
                scale: 5
            },
            jsPDF: {
                unit: 'in',
                format: 'a4',
                orientation: 'landscape'
            }
        };
        html2pdf().set(opt).from(element).save().then(function() {
            // window.close()
        });
    }
    $(document).ready(function() {
        <?php if($print): ?>
            window.print();
            setTimeout(function() {
                window.close()
            }, 3000);
        <?php else: ?>
            generatePDF();
        <?php endif; ?>
    })
</script>

</html>
<?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/academics/class_routine_print.blade.php ENDPATH**/ ?>