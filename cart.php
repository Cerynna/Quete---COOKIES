<?php require 'inc/head.php'; ?>
<section class="cookies container">
    <div class="row">
        <h2>Votre Pannier</h2>
        <?php
        $panier = $_COOKIE['card'];

        foreach ($panier as $id => $number) : ?>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img src="<?php echo $arrayCookies[$id]['img']; ?>" alt="cookies choclate chips" class="img-responsive imgCard img-thumbnail">
                </div>
                <div class="col-xs-4 col-sm-3 col-md-4 col-lg-4">
                    <h4><?php echo $arrayCookies[$id]['name']; ?></h4>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <?php echo $arrayCookies[$id]['cooker']; ?>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <input id="number" type="number" value="<?php echo $number; ?>" size="2">
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
