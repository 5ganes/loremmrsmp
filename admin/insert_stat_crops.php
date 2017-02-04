<?php  
$file = $_FILES['excel']['tmp_name'];
$handle = fopen($file, "r");
$c = 0; $counter=0;

// $weight=$program->getLastWeightByTableAndUser($groupType,$_SESSION['userId']);

while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
    if($counter==0){ $counter++; continue;}
    // echo '<pre>'; print_r($filesop); die();

    $district_code = $filesop[0];
    $district_name = $filesop[1];
    $district_area = $filesop[2];
    $development_region = $filesop[3];
    $eco_belt = $filesop[4];
    $fiscal_year = $filesop[5];
    $crop_name = $filesop[6];
    $crop_area = $filesop[7];
    $crop_production = $filesop[8];
    $crop_yield = $filesop[9];
    $onDate = date('Y-m-d');
    $publish = 'Yes';
    $weight = $crop_stat->getLastWeight();
    // echo $onDate.'<br>'.$publish.'<br>'.$weight; die();

    $sql = "INSERT INTO 
                    statistics_crops 
                        set 
                            fiscal_year='$fiscal_year',
                            district_name='$district_name',
                            district_code='$district_code',
                            district_area='$district_area',
                            development_region='$development_region',
                            eco_belt='$eco_belt',
                            crop_name='$crop_name',
                            crop_area='$crop_area',
                            crop_production='$crop_production',
                            crop_yield='$crop_yield',
                            onDate='$onDate',
                            publish='$publish',
                            weight='$weight'
           ";
           // echo $sql; die();
    $sql=mysql_query($sql);
}
if($sql){
    $msg= "You database has imported successfully";
}
else{
    $msg= "Sorry! There is some problem.";
}
?>