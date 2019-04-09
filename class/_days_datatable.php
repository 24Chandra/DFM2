<?php

$sitePos;
$monthPos;
$yearPos;
$convdate;
$year;
if ($_POST['month_val'] || $_POST['year_val'] || $_POST['site_val']) {
    $monthPos = $_POST['month_val'];
    $yearPos = $_POST['year_val'];
    $sitePos = $_POST['site_val'];
    $year = substr($yearPos, 2, 2);
} else {

    $monthPos = date("m");
    $year = date("y");
    $sitePos = "JATINEGARA";
}
//$convdate = date("d/m/y", strtotime($thedate));
$thedate = $monthPos . "/" . $year;

$dayQuery = "SELECT MAX(SUBSTR(finish,1,2) ) AS lenght FROM serial_data_results "
        . " WHERE site_id = '$sitePos' AND SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and gross_deliver != '' and unit_id != '' ";
$dayLength = mysqli_query($dbhandle, $dayQuery);

while ($getDay = mysqli_fetch_array($dayLength)) {


    for ($w = 1; $w <= $getDay['lenght']; $w++) {
        if ($w <= 9) {
            $newdate = "0$w";
        } else {
            $newdate = "$w";
        }

        $unit_id = $rreadsite_id['unit_id'];
        $convdate1 = date("$postyear-$postmonth");
        $rdata2 = mysqli_query($dbhandle, "select site_id AS site,  SUBSTR(finish,1,2) AS DAY,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND SUBSTR(finish,1,2) = '$newdate' AND site_id = '$sitePos' AND duplicate = '' AND meter_number != '' AND unit_id = '11111' ) AS FM1Total,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND SUBSTR(finish,1,2) = '$newdate' AND site_id = '$sitePos' AND duplicate = '' AND meter_number != '' AND unit_id = '12111' ) AS FM2Total,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND SUBSTR(finish,1,2) = '$newdate' AND site_id = '$sitePos' AND duplicate = '' AND meter_number != '' AND unit_id = '12345' ) AS FM3Total,
(SELECT SUM(gross_deliver) AS total FROM serial_data_results WHERE SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND SUBSTR(finish,1,2) = '$newdate' AND site_id = '$sitePos' AND duplicate = '' AND meter_number != '' AND unit_id = '14111' ) AS FM4Total FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(finish,1,2) = '$newdate' AND substr(finish,4,6) = '03/19' AND finish != '' GROUP BY SUBSTR(finish,1,2)");
        $hrdata2 = mysqli_fetch_array($rdata2);

        echo "<tr>";
        echo "<td align='center'>" . $hrdata2['site'] . "</td>";
        echo "<td align='center'>" . $hrdata2['DAY'] . "</td>";
        echo "<td align='center'>" . $hrdata2['FM1Total'] . "</td>";
        echo "<td align='center'>" . $hrdata2['FM2Total'] . "</td>";
        echo "<td align='center'>" . $hrdata2['FM3Total'] . "</td>";
        echo "<td align='center'>" . $hrdata2['FM4Total'] . "</td>";
        echo "<td align='center'> LITRES </td>";
        echo "</tr>";
    }
}
?>