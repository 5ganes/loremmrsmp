<div class="row" style="    font-size: 15px; line-height: 23px;}">
	<div class="col-md-12" style=" margin-top:1%; padding-bottom:1%;">
		<div style="background:#fff; padding:2%;">
			<div class="row">
				<div class="col-md-12">
	         		<div class="title3">
	      				<h4 style="color: #000; font-family:Titillium;"><strong><?php echo $pageName; ?></strong></h4>
	      			</div>
	      			<hr style="border:solid thin; border-color:#ccc; margin:0; padding:0; margin-bottom:10px; width:80px;">                               
	        		<p style="font-family:Titillium; font-size:14px; text-align:justify; padding: 8px;">
	        		</p>
	        		<p style="text-align: justify; font-size: 14px">
	        			<?php
						  $cont=$groups->getById($pageId);
						  $contGet=$conn->fetchArray($cont);
						  echo $contGet['contents'];
						?>
	        		</p>
	         		<p></p>
	       			<br>
	       			<hr style="border:solid thin; border-color:#ccc;">
	        	</div>
			</div>
		</div>
	</div><!-- col-md-5 -->
</div>

<!-- old code -->
<!-- <?php //include("includes/breadcrumb.php"); ?>

<div class="main-content" style="width:100%; font-size:12px; text-align:justify">
	<h1 class="pagetitle"><?php //echo $pageName; ?></h1>

<div class="content">
<?php
// $pagename = "index.php?id=". $pageId ."&";
// include("includes/pagination.php");

// echo Pagination($pageContents, "content");
?>
</div>
</div> -->