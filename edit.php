<?php
    session_start();
    include("header.php");
    include("const.php");
    //驗證是否登入 否則導回login頁面
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
    //預搜尋文章 使用get num搜尋要修改的文章 將資料填回表格 
    include("search.php");
    // ${result['title']} ${result['body']} ${result['class']}
?>  
<div class="container">
    <div class="row justify-content-center">
        <div class="d-grid gap-2 justify-content-center">
        <h2 class="col">修改文章</h2>
        </div>
        <form action="<?php echo $update_url;?>" method="post">
            <!-- 隱藏的欄位 因為更新文章需要post id的資料 -->
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
                <!-- 選擇分類 使用資料庫搜尋出來的class來做預設  -->
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