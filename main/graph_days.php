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
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a><h2 class="m-0 font-weight-bold text-primary">Data liter by days</h2></a>
                <a></a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
        </div>
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800" style="text-transform:uppercase">Dipo <?php echo $sitePos; ?> </h1>

            <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <select class="form-control bg-light border-0 small" id="month_val" name="month_val" style="text-transform:uppercase" required >
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select> 
                    &nbsp;&nbsp;
                    <select class="form-control bg-light border-0 small" id="year" name="year_val" required>

                    </select> 
                    &nbsp;&nbsp;
                    <input type="text" id="site_val" name="site_val" class="form-control bg-light border-0 small" placeholder="Site name" aria-label="Search" aria-describedby="basic-addon2" style="text-transform:uppercase" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Content Row -->

    <div class="row">
        <?php
        $getFlowmeter = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos 'AND SUBSTR(FINISH,4,5)= '$thedate' AND duplicate = '' AND gross_deliver != '' AND unit_id != '' GROUP BY unit_id");

        $x = 1;
        while ($getFM = mysqli_fetch_array($getFlowmeter)) {
            $countFm = $getFM['unit_id'];
            $x++;
            if ($countFm == "11111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5)= '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id = '11111' GROUP BY site_id ORDER BY site_id ASC  ");
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
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5)= '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id = '12111' GROUP BY site_id ORDER BY site_id ASC  ");
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
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5)= '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id = '12345' GROUP BY site_id ORDER BY site_id ASC  ");
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
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,4,5)= '$thedate' AND duplicate = '' and gross_deliver != '' and unit_id = '14111' GROUP BY site_id ORDER BY site_id ASC  ");
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
        <?php include("chart/chartby_day.php") ?>
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
                            <th bgcolor="#f8f9fc">Site</th>
                            <th bgcolor="#f8f9fc">Days</th>
                            <th bgcolor="#4e73df"><font color="#ffffff">FM 1</font></th>
                            <th bgcolor="#1cc88a"><font color="#ffffff">FM 2</font></th>
                            <th bgcolor="#36b9cc"><font color="#ffffff">FM 3</font></th>
                            <th bgcolor="#f6c23e"><font color="#ffffff">FM 4</font></th>
                            <th>UOM</font></th>
                        </tr>                        
                    </thead>    
                    <tbody>
                        <?php include("class/_days_datatable.php") ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid //-->
