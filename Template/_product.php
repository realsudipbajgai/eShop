<?php include_once 'DatabaseController/DBController.php';
include_once 'Global/ResizeImage.php';

?>
<?php
$obj=new Query();
$result=$obj->getInnerDatabyId('product','product_details','id','product_id',trim($_GET['id']));
$brand=$obj->getDatabyId('brand','*',$result['brand']);

//for resizing
$target_dir = "Uploads/";
$target_file = $target_dir .$result['image'];

$image = new ResizeImage();
$image->load($target_file);


$image->resize(495,495);
$image->save('Uploads/Resized/'.$result['image']);
?>
<div class="container mb-5">
    <div class="grid ">
        <div class="row pt-3">
            <div class="col-sm-6">
                <img class="img-fluid" src="Uploads/Resized/<?php echo $result['image']; ?>" alt="image">
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="font-weight-bold font-size-24 col-sm-8"><?php echo $result['name']; ?></div>
                    <div class="col-sm-2 pt-2 text-danger font-line-through"><?php echo $result['old_price']; ?></div>
                    <div class="col-sm-2 pt-2 text-primary text-sm-right"><?php echo $result['new_price']; ?></div></p>
                </div>

                <p class="font-size-14 font-italic text-secondary"><?php echo $brand['name']; ?></p>
                <p><?php echo $result['description']; ?></p>
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Colors and Special Edition</h4>
                        <div class="d-flex justify-content-around">
                            <div class="color-bg-silver rounded-circle p-3"><button class="btn font-size-14"></button></div>
                            <div class=" color-bg-gold rounded-circle p-3"><button class="btn font-size-14"></button></div>
                            <div class=" color-bg-coral rounded-circle p-3"><button class="btn font-size-14"></button></div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                        <h4>Size</h4>
                        <div>N/A</div>
                    </div>
                </div>

                <hr>
                <div class="row ">
                    <input type="checkbox" class="col-sm-2">
                    <p class="col-sm-10">Add 3-Month free trial for even more guidance and motivation (regularly $9.99/mo).New Premium users only <a href="#">Learn More</a></p>
                </div>
                <div class="row">
                    <input type="checkbox" class="col-sm-2">
                    <p class="col-sm-10">Add 2-Year Preotection Plan with Accidental Damage Coerage for $99.99 per device <a href="#">Learn More</a></p>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-5 btn btn-secondary"><?php echo $result['new_price']; ?></div>
                    <a class="col-sm-6 ml-sm-3 btn btn-warning" href="./cart.php">Add to Cart</a>
                </div>
                <div class="row mt-2 col-sm-12 border border-success bg-success rounded-pill justify-content-center text-warning">You Save $25.00</div>
                <a href="#" class="text-primary"> <span><i class="fas fa-truck"></i></span> Free Shippin on orders $50+</a>
            </div>
        </div>


    </div>
</div>