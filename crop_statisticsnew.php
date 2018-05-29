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

    <!-- crop statistics js -->
    <script type="text/javascript">
      function urlredirect(sel){
        location.href='crop_statisticsnew.php?opt='+sel.value;
      }
    </script>
    <style type="text/css">
      .search_block{float: left; margin-right: 10px;}
    </style>
    <!-- crop statistics js end -->

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
                            <div class="col-md-3 nep">
                       <a href="<?php echo SITE_URL; ?>" style="color: #fff; width: 100%; display: block;">नेपाली</a>
                    </div>
                    <div class="col-md-3 nep" style="border:none;">
                        <a href="<?php echo SITE_URL; ?>en" style="color: #fff; width: 100%; display: block;">English</a> 
              </div>
                            <!-- Search Feature -->
                            <div class="col-md-12">
                              <div class="row">
                                  <div style="margin:4px 4px 4px 0;">
                    
                    <form id="w0" action="" method="get">                               
                      <input type="text" name="s" class="form-control" placeholder="खोज्नुहोस" aria-describedby="basic-addon2">
                                    </form>                                    
                                </div>
                              </div>
                    </div>
                    <!-- Search Feature End -->
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
              
              <div class="col-md-12">                  
              
              <!-- crop statistics start -->
              <div class="row" style="    font-size: 15px; line-height: 23px;}">
                  <div class="col-md-12" style=" margin-top:1%; padding-bottom:1%;">
                    <div style="background:#fff; padding:2%;">
                      <div class="row">
                        <div class="col-md-12">
                          <h1 class="pagetitle" style="padding:0 6px 2px">Crop Statistics Report</h1>
                          <div class="content" style="margin:0 1%">
                            <form action="crop_statisticsnew.php" method="post">
                              <div class="search_block">
                                <label>Select Multiple</label>
                                <?php $opt=$_GET['opt'];?>
                                <select name="multiple_select" onchange="urlredirect(this);">
                                  <option value="select">Select Option</option>
                                  <option value="districts" <?php if($opt=='districts') echo 'selected';?>>Districts</option>
                                  <option value="crops" <?php if($opt=='crops') echo 'selected';?>>Crops</option>
                                  <option value="fiscal_year" <?php if($opt=='fiscal_year') echo 'selected';?>>Fiscal Year</option>
                                </select>
                              </div>

                              <?php
                              if($_GET['opt']!='select' and $_GET['opt']!=''){?>
                                <div class="search_block">
                                  <p style="float:left">Select District: </p>
                                  <select name="district[]" <?php if($_GET['opt']=='districts') echo 'multiple style="width: 140px; height: 160px;padding: 2px 5px;float:left;"'; else echo 'style="float:left"';?>>
                                    <?php
                                    $result = $crop_stat->getAllDistricts();
                                    // print_r($result); die();
                                    while($row = $conn->fetchArray($result)){
                                      echo '<option value="'.$row['district_name'].'">'.$row['district_name'].'</option>';
                                    }?>
                                  </select>
                                  <?php if($_GET['opt']=='districts') echo '<div style="clear:both"></div>';?>
                                </div>

                                <div class="search_block">
                                  <p style="float:left;">Select Crop: </p>
                                  <select name="crop[]" <?php if($_GET['opt']=='crops') echo 'multiple style="width: 140px; height: 160px;padding: 2px 5px;float:left;"'; else echo 'style="float:left"';?>>
                                    <?php
                                    $result = $crop_stat->getAllCrops();
                                    while($row = $conn->fetchArray($result)){
                                      echo '<option value="'.$row['crop_name'].'">'.$row['crop_name'].'</option>';
                                    }?>
                                  </select>
                                  <?php if($_GET['opt']=='crops') echo '<div style="clear:both"></div>';?>
                                </div>

                                <div class="search_block">
                                  <p style="float:left">Select Fiscal Year: </p>
                                  <select name="fiscal_year[]" <?php if($_GET['opt']=='fiscal_year') echo 'multiple style="width: 100px; height: 160px;padding: 2px 5px;float:left;"'; else echo 'style="float:left"';?>>
                                    <?php
                                    $result = $crop_stat->getAllFiscalYears();
                                    while($row = $conn->fetchArray($result)){
                                      echo '<option value="'.$row['fiscal_year'].'">'.$row['fiscal_year'].'</option>';
                                    }?>
                                  </select>
                                  <?php if($_GET['opt']=='fiscal_year') echo '<div style="clear:both"></div>';?>
                                </div>
                              <?php }?>
                              <p class="generate" style="clear: both;padding-top: 20px">
                                <input type="submit" name="report" value="Generate Report">
                              </p>
                            </form>

                            <?php
                            if(isset($_POST['report'])){?>
                              <?php 
                              $result=$crop_stat->getReportByDistrictsCropsFiscalYear($_POST,$_POST['multiple_select']);
                              while($row = $conn->fetchArray($result))
                              {
                                $area[]=$row['crop_area'];
                                $production[]=$row['crop_production'];
                              }
                              $area[]=0; $production[]=0;
                              $area=json_encode($area);
                              $production=json_encode($production);
                              // echo '<pre>';print_r($area); die();
                              ?>
                              <script src="chartjs/dist/Chart.bundle.js"></script>
                              <script src="chartjs/samples/utils.js"></script>
                              <style>
                              canvas {
                                  -moz-user-select: none;
                                  -webkit-user-select: none;
                                  -ms-user-select: none;
                              }
                              </style>
                              <div id="container" style="width: 100%;">
                                <canvas id="canvas"></canvas>
                              </div>
                              <script>
                                execute('<?php echo json_encode($_POST);?>','<?php echo $area;?>','<?php echo $production;?>');
                                function execute(post, area, production){
                                  var json=JSON.parse(post);
                                  console.log(json);
                                  var jsonarea=JSON.parse(area);
                                  console.log(jsonarea);
                                  var jsonproduction=JSON.parse(production);
                                  console.log(jsonproduction);

                                  var levels='';
                                  if(json["multiple_select"]=='districts')
                                    levels=json["district"];
                                  else if(json["multiple_select"]=='crops')
                                    levels=json["crop"];
                                  else if(json["multiple_select"]=='fiscal_year')
                                    levels=json["fiscal_year"];
                                  // var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                  var color = Chart.helpers.color;
                                  var barChartData = {
                                      labels: levels,
                                      datasets: [{
                                          label: 'Area [ Hectare ]',
                                          backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                                          borderColor: window.chartColors.red,
                                          borderWidth: 1,
                                          data: jsonarea
                                      }, {
                                          label: 'Production [ Metric Ton ]',
                                          backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                                          borderColor: window.chartColors.blue,
                                          borderWidth: 1,
                                          data: jsonproduction
                                      }
                                      ]

                                  };
                                  window.onload = function() {
                                      var title =' [ ';
                                      if(json["multiple_select"]=='districts')
                                        title+= 'Crop: '+json["crop"]+' and Fiscal Year: '+json["fiscal_year"];
                                      else if(json["multiple_select"]=='crops')
                                        title+= 'District: '+json["district"]+' and Fiscal Year: '+json["fiscal_year"];
                                      else if(json["multiple_select"]=='fiscal_year')
                                        title+= 'Crop: '+json["crop"]+' and District: '+json["district"];
                                      title+=' ]';

                                      var ctx = document.getElementById("canvas").getContext("2d");
                                      window.myBar = new Chart(ctx, {
                                          type: 'bar',
                                          data: barChartData,
                                          options: {
                                              responsive: true,
                                              legend: {
                                                  position: 'top',
                                              },
                                              title: {
                                                  display: true,
                                                  text: 'Crop Statistics Bar Chart'+title
                                              }
                                          }
                                      });

                                  };
                                }

                              </script>
                            <?php }?>
                          </div>
                          
                          </div>
                      </div>
                    </div>
                  </div><!-- col-md-5 -->
                </div>
                <!-- crop statistics end -->


              </div> <!--col-md-12-->
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