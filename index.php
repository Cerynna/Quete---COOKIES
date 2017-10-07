<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php

        //print_r($arrayCookies);
        foreach ($arrayCookies as $key => $cookie): ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="<?php echo $cookie["img"]; ?>" alt="cookies choclate chips" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?php echo $cookie["name"]; ?></h3>
                        <p>Cooked by <?php echo $cookie["cooker"]; ?> !</p>
                        <a href="?add_to_cart=<?php echo $key; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
