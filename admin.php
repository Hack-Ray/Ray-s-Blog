<?php
    include("header.php");
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
                    include("dbconn.php");
                    $stmt = $conn->prepare("SELECT * FROM `articles`;");                
                    $stmt->execute();            
                    // set the resulting array to associative
                    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row) {
                        //original date is in format YYYY-mm-dd
                        $timestamp = strtotime($row['created_at']); 
                        $newDate = date("Y-m-d", $timestamp );
                        // echo "
                        // <div class='title' style='margin: 5px;'>
                        //     <small class='text-muted'>${newDate} - </small>
                        //     <a href='${articles_url}${row['id']}'>${row['title']}</a>
                        // </div>
                        // ";
                        echo"
                            <th scope='row'>${row['id']}</th>
                            <td>${row['title']}</td>
                            <td>${newDate}</td>
                            <td><a href='${articles_url}${row['id']}'><button type='button' class='btn btn-success'>修改</button></a></td>
                            <td><a href='${articles_url}${row['id']}'><button type='button' class='btn btn-danger'>刪除</button></a></td>
                            </tr>
                            ";
                    }
                    ?>
			</tbody>
		</table>
	</div>
</div>

<?php
    include("footer.php");
?>