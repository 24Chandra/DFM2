<?php
if ($_POST['cyear']) {
$theyear1 = $_POST['cyear'];
$showyear1 = "20$theyear1";
} else {
$theyear1 = date('y');
$showyear1 = date('Y');
}

$theyear2 = $theyear1 - 1;
$theyear3 = $theyear1 - 2;
$theyear4 = $theyear1 - 3;
$theyear5 = $theyear1 - 4;

$showyear2 = "20$theyear2";
$showyear3 = "20$theyear3";
$showyear4 = "20$theyear4";
$showyear5 = "20$theyear5";

$no = 1;

$readsite_id = mysqli_query($dbhandle, "SELECT distinct(site_id) as site_id FROM serial_data_results 
WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' ORDER BY site_id ASC");
while ($rreadsite_id = mysqli_fetch_array($readsite_id)) {
$nmsite_id = $rreadsite_id['site_id'];

$rdatat = mysqli_query($dbhandle, "SELECT SUM(gross_deliver) AS total1,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id') AS total2,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id') AS total3,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id') AS total4,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id') AS total5
FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id'");
$hrdatat = mysqli_fetch_array($rdatat);
$rs1 = number_format($hrdatat[total1], 0, ',', '.');
$rs2 = number_format($hrdatat[total2], 0, ',', '.');
$rs3 = number_format($hrdatat[total3], 0, ',', '.');
$rs4 = number_format($hrdatat[total4], 0, ',', '.');
$rs5 = number_format($hrdatat[total5], 0, ',', '.');

echo"
<tr>
    <td align='left'>$nmsite_id</td>
    <td align='right'>$rs1 Litres</td>
    <td align='right'>$rs2 Litres</td>
    <td align='right'>$rs3 Litres</td>
    <td align='right'>$rs4 Litres</td>
    <td align='right'>$rs5 Litres </td>
</tr>
";
$no++;
}
?>