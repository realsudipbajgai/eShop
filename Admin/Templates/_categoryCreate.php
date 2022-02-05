<?php include_once '../../DatabaseController/DBController.php';?>
<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $name=$name_err="";
        // Validate name
        $input_name = trim($_POST["name"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
            $name = $input_name;
        }

        $obj = new Query();
        $conditionArr = array(
            'name' => $name
        );
        if($obj->insertData('category', $conditionArr)){
            header("Location:../categories/index.php");
        }
    }
?>

<div class="container vh-100">
    <h2 class="mt-4">Add a new Category</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="form-group">

            <input type="text" class="form-control" name="name" id="_admin-category"  placeholder="Enter Category">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
