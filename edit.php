<?php
    session_start();
    include("header.php");
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='http://localhost/blog/login.php';</script>";
    }
    include("search.php");
    // ${result['title']} ${result['body']} ${result['class']}
?>  
<div class="container">
    <div class="row justify-content-center">
        <div class="d-grid gap-2 justify-content-center">
        <h2 class="col">修改文章</h2>
        </div>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-12 col-form-label" >標題</label>
                <div class="col-12">
                    <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-12 col-form-label">內容</label>
                <div class="col-12">
                    <textarea rows="10" cols="30" class="form-control"  name="body"><?php echo $body;?></textarea>
                </div>
            </div>
            <select name="class" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option <?php if($class==0){echo "selected" ;}?> value="0">選擇分類</option>
                <option <?php if($class==1){echo "selected" ;}?> value="1">技術分享</option>
                <option <?php if($class==2){echo "selected" ;}?> value="2">專案紀錄</option> 
                <option <?php if($class==3){echo "selected" ;}?> value="3">心情雜記</option>
            </select>
            
            <div class="d-grid gap-2 justify-content-center">
                <button type="submit" class="btn btn-sm btn-primary ">送出</button>
            </div>
        </form>
    </div>
</div>

<?php
    include("footer.php");