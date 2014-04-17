<!-- Start the Footer Container -->
<footer class="container footer" role="contentinfo">
    <div class="row">
        <div class="column medium-4 large-5 message">
            <?php
                $quoteStack = Stack::getByName('Footer Left')->getBlocks();
                if( !empty($quoteStack) ){
                    $quoteStack[array_rand($quoteStack)]->display();
                }
            ?>
        </div>
        <div class="column medium-8 large-7 contact">
            <a href="mailto:info@svalinn.com" class="btn btn-lg btn-contact btn-arrow uppercase">Email Us</a>
            <div class="or fwsb">OR</div>
            <a href="tel:1-307-200-1223" class="btn btn-lg btn-disabled uppercase">307.200.1223</a>
        </div>
    </div>
    <div class="row copyright">
        <div class="column small-12">
            <p class="text-center">Copyright &copy; <?php echo date('Y'); ?> Svalinn • All Rights Reserved</p>
        </div>
    </div>
</footer>