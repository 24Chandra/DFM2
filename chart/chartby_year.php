<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
?>
<div class="col-xl col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['bar']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart()
                {
                    var data = google.visualization.arrayToDataTable([

<?php
//cari nama site_id
$csite_id = mysqli_query($dbhandle, "SELECT COUNT(DISTINCT(site_id)) as site_idname FROM serial_data_results 
                                                                      WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' ORDER BY site_id ASC");
$hcsite_id = mysqli_fetch_array($csite_id);
$count = $hcsite_id['site_idname'];

if ($count == '1') {
    $bcsite_id1 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1");
    $hbcsite_id1 = mysqli_fetch_array($bcsite_id1);

    $nmsite_id1 = $hbcsite_id1['site_id'];



    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id1') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id1') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id1') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id1') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id1'
                                                                                      ");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $tyear_11 = $hrdata1['total1'];
    $tyear_12 = $hrdata1['total2'];
    $tyear_13 = $hrdata1['total3'];
    $tyear_14 = $hrdata1['total4'];
    $tyear_15 = $hrdata1['total5'];
    ?>


                            ['Year', '<?php echo $nmsite_id1 ?>'],

                            ['<?php echo $showyear1 ?>', <?php echo $tyear_11 ?>],
                            ['<?php echo $showyear2 ?>', <?php echo $tyear_12 ?>],
                            ['<?php echo $showyear3 ?>', <?php echo $tyear_13 ?>],
                            ['<?php echo $showyear4 ?>', <?php echo $tyear_14 ?>],
                            ['<?php echo $showyear5 ?>', <?php echo $tyear_15 ?>],
    <?php
} //end of if = 1

if ($count == '2') {
    $bcsite_id1 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1");
    $hbcsite_id1 = mysqli_fetch_array($bcsite_id1);

    $bcsite_id2 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1,1");
    $hbcsite_id2 = mysqli_fetch_array($bcsite_id2);


    $nmsite_id1 = $hbcsite_id1['site_id'];
    $nmsite_id2 = $hbcsite_id2['site_id'];

    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id1') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id1') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id1') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id1') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id1'
                                                                                      ");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id2') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id2') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id2') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id2') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id2'
                                                                                      ");
    $hrdata2 = mysqli_fetch_array($rdata2);

    $tyear_11 = $hrdata1['total1'];
    $tyear_12 = $hrdata1['total2'];
    $tyear_13 = $hrdata1['total3'];
    $tyear_14 = $hrdata1['total4'];
    $tyear_15 = $hrdata1['total5'];

    $tyear_21 = $hrdata2['total1'];
    $tyear_22 = $hrdata2['total2'];
    $tyear_23 = $hrdata2['total3'];
    $tyear_24 = $hrdata2['total4'];
    $tyear_25 = $hrdata2['total5'];
    ?>


                            ['Year', '<?php echo $nmsite_id1 ?>', '<?php echo $nmsite_id2 ?>'],

                            ['<?php echo $showyear1 ?>', <?php echo $tyear_11 ?>, <?php echo $tyear_21 ?>],
                            ['<?php echo $showyear2 ?>', <?php echo $tyear_12 ?>, <?php echo $tyear_22 ?>],
                            ['<?php echo $showyear3 ?>', <?php echo $tyear_13 ?>, <?php echo $tyear_23 ?>],
                            ['<?php echo $showyear4 ?>', <?php echo $tyear_14 ?>, <?php echo $tyear_24 ?>],
                            ['<?php echo $showyear5 ?>', <?php echo $tyear_15 ?>, <?php echo $tyear_25 ?>],
    <?php
} //end of if = 2

