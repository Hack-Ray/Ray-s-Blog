<?php
    include("header.php");
    $num = $_GET['num'];
?>

<div class="container" >

    <div class="row">
		<div class="col">
		</div>
		<div class="col-10">
            <?php
                include("dbconn.php");
                $stmt = $conn->prepare("SELECT * FROM `articles` WHERE id = :num;");
                $stmt->bindParam(":num", $num);                
                $stmt->execute();            
                // set the resulting array to associative
                $result = $stmt->Fetch(PDO::FETCH_ASSOC);
                $timestamp = strtotime($result['created_at']); 
                $newDate = date("Y-m-d", $timestamp);
                $newbody = nl2br($result['body']);
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
    $conn = null;
    include("footer.php");
?>