<?php
    include("header.php");
?>


<div class="container">
	<div class="row">
		<div class="col">
		</div>
		<div class="col-8">
			<small class="text-muted">2022</small>
			<hr />
            <?php
                //db連線
                include("dbconn.php");
                //按新到舊排序所有文章
                $stmt = $conn->prepare("SELECT * FROM `articles` ORDER BY `created_at` DESC;");                
                $stmt->execute();            
                // set the resulting array to associative
                $result = $stmt->FetchAll(PDO::FETCH_ASSOC);

                foreach($result as $row) {
                    //格式化日期
                    $timestamp = strtotime($row['created_at']); 
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