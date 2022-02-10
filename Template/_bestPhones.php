<?php
include_once 'DatabaseController/DBController.php';
include_once 'Global/ResizeImage.php';
$obj=new Query();
$result = $obj->getData('product','*','','','rand()','','6');
//$result = $obj->getData('product','*');

?>
<!--wrapper for content other than banner and footer-->
<div class="container">
    <!--Best Phones-->
    <section id="best-phones">
        <h4>Best Phones</h4>
        <div class="swiper best-phones-swiper">
            <div class="swiper-wrapper">

                <?php
                if($result){
                    $i=0;
                    while($i<count($result)){
                        $row=$result[$i];
                        //for resizing
                        $target_dir = "Uploads/";
                        $target_file = $target_dir .$row['image'];

                        $image = new ResizeImage();
                        $image->load($target_file);


                        $image->resize(280,300);
                        $image->save('Uploads/Resized/'.$row['image']);
                        ?>
                        <div class="swiper-slide  text-center">
                            <img src="Uploads/Resized/<?php echo $row['image']?>" alt="" class="img-fluid" >
                            <p> <?php echo $row["name"];?></p>
                        </div>


                        <!--close while-->
                        <?php $i++; }}

                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!--!Best Phones-->