<?php
include_once '../../DatabaseController/DBController.php';
//include_once '../../Global/ResizeImage.php';

$obj=new Query();
$result = $obj->getData('product','*');

?>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>My Customers</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<div class="container min-vh-100">

    <table class="table table-striped" id="myTable">
        <thead>
        <tr>
            <td >#</td>
            <td >Name</td>
            <td >Brand</td>
            <td >Category</td>
            <td >Image</td>
            <td >Actions</td>
        </tr>
        </thead>
        <tbody>
        <?php
        if($result){
            $i=0;
            while($i<count($result)){
                $row=$result[$i];
                $brand=$obj->getDatabyId('brand','name',$row['brand']);
                $category=$obj->getDatabyId('category','name',$row['category']);

//        //for resizing
//            $target_dir = "../../Uploads/";
//            $target_file = $target_dir .$row['image'];
//
//            $image = new ResizeImage();
//            $image->load($target_file);
//
//
//            $image->resize(100,120);
//            $image->save('../../Uploads/Resized/'.$row['image']);

                ?>
                <tr>
                    <th scope="row"><?php echo $i+1;?></th>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $brand['name'];?></td>
                    <td><?php echo $category['name'];?></td>
                    <td><img src="../../Uploads/<?php echo $row['image'];?>" alt="" width="100" height="120" class="img-fluid img-thumbnail"> </td>
                    <td class="align-middle">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a  class="dropdown-item" href="../products/addProductDetails.php?id=<?php echo $row['id'];?>"><span class="text-primary"><i class="fas fa-add"></i>Add Details</span></a>
                                <a  class="dropdown-item" href="../products/editProductDetails.php?id=<?php echo $row['id'];?>"><span class="text-info"><i class="fas fa-edit"></i>Edit Details</span></a>
                                <a  class="dropdown-item" href="../products/viewProductDetails.php?id=<?php echo $row['id'];?>"><span class="text-warning"><i class="fas fa-eye"></i>View Details</span></a>
                                <a class="dropdown-item"  href="../products/update.php?id=<?php echo $row['id'];?>"><span class="text-secondary"><i class="fas fa-edit"></i>Edit Product</span></a>
                                <a class="dropdown-item"  href="../products/view.php?id=<?php echo $row['id'];?>"><span class="text-success"><i class="fas fa-eye"></i>View Product</span></a>
                                <a  class="dropdown-item" href="../products/delete.php?id=<?php echo $row['id'];?>"> <span class="text-danger"><i class="fas fa-trash"></i>Delete Product</span></a>
                            </div>
                        </div


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


<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>