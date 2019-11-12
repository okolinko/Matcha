<?php require('partials/head.php'); ?>
<div class="flex-conteiner">
	<h1>MATCHA</h1>
</div>
<!--<div class="playgame" data-gameinfo="0,0,https%3A%2F%2Fhtml5.gamedistribution.com%2F3ff269efa47241d68808d3ba9f822a41%2F" style="min-height: 0px;">-->
<!--    <iframe id="gameframe" width="800" height="600" src="https://html5.gamedistribution.com/3ff269efa47241d68808d3ba9f822a41/" scrolling="no"></iframe></div>-->

<div class="compliance_checkout">
    <input type="checkbox" name="subscribe" class="checkbox" id="checkout_subscribe" value="">

    <label for="checkout_subscribe">
        <span>Yes, sign me up to receive emails on new arrivals, special offers and promotions.</span>
<!--    </label><h2>Please agree to our Terms and Conditions</h2>-->
</div>
<div class="compliance_checkout">
    <input type="checkbox" name="subscribe" class="checkbox" id="checkout_agreement" value="">

    <label for="checkout_agreement">
        <span>Yes, sign me up to receive emails on new arrivals, special offers and promotions.</span>
<!--    </label><h2>Please agree to our Terms and Conditions</h2>-->
</div>
<div class="actions-toolbar">
    <button class="checkout" type="submit"

                   >
        <span>Place Order</span>
    </button>
</div>

<?php require('partials/footer.php'); ?>
<script type="text/javascript" src="//matcha.loc/public/js/index.js"></script>

