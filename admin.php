<?php
    session_start();
    include("header.php");
    include("const.php");
    

    //驗證登入 若沒有則導向登入介面
    if ($_SESSION['user'] != 'ok') {
        echo "<script>window.location.href='$login_url';</script>";
    }
    ?>
<div class="container">
    
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th class="col-1" scope="col">#</th>
					<th class="col" scope="col">文章</th>
					<th class="col-4" scope="col">時間</th>
					<th class="col-2" scope="col">修改</th>
					<th class="col-2" scope="col">修改</th>
				</tr>
			</thead>
			<tbody>
				<tr>
                <?php
                    //db連線
                    include("dbconn.php");
                    //搜尋articles中所有資料
                    $stmt = $conn->prepare("SELECT * FROM `articles`;");                
                    $stmt->execute();    
                    //設定將搜尋結果設為關聯陣列存到result
                    //內容大概是 [index][key] => value 的型態        
                    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
                    // print_r($result);
                    //遍歷 result 關聯陣列 將索引定為 $row 變數
                    foreach($result as $row) {
                        //將時間格式化為 string資料
                        $timestamp = strtotime($row['created_at']);
                        //將格式化string的時間轉換成Y-m-d的格式
                        $newDate = date("Y-m-d", $timestamp );
                        // echo "
                        // <div class='title' style='margin: 5px;'>
                        //     <small class='text-muted'>${newDate} - </small>
                        //     <a href='${articles_url}${row['id']}'>${row['title']}</a>
                        // </div>
                        // ";
                        //將陣列資料與html結合
                        echo"
                            <th scope='row'>${row['id']}</th>
                            <td>${row['title']}</td>
                            <td>${newDate}</td>
                            <td><a href='${edit_url}${row['id']}'><button type='button' class='btn btn-success'>修改</button></a></td>
                            <td><a href='${delete_url}${row['id']}'><button type='button' class='btn btn-danger'>刪除</button></a></td>
                            </tr>
                            ";
                    }
                    ?>
			</tbody>
		</table>
        <!-- 新增文章與登出管理者帳號按鈕 -->
        <form method="get">
            <button type="submit" class="btn btn-success" name="create">新增</button>
            <button type="submit" class="btn btn-danger" name="logout">登出</button>
        </form>
	</div>
    
</div>
<?php
    //登出及導向新增文章頁面的功能 使用get
    if (isset($_GET['logout'])) {
        session_unset();
        echo "<script>window.location.href='$index_url';</script>";
    } elseif (isset($_GET['create'])) {
        echo "<script>window.location.href='$create_url';</script>";
    }
    $conn = null;//清除資料庫連線
    include("footer.php");
