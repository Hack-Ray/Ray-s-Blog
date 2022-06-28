<?php
    include("header.php");
?>


<div class="container">
	<div class="row">
		<div class="col">
		</div>
		<div class="col-7">
			<small class="text-muted">2022</small>
			<hr />
            <?php
                include("dbconn.php");
                $stmt = $conn->prepare("SELECT * FROM `articles`;");                
                $stmt->execute();            
                // set the resulting array to associative
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
    include("footer.php");
?>