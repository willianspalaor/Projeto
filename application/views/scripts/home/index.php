
<div class="row carousel-holder">

    <div class="col-md-12">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide-image" src="/public/img/800x100.png" alt="">
                </div>
                <div class="item">
                    <img class="slide-image" src="/public/img/800x100.png" alt="">
                </div>
                <div class="item">
                    <img class="slide-image" src="/public/img/800x100.png" alt="">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>

<div class="row">

    <?php foreach($this->getProducts() as $product) : ?>
    
        <div class="col-sm-4 col-lg-4 col-md-4">

            <div class="thumbnail">

                <img src=<?php echo "/public/" . $product->getImage(); ?> alt="">

                <div class="caption">
                    
                    <h4><a data-id=<?php echo $product->getId();?> class="product" href="#" data-toggle="modal"><?php echo $product->getTittle(); ?></a></h4>

                    <?php if($this->hasDiscount($product)) : ?>

                        <strike><h5><?php echo '$' . $product->getPrice()?></h5></strike>
                        <h4><b><?php echo '$' . $this->getDiscount($product)?></b></h4>
                    
                    <?php else: ?>

                        <h4><b><?php echo '$' . $product->getPrice();?></b></h4>

                    <?php endif ?>

                    <p><?php echo $product->getDescription();?></p>

                </div>
            </div>
        </div>

    <?php endforeach; ?> 

</div>

<div>
    <?php include_once 'product.php';?> 
</div>
