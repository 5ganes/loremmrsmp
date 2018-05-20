<?php require 'clientobjects.php'; ?>
<!DOCTYPE html>
<html lang="ne">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      	<meta name="keyword" content="">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="" content="">
    	<title>
    		बजार अनुसन्धान तथा तथ्यांक व्यवस्थापन कार्यक्रम-
			<?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "गृह पृष्‍ठ";}?>
    	</title>
    	<?php include('baselocation.php'); ?>
    	<meta name="description" content="Market Research and Stastistics Management Programme" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<link href="" rel="canonical">
		<link type="image/x-icon" href="img/logoIcon.png" rel="icon">
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/docs.css" rel="stylesheet">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" charset="utf-8" async="" src="assets/js/timeline.e7653a8bc8be5342f5ecf22ae2e65c92.js"></script>
	</head>
	<body>
		<div class="ban">
    		<div class="container">
      			<!-- Static navbar -->
        		<div class="row">
                	<div class="col-md-3 logo">
            			<a href="<?php SITE_URL; ?>"><img src="img/20135logo.png" class="img-responsive" alt="Logo"></a>
					</div>
                	<div class="col-md-8 col-xs-6 head">
                    	<p>
                    		नेपाल सरकार<br>
                    		कृषि विकास मन्त्रालय<br>
                    		कृषि विभाग<br>
                    		<!-- <span style="font-size: 19px;">कृषि व्यवसाय प्रवर्द्धन तथा बजार विकास निर्देशनालय</span><br> -->
                    		<span style="font-size: 19px;">कृषि, भूमि व्यवस्था तथा सहकारी मन्त्रालय</span><br>
                    		<span style="font-size:24px; padding: 10px;">बजार अनुसन्धान तथा तथ्यांक व्यवस्थापन कार्यक्रम</span>
                    		                    
                    	</p>
                    	<div class="moad">
                    		<p>एमओएडी</p>
                    	</div>
                 	</div>
                 	<div class="col-md-1 pull-right flag">
                    	<img src="./index_files/nepal_flag.gif" width="60" height="80" class="pull-right">
                    	<div class="clearfix"></div>
					</div>
             	</div>
             	<div class="col-md-12">
                   	<div class="row">
                       	<div class="search pull-right">
                            <!-- <div class="col-md-3 nep">
				               <a href="http://moad.gov.np/ne" style="color: #fff; height: 30px; margin-top:2%;">नेपाली</a>
				            </div>
				            <div class="col-md-3 nep" style="border:none;">
				                <a href="http://moad.gov.np/en" style="color: #fff; height: 30px;">अंग्रेजी</a> 
							</div> -->
                            <div class="col-md-12">
                           	 	<div class="row">
                                	<div style="margin:4px;">
										
										<form id="w0" action="" method="get">				                        
											<input type="text" name="s" class="form-control" placeholder="खोज्नुहोस" aria-describedby="basic-addon2">
		                               	</form>                               		 
		                            </div>
                            	</div>
				            </div>
                       	</div>
                    </div>
                </div>
            </div>
        </div><!--container-->
         
        <div class="container">
         	<div class="row">
		   		<div class="col-md-12">
		    		<nav class="navbar navbar-default">  
                    	<div class="navbar-header">
        					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					           	<span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					        </button>
					        <p style="position:absolute; margin-left: 45%;margin-top: 5%;font-size: 16px;">मेनु</p>
				        </div>
		        		<div id="navbar" class="collapse navbar-collapse">
		         			<ul class="nav navbar-nav">
		         				<?php createMenuNpNew(0, "Header"); ?>
							</ul>
		          		</div>
		    		</nav>
		     	</div> 
		   	</div><!--Container-->     
		</div><!--row--> 
					
		<div class="wrapper">
        	<div class="container">
        		<div class="row" style="margin-top:1%;">
        			<div class="col-md-3" style="margin-bottom:12px; color:#fff;">
						<?php $msg=$groups->getById(274); $msgGet=$conn->fetchArray($msg); ?>
						<div class="adz col-md-12 col-xs-4">			
							<h3><?=$msgGet['namenp'];?></h3>
							<a href="<?=$msgGet['urlname'];?>">
								<img class="img-responsive" src="<?=CMS_GROUPS_DIR.$msgGet['image'];?>" alt="" style="width: 100%">
							</a>
							<p style="text-align:center; margin:0px; color:#404040">
								<?=$msgGet['shortcontentsnp'];?>
							</p>
						</div>
						<? $msg=$groups->getById(INFO_OFFICER); $msgGet=$conn->fetchArray($msg); ?>
                		<div class="adz col-md-12 col-xs-4">            
	               			<h3><?=$msgGet['namenp'];?></h3>
	               			<a href="<?=$msgGet['urlname'];?>">
	               				<img class="img-responsive" src="<?=CMS_GROUPS_DIR.$msgGet['image'];?>" alt="" style="width: 100%">
	               			</a>
	               	       	<p style="text-align:center; margin:0px; color:#404040">
	               	       		<?=$msgGet['shortcontentsnp'];?>
							</p>
						</div>
			  			<hr>
            			
             			
						<div class="textt">
			            	<p><a href="bills.html" target="_blank">भुक्तानीका लागि प्राप्त विलहरुको सार्वजनिकरण</a></p>
			            </div>        
        			</div><!--col-md-2-->
        			<div class="col-md-9">                  
            			
        				<?php 
							if(isset($_GET['action']))
							{
								$action = $_GET['action'];
								$action = str_replace(".","", $action);
								include("includes/".$action.".php");			
							}				
							else if(isset($pageLinkType))
							{
								if ($pageLinkType == ""){}
								else{ include("includes/cmspage.php"); }
							}
							else{ include("includes/mainnewnp.php"); }
						?>

					</div> <!--col-md-9-->
            	</div><!---row-->
      		</div><!--container -->
		</div>
  	    
   		<div class="main-wrapper-footer" style="padding-bottom:10px;">
    		<div class="container"> 
            	<div class="row">
            		<div class="col-md-3" id="contact" style="padding-top:20px;">
            			<?php $contact = $groups->getById(CONTACT); $contact = $conn->fetchArray($contact);?>
	                	<h4 style="font-family:Titillium; font-size:15px; color:#80ffce;"><?=$contact['namenp'];?></h4>
	                	<p style="color:#fff;  font-family:Titillium; font-size:15px;">
	                		<?=$contact['shortcontentsnp']; ?>
						</p>
                	</div>
            		
            		<div class="col-md-6" id="contact" style="padding-top:20px; text-align: center;">
            			<?php $contact = $groups->getById(CONTACT); $contact = $conn->fetchArray($contact);?>
	                	<h4 style="font-family:Titillium; font-size:15px; color:#80ffce;">Previous Instruments</h4>
	                	<div class="previous">
	                		<ul>
		                		<? $pre=$groups->getByParentId(PREVIOUS_NSTRUMENTS);
								while($preGet=$conn->fetchArray($pre))
								{?>
									<li><a href="<?=$preGet['urlname'];?>"><?=$preGet['namenp'];?></a></li>
								<? }?>
	                		</ul>
	                	</div>
                	</div>
    	    		
            		<div class="col-md-3 col-sm-6" style="padding-top:20px; font-family:Titillium; font-size:15px; color:#5eb5ff;">
            			<h4 style=" font-family:Titillium; font-size:15px; color:#80ffce;">Short Links</h4>
	                	<div id="socialicons">
							<a href="<?=SITE_URL?>">गृह पृष्‍ठ</a> | <a href="contact">सम्पर्क ठेगाना</a> | <a href="feedback">सुझाब तथा सल्लाह</a>
						</div>	
            		</div><!-- col-md-3 -->
             	</div>        
        	</div><!-- container -->
   		</div>
   
   		<div class="footer">
  			<div class="container">
    			<div class="row" style="padding: 2%;">
        			<div class="copyright">कापीराइट © MRSMP 2018. सर्वाधिकार सुरक्षित.</div>
        			<div class="copyright">Powered By : <a href="http://krishighar.com">Team Krishighar</div>
         		</div>
    		</div><!---contaner-->
  		</div><!--footer-->
  		<script src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/arrow8.js"></script>
		<noscript>Not seeing a &lt;a href="http://www.scrolltotop.com/"&gt;Scroll to Top Button&lt;/a&gt;? Go to our FAQ page for more info.</noscript>
  		<script>
    		$(document).ready(function() {
    			$('#Carousel').carousel({
        			interval: 5000
    			})
			});
    	</script>
    
	    <script type="text/javascript">
		 $(function () {
	    	$(".demo2").bootstrapNews({
	            newsPerPage: 4,
	            autoplay: true,
				pauseOnHover: true,
				navigation: false,
	            direction: 'down',
	            newsTickerInterval: 2500,
	            onToDo: function () {
	                //console.log(this);
	            }
		
		 	)};
	  	</script>
  		<script>
  			var hoveredElement = null;
			function tick() {
			  $('.ticker').filter(function(item) {
			    return !$(this).is(hoveredElement)
			  }).each(function() {
			    $(this).find('li:first').slideUp(function() {
			      $ticker = $(this).closest('.ticker');

			      $(this).appendTo($ticker).slideDown();
			    });
			  });
			}
			setInterval(tick, 1500);
			$(function() {
			  $('.ticker').hover(function() {
			    hoveredElement = $(this);
			  }, function() {
			    hoveredElement = null;
			  });
			});  
		</script>
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/yii.js"></script>
		<script src="assets/js/bootsshoptgl.js"></script>
		<script src="assets/js/jquery.min(1).js"></script>
		<script src="assets/js/yii.activeForm.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script type="text/javascript">jQuery(document).ready(function () {
		jQuery('#w0').yiiActiveForm([], []);
		});</script>
 	</body>
 </html>