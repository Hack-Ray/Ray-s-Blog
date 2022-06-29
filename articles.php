<?php
    include("header.php");
    $num = $_GET['num'];
    //get url傳進來的num變數
?>
<!-- 文章區 -->
<div class="container" >

    <div class="row">
		<div class="col">
		</div>
		<div class="col-10">
            <?php
                //連線db
                include("dbconn.php");
                //搜尋id為num的文章
                $stmt = $conn->prepare("SELECT * FROM `articles` WHERE id = :num;");
                $stmt->bindParam(":num", $num);                
                $stmt->execute();            
                //將結果轉換成key value型態存到result
                $result = $stmt->Fetch(PDO::FETCH_ASSOC);
                //轉換時間
                $timestamp = strtotime($result['created_at']); 
                $newDate = date("Y-m-d", $timestamp);
                //將\n等跳脫字元轉換回<br/>等
                $newbody = nl2br($result['body']);
                //印出文章 與 html結合
                echo "
                    <span class='display-6'>${result['title']}</span><small class='text-muted'>建立於 ${newDate}</small>
		            <hr />
		            <p>
                    ${newbody}
		            </p>
                     ";
            ?>
		</div>
		<div class="col">
		</div>
	</div>
</div>

<!-- disqus留言API -->
<div class="container" >
    <div class="row">
        <div class="col">
		</div>
        <div class="col-10">
            <div id="disqus_thread"></div>
            <script>
                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://raysblog-2.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
        <div class="col">
		</div>
    </div>
</div>
<script id="dsq-count-scr" src="//raysblog-2.disqus.com/count.js" async></script>
<?php
    $conn = null;//清除資料庫連線
    include("footer.php");
?>