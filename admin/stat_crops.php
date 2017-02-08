<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}
$msg='';
if(isset($_POST['save'])){
	// echo "inside"; die();
	if(empty($_FILES['excel']['name']))
		$msg .= "<li>Please Browse Excel File</li>";

	if(empty($msg))
	{
		$file=$_FILES['excel']['name'];
		$tmp_loc = $_FILES['excel']['tmp_name'];
		copy($tmp_loc, 'uploads/'.$file);
		// echo "sdf"; die();
		require_once('insert_stat_crops.php');
	}		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #FF0000
}

-->
</style>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp; Import Crop Statistics Excel
                        <div style="float: right;">
                          <?php $addNewLink = "stat_crops.php";?>
                          <a href="<?= $addNewLink?>" class="headLink">Add New</a></div></td>
                    </tr>
                    <tr>
                      <td>
                      <form action="<?= $_REQUEST['uri']?>" method="post" enctype="multipart/form-data">
                      <table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <?php if(!empty($msg)){ ?>
                          <tr align="left">
                            <td colspan="3" class="err_msg"><?php echo $msg; ?></td>
                          </tr>
                          <?php } ?>                          
                            <tr><td>&nbsp;</td></tr>
                            
                            <tr>
                              <td>&nbsp;</td>
                              <td class="tahomabold11"><strong> Download Sample : <span class="asterisk">*</span></strong></td>
                              <td><label for="title"></label>
                                <a target="_blank" href="uploads/sample-2073-10-22.csv">Sample File Download</a></td>
                            </tr>
                            <tr><td></td></tr>

                            <tr>
                              <td>&nbsp;</td>
                              <td class="tahomabold11"><strong> Browse File : <span class="asterisk">*</span></strong></td>
                              <td><label for="title"></label>
                                <input name="excel" type="file" class="text" id="title" value="" /></td>
                            </tr>
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                              	<input name="save" type="submit" class="button" id="button" value="Import" />
                              	<?php if($_GET['type'] == "edit"){ ?>
                              	<input type="hidden" value="<?= $id?>" name="id" id="id" />
                                <?php }else{ ?>                                
                                <input name="reset" type="reset" class="button" id="button2" value="Clear" />
                                <?php } ?>
                                </td>
                            </tr> 
                            <tr><td>&nbsp;</td></tr>                       
                        </table>
                        </form></td>
                    </tr>
                  </table></td>
              </tr>
              <tr height="5"><td></td></tr>
        	<tr>
          
        </tr>	
               
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>