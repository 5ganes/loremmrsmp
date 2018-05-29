<div class="row">
	<div class="col-md-12">
		<ul class="ticker">
			<?php
			$hot=$groups->getByParentId(HOT_NEWS);
			while($hotGet = $conn->fetchArray($hot)){?>
				<li style="display: list-item; "> <?=$hotGet['name'];?> </li>
			<?php }?>
		</ul>
	</div>
		<div class="col-md-12" style="background:url(/public/images/banner.jpg);">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
        </ol>
		<div class="carousel-inner">
            <?php
				$slide=$groups->getByParentId(SLIDER); $count = 1; 
				while($slideGet = $conn->fetchArray($slide)){?>
                <div class="item<?php if($count++ == 1) echo ' active';?>">
        			<div class="row">
            			<div class="col-md-12">
           		  			<img src="./index_files/630535960image-0-02-03-b5e6a6333c1c1abdbf4f5278521f4aa96a74df43615716f54477f830fc275e24-V.jpg" class="img-responsive" alt="First slide">
            			</div>
          			</div>  
        		</div>
        	<?php }?>
        </div>
		<!-- Left and right controls -->
	</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="row welcome-links">
	<div class="col-md-6" style=" margin-top:1%; padding-bottom:1%;">
		<div style="background:#fff; padding:2%;">
			<div class="row">
				<div class="col-md-12">
	         		<div class="title3">
	         			<?php $wel=$groups->getById(WELCOME); $welGet = $conn->fetchArray($wel);?>
	      				<h4 style="color: #000; font-family:Titillium;"><strong><?=$welGet['name'];?></strong></h4>
	      			</div>
	      			<hr style="border:solid thin; border-color:#ccc; margin:0; padding:0; margin-bottom:10px; width:80px;">                               
	        		<p style="font-family:Titillium; font-size:14px; text-align:justify; padding: 8px;">
	        		</p>
	        		<p style="text-align: justify; font-size: 14px"><?=$welGet['shortcontents'];?></p>
					<p>&nbsp;</p>
	            	<a href="en/<?=$welGet['urlname'];?>" class="pull-right">See More...</a>
	         		<p></p>
	       			<br>
	       			<hr style="border:solid thin; border-color:#ccc;">
	        	</div>
			</div>
		</div>
	</div><!-- col-md-5 -->
<div class="col-md-6" style="margin-top:1%;">
	<nav class="navbar3 navbar-static-top">                          
		<div id="navbar3" class="navbar-collapse collapse">       
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab">
					<strong>Information Categories</strong></a></li>		
				<li>
			</ul>
		</div>
	</nav>
	<div class="tab-content" style="height: 305px;">
		<ul>
			<?php $cat=$groups->getByParentIdWithLimit(INFO_CAT, 7); 
			while($catGet = $conn->fetchArray($cat)){?>
			<li><a href="en/<?=$catGet['urlname'];?>"><?=$catGet['name'];?></a></li>
			<?php }?>
		</ul>	
	</div>
</div>       
</div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12" style=" margin-top:1%; padding-bottom:1%;">
		<div style="background:#fff; padding:2%;">
			<div class="row">
			<div class="col-md-12">
         		<div class="title3">
         			<?php $wel=$groups->getById(WELCOME); $welGet = $conn->fetchArray($wel);?>
      				<h4 style="color: #000; font-family:Titillium;"><strong>Important Links</strong></h4>
      			</div>
      			<div class="impo-links">
      				<ul>
						<?php $links=$groups->getByParentIdWithLimit(IMPORTANT_LINKS, 5); 
						while($linkGet = $conn->fetchArray($links)){?>
						<li><a href="en/<?=$linkGet['urlname'];?>"><?=$linkGet['name'];?></a></li>
						<?php }?>
					</ul>
      			</div>
        	</div>
		</div>
	</div>
	</div><!-- col-md-5 -->       
</div>