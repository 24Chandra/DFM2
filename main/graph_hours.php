<?php
$sitePos;
$convdate;
if ($_POST['date_val'] || $_POST['site_val']) {
    $thedate = $_POST['date_val'];
    $sitePos = $_POST['site_val'];
} else {
    $thedate = date("d/m/y");
    $sitePos = "JATINEGARA";
}
//$convdate = date("d/m/y", strtotime($thedate));
$convdate = $thedate;
?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a><h2 class="m-0 font-weight-bold text-primary">Data liter by hours</h2></a>
                <a></a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
        </div>
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800" style="text-transform:uppercase">Dipo : <?php echo $sitePos; ?></h1>
            <p class="mb-4">Date <?php echo $convdate; ?>  </p>
            <form method="post"  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" id="date_val" name="date_val" class="form-control bg-light border-0 small form_date" placeholder="date" aria-label="Search" aria-describedby="basic-addon2" style="text-transform:uppercase" required>
                    &nbsp;&nbsp;
                    <input type="text" id="site_val" name="site_val" class="form-control bg-light border-0 small" placeholder="Dipo" aria-label="Search" aria-describedby="basic-addon2" style="text-transform:uppercase" required>
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
        $getFlowmeter = mysqli_query($dbhandle, "SELECT unit_id FROM serial_data_results WHERE site_id = '$sitePos 'AND SUBSTR(FINISH,1,8) = '$convdate' AND duplicate = '' AND gross_deliver != '' AND unit_id != '' GROUP BY unit_id");

        $x = 1;
        while ($getFM = mysqli_fetch_array($getFlowmeter)) {
            $countFm = $getFM['unit_id'];
            $x++;
            if ($countFm == "11111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,1,8) = '$convdate'"
                        . " AND duplicate = '' and gross_deliver != '' and unit_id = '11111' GROUP BY site_id ORDER BY site_id ASC ");
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?> Litres</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else if ($countFm == "12111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,1,8) = '$convdate'"
                        . " AND duplicate = '' and gross_deliver != '' and unit_id = '12111' GROUP BY site_id ORDER BY site_id ASC");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger  shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Flow meter 2</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?> Litres</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else if ($countFm == "12345") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,1,8) = '$convdate'"
                        . " AND duplicate = '' and gross_deliver != '' and unit_id = '12345' GROUP BY site_id ORDER BY site_id ASC");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Flow meter 3</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?> Litres</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else if ($countFm == "14111") {
                $getFm3 = mysqli_query($dbhandle, "SELECT sum(gross_deliver) AS fmTotal FROM serial_data_results WHERE site_id = '$sitePos' AND SUBSTR(FINISH,1,8) = '$convdate'"
                        . " AND duplicate = '' and gross_deliver != '' and unit_id = '14111' GROUP BY site_id ORDER BY site_id ASC");
                $fmTotal = mysqli_fetch_array($getFm3);
                $totalGross = $fmTotal['fmTotal'];
                $result = $totalGross;
                $finalresult = number_format($result, 0, ',', '.');
                ?>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success  shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Flow meter 4</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $finalresult; ?> Litres</div>
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
        <?php include("chart/chartby_hour.php") ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details <?php echo $convdate; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Date</th>
                            <th>Flowmeter</th>
                            <th>Start</th>
                            <th>Finish</th>
                            <th>Sale Number</th>
                            <th>Meter Number</th>
                            <th>Gross Deliver</th>
                            <th>UOM</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php
                        $no = 1;
                        $rdata2 = mysqli_query($dbhandle, "SELECT SUBSTRING(`finish`,1,8) AS date, `unit_id`, SUBSTR(`start`,10,17), SUBSTR(`finish`,10,17),`sale_number`,`meter_number`,`gross_deliver` FROM `serial_data_results` WHERE SUBSTR(finish,1,8) = '$convdate' AND site_id = '$sitePos' AND duplicate = '' and unit_id != '' AND gross_deliver !='' ORDER BY finish, sale_number ASC ");
                        while ($hrdata2 = mysqli_fetch_array($rdata2)) {

                            echo "<tr>";
                            echo "<td align='center'>" . $hrdata2['date'] . "</td>";
                            echo "<td align='center'>" . $hrdata2['unit_id'] . "</td>";
                            echo "<td align='center'>" . $hrdata2['SUBSTR(`start`,10,17)'] . "</td>";
                            echo "<td align='center'>" . $hrdata2['SUBSTR(`finish`,10,17)'] . "</td>";
                            echo "<td align='center'>" . $hrdata2['sale_number'] . "</td>";
                            echo "<td align='center'>" . $hrdata2['meter_number'] . "</td>";
                            echo "<td align='center'>" . $hrdata2['gross_deliver'] . "</td>";
                            echo "<td align='center'> Litres </td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
