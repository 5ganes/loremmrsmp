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

	function getAllDistricts(){
		global $conn;
		$sql = "SElECT distinct district_name FROM statistics_crops ORDER BY district_name DESC";
		// echo $sql; die();
		$result = $conn->exec($sql);
		return $result;
	}

	function getAllCrops(){
		global $conn;
		$sql = "SElECT distinct crop_name FROM statistics_crops ORDER BY crop_name DESC";
		// echo $sql; die();
		$result = $conn->exec($sql);
		return $result;
	}

	function getAllFiscalYears(){
		global $conn;
		$sql = "SElECT distinct fiscal_year FROM statistics_crops ORDER BY fiscal_year DESC";
		// echo $sql; die();
		$result = $conn->exec($sql);
		return $result;
	}

	function getReportByDistrictsCropsFiscalYear($post,$multiple_select){
		global $conn;
		$districts=$post['district'];
		foreach ($districts as $key => $value) {
			$arr1[]='\''.$value.'\'';
		}
		$districts = implode(',',$arr1);
		
		$crops=$post['crop'];
		foreach ($crops as $key => $value) {
			$arr2[]='\''.$value.'\'';
		}
		$crops = implode(',',$arr2);

		$fiscal_year=$post['fiscal_year'];
		foreach ($fiscal_year as $key => $value) {
			$arr3[]='\''.$value.'\'';
		}
		$fiscal_year = implode(',',$arr3);

		if($multiple_select=='districts')
			$order='district_name';
		else if($multiple_select=='crops')
			$order='crop_name';
		else
			$order='fiscal_year';

		$sql='select crop_area,crop_production from statistics_crops where district_name in ('.$districts.') and crop_name in ('.$crops.') and fiscal_year in ('.$fiscal_year.') order by '.$order;
		// echo $sql; die();
		$result=$conn->exec($sql);
		return $result;
	}

}
