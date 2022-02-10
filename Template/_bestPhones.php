<?php
include_once 'DatabaseController/DBController.php';
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
                        ?>
                        <div class="swiper-slide  text-center">
                            <img src="Uploads/<?php echo $row['image']?>" alt=""  >
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