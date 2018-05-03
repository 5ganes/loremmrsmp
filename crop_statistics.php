<? include('clientobjects.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <title>
	     Market Research and Stastistics Management Programme-
	     <?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?>
    </title>
    <? include('baselocation.php'); ?>
    <meta name="description" content="Market Research and Stastistics Management Programme" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_setup.css" />
    <link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/layout4_text.css" />
    
    <script type="text/javascript">
      function urlredirect(sel){
        location.href='crop_statistics.php?opt='+sel.value;
      }
    </script>

    <style type="text/css">
      .search_block{float: left;margin-right: 10px;}
    </style>

  </head>
  <!-- Global IE fix to avoid layout crash when single word size wider than column width -->
  <!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
<!-- Main Page Container -->
<div class="page-container">
  <!-- For alternative headers START PASTE here -->
  <!-- A. header-->
  <div class="header">
    <!-- A.1 header-TOP -->
    <div class="header-top">
 		<? include("program/header.php");?>
    </div>
    <!-- A.3 header-BOTTOM -->
    <div class="header-bottom" style="margin-top:5px;">
      <!-- Navigation Level 2 (Drop-down menus) -->
      <div class="nav2">
        	<? createMenu(0, "Header"); ?>
      </div>
    </div>
    
  </div>
  <!-- For alternative headers END PASTE here -->
  <!-- B. MAIN -->
  <div class="main" style="background:none">

	<div class="main-content" style="width:100%; font-size:12px; text-align:justify">
	
    <h1 class="pagetitle" style="padding:0 6px 2px">Crop Statistics Report</h1>
    <div class="content" style="margin:0 1%">
      <form action="crop_statistics.php" method="post">
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
  <!-- C. FOOTER AREA -->
  <div class="footer" style="margin-top:5px;clear: both;">
    <p>Copyright &copy; 20<?=date("y");?> MRSMP | All Rights Reserved</p>
    <p class="credits"> <a href="<?=SITE_URL?>">गृह पृष्‍ठ</a> | <a href="contact">सम्पर्क ठेगाना</a> | <a href="feedback">सुझाब तथा सल्लाह</a></p>
  </div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-159243-24";
urchinTracker();
</script>
<div align=center style="margin:10px 0">Powered By : <a href='http://www.krishighar.com' target="_blank">Development Team: krishighar.com</a></div></body>
</html>