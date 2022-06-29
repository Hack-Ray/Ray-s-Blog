<?php
    session_start();
    include("const.php");
    include("header.php");
    include("const.php");


    if(isset($_POST['account'])) {
        if ($_POST['account'] == 'ray') {
            if ($_POST['pwd'] == $admin_pwd){
                $_SESSION['user'] = 'ok';
                echo "<script>window.location.herf='$admin_url';</script>";
            }
        }
    }
?>

<div class="login container">
    <div class="row justify-content-center">
        <div class="d-grid gap-2 justify-content-center">
        <h2 class="col">登入</h2>
        </div>
        <form action="check.php" method="post">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-3 col-form-label" >Account</label>
                <div class="col-9">
                    <input type="text" class="form-control" id="inputEmail3" name="account" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                <div class="col-9">
                    <input type="password" class="form-control" id="inputPassword3" name="pwd">
                </div>
            </div>
            <div class="d-grid gap-2 justify-content-center">
                <button type="submit" class="btn btn-sm btn-primary ">登入</button>
            </div>
        </form>
    </div>
</div>
<?php
    include("footer.php");
