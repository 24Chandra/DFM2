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

$flowUnit = mysqli_query($dbhandle, "SELECT COUNT(DISTINCT(unit_id)) as unitFlow FROM serial_data_results "
        . "WHERE SUBSTR(FINISH,4,5) = '$thedate' AND duplicate = '' and unit_id != ''and gross_deliver != '' AND site_id = '$sitePos'  ORDER BY unit_id ASC");
$flowCount = mysqli_fetch_array($flowUnit);
$count = $flowCount['unitFlow'];
$nmsite_id1 = "";
$nmsite_id2 = "";
$nmsite_id3 = "";
$nmsite_id4 = "";

$bcsite_id1 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results  "
        . "WHERE  site_id = '$sitePos' AND SUBSTR(FINISH,4,5) = '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id != ''  GROUP BY unit_id ORDER BY unit_id ASC LIMIT 1");
$hbcsite_id1 = mysqli_fetch_array($bcsite_id1);

$bcsite_id2 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results  "
        . "WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5) = '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id != ''  GROUP BY unit_id ORDER BY unit_id ASC LIMIT 1,1");
$hbcsite_id2 = mysqli_fetch_array($bcsite_id2);

$bcsite_id3 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results "
        . "WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5) = '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id != ''  GROUP BY unit_id ORDER BY unit_id ASC LIMIT 2,1");
$hbcsite_id3 = mysqli_fetch_array($bcsite_id3);

$bcsite_id4 = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results "
        . "WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5) = '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id != ''  GROUP BY unit_id ORDER BY unit_id ASC LIMIT 3,1");
$hbcsite_id4 = mysqli_fetch_array($bcsite_id4);

$nmsite_id1 = $hbcsite_id1['unit_id'];
$nmsite_id2 = $hbcsite_id2['unit_id'];
$nmsite_id3 = $hbcsite_id3['unit_id'];
$nmsite_id4 = $hbcsite_id4['unit_id'];


