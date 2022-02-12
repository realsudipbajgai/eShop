<?php
include_once 'DatabaseController/DBController.php';
$obj=new Query();
//$result = $obj->getData('product','*','','','rand()','','6');
$result = $obj->getData('product','*');

?>
<!-- Best Pricing-->
<section id="best-pricing">
    <div class="wrapper mb-5">
        <h4>Best Pricing</h4>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <?php
                if($result){
                    $i=0;
                    while($i<count($result)){
                        $row=$result[$i];
                        //for resizing
//                        $target_dir = "Uploads/";
//                        $target_file = $target_dir .$row['image'];
//
//                        $image = new ResizeImage();
//                        $image->load($target_file);
//
//
//                        $image->resize(300,280);
//                        $image->save('Uploads/Resized/'.$row['image']);
                        ?>
                        <div class="swiper-slide  text-center">

                            <a href="product.php?id=<?php echo $row['id'];?>"> <img src="Uploads/<?php echo $row['image']?>" alt="" width="300" height="280"  ></a>

                            
                        </div>


                        <!--close while-->
                        <?php $i++; }}

                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!--!Best Pricing -->
</div>
<!--wrapper for content other than banner and footer-->
