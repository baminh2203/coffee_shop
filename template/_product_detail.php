<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
    $item_id =$_GET['item_id']??1;
    foreach ($product->getData() as $item):
        if($item['item_id'] == $item_id):


?>

<section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo $item['item_image']; ?>" alt="product" class="img-fluid">
                </div>
                <div class="col-sm-6 py-5">
                    <h5 class="font-baloo font-size-20"><?php echo $item['item_name']; ?></h5>
                    <hr>
                    <table class="my-3">
                        <tr class="font-rale font-size-14">
                            <td>Price:</td>
                            <td class="font-size-20 text-danger"><?php echo $item['item_price']; ?></td>
                        </tr>
                    </table>
                    <!-- product qty secton -->
                    <div class="qty d-flex">
                        <h6 class="font-baloo">Quantity:</h6>
                        <div class="px4 d-flex font-rale">
                            <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                            <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                            <button data-id="pro1" class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                        </div>
                    </div>
                     <!-- !product qty secton -->
                    <div class="form-row pt-4 font-size-16 font-baloo">
                        <div class="col">
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if(in_array($item['item_id'], $cart->getCardID($product->getData('cart')))){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the cart</button>';
                                }else{
                                    echo '<button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }

                                ?>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
      </section>
        <?php
        endif;
         endforeach;
            ?>