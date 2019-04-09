<?php
if ($_POST['year_val']) {
    $showyear1 = $_POST['year_val'];
    $theyear1 = substr($theyear1, 2, 2);
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
                <a><h2 class="m-0 font-weight-bold text-primary">Data liter by site : <?php echo $showyear1; ?> </h2></a>
                <a></a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <select class="form-control bg-light border-0 small" id="year" name="year_val" required></select>

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

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <?php include("chart/chartby_site.php") ?>
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
                            <th>No</th>
                            <th>Site</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Okt</th>
                            <th>Nov</th>
                            <th>Dec</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php include("class/_sites_datatable.php") ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
