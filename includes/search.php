<style>
	.listTitle{}
	.listTitle a
	{
    	color: #FF0000;
    	font-family: tahoma;
    	font-size: 16px;
    	text-decoration: none;
	}
</style>
<div class="row" style="    font-size: 15px; line-height: 23px;}">
	<div class="col-md-12" style=" margin-top:1%; padding-bottom:1%;">
		<div style="background:#fff; padding:2%;">
			<div class="row">
				<div class="col-md-12">
	         		<div class="title3">
	      				<h4 style="color: #000; font-family:Titillium;"><strong>Search Details</strong></h4>
	      			</div>
	      			<hr style="border:solid thin; border-color:#ccc; margin:0; padding:0; margin-bottom:10px; width:80px;">                               
	        		<p style="font-family:Titillium; font-size:14px; text-align:justify; padding: 8px;">
	        		</p>
	        		<div style="text-align: justify; font-size: 14px">
	        			
	        			<?php
						$keyword=$_POST['keyword'];
						$keyword=explode(" ",$keyword);
						$arrlen=count($kwords);
						$tablenames=array('groups');
						$arrtbllen=count($tablenames);
						$nums=0;


						if(!empty($keyword)){

						foreach($keyword as $ex)
						{
							foreach($tablenames as $tb)
							{
								// $s = "select DISTINCT * from $tb where linkType='Product' and (`name` LIKE '$ex%' OR shortcontents LIKE '$ex%' OR contents like '$ex%')";
								$s = "select DISTINCT * from $tb where (`name` LIKE '$ex%' OR `namenp` LIKE '$ex%' OR `shortcontents` LIKE '$ex%' OR `shortcontentsnp` LIKE '$ex%' OR `contents` like '$ex%' OR `contentsnp` LIKE '$ex%')";
								$sql=mysql_query($s);
								$numRows= mysql_num_rows($sql);
								$nums+=$numRows;
								while($row=mysql_fetch_array($sql))
								{		
								?>
								<div style="padding:5px 0" class="listTitle"><br/>
						    <?php
						    if ($row['linkType'] == "Link")
								{
									echo "<a href='" . $row['contents'] . "' >";
								}
								else if ($row['linkType'] == "File")
								{
									echo "<a href='" . CMS_FILES_DIR . $row['contents'] . "' >";
								}
								else if ($row['linkType'] == "Activity")
								{
									
									echo "<a href='"."activity-".$row['urlname'].".html"."'>";
								}
								else if ($row['linkType'] == "Destination")
								{
									
									echo "<a href='"."destination-".$row['urlname'].".html"."'>";
								}  
								else if ($row['linkType'] == "Region")
								{
									
									echo "<a href='"."region-".$row['urlname'].".html"."'>";
								}  
								else
								{
									echo "<a href='".$row['urlname']."'>";
								}
								
								echo $row['name'] . "</a>";
						    ?>
						    </div>
						    <?php if($row['linkType'] != "Link" || $row['linkType'] != "File"){ ?>
						    <div id="news"> <? echo substr(strip_tags($row['shortcontents']), 0, 500); ?> </div>
						    <?php } ?>
						    
								<?php			
							 }		
							}
						}
						?>

						<?php
						if($nums<1)
						{
							echo "<br/><br/><h3> No search result found!!!</h3>";
						}
						?>


						<?php

						}
						else {
							echo "<h2> Please Enter the keyword for Searching !!</h2>";
						}
						?>

	        		</div>
	         		<p></p>
	       			<br>
	       			<hr style="border:solid thin; border-color:#ccc;">
	        	</div>
			</div>
		</div>
	</div><!-- col-md-5 -->
</div>