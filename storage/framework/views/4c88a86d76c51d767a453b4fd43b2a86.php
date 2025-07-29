

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h3>Your Cart</h3>
    <?php if(count($cart)): ?>
        <ul class="list-group mb-4">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <img src="<?php echo e(asset($item['image'])); ?>" alt="" style="width:40px; height:40px; object-fit:cover; margin-right:10px;">
                        <?php echo e($item['title']); ?> - <strong><?php echo e($item['price']); ?></strong>
                    </div>
                    <form method="POST" action="<?php echo e(route('cart.remove')); ?>" class="d-inline remove-cart-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($item['id']); ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a href="<?php echo e(url('/pay')); ?>" class="btn btn-success">Proceed to Payment</a>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>
<script>
document.querySelectorAll('.remove-cart-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        fetch(this.action, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': this.querySelector('[name=_token]').value, 'Accept': 'application/json'},
            body: new FormData(this)
        }).then(res => res.json()).then(data => {
            if(data.success) location.reload();
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\bookshop-app\resources\views/cart.blade.php ENDPATH**/ ?>