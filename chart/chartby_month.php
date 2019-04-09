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

$bcsite1 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos' AND  SUBSTR(start,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != '' "
        . "GROUP BY unit_id ORDER BY unit_id ASC LIMIT 1");
$hbcsite1 = mysqli_fetch_array($bcsite1);

$bcsite2 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(start,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != '' "
        . "GROUP BY unit_id ORDER BY unit_id ASC LIMIT 1,1");
$hbcsite2 = mysqli_fetch_array($bcsite2);

$bcsite3 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(start,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != '' "
        . "GROUP BY unit_id ORDER BY unit_id ASC LIMIT 2,1");
$hbcsite3 = mysqli_fetch_array($bcsite3);

$bcsite4 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(start,7,2) = '$year' AND duplicate = '' and meter_number != '' and unit_id != '' "
        . "GROUP BY unit_id ORDER BY unit_id ASC LIMIT 3,1");
$hbcsite4 = mysqli_fetch_array($bcsite4);

$nmsite1 = $hbcsite1['unit_id'];
$nmsite2 = $hbcsite2['unit_id'];
$nmsite3 = $hbcsite3['unit_id'];
$nmsite4 = $hbcsite4['unit_id'];

for ($w = 1; $w <= 12; $w++) {
    if ($w <= 9) {
        $newmonth = "0$w";
    } else {
        $newmonth = "$w";
    }

    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1 FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(finish,4,2) = '$newmonth' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and meter_number != ''"
            . " and unit_id != '' AND duplicate = '' and meter_number != '' and unit_id = '$nmsite1' ");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total2 FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(finish,4,2) = '$newmonth' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and meter_number != ''"
            . " and unit_id != '' AND duplicate = '' and meter_number != '' and unit_id = '$nmsite2' ");
    $hrdata2 = mysqli_fetch_array($rdata2);

    $rdata3 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total3 FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(finish,4,2) = '$newmonth' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and meter_number != ''"
            . " and unit_id != '' AND duplicate = '' and meter_number != '' and unit_id = '$nmsite3' ");
    $hrdata3 = mysqli_fetch_array($rdata3);

    $rdata4 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total4 FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(finish,4,2) = '$newmonth' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and meter_number != ''"
            . " and unit_id != '' AND duplicate = '' and meter_number != '' and unit_id = '$nmsite4' ");
    $hrdata4 = mysqli_fetch_array($rdata4);


    if ($newmonth == '01') {
        $t_s_11 = $hrdata1['total1'];
        $t_s_12 = $hrdata2['total2'];
        $t_s_13 = $hrdata3['total3'];
        $t_s_14 = $hrdata4['total4'];
    }

    if ($newmonth == '02') {
        $t_s_21 = $hrdata1['total1'];
        $t_s_22 = $hrdata2['total2'];
        $t_s_23 = $hrdata3['total3'];
        $t_s_24 = $hrdata4['total4'];
    }

    if ($newmonth == '03') {
        $t_s_31 = $hrdata1['total1'];
        $t_s_32 = $hrdata2['total2'];
        $t_s_33 = $hrdata3['total3'];
        $t_s_34 = $hrdata4['total4'];
    }

    if ($newmonth == '04') {
        $t_s_41 = $hrdata1['total1'];
        $t_s_42 = $hrdata2['total2'];
        $t_s_43 = $hrdata3['total3'];
        $t_s_44 = $hrdata4['total4'];
    }

    if ($newmonth == '05') {
        $t_s_51 = $hrdata1['total1'];
        $t_s_52 = $hrdata2['total2'];
        $t_s_53 = $hrdata3['total3'];
        $t_s_54 = $hrdata4['total4'];
    }

    if ($newmonth == '06') {
        $t_s_61 = $hrdata1['total1'];
        $t_s_62 = $hrdata2['total2'];
        $t_s_63 = $hrdata3['total3'];
        $t_s_64 = $hrdata4['total4'];
    }

    if ($newmonth == '07') {
        $t_s_71 = $hrdata1['total1'];
        $t_s_72 = $hrdata2['total2'];
        $t_s_73 = $hrdata3['total3'];
        $t_s_74 = $hrdata4['total4'];
    }

    if ($newmonth == '08') {
        $t_s_81 = $hrdata1['total1'];
        $t_s_82 = $hrdata2['total2'];
        $t_s_83 = $hrdata3['total3'];
        $t_s_84 = $hrdata4['total4'];
    }

    if ($newmonth == '09') {
        $t_s_91 = $hrdata1['total1'];
        $t_s_92 = $hrdata2['total2'];
        $t_s_93 = $hrdata3['total3'];
        $t_s_94 = $hrdata4['total4'];
    }

    if ($newmonth == '10') {
        $t_s_101 = $hrdata1['total1'];
        $t_s_102 = $hrdata2['total2'];
        $t_s_103 = $hrdata3['total3'];
        $t_s_104 = $hrdata4['total4'];
    }

    if ($newmonth == '11') {
        $t_s_111 = $hrdata1['total1'];
        $t_s_112 = $hrdata2['total2'];
        $t_s_113 = $hrdata3['total3'];
        $t_s_114 = $hrdata4['total4'];
    }

    if ($newmonth == '12') {
        $t_s_121 = $hrdata1['total1'];
        $t_s_122 = $hrdata2['total2'];
        $t_s_123 = $hrdata3['total3'];
        $t_s_124 = $hrdata4['total4'];
    }
}
?>


                        ['Month', '<?php echo $nmsite1 ?>', '<?php echo $nmsite2 ?>', '<?php echo $nmsite3 ?>', '<?php echo $nmsite4 ?>'],
                        ['Jan', <?php echo $t_s_11 ?>, <?php echo $t_s_12 ?>, <?php echo $t_s_13 ?>, <?php echo $t_s_14 ?>],
                        ['Feb', <?php echo $t_s_21 ?>, <?php echo $t_s_22 ?>, <?php echo $t_s_23 ?>, <?php echo $t_s_24 ?>],
                        ['Mar', <?php echo $t_s_31 ?>, <?php echo $t_s_32 ?>, <?php echo $t_s_33 ?>, <?php echo $t_s_34 ?>],
                        ['Apr', <?php echo $t_s_41 ?>, <?php echo $t_s_42 ?>, <?php echo $t_s_43 ?>, <?php echo $t_s_44 ?>],
                        ['May', <?php echo $t_s_51 ?>, <?php echo $t_s_52 ?>, <?php echo $t_s_53 ?>, <?php echo $t_s_54 ?>],
                        ['Jun', <?php echo $t_s_61 ?>, <?php echo $t_s_62 ?>, <?php echo $t_s_63 ?>, <?php echo $t_s_64 ?>],
                        ['Jul', <?php echo $t_s_71 ?>, <?php echo $t_s_72 ?>, <?php echo $t_s_73 ?>, <?php echo $t_s_74 ?>],
                        ['Aug', <?php echo $t_s_81 ?>, <?php echo $t_s_82 ?>, <?php echo $t_s_83 ?>, <?php echo $t_s_84 ?>],
                        ['Sep', <?php echo $t_s_91 ?>, <?php echo $t_s_92 ?>, <?php echo $t_s_93 ?>, <?php echo $t_s_94 ?>],
                        ['Okt', <?php echo $t_s_101 ?>,<?php echo $t_s_102 ?>, <?php echo $t_s_103 ?>, <?php echo $t_s_104 ?>],
                        ['Nov', <?php echo $t_s_111 ?>,<?php echo $t_s_112 ?>, <?php echo $t_s_113 ?>, <?php echo $t_s_114 ?>],
                        ['Des', <?php echo $t_s_121 ?>,<?php echo $t_s_122 ?>, <?php echo $t_s_123 ?>, <?php echo $t_s_124 ?>]
//end of if = 4


                                //['12', 1000, 400],	
                    ]);
                    var options = {
                        legend: {
                            position: 'right',
                            layout: 'horizontal',
                        },
                        chart: {
                            'title': 'Data Liter By Hour <?php echo $convdate; ?>',
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
            <div id="barchart_material" style="height: 500px;"></div>                
        </div>
    </div>
</div>