if ($count == '3') {
    $bcsite_id1 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1");
    $hbcsite_id1 = mysqli_fetch_array($bcsite_id1);

    $bcsite_id2 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1,1");
    $hbcsite_id2 = mysqli_fetch_array($bcsite_id2);

    $bcsite_id3 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 2,1");
    $hbcsite_id3 = mysqli_fetch_array($bcsite_id3);


    $nmsite_id1 = $hbcsite_id1['site_id'];
    $nmsite_id2 = $hbcsite_id2['site_id'];
    $nmsite_id3 = $hbcsite_id3['site_id'];



    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id1') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id1') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id1') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id1') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id1'");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id2') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id2') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id2') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id2') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id2'");
    $hrdata2 = mysqli_fetch_array($rdata2);

    $rdata3 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id3') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id3') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id3') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id3') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id3'");
    $hrdata3 = mysqli_fetch_array($rdata3);


    $tyear_11 = $hrdata1['total1'];
    $tyear_12 = $hrdata1['total2'];
    $tyear_13 = $hrdata1['total3'];
    $tyear_14 = $hrdata1['total4'];
    $tyear_15 = $hrdata1['total5'];

    $tyear_21 = $hrdata2['total1'];
    $tyear_22 = $hrdata2['total2'];
    $tyear_23 = $hrdata2['total3'];
    $tyear_24 = $hrdata2['total4'];
    $tyear_25 = $hrdata2['total5'];

    $tyear_31 = $hrdata3['total1'];
    $tyear_32 = $hrdata3['total2'];
    $tyear_33 = $hrdata3['total3'];
    $tyear_34 = $hrdata3['total4'];
    $tyear_35 = $hrdata3['total5'];
    ?>


                            ['Year', '<?php echo $nmsite_id1 ?>', '<?php echo $nmsite_id2 ?>', '<?php echo $nmsite_id3 ?>'],

                            ['<?php echo $showyear1 ?>', <?php echo $tyear_11 ?>, <?php echo $tyear_21 ?>, <?php echo $tyear_31 ?>],
                            ['<?php echo $showyear2 ?>', <?php echo $tyear_12 ?>, <?php echo $tyear_22 ?>, <?php echo $tyear_32 ?>],
                            ['<?php echo $showyear3 ?>', <?php echo $tyear_13 ?>, <?php echo $tyear_23 ?>, <?php echo $tyear_33 ?>],
                            ['<?php echo $showyear4 ?>', <?php echo $tyear_14 ?>, <?php echo $tyear_24 ?>, <?php echo $tyear_34 ?>],
                            ['<?php echo $showyear5 ?>', <?php echo $tyear_15 ?>, <?php echo $tyear_25 ?>, <?php echo $tyear_35 ?>],
    <?php
} //end of if = 3

