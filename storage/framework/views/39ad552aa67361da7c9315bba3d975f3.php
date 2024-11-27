<tr class="0" id="row_<?php echo e($row); ?>"> 
    <td class="border-top-0"> 
        <div class="primary_input" >
            <select class="primary_select w-100 form-control subject_required selectSubject" data-subjet_row_id="<?php echo e($row); ?>" name="routine[<?php echo e($row); ?>][subject]"  id="subject_<?php echo e($row); ?>" >
                <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> *" value="" ><?php echo app('translator')->get('common.select_subject'); ?> *</option>

                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                <option value="<?php echo e(@$subject->subject_id); ?>" <?php echo e($routine->subject_id == $subject->subject_id ?'selected':''); ?>><?php echo e(@$subject->subject->subject_name); ?></option>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <span class="text-danger subject_error"></span>  
            </div>
    </td>
       
    <td class="border-top-0"> 
        <div class="row " id="teacher-div">
            <div class="col-lg-12">
                <select class="primary_select  form-control selectTeacher" data-teacher_row_id="<?php echo e($row); ?>" name="routine[<?php echo e($row); ?>][teacher_id]" id="teacher_<?php echo e($row); ?>">
                    <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?>" required value=""><?php echo app('translator')->get('common.select_teacher'); ?></option>
                   
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                            <option value="<?php echo e(@$teacher->id); ?>" <?php echo e($routine->teacher_id == $teacher->id?'selected':''); ?>><?php echo e(@$teacher->full_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                    
                </select>
                <div class="pull-right loader loader_style" id="select_teacher_loader">
                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                </div>
                <span class="text-danger"  id="teacher_error"></span>
            </div>
        </div>
    </td> 

    <td class="border-top-0">  
        <div class="row no-gutters input-right-icon">
            <div class="col">
                <div class="primary_input">
                    <input class="primary_input_field primary_input_field time start_time_required  form-control<?php echo e(@$errors->has('start_time') ? ' is-invalid' : ''); ?> selectStartTime" type="text" name="routine[<?php echo e($row); ?>][start_time]" data-start_time_row_id = "<?php echo e($row); ?>"  value="<?php echo e(isset($routine)? $routine->start_time: ''); ?>" required id="start_time_<?php echo e($row); ?>">
               
                    
                    <span class="text-danger start_time_error"></span> 
                </div>
            </div>
            <div class="col-auto">
                <button class="" type="button">
                    <i class="ti-timer"></i>
                </button>
            </div>
        </div> 
   
    </td>   

    <td class="border-top-0">   
        <div class="row no-gutters input-right-icon">
            <div class="col">
                <div class="primary_input">
                    <input class="primary_input_field primary_input_field time end_time_required  form-control<?php echo e(@$errors->has('end_time') ? ' is-invalid' : ''); ?> selectEndTime" type="text" name="routine[<?php echo e($row); ?>][end_time]" data-end_time_row_id = "<?php echo e($row); ?>"  value="<?php echo e(isset($routine)? $routine->end_time: ''); ?>" required id="end_time_<?php echo e($row); ?>">
                   
                    
                    <span class="text-danger end_time_error"></span> 
                </div>
            </div>
            <div class="col-auto">
                <button class="" type="button">
                    <i class="ti-timer"></i>
                </button>
            </div>
        </div>
       
    </td>
    <td class="border-top-0">
        <div class="primary_input">
            <input type="checkbox" id="isBreak[<?php echo e($row); ?>]" class="common-checkbox is_break_checkbox" data-row_id="<?php echo e($row); ?>" value="1"
             name="routine[<?php echo e($row); ?>][is_break]"
             <?php echo e(isset($routine)? ($routine->is_break == 1 ? 'checked':''):''); ?>

             >
               
        </div>
    </td>
    <td class="border-top-0 text-center">
        <div class="primary_input">
           <a href="" class="btn-primary" data-toggle="modal" data-target="#multipleDays_<?php echo e($row); ?>" > <i class="fa fa-calendar"></i></a>
        </div>
    </td>
    <td class="border-top-0">   
        <div class="row">
            <div class="col-lg-12">
                <select class="primary_select  form-control selectRoom" data-room_row_id="<?php echo e($row); ?>" name="routine[<?php echo e($row); ?>][room]" id="room_<?php echo e($row); ?>">
                    <option data-display="<?php echo app('translator')->get('common.select_room'); ?>" value=""><?php echo app('translator')->get('common.select_room'); ?></option>
                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                        <option value="<?php echo e(@$room->id); ?>" <?php echo e(isset($routine)? ($routine->room_id == $room->id?'selected':''):''); ?>><?php echo e(@$room->room_no); ?></option>
                      
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="text-danger"  id="room_error"></span>
            </div>
        </div>
    </td>
    <td class="border-top-0">
     
        <?php if(userPermission('delete-class-routine')): ?>

            <button class="primary-btn icon-only fix-gr-bg removeRoutineRowBtn" data-row_id="<?php echo e($row); ?>" data-class_routine_id="<?php echo e($routine->id); ?>" type="button">
                <span class="ti-trash"></span>
                </button>

        <?php endif; ?>  

    </td>
  
</tr>

<div class="modal fade" id="multipleDays_<?php echo e($row); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">  
        <div class="modal-header">
            <h5 class="modal-title">Multiple Day</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>      
        <div class="modal-body">
            <input type='checkbox' id="all_days_<?php echo e($row); ?>" class='common-checkbox all_days' data-row_id="<?php echo e($row); ?>" name='all_days[]' value='0'>
            <label for='all_days_<?php echo e($row); ?>'><?php echo e(__('common.select_all')); ?></label>
            <div class='row p-0'>

                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 pr-0">
                    <input type="checkbox" class="common-checkbox day-checkbox day_<?php echo e($row); ?>" value="<?php echo e($sm_weekend->id); ?>" data-row_id="<?php echo e($row); ?>" id="day_<?php echo e($loop->index .'_'. $row); ?>"
                    name="routine[<?php echo e($row); ?>][day_ids][]"  >
                        <label for="day_<?php echo e($loop->index .'_'. $row); ?>"><?php echo e($sm_weekend->name); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="col-lg-12 text-center ">
               <div class="d-flex justify-content-between pull-right">
                     <button class="primary-btn fix-gr-bg pull right " data-dismiss="modal" ><?php echo e(__('common.Okay')); ?></button>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/academics/classRoutine/row.blade.php ENDPATH**/ ?>