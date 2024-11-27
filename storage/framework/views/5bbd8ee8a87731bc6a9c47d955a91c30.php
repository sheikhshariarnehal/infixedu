    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('wallet::wallet.wallet_pending_request'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make('wallet::_walletRequest',['status'=>'pending'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\infixedu\Modules/Wallet\Resources/views/walletPending.blade.php ENDPATH**/ ?>