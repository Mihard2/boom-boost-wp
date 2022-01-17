<div class="container header header-desctop">
    <a class="header__trust" href="/">
        <div class="header__trust-stars">TrustPilot
            <div class="header__trust-stars-logo icons-main icons-main__trustpilot-2"></div>
        </div>
        <div class="header__trust-counter">TrustScore <span> 9.8 </span>Reviews <span> 484 </span></div>
    </a>
    <?php get_search_form($args); ?>
    <div class="header__support">
        <div class="header__support-title">support 24/7</div>
        <div class="header__support-wrapper">
            <a class="header__support-link icons-main icons-main__discord" href="#">
            </a>
            <a class="header__support-link icons-main icons-main__instagram" href="#"> </a>
            <a class="header__support-link icons-main icons-main__skype" href="#"> </a>
        </div>
    </div>



    <?= do_shortcode('[woo_multi_currency_plain_horizontal]');?>



    <div class="header__login">
        <a class="header__login-icon icons-main icons-main__login"></a>
        <div class="header__login-wrapp">
            <a href="#">Sign In</a>
            <span class="separator">/</span>
            <a href="#">Sign
                Up</a>
        </div>
    </div>
    <a class="header__cart link link-bg cart_totals" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
        <div class="header__cart-counter icons-main icons-main__cart"><span class="header__cart-counterTotal">
         <?= WC()->cart->get_cart_contents_count();?>
        </span>
        </div>
        <div class="header__cart-total">
            <?= WC()->cart->get_cart_subtotal();?>
        </div>
    </a>
</div>