for ($w = 1; $w <= 31; $w++) {
    if ($w <= 9) {
        $newdate = "0$w";
    } else {
        $newdate = "$w";
    }


    $rdata1 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total1 FROM serial_data_results "
            . "WHERE site_id = 'JATINEGARA' AND SUBSTR(finish,1,2) = '$newdate' AND SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and gross_deliver != '' and unit_id != '' and unit_id = '$nmsite_id1' ");
    $hrdata1 = mysqli_fetch_array($rdata1);

    $rdata2 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total2 FROM serial_data_results "
            . "WHERE site_id = 'JATINEGARA' AND SUBSTR(finish,1,2) = '$newdate' AND SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and gross_deliver != '' and unit_id != '' and unit_id = '$nmsite_id2' ");
    $hrdata2 = mysqli_fetch_array($rdata2);

    $rdata3 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total3 FROM serial_data_results "
            . "WHERE site_id = 'JATINEGARA' AND SUBSTR(finish,1,2) = '$newdate' AND SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and gross_deliver != '' and unit_id != '' and unit_id = '$nmsite_id3' ");
    $hrdata3 = mysqli_fetch_array($rdata3);

    $rdata4 = mysqli_query($dbhandle, "SELECT IFNULL(SUM(gross_deliver),0) AS total4 FROM serial_data_results "
            . "WHERE site_id = 'JATINEGARA' AND SUBSTR(finish,1,2) = '$newdate' AND SUBSTR(finish,4,2) = '$monthPos' AND SUBSTR(finish,7,2) = '$year' AND duplicate = '' and gross_deliver != '' and unit_id != '' and unit_id = '$nmsite_id4' ");
    $hrdata4 = mysqli_fetch_array($rdata4);

    if ($newdate == '01') {
        $t11 = $hrdata1['total1'];
        $t12 = $hrdata2['total2'];
        $t13 = $hrdata3['total3'];
        $t14 = $hrdata4['total4'];
    }

    if ($newdate == '02') {
        $t21 = $hrdata1['total1'];
        $t22 = $hrdata2['total2'];
        $t23 = $hrdata3['total3'];
        $t24 = $hrdata4['total4'];
    }

    if ($newdate == '03') {
        $t31 = $hrdata1['total1'];
        $t32 = $hrdata2['total2'];
        $t33 = $hrdata3['total3'];
        $t34 = $hrdata4['total4'];
    }

    if ($newdate == '04') {
        $t41 = $hrdata1['total1'];
        $t42 = $hrdata2['total2'];
        $t43 = $hrdata3['total3'];
        $t44 = $hrdata4['total4'];
    }

    if ($newdate == '05') {
        $t51 = $hrdata1['total1'];
        $t52 = $hrdata2['total2'];
        $t53 = $hrdata3['total3'];
        $t54 = $hrdata4['total4'];
    }

    if ($newdate == '06') {
        $t61 = $hrdata1['total1'];
        $t62 = $hrdata2['total2'];
        $t63 = $hrdata3['total3'];
        $t64 = $hrdata4['total4'];
    }

    if ($newdate == '07') {
        $t71 = $hrdata1['total1'];
        $t72 = $hrdata2['total2'];
        $t73 = $hrdata3['total3'];
        $t74 = $hrdata4['total4'];
    }

    if ($newdate == '08') {
        $t81 = $hrdata1['total1'];
        $t82 = $hrdata2['total2'];
        $t83 = $hrdata3['total3'];
        $t84 = $hrdata4['total4'];
    }

    if ($newdate == '09') {
        $t91 = $hrdata1['total1'];
        $t92 = $hrdata2['total2'];
        $t93 = $hrdata3['total3'];
        $t94 = $hrdata4['total4'];
    }

    if ($newdate == '10') {
        $t101 = $hrdata1['total1'];
        $t102 = $hrdata2['total2'];
        $t103 = $hrdata3['total3'];
        $t104 = $hrdata4['total4'];
    }

    if ($newdate == '11') {
        $t111 = $hrdata1['total1'];
        $t112 = $hrdata2['total2'];
        $t113 = $hrdata3['total3'];
        $t114 = $hrdata4['total4'];
    }

    if ($newdate == '12') {
        $t121 = $hrdata1['total1'];
        $t122 = $hrdata2['total2'];
        $t123 = $hrdata3['total3'];
        $t124 = $hrdata4['total4'];
    }

    if ($newdate == '13') {
        $t131 = $hrdata1['total1'];
        $t132 = $hrdata2['total2'];
        $t133 = $hrdata3['total3'];
        $t134 = $hrdata4['total4'];
    }

    if ($newdate == '14') {
        $t141 = $hrdata1['total1'];
        $t142 = $hrdata2['total2'];
        $t143 = $hrdata3['total3'];
        $t144 = $hrdata4['total4'];
    }

    if ($newdate == '15') {
        $t151 = $hrdata1['total1'];
        $t152 = $hrdata2['total2'];
        $t153 = $hrdata3['total3'];
        $t154 = $hrdata4['total4'];
    }

    if ($newdate == '16') {
        $t161 = $hrdata1['total1'];
        $t162 = $hrdata2['total2'];
        $t163 = $hrdata3['total3'];
        $t164 = $hrdata4['total4'];
    }

    if ($newdate == '17') {
        $t171 = $hrdata1['total1'];
        $t172 = $hrdata2['total2'];
        $t173 = $hrdata3['total3'];
        $t174 = $hrdata4['total4'];
    }

    if ($newdate == '18') {
        $t181 = $hrdata1['total1'];
        $t182 = $hrdata2['total2'];
        $t183 = $hrdata3['total3'];
        $t184 = $hrdata4['total4'];
    }

    if ($newdate == '19') {
        $t191 = $hrdata1['total1'];
        $t192 = $hrdata2['total2'];
        $t193 = $hrdata3['total3'];
        $t194 = $hrdata4['total4'];
    }

    if ($newdate == '20') {
        $t201 = $hrdata1['total1'];
        $t202 = $hrdata2['total2'];
        $t203 = $hrdata3['total3'];
        $t204 = $hrdata4['total4'];
    }

    if ($newdate == '21') {
        $t211 = $hrdata1['total1'];
        $t212 = $hrdata2['total2'];
        $t213 = $hrdata3['total3'];
        $t214 = $hrdata4['total4'];
    }

    if ($newdate == '22') {
        $t221 = $hrdata1['total1'];
        $t222 = $hrdata2['total2'];
        $t223 = $hrdata3['total3'];
        $t224 = $hrdata4['total4'];
    }

    if ($newdate == '23') {
        $t231 = $hrdata1['total1'];
        $t232 = $hrdata2['total2'];
        $t233 = $hrdata3['total3'];
        $t234 = $hrdata4['total4'];
    }

    if ($newdate == '24') {
        $t241 = $hrdata1['total1'];
        $t242 = $hrdata2['total2'];
        $t243 = $hrdata3['total3'];
        $t244 = $hrdata4['total4'];
    }
    //======================================
    if ($newdate == '25') {
        $t251 = $hrdata1['total1'];
        $t252 = $hrdata2['total2'];
        $t253 = $hrdata3['total3'];
        $t254 = $hrdata4['total4'];
    }
    if ($newdate == '26') {
        $t261 = $hrdata1['total1'];
        $t262 = $hrdata2['total2'];
        $t263 = $hrdata3['total3'];
        $t264 = $hrdata4['total4'];
    }
    if ($newdate == '27') {
        $t271 = $hrdata1['total1'];
        $t272 = $hrdata2['total2'];
        $t273 = $hrdata3['total3'];
        $t274 = $hrdata4['total4'];
    }
    if ($newdate == '28') {
        $t281 = $hrdata1['total1'];
        $t282 = $hrdata2['total2'];
        $t283 = $hrdata3['total3'];
        $t284 = $hrdata4['total4'];
    }
    if ($newdate == '29') {
        $t291 = $hrdata1['total1'];
        $t292 = $hrdata2['total2'];
        $t293 = $hrdata3['total3'];
        $t294 = $hrdata4['total4'];
    }
    if ($newdate == '30') {
        $t301 = $hrdata1['total1'];
        $t302 = $hrdata2['total2'];
        $t303 = $hrdata3['total3'];
        $t304 = $hrdata4['total4'];
    }
    if ($newdate == '31') {
        $t311 = $hrdata1['total1'];
        $t312 = $hrdata2['total2'];
        $t313 = $hrdata3['total3'];
        $t314 = $hrdata4['total4'];
    }
}
?>


                        ['Day', '<?php echo $nmsite_id1 ?>', '<?php echo $nmsite_id2 ?>', '<?php echo $nmsite_id3 ?>', '<?php echo $nmsite_id4 ?>'],
                        ['01',<?php echo $t11 ?>,<?php echo $t12 ?>,<?php echo $t13 ?>,<?php echo $t14 ?>],
                        ['02',<?php echo $t21 ?>,<?php echo $t22 ?>,<?php echo $t23 ?>,<?php echo $t214 ?>],
                        ['03',<?php echo $t31 ?>,<?php echo $t32 ?>,<?php echo $t33 ?>,<?php echo $t34 ?>],
                        ['04',<?php echo $t41 ?>,<?php echo $t42 ?>,<?php echo $t43 ?>,<?php echo $t44 ?>],
                        ['05',<?php echo $t51 ?>,<?php echo $t52 ?>,<?php echo $t53 ?>,<?php echo $t54 ?>],
                        ['06',<?php echo $t61 ?>,<?php echo $t62 ?>,<?php echo $t63 ?>,<?php echo $t64 ?>],
                        ['07',<?php echo $t71 ?>,<?php echo $t72 ?>,<?php echo $t73 ?>,<?php echo $t74 ?>],
                        ['08',<?php echo $t81 ?>,<?php echo $t82 ?>,<?php echo $t83 ?>,<?php echo $t84 ?>],
                        ['09',<?php echo $t91 ?>,<?php echo $t92 ?>,<?php echo $t93 ?>,<?php echo $t94 ?>],
                        ['10',<?php echo $t101 ?>,<?php echo $t102 ?>,<?php echo $t103 ?>,<?php echo $t104 ?>],
                        ['11',<?php echo $t111 ?>,<?php echo $t112 ?>,<?php echo $t113 ?>,<?php echo $t114 ?>],
                        ['12',<?php echo $t121 ?>,<?php echo $t122 ?>,<?php echo $t123 ?>,<?php echo $t124 ?>],
                        ['13',<?php echo $t131 ?>,<?php echo $t132 ?>,<?php echo $t133 ?>,<?php echo $t134 ?>],
                        ['14',<?php echo $t141 ?>,<?php echo $t142 ?>,<?php echo $t143 ?>,<?php echo $t144 ?>],
                        ['15',<?php echo $t151 ?>,<?php echo $t152 ?>,<?php echo $t153 ?>,<?php echo $t154 ?>],
                        ['16',<?php echo $t161 ?>,<?php echo $t162 ?>,<?php echo $t163 ?>,<?php echo $t164 ?>],
                        ['17',<?php echo $t171 ?>,<?php echo $t172 ?>,<?php echo $t173 ?>,<?php echo $t174 ?>],
                        ['18',<?php echo $t181 ?>,<?php echo $t182 ?>,<?php echo $t183 ?>,<?php echo $t184 ?>],
                        ['19',<?php echo $t191 ?>,<?php echo $t192 ?>,<?php echo $t193 ?>,<?php echo $t194 ?>],
                        ['20',<?php echo $t201 ?>,<?php echo $t202 ?>,<?php echo $t203 ?>,<?php echo $t204 ?>],
                        ['21',<?php echo $t211 ?>,<?php echo $t212 ?>,<?php echo $t213 ?>,<?php echo $t214 ?>],
                        ['22',<?php echo $t221 ?>,<?php echo $t222 ?>,<?php echo $t223 ?>,<?php echo $t224 ?>],
                        ['23',<?php echo $t231 ?>,<?php echo $t232 ?>,<?php echo $t233 ?>,<?php echo $t234 ?>],
                        ['24',<?php echo $t241 ?>,<?php echo $t242 ?>,<?php echo $t243 ?>,<?php echo $t244 ?>],
                        ['25',<?php echo $t251 ?>,<?php echo $t252 ?>,<?php echo $t253 ?>,<?php echo $t254 ?>],
                        ['26',<?php echo $t261 ?>,<?php echo $t262 ?>,<?php echo $t263 ?>,<?php echo $t264 ?>],
                        ['27',<?php echo $t271 ?>,<?php echo $t272 ?>,<?php echo $t273 ?>,<?php echo $t274 ?>],
                        ['28',<?php echo $t281 ?>,<?php echo $t282 ?>,<?php echo $t283 ?>,<?php echo $t284 ?>],
                        ['29',<?php echo $t291 ?>,<?php echo $t292 ?>,<?php echo $t293 ?>,<?php echo $t294 ?>],
                        ['30',<?php echo $t301 ?>,<?php echo $t302 ?>,<?php echo $t303 ?>,<?php echo $t304 ?>],
                        ['31',<?php echo $t311 ?>,<?php echo $t312 ?>,<?php echo $t213 ?>,<?php echo $t314 ?>]


<?php
//end of if = 4
?>

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