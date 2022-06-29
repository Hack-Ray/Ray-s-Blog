<?php
    include("header.php");
    $class = $_GET['class'];
    //取得get進來的class變數存到class
?>

<!-- 文章區 -->
<div class="container">
	<div class="row">
		<div class="col">
		</div>
		<div class="col-8">
			<small class="text-muted">
                <?php
                    //判斷分類大標
                    switch ($class) {
                        case 0:
                            echo "未分類文";
                            break;
                        case 1:
                            echo "技術分享";
                            break;
                        case 2:
                            echo "專案紀錄";
                            break;
                        case 3:
                            echo "心情雜記";
                            break;
                    }
                ?>
            </small>
			<hr />
            <?php
                //連線db
                include("dbconn.php");
                //搜尋該分類下所有資料以最新到最舊排序
                $stmt = $conn->prepare("SELECT * FROM `articles` WHERE class = :class ORDER BY `created_at` DESC;");
                $stmt->bindParam(":class", $class);                
                $stmt->execute();            
                //存到陣列
                $result = $stmt->FetchAll(PDO::FETCH_ASSOC);

                foreach($result as $row) {
                    $originalDate = $row['created_at'];
                    //original date is in format YYYY-mm-dd
                    $timestamp = strtotime($originalDate); 
                    $newDate = date("m-d", $timestamp );
                    echo "
                    <div class='title' style='margin: 5px;'>
				        <small class='text-muted'>${newDate} - </small>
				        <a href='${articles_url}${row['id']}'>${row['title']}</a>
			        </div>
                     ";
                }
            ?>
		</div>
		<div class="col">
		</div>
	</div>
</div>


<?php
    $conn = null; //清空資料庫連線
    include("footer.php");
?>