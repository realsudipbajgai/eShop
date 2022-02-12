<?php
include_once '../../DatabaseController/DBController.php';
$obj=new Query();
$result = $obj->getData('brand','*');

?>
<div class="container min-vh-100">
    <div class="d-flex justify-content-between">
        <h2 class="mt-3">List of Brands</h2>
        <a href="../brands/create.php" class="mt-4 text-success"><span><i class=" fas fa-add"></i></span> Add new</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($result){
            $i=0;
            while($i<count($result)){
            $row=$result[$i];
            ?>
            <tr>
                <th scope="row"><?php echo $i+1;?></th>
                <td><?php echo $row['name'];?></td>
                <td>
                    <a href="../brands/update.php?id=<?php echo $row['id'];?>"><span class="text-primary"><i class="fas fa-edit"></i></span></a>
                    <a href="../brands/view.php?id=<?php echo $row['id'];?>"><span class="text-success"><i class="fas fa-eye"></i></span></a>
                    <a href="../brands/delete.php?id=<?php echo $row['id'];?>"> <span class="text-danger"><i class="fas fa-trash"></i></span></a>
                </td>
            </tr>
            <!--close while-->
            <?php $i++; }}
        else{?>
        <tr><td colspan="4">No data</td></tr>
        <?php } //end else
        ?>

        </tbody>
    </table>
</div>