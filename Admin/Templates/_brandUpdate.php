<?php
require_once '../../DatabaseController/DBController.php';
$obj=new Query();

if ($_SERVER["REQUEST_METHOD"]=="GET"&&!empty(trim($_GET["id"]))){
    $id=trim($_GET["id"]);
    $conditionArr=array('id'=>$id);
    $result=$obj->getData('brand','*',$conditionArr);
    if(count($result)>0){
        $row=current($result);
    }

}
else{
    if ($_SERVER["REQUEST_METHOD"]=="POST"&&!empty(trim($_POST["id"]))){
        $name=$name_err="";
        //validate name
        $input_name=trim($_POST["name"]);
        if(empty($input_name)){
            $name_err="Please enter a name";
        }elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        }
        else{
            $name=$input_name;
        }



        if(empty($name_err)){
            $conditionArr=array(
                'name'=>$name
            );
            if($obj->updateData('brand',$conditionArr,'id',$_POST["id"])){
                header('location:../brands/index.php');
            }

        }
    }
    else{
        //if url for for $_GEt doesnt contain id
        header("location:../../error.php");
        exit();
    }

}
?>
<div class="container vh-100">
    <h2 class="mt-4">Update Brand</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="form-group">

            <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" id="admin-update-category">

        </div>
        <input type="hidden" name="id" value="<?php echo $row["id"];?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

