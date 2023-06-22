<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard
                    <?php  $session = session();
         echo "Welcome back, ".$session->get('userid');  ?>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between my-5">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-3 col-sm-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">ENROLLED COURSES </h5>

                                <div class="d-flex align-items-center justify-content-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>30</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-3 col-sm-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">ACTIVE COURSES </h5>

                                <div class="d-flex align-items-center justify-content-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-tv"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>10</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-3 col-sm-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">COMPLETED COURSES</h5>

                                <div class="d-flex align-items-center justify-content-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-trophy"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>7</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    </section>

</main><!-- End #main -->