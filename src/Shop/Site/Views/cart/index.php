<div class="row">
    <div class="col-md-6 items">
            <?php foreach($cart->items as $item): ?>
                <div class="row">
                    <?php echo $this->renderView('Shop/Site/Views::cart/blocks/item.php'); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-6 totals">
        <div class="row">
            <div class="col-md-6">
                Subtotal
            </div>
            <div class="col-md-6">
                <?php echo $cart->getSubtotal(); ?>
            </div>
        </div>
    </div>
</div>





