<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li  data-filter=".best-selling">Best Selling</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
           
            <?php 
          
            $data = index();

                foreach ($data as $key => $item) {
                    $img = 'admin/img/product_image/'. $item['img'];             ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix <?php echo $item['category'] ?>">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="admin/img/product_image/<?php echo rawurlencode($item['img'])?>">
                      
                    </div>
                    <div class="product__item__text">
                        <h6><?php echo $item['prd_name'] ?></h6>
                        <a href="user/order.php?id=<?php echo $item['id'] ?>" class="add-cart">Order</a>
                        <span style="display: inline-block;">Price :-<h5> RM <span id="price"><?php echo $item['prd_price'] ?></span> </h5></span>
                     
                    </div>
                </div>
            </div>
           <?php }?>
      
        </div>
    </div>
</section>