if ($count == '4') {
    $bcsite_id1 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1");
    $hbcsite_id1 = mysqli_fetch_array($bcsite_id1);

    $bcsite_id2 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1,1");
    $hbcsite_id2 = mysqli_fetch_array($bcsite_id2);

    $bcsite_id3 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 2,1");
    $hbcsite_id3 = mysqli_fetch_array($bcsite_id3);

    $bcsite_id4 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 3,1");
    $hbcsite_id4 = mysqli_fetch_array($bcsite_id4);


    $nmsite_id1 = $hbcsite_id1['site_id'];
    $nmsite_id2 = $hbcsite_id2['site_id'];
    $nmsite_id3 = $hbcsite_id3['site_id'];
    $nmsite_id4 = $hbcsite_id4['site_id'];

    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id1') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id1') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id1') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id1') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id1'");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id2') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id2') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id2') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id2') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id2'");
    $hrdata2 = mysqli_fetch_array($rdata2);

    $rdata3 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id3') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id3') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id3') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id3') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id3'");
    $hrdata3 = mysqli_fetch_array($rdata3);

    $rdata4 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id4') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id4') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id4') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id4') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id4'");
    $hrdata4 = mysqli_fetch_array($rdata4);


    $tyear_11 = $hrdata1['total1'];
    $tyear_12 = $hrdata1['total2'];
    $tyear_13 = $hrdata1['total3'];
    $tyear_14 = $hrdata1['total4'];
    $tyear_15 = $hrdata1['total5'];

    $tyear_21 = $hrdata2['total1'];
    $tyear_22 = $hrdata2['total2'];
    $tyear_23 = $hrdata2['total3'];
    $tyear_24 = $hrdata2['total4'];
    $tyear_25 = $hrdata2['total5'];

    $tyear_31 = $hrdata3['total1'];
    $tyear_32 = $hrdata3['total2'];
    $tyear_33 = $hrdata3['total3'];
    $tyear_34 = $hrdata3['total4'];
    $tyear_35 = $hrdata3['total5'];

    $tyear_41 = $hrdata4['total1'];
    $tyear_42 = $hrdata4['total2'];
    $tyear_43 = $hrdata4['total3'];
    $tyear_44 = $hrdata4['total4'];
    $tyear_45 = $hrdata4['total5'];
    ?>


                            ['Year', '<?php echo $nmsite_id1 ?>', '<?php echo $nmsite_id2 ?>', '<?php echo $nmsite_id3 ?>', '<?php echo $nmsite_id4 ?>'],

                            ['<?php echo $showyear1 ?>', <?php echo $tyear_11 ?>, <?php echo $tyear_21 ?>, <?php echo $tyear_31 ?>, <?php echo $tyear_41 ?>],
                            ['<?php echo $showyear2 ?>', <?php echo $tyear_12 ?>, <?php echo $tyear_22 ?>, <?php echo $tyear_32 ?>, <?php echo $tyear_42 ?>],
                            ['<?php echo $showyear3 ?>', <?php echo $tyear_13 ?>, <?php echo $tyear_23 ?>, <?php echo $tyear_33 ?>, <?php echo $tyear_43 ?>],
                            ['<?php echo $showyear4 ?>', <?php echo $tyear_14 ?>, <?php echo $tyear_24 ?>, <?php echo $tyear_34 ?>, <?php echo $tyear_44 ?>],
                            ['<?php echo $showyear5 ?>', <?php echo $tyear_15 ?>, <?php echo $tyear_25 ?>, <?php echo $tyear_35 ?>, <?php echo $tyear_45 ?>],

    <?php
} //end of if = 4

