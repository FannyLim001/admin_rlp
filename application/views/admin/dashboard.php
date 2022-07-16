<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Chart -->
            <div class="row match-height">
                <div class="col-12">
                    <div class="">
                        <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
                    </div>
                </div>
            </div>
            <!-- Chart -->
        </div>
        <!--/ Statistics -->
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header bg-hexagons">
                        <h4 class="card-title">Transaksi <br>Selesai</h4>

                        <div class="heading-elements">
                            <ul class="list-inline d-block mb-0">
                                <li>
                                    <a class="btn btn-sm btn-info box-shadow-3 round btn-min-width pull-right" href="#" target="_blank">Completed</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons">
                        <div class="card-body pt-0 pb-1">
                            <h6 class="text-bold-600"> Task Completed:
                                <span><?= $transaksi_berjalan ?>/<?= $total_transaksi ?></span>
                            </h6>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <?php $perc = $transaksi_berjalan/$total_transaksi * 100;?>
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?=$perc?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header bg-hexagons">
                        <h4 class="card-title">Stok Bahan <br>Tersedia</h4>
                        <div class="heading-elements">
                            <ul class="list-inline d-block mb-0">
                                <li>
                                    <a class="btn btn-sm btn-warning box-shadow-3 round btn-min-width pull-right" href="#" target="_blank">Available</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons">
                        <div class="card-body pt-0 pb-1">
                            <h6 class="text-bold-600"> Task Completed:
                                <span><?= $stok_tersedia ?>/<?= $total_bahan ?></span>
                            </h6>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <?php $perc = $stok_tersedia/$total_bahan * 100;?>
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: <?=$perc?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card ">
                    <div class="card-header bg-hexagons">
                        <h4 class="card-title ">Karyawan Sedang <br>Mengambil</h4   >
                        <div class="heading-elements">
                            <ul class="list-inline d-block mb-0">
                                <li>
                                    <a class="btn btn-sm btn-danger danger box-shadow-3 round btn-min-width pull-right" href="#" target="_blank">
                                        <span class="white">In-Progress</span>
                                        <i class="ft-bar-chart pl-1 white"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons">
                    <div class="card-body pt-0 pb-1">
                            <h6 class="text-bold-600"> Task Completed:
                                <span><?= $stok_diambil ?>/<?= $total_transaksi ?></span>
                            </h6>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <?php $perc = $stok_diambil/$total_transaksi * 100;?>
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?=$perc?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card bg-gradient-x-purple-blue">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-top">
                                    <i class="icon-list icon-opacity text-white font-large-4 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                    <span class="d-block mb-1 font-medium-1">Total Bahan</span>
                                    <h1 class="text-white mb-0"><?= $total_bahan ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card bg-gradient-x-purple-red">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-top">
                                    <i class="icon-users icon-opacity text-white font-large-4 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                    <span class="d-block mb-1 font-medium-1">Total Karyawan</span>
                                    <h1 class="text-white mb-0"><?= $total_karyawan ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card bg-gradient-x-blue-green">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-top">
                                    <i class="icon-basket-loaded icon-opacity text-white font-large-4 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                    <span class="d-block mb-1 font-medium-1">Total Supplier</span>
                                    <h1 class="text-white mb-0"><?= $total_supplier ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card bg-gradient-x-orange-yellow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-top">
                                    <i class="icon-wallet icon-opacity text-white font-large-4 float-left"></i>
                                </div>
                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                    <span class="d-block mb-1 font-medium-1">Total Transaksi</span>
                                    <h1 class="text-white mb-0"><?= $total_transaksi ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>