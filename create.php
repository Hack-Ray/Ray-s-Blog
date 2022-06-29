<?php 
    session_start();
    include("header.php");
    include("const.php");
    //驗證是否登入了 否則導回login頁面
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="d-grid gap-2 justify-content-center">
        <h2 class="col">新增文章</h2>
        </div>
        <form action="<?php echo $receive_url;?>" method="post">
            <div class="row mb-3">
                <label class="col-12 col-form-label" >標題</label>
                <div class="col-12">
                    <input type="text" class="form-control" name="title" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-12 col-form-label">內容</label>
                <div class="col-12">
                    <textarea rows="10" cols="30" class="form-control"  name="body"></textarea>
                </div>
            </div>
            <select name="class" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected value="0">選擇分類</option>
                <option value="1">技術分享</option>
                <option value="2">專案紀錄</option>
                <option value="3">心情雜記</option>
            </select>
            <div class="d-grid gap-2 justify-content-center">
                <button type="submit" class="btn btn-sm btn-primary ">送出</button>
            </div>
        </form>
    </div>
</div>
<?php
    include("footer.php");