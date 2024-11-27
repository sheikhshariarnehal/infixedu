
<style>
    table.dataTable tfoot th, table.dataTable tfoot td.walletAmount{
        padding: 20px 10px 20px 30px !important;
    }

    @media (max-width: 767px){
    tfoot{
        display: none;
        visibility: hidden;
    }
}
</style>

<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>
                <?php if(isset($status) && $status =='pending'): ?>
                    <?php echo app('translator')->get('common.pending'); ?> 
                <?php elseif(isset($status) && $status =='approve'): ?>
                    <?php echo app('translator')->get('wallet::wallet.approve_deposit'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('wallet::wallet.reject_deposit'); ?>
                <?php endif; ?>
               
            </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('wallet::wallet.wallet'); ?></a>
                <a href="#">
                    <?php if(isset($status) && $status =='pending'): ?>
                        <?php echo app('translator')->get('common.pending'); ?> 
                    <?php elseif(isset($status) && $status =='approve'): ?>
                        <?php echo app('translator')->get('wallet::wallet.approve_deposit'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('wallet::wallet.reject_deposit'); ?> 
                    <?php endif; ?>
                   
                </a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_st_admin_visitor mt-20">
    <div class="container-fluid p-0">
        <div class="white-box  mt-40">
            <div class="main-title m-0">
                <h3>
                    <?php if(isset($status) && $status =='pending'): ?>
                        <?php echo app('translator')->get('common.pending'); ?> 
                    <?php elseif(isset($status) && $status =='approve'): ?>
                        <?php echo app('translator')->get('wallet::wallet.approve_deposit'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('wallet::wallet.reject_deposit'); ?>
                    <?php endif; ?>
                
                </h3>
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
                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.method'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.amount'); ?></th>
                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.note'); ?></th>
                                    <?php if(isset($status) && $status =='reject'): ?>
                                        <th><?php echo app('translator')->get('wallet::wallet.reject_note'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('common.file'); ?></th>
                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                    <?php if(isset($status) && $status =='approve'): ?>
                                        <th><?php echo app('translator')->get('wallet::wallet.approve_date'); ?></th>
                                    <?php elseif(isset($status) && $status =='reject'): ?>
                                        <th><?php echo app('translator')->get('wallet::wallet.reject_date'); ?></th>
                                    <?php elseif(isset($status) && $status =='pending'): ?>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="walletAmount"></td>
                                    <td class="walletAmount"></td>
                                    <td class="walletAmount"><?php echo app('translator')->get('exam.result'); ?></td>
                                    <td class="walletAmount"><?php echo e(currency_format($walletTotalAmounts)); ?></td>
                                    <td class="walletAmount"></td>
                                    <td class="walletAmount"></td>
                                    <td class="walletAmount"></td>
                                    <td class="walletAmount"></td>
                                    <td class="walletAmount"></td>
                                    <?php if(isset($status) && $status =='reject'): ?>
                                        <td class="walletAmount"></td>
                                    <?php endif; ?>
                                </tr>
                            </tfoot>
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
</section>

    <div class="modal fade admin-query" id="noteModal">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.view_note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-0 mt-30">
                    <div class="container student-certificate">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <input type="hidden" name="noteId" value="">
                                <p name="note"></p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade admin-query" id="rejectNote">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.view_reject_note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-0 mt-30">
                    <div class="container student-certificate">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <input type="hidden" name="rejectNoteId" value="">
                                <p name="note"></p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade admin-query" id="showFile">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.view_file'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-0 mt-30">
                    <div class="container student-certificate">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <input type="hidden" name="fileId" value="">
                                    <div class="mb-5">
                                        <img class="img-fluid" src="">
                                    </div>
                                    <br>
                                    <div class="mb-5">
                                        <?php if(isset($status) && $status =='approve'): ?>
                                        <?php if(userPermission("wallet.approve-diposit")): ?>
                                                <a class="file" href="" download><?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(isset($status) && $status =='reject'): ?>
                                            <?php if(userPermission("wallet.download")): ?>
                                                <a class="file" href="" download><?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(isset($status) && $status =='pending'): ?>
                                            <?php if(userPermission("wallet.download")): ?>
                                                <a class="file" href="" download><?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php if(isset($status) && $status =='pending'): ?>
        
        <div class="modal fade admin-query" id="approvePayment">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('wallet::wallet.approve'); ?> <?php echo app('translator')->get('wallet::wallet.payment'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="text-center">
                            <h4><?php echo app('translator')->get('wallet::wallet.are_you_sure_to_approve'); ?></h4>
                        </div>

                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                            <?php echo e(Form::open(['method' => 'POST','route' =>'wallet.approve-payment'])); ?>

                                <input type="hidden" name="approveId" value="">
                                <input type="hidden" name="user_id" value="">
                                <input type="hidden" name="amount" value="">
                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('wallet::wallet.approve'); ?></button>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        
        <div class="modal fade admin-query" id="rejectwalletPayment" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('wallet::wallet.reject'); ?> <?php echo app('translator')->get('wallet::wallet.payment'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                                <h4><?php echo app('translator')->get('wallet::wallet.are_you_sure_to_reject'); ?></h4>
                            </div>
                        <?php echo e(Form::open(['route' => 'wallet.reject-payment', 'method' => 'POST'])); ?>

                                <input type="hidden" name="rejectPId" value="">
                                <input type="hidden" name="user_id" value="">
                                <input type="hidden" name="amount" value="">
                            <div class="form-group">
                                <label><strong><?php echo app('translator')->get('wallet::wallet.reject_note'); ?></strong></label>
                                <textarea name="reject_note" class="form-control" rows="6"></textarea>
                            </div>
            
                            <div class="mt-40 d-flex justify-content-between">
                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                                <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.submit'); ?></button>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
        
    <?php endif; ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function noteModal(id) {
            var note = $('.walletNote'+ id).data('note');
            var modal = $('#noteModal');
            modal.find('input[name=noteId]').val(id)
            modal.find('p[name=note]').text(note)
            modal.modal('show');
        }

        function rejectNote(id) {
            var note = $('.rejectNote'+ id).data('rejectnote');
            var modal = $('#rejectNote');
            modal.find('input[name=rejectNoteId]').val(id)
            modal.find('p[name=note]').text(note)
            modal.modal('show');
        }

        function showFile(id) {
            var file = $('.showFile'+ id).data('file');
            var asset = $('.asset'+ id).data('asset');
            var modal = $('#showFile');
            modal.find('input[name=fileId]').val(id)
            modal.find('a[class=file]').attr("href", file)
            modal.find('img[class=img-fluid]').attr("src", asset)
            modal.modal('show');
        }

        function approvePayment(id) {
            var user = $('.approvePayment'+ id).data('user');
            var amount = $('.amount'+ id).data('amount');
            var modal = $('#approvePayment');
            modal.find('input[name=approveId]').val(id)
            modal.find('input[name=user_id]').val(user)
            modal.find('input[name=amount]').val(amount)
            modal.modal('show');
        }

        function rejectwalletPayment(id) {
            var user = $('.rejectwalletPayment'+ id).data('user');
            var amount = $('.amount'+ id).data('amount');
            var modal = $('#rejectwalletPayment');
            modal.find('input[name=rejectPId]').val(id)
            modal.find('input[name=user_id]').val(user)
            modal.find('input[name=amount]').val(amount)
            modal.modal('show');
        }

        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(url('wallet/wallet-diposit-datatable')); ?>",
                    data: {
                        'status' : '<?php echo e(@$status); ?>'
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                } ),
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},  
                    {data: 'user_name', name: 'users.full_name', orderable: true, searchable: true},
                    {data: 'payment_method', name: 'payment_method', orderable: false, searchable: true},  // Removed extra comma
                    {data: 'amount', name: 'amount', orderable: true, searchable: true},
                    {data: 'walletStatus', name: 'walletStatus', orderable: false, searchable: false},
                    {data: 'walletNote', name: 'walletNote', orderable: false, searchable: false},
                    
                    <?php if(isset($status) && $status == 'reject'): ?>
                        {data: 'walletRejectNote', name: 'walletRejectNote', orderable: false, searchable: false},
                    <?php endif; ?>

                    {data: 'showFile', name: 'showFile', orderable: false, searchable: false},
                    {data: 'createdDate', name: 'created_at', orderable: true, searchable: true},
                    
                    <?php if(isset($status) && $status == 'approve'): ?>
                        {data: 'updatedDate', name: 'updated_at', orderable: true, searchable: true},
                    <?php elseif(isset($status) && $status != 'pending'): ?>
                        {data: 'updatedDate', name: 'updated_at', orderable: true, searchable: true}, 
                    <?php elseif(isset($status) && $status == 'pending'): ?>
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    <?php endif; ?>
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
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\infixedu\Modules/Wallet\Resources/views/_walletRequest.blade.php ENDPATH**/ ?>