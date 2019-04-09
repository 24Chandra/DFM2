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
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a><h2 class="m-0 font-weight-bold text-primary">Data liter by years</h2></a>
                <a></a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
        </div>

    </div>
    <!-- Content Row -->

    <div class="row">
        <?php
        $getFlowmeter = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos 'AND SUBSTR(FINISH,7,2)= '$year' AND duplicate = '' AND gross_deliver != '' AND unit_id != '' GROUP BY unit_id");

        $x = 1;
        while ($getFM = mysqli_fetch_array($getFlowmeter)) {
            $countFm = $getFM['unit_id'];
            $x++;
            if ($countFm == "11111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2)= '$year' AND duplicate = '' and gross_deliver != '' and unit_id = '11111' GROUP BY site_id ORDER BY site_id ASC  ");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Flow meter 1</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if ($countFm == "12111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2)= '$year' AND duplicate = '' and gross_deliver != '' and unit_id = '12111' GROUP BY site_id ORDER BY site_id ASC  ");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Flow meter 2</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if ($countFm == "12345") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2)= '$year' AND duplicate = '' and gross_deliver != '' and unit_id = '12345' GROUP BY site_id ORDER BY site_id ASC ");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Flow meter 3</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if ($countFm == "14111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,7,2)= '$year' AND duplicate = '' and gross_deliver != '' and unit_id = '14111' GROUP BY site_id ORDER BY site_id ASC ");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Flow meter 4</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <?php include("chart/chartby_year.php") ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Site</th>
                            <th><?php echo $showyear1 ?></th>
                            <th><?php echo $showyear2 ?></th>
                            <th><?php echo $showyear3 ?></th>
                            <th><?php echo $showyear4 ?></th>
                            <th><?php echo $showyear5 ?></th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php include("class/_years_datatable.php") ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
