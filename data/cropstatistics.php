<?php
class Cropstatistics
{	
	function save($excel)
	{
		global $conn;
		print_r($excel); die();
		$file = $excel['name'];

		if($id > 0)
		$sql = "UPDATE cropvariety
						SET
							name = '$name',
							cropId = '$cropId',
							productionTime = '$productionTime',
							recommendedArea = '$recommendedArea',
							recommendedDate = '$recommendedDate',
							productivity = '$productivity',
							publish = '$publish',
							weight = '$weight'
						WHERE
							id = '$id'";
		else
		$sql = "INSERT INTO cropvariety
							SET
								name = '$name',
								cropId = '$cropId',
								productionTime = '$productionTime',
								recommendedArea = '$recommendedArea',
								recommendedDate = '$recommendedDate',
								productivity = '$productivity',
								publish = '$publish',
								weight = '$weight'";
		//echo $sql; die();
		$conn->exec($sql);
		if($id > 0)
			return $conn -> affRows();
		return $conn->insertId();
	}

	function getById($id)
	{
		global $conn;

		$id = cleanQuery($id);

		$sql = "SElECT * FROM statistics_crops WHERE id = '$id'";
		$result = $conn->exec($sql);
		$result = $conn->fetchArray($result);
		return $result;
	}
	
	function getLastWeight()
	{
		global $conn;
		
		$sql = "SElECT weight FROM statistics_crops ORDER BY weight DESC LIMIT 1";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row['weight'] + 5;
		}
		else
			return 10;
	}

	function getCropVariety()
	{
		global $conn;
		
		$sql = "SElECT * FROM cropvariety WHERE publish = 'Yes' order by weight";
		$result = $conn->exec($sql);
		return $result;
	}

	function getCropVarietiesByCropId($cropId){
		global $conn;
		$sql="select id, name from cropvariety where cropId='$cropId'";
		$result = $conn->exec($sql);
		return $result;
	}
}
