
<?php include_once 'DatabaseController/DBController.php';?>
<?php
if(isset($_SESSION['id'])){

    $user_id=($_SESSION['id']);
    $obj=new Query();
    $cart=$obj->getAllDatabyField('cart','user_id',$user_id);
}







?>
<div class="color-bg-dark-silver min-vh-100" >
    <div class="container py-5">
        <div class="row shadow-lg">
    <?php
    if($cart){?>


                <div class="col-md-8 bg-white">
                    <div class="row font-size-18 font-weight-bold pt-3">
                        <p class="pl-3">Your Cart <span class="text-primary">(<?php echo count($cart)?>)</span></p>
                    </div>
                    <?php
                    $i=0;
                    if($cart){
                        while ($i<count($cart)){
                            $row_cart=$cart[$i];
                            $product=$obj->getInnerDatabyId('product','product_details','id','product_id',$row_cart['product_id']);

                            ?>
                            <div class="row py-2 border border-bottom ">
                                <div class="col-4 align-self-center"><a href=""><img  class="img-fluid" src="Uploads/<?php echo $product['image']; ?>" alt=""></a></div>
                                <div class="col-4 align-self-center"><a href="product.php?id=<?php echo $row_cart['product_id'];?>"><?php echo $product['name']; ?></a></div>
                                <div class="col-2 align-self-center">$<?php echo $product['new_price']; ?></div>
                                <div class="col-1 align-self-center"><a href="deleteCart.php?id=<?php echo $row_cart['id'];?>"><span class="text-danger"><i class="fas fa-trash"></i></span></a></div>
                            </div>
                            <?php  $i++;} //end while
                    } else{
                        echo "No data";
                    }

                    ?>






                </div>

                <div class="col-md-4 color-bg-silver pt-3">
                    <div class="font-weight-bold font-size-18">Summary</div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p class="text-dark">ITEMS</p>
                        <p class="text-primary"><?php echo count($cart);?></p>
                        <p class="text-danger">
                            <?php
                            $total_price=0;
                            foreach ($cart as $cart_item){
                                $product=$obj->getInnerDatabyId('product','product_details','id','product_id',$cart_item['product_id']);
                                $total_price+=$product['new_price'];
                            }
                            echo '$'.$total_price;
                            ?>
                        </p>
                    </div>
                    <hr>

                    <div class="form-group font-size-18">
                        <label for="shipping">Shipping</label>
                        <select class="form-control" id="shipping">
                            <option selected value="1">Standard Delivery-$10</option>
                            <option value="2">Rapid Delivery-$20</option>

                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-size-18 text-primary">Total Price</p>
                        <p class="text-danger">
                            <?php
                            $total_price=0;
                            foreach ($cart as $cart_item){
                                $product=$obj->getInnerDatabyId('product','product_details','id','product_id',$cart_item['product_id']);
                                $total_price+=$product['new_price'];
                            }
                            echo '$'.$total_price;
                            ?>
                        </p>

                    </div>
                    <div class="row mb-2">
                        <a href="checkout.php" class="offset-4 btn btn-warning text-center">CHECKOUT</a>
                    </div>




                </div>




    <?php }
    else{
       echo "no data";
     } ?>
        </div>
    </div>
</div>