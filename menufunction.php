<?php
function createMenu($parentId, $groupType)
{
	global $groups;
	global $conn;

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);		

	while($groupRow = $conn->fetchArray($groupResult))
	{	
		echo '<ul><li>';
		?>
    	<a href="<?php //if($groupRow['id']!=336) echo "en/";?><? echo $groupRow['urlname'];?>"><?=$groupRow['name'];?></a>
		<?
		echo "</li></ul>\n";
	}
}
?>

<?php
function createMenuNp($parentId, $groupType)
{
	global $groups;
	global $conn;

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);		

	while($groupRow = $conn->fetchArray($groupResult))
	{	
		echo '<ul><li>';
		?>
    	<a href="<? echo $groupRow['urlname'];?>"><?=$groupRow['namenp'];?></a>
		<?
		echo "</li></ul>\n";
	}
}


function createMenuNpNew($parentId, $groupType, $level = 0){
	global $groups;
	global $conn;

	if ($parentId == 0){
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	}
	else{
		$groupResult = $groups->getByParentId($parentId);		
	}

	if ($conn->numRows($groupResult) > 0 and $parentId != 0 and $level == 1){
		echo '<ul class="dropdown-menu" role="menu">';
	}
	else if ($conn->numRows($groupResult) > 0 and $parentId != 0 and $level == 2){
		echo '<ul class="dropdown-menu">';
	}

	while($groupRow = $conn->fetchArray($groupResult)){?>
		<li <?php if($groupRow['linkType']=="Normal Group" and $level == 0) echo 'class="dropdown"'; else if($groupRow['linkType']=="Normal Group" and $level == 1) echo 'class="dropdown-submenu"';?>>
    		<a <?php if($groupRow['linkType']=="Normal Group" and $level == 0) echo 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"'; else if($groupRow['linkType']=="Normal Group" and $level == 1) echo 'class="dropdown-toggle" data-toggle="dropdown"';?> href="<? if($groupRow['linkType']!='File'){ if($lan=='en') echo 'en/'; if($groupRow['linkType']!='Link') echo $groupRow['urlname']; else echo $groupRow['contents'];} else{ echo CMS_FILES_DIR.$groupRow['contents'];}?>">
    			<?php echo $groupRow['namenp'];?>
    			<?php if($groupRow['linkType']=="Normal Group" and $level == 0) echo '<span class="caret"></span>';?>
    		</a>
			<?php
			if($groupRow['linkType']=="Normal Group" and $groupRow['urlname']!='video-gallery')
				createMenuNpNew($groupRow['id'], $groupType, $level+1);
			echo "</li>\n";
	}
	if ($conn->numRows($groupResult) > 0 and $parentId != 0)
	echo '</ul>';
}

function createMenuEnNew($parentId, $groupType, $level = 0){
	global $groups;
	global $conn;

	if ($parentId == 0){
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	}
	else{
		$groupResult = $groups->getByParentId($parentId);		
	}

	if ($conn->numRows($groupResult) > 0 and $parentId != 0 and $level == 1){
		echo '<ul class="dropdown-menu" role="menu">';
	}
	else if ($conn->numRows($groupResult) > 0 and $parentId != 0 and $level == 2){
		echo '<ul class="dropdown-menu">';
	}

	while($groupRow = $conn->fetchArray($groupResult)){?>
		<li <?php if($groupRow['linkType']=="Normal Group" and $level == 0) echo 'class="dropdown"'; else if($groupRow['linkType']=="Normal Group" and $level == 1) echo 'class="dropdown-submenu"';?>>
    		<a <?php if($groupRow['linkType']=="Normal Group" and $level == 0) echo 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"'; else if($groupRow['linkType']=="Normal Group" and $level == 1) echo 'class="dropdown-toggle" data-toggle="dropdown"';?> href="en/<? if($groupRow['linkType']!='File'){ if($lan=='en') echo 'en/'; if($groupRow['linkType']!='Link') echo $groupRow['urlname']; else echo $groupRow['contents'];} else{ echo CMS_FILES_DIR.$groupRow['contents'];}?>">
    			<?php echo $groupRow['name'];?>
    			<?php if($groupRow['linkType']=="Normal Group" and $level == 0) echo '<span class="caret"></span>';?>
    		</a>
			<?php
			if($groupRow['linkType']=="Normal Group" and $groupRow['urlname']!='video-gallery')
				createMenuNpNew($groupRow['id'], $groupType, $level+1);
			echo "</li>\n";
	}
	if ($conn->numRows($groupResult) > 0 and $parentId != 0)
	echo '</ul>';
}


?>

<?
	function createByBlock($id)
	{
		//echo "hello";
		//die();
		global $groups;
		global $conn;
		if($id==2)
			$block="Category Submenu";
		else if($id==3)
			$block="Destination Submenu";
		$act=$groups->getByBlock($block);
		echo '<ul>';
		while($actGet=$conn->fetchArray($act))
		{?>
        	<li><a href="<? if($block=="Activity Submenu"){?>activity<? }else{?>destination<? }?>-<?=$actGet['urlname'];?>.html"><?=$actGet['name'];?></a></li>		
		<? }
		echo '</ul>';
	}

?>