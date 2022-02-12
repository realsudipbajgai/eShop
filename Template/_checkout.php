
<?php include_once 'DatabaseController/DBController.php';?>
<?php
if(isset($_SESSION['id'])&&$_SERVER["REQUEST_METHOD"]=="POST"){

    $user_id=($_SESSION['id']);
    $obj=new Query();
    $conditionArr = array(
      'user_id'=>$user_id
    );
   if($obj->deleteData('cart',$conditionArr)){
       header('location:index.php');
   }
}
?>
<section style="background-color: #eee;">
    <div class="container py-5 min-vh-100">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <div class="card rounded-3">
                        <div class="card-body mx-1 my-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="fab fa-cc-visa fa-4x text-black pe-3"></i>
                                </div>
                                <div>
                                    <p class="d-flex flex-column mb-0">
                                        <b>Martina Thomas</b><span class="small text-muted">**** 8880</span>
                                    </p>
                                </div>
                            </div>

                            <div class="pt-3">
                                <div class="d-flex flex-row pb-3">
                                    <div
                                            class="rounded border border-primary border-2 d-flex w-100 p-3 align-items-center"
                                            style="background-color: rgba(18, 101, 241, 0.07);"
                                    >
                                        <div class="d-flex align-items-center pe-3">
                                            <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="radioNoLabelX"
                                                    id="radioNoLabel11"
                                                    value=""
                                                    aria-label="..."
                                                    checked
                                            />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="mb-1 small text-primary">Total amount due</p>
                                            <h6 class="mb-0 text-primary">$8245</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-row pb-3">
                                    <div class="rounded border d-flex w-100 px-3 py-2 align-items-center">
                                        <div class="d-flex align-items-center pe-3">
                                            <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="radioNoLabelX"
                                                    id="radioNoLabel22"
                                                    value=""
                                                    aria-label="..."
                                            />
                                        </div>
                                        <div class="d-flex flex-column py-1">
                                            <p class="mb-1 small text-primary">Other amount</p>
                                            <div class="d-flex flex-row align-items-center">
                                                <h6 class="mb-0 text-primary pe-1">$</h6>
                                                <input
                                                        type="text"
                                                        class="form-control form-control-sm"
                                                        id="numberExample"
                                                        style="width: 55px;"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pb-1">
                                <a href="cart.php" class="text-muted">Go back</a>
                                <button type="submit" class="btn btn-primary btn-lg">Pay amount</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>