if ($count == '5') {
    $bcsite_id1 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1");
    $hbcsite_id1 = mysqli_fetch_array($bcsite_id1);

    $bcsite_id2 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 1,1");
    $hbcsite_id2 = mysqli_fetch_array($bcsite_id2);

    $bcsite_id3 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 2,1");
    $hbcsite_id3 = mysqli_fetch_array($bcsite_id3);

    $bcsite_id4 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 3,1");
    $hbcsite_id4 = mysqli_fetch_array($bcsite_id4);

    $bcsite_id5 = mysqli_query($dbhandle, "SELECT site_id FROM serial_data_results 
                                                                               WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != '' GROUP BY site_id
                                                                               ORDER BY site_id ASC LIMIT 4,1");
    $hbcsite_id5 = mysqli_fetch_array($bcsite_id5);


    $nmsite_id1 = $hbcsite_id1['site_id'];
    $nmsite_id2 = $hbcsite_id2['site_id'];
    $nmsite_id3 = $hbcsite_id3['site_id'];
    $nmsite_id4 = $hbcsite_id4['site_id'];
    $nmsite_id5 = $hbcsite_id5['site_id'];

    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id1') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id1') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id1') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id1') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id1'");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id2') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id2') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id2') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id2') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id2'");
    $hrdata2 = mysqli_fetch_array($rdata2);

    $rdata3 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id3') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id3') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id3') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id3') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id3'");
    $hrdata3 = mysqli_fetch_array($rdata3);

    $rdata4 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id4') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id4') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id4') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id4') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id4'");
    $hrdata4 = mysqli_fetch_array($rdata4);

    $rdata5 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear2'  AND site_id = '$nmsite_id5') AS total2,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear3'  AND site_id = '$nmsite_id5') AS total3,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear4'  AND site_id = '$nmsite_id5') AS total4,
                                                                                            (SELECT IFNULL(SUM(gross_deliver),0) AS total FROM serial_data_results WHERE duplicate = '' and meter_number != '' and unit_id != '' AND SUBSTR(start,7,2) = '$theyear5'  AND site_id = '$nmsite_id5') AS total5
                                                                                            FROM serial_data_results WHERE SUBSTR(start,7,2) = '$theyear1' AND duplicate = '' and meter_number != '' and unit_id != ''  AND site_id = '$nmsite_id5'");
    $hrdata5 = mysqli_fetch_array($rdata5);


    $tyear_11 = $hrdata1['total1'];
    $tyear_12 = $hrdata1['total2'];
    $tyear_13 = $hrdata1['total3'];
    $tyear_14 = $hrdata1['total4'];
    $tyear_15 = $hrdata1['total5'];

    $tyear_21 = $hrdata2['total1'];
    $tyear_22 = $hrdata2['total2'];
    $tyear_23 = $hrdata2['total3'];
    $tyear_24 = $hrdata2['total4'];
    $tyear_25 = $hrdata2['total5'];

    $tyear_31 = $hrdata3['total1'];
    $tyear_32 = $hrdata3['total2'];
    $tyear_33 = $hrdata3['total3'];
    $tyear_34 = $hrdata3['total4'];
    $tyear_35 = $hrdata3['total5'];

    $tyear_41 = $hrdata4['total1'];
    $tyear_42 = $hrdata4['total2'];
    $tyear_43 = $hrdata4['total3'];
    $tyear_44 = $hrdata4['total4'];
    $tyear_45 = $hrdata4['total5'];

    $tyear_51 = $hrdata5['total1'];
    $tyear_52 = $hrdata5['total2'];
    $tyear_53 = $hrdata5['total3'];
    $tyear_54 = $hrdata5['total4'];
    $tyear_55 = $hrdata5['total5'];
    ?>


                            ['Year', '<?php echo $nmsite_id1 ?>', '<?php echo $nmsite_id2 ?>', '<?php echo $nmsite_id3 ?>', '<?php echo $nmsite_id4 ?>', '<?php echo $nmsite_id5 ?>'],

                            ['<?php echo $showyear1 ?>', <?php echo $tyear_11 ?>, <?php echo $tyear_21 ?>, <?php echo $tyear_31 ?>, <?php echo $tyear_41 ?>, <?php echo $tyear_51 ?>],
                            ['<?php echo $showyear2 ?>', <?php echo $tyear_12 ?>, <?php echo $tyear_22 ?>, <?php echo $tyear_32 ?>, <?php echo $tyear_42 ?>, <?php echo $tyear_52 ?>],
                            ['<?php echo $showyear3 ?>', <?php echo $tyear_13 ?>, <?php echo $tyear_23 ?>, <?php echo $tyear_33 ?>, <?php echo $tyear_43 ?>, <?php echo $tyear_53 ?>],
                            ['<?php echo $showyear4 ?>', <?php echo $tyear_14 ?>, <?php echo $tyear_24 ?>, <?php echo $tyear_34 ?>, <?php echo $tyear_44 ?>, <?php echo $tyear_54 ?>],
                            ['<?php echo $showyear5 ?>', <?php echo $tyear_15 ?>, <?php echo $tyear_25 ?>, <?php echo $tyear_35 ?>, <?php echo $tyear_45 ?>, <?php echo $tyear_55 ?>],

    <?php
} //end of if = 5
?>

                        //['12', 1000, 400],	

                    ]);

                    var options = {

                        legend: {
                             position: 'right',
                            layout: 'horizontal',

                        },
                        chart: {
                            'title': '',
                            //title: 'Company Performance',
                            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',

                        },
                        bars: 'vertical', // Required for Material Bar Charts.
                        vAxis: {
                            format: 'decimal',
                        }


                    };

                    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>

        </div>
        <div id="barchart_material" style="height: 500px;"></div>
    </div>
</div>
