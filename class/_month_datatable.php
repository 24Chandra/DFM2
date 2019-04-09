<?php
$sitePos;
$yearPos;
$year;
if ($_POST['year_val'] || $_POST['site_val']) {
    $yearPos = $_POST['year_val'];
    $sitePos = $_POST['site_val'];
    $year = substr($yearPos, 2, 2);
} else {
    $year = date("y");
    $sitePos = "JATINEGARA";
}
$no = 1;
$readsite = mysqli_query($dbhandle, "SELECT DISTINCT(unit_id) as unit FROM serial_data_results "
        . "WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  ORDER BY unit_id ASC");
while ($rreadsite = mysqli_fetch_array($readsite)) {
    $nmsitemy = $rreadsite['unit'];

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '02' AND unit_id = '$nmsitemy') AS total2, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '03' AND unit_id = '$nmsitemy') AS total3, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '04' AND unit_id = '$nmsitemy') AS total4, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '05' AND unit_id = '$nmsitemy') AS total5, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '06' AND unit_id = '$nmsitemy') AS total6, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '07' AND unit_id = '$nmsitemy') AS total7, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '08' AND unit_id = '$nmsitemy') AS total8, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '09' AND unit_id = '$nmsitemy') AS total9, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '10' AND unit_id = '$nmsitemy') AS total10, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '11' AND unit_id = '$nmsitemy') AS total11, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '12' AND unit_id = '$nmsitemy') AS total12 "
            . "FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '01' AND unit_id = '$nmsitemy'");
    $hrdata2 = mysqli_fetch_array($rdata2);
    $rs1 = number_format($hrdata2[total1], 0, ',', '.');
    $rs2 = number_format($hrdata2[total2], 0, ',', '.');
    $rs3 = number_format($hrdata2[total3], 0, ',', '.');
    $rs4 = number_format($hrdata2[total4], 0, ',', '.');
    $rs5 = number_format($hrdata2[total5], 0, ',', '.');
    $rs6 = number_format($hrdata2[total6], 0, ',', '.');
    $rs7 = number_format($hrdata2[total7], 0, ',', '.');
    $rs8 = number_format($hrdata2[total8], 0, ',', '.');
    $rs9 = number_format($hrdata2[total9], 0, ',', '.');
    $rs10 = number_format($hrdata2[total10], 0, ',', '.');
    $rs11 = number_format($hrdata2[total11], 0, ',', '.');
    $rs12 = number_format($hrdata2[total12], 0, ',', '.');


    echo " <tr>"
    . "<td align='center'>$no</td>"
    . "<td align='center'>$nmsitemy</td>"
    . "<td align='right'>$rs1</td>"
    . "<td align='right'>$rs2</td>"
    . "<td align='right'>$rs3</td>"
    . "<td align='right'>$rs4</td>"
    . "<td align='right'>$rs5</td>"
    . "<td align='right'>$rs6</td>"
    . "<td align='right'>$rs7</td>"
    . "<td align='right'>$rs8</td>"
    . "<td align='right'>$rs9</td>"
    . "<td align='right'>$rs10</td>"
    . "<td align='right'>$rs11</td>"
    . "<td align='right'>$rs12</td>"
    . "</tr>";
    $no++;
}
?>