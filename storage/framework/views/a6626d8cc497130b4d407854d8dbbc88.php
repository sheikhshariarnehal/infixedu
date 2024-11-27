<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('inventory.item_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('inventory.item_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.inventory'); ?></a>
                <a href="#"><?php echo app('translator')->get('inventory.item_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($editData)): ?>
            <?php if(userPermission("item-list-store")): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('item-list')); ?>" class="primary-btn small fix-gr-bg">
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
                        <?php if(isset($editData)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => array('item-list-update',$editData->id), 'method' => 'PUT'])); ?>

                        <?php else: ?>
                            <?php if(userPermission("item-list-store")): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'item-list-store', 'method' => 'POST'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('inventory.edit_item'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('inventory.add_item'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row"> 
                                    <div class="col-lg-12 mb-15">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.item_name'); ?> <span class="text-danger"> *</span> </label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('item_name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="item_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->item_name : ''); ?>">
                                            
                                            
                                            <?php if($errors->has('item_name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('item_name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-15">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('inventory.item_category'); ?> <span class="text-danger"> *</span> </label>
                                            <select class="primary_select  form-control<?php echo e($errors->has('category_name') ? ' is-invalid' : ''); ?>" name="category_name" id="category_name">
                                                <option data-display="<?php echo app('translator')->get('inventory.select_item_category'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?></option>
                                                <?php $__currentLoopData = $itemCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"
                                                <?php if(isset($editData)): ?>
                                                <?php if($editData->item_category_id == $value->id): ?>
                                                    selected
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                ><?php echo e($value->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            
                                            <?php if($errors->has('category_name')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('category_name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-15">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span> </label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="4" name="description" id="description"><?php echo e(isset($editData) ? $editData->description : ''); ?></textarea>
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $tooltip = "";
                                    if(userPermission("item-list-store") || userPermission('item-list-edit')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">

                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
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
                    <div div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('inventory.item_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('inventory.item_name'); ?></th>
                                            <th><?php echo app('translator')->get('student.category'); ?> </th>
                                            <th><?php echo app('translator')->get('common.description'); ?> </th>
                                            <th><?php echo app('translator')->get('inventory.total_in_stock'); ?> </th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>  
    <script>
    $(document).ready(function() {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": $.fn.dataTable.pipeline( {
                url: "<?php echo e(route('item-list-ajax')); ?>",
                pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
            } ),
            columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'item_name', name: 'item_name'},
                    {data: 'category.category_name', name: 'category.category_name'},
                    {data: 'description', name: 'description'},
                    {data: 'total_in_stock', name: 'total_in_stock'},
                    {data: 'action', name: 'action', orderable: false, searchable: true},
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
    } );
    </script>
    <script>
        function deleteHomeWork(id){
            var modal = $('#deleteHomeWorkModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\resources\views/backEnd/inventory/itemList.blade.php ENDPATH**/ ?>