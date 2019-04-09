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
$readsite = mysqli_query($dbhandle, "SELECT DISTINCT(site_id) as site FROM serial_data_results WHERE  SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and site_id != ''  ORDER BY site_id ASC");
while ($rreadsite = mysqli_fetch_array($readsite)) {
    $nmsitemy = $rreadsite['site'];

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '02') AS total2, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '03') AS total3, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '04') AS total4, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '05') AS total5, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '06') AS total6, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '07') AS total7, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '08') AS total8, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '09') AS total9, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '10') AS total10, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '11') AS total11, "
            . "(SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '12') AS total12 "
            . "FROM serial_data_results WHERE site_id = '$nmsitemy' AND SUBSTR(FINISH,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != ''  AND SUBSTR(FINISH,4,2) = '01' ");
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