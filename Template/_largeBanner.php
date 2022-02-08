<?php
include_once 'DatabaseController/DBController.php';
$obj=new Query();
$result = $obj->getData('banner','*');

?>
<!-- Swiper Large Banner -->
<section id="large-banner">
    <div class="swiper large-banner-swiper">
        <div class="swiper-wrapper">
            <?php
            if($result){
                $i=0;
                while($i<count($result)){
                    $row=$result[$i];

                    ?>
                    <div class="swiper-slide">
                        <img src="Uploads/<?php echo $row['image']?>" alt="" class="img-fluid" width="1425px">
                    </div>


                    <!--close while-->
                    <?php $i++; }}
            else{?>
                No data
            <?php } //end else
            ?>



        </div>
        <div class="swiper-pagination"></div>
    </div>

    </div>
</section>
<!-- !Swiper Large Banner -->