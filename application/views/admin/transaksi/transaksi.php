<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"><?= $title ?></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tables
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel <?= $title ?></h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="tableId">
                                        <thead class="bg-primary white">
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Karyawan</th>
                                                <th>Supplier</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($transaksi as $t) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= $t['no_transaksi'] ?></td>
                                                    <td><?= $t['tanggal'] ?></td>
                                                    <td><?= $t['nama_karyawan'] ?></td>
                                                    <td><?= $t['nama_supplier'] ?> - <?= $t['alamat_supplier'] ?></td>
                                                    <td><?= $t['tanggal'] ?></td>
                                                    <td>
                                                        <?php if ($t['status_transaksi'] == 'Selesai') { ?>
                                                            <button type="button" class="btn btn-success btn-min-width w-75 mr-1 mb-1">Selesai</button>
                                                        <?php
                                                        } else if ($t['status_transaksi'] == 'Sedang menunggu karyawan') { ?>
                                                            <button type="button" class="btn btn-warning btn-min-width w-75 mr-1 mb-1">Sedang Menunggu Karyawan</button>
                                                        <?php
                                                        } else if ($t['status_transaksi'] == 'Sedang mengambil bahan') { ?>
                                                            <button type="button" class="btn btn-primary btn-min-width w-75 mr-1 mb-1">Sedang Mengambil <br>Bahan</button>
                                                        <?php
                                                        } else { ?>
                                                            <button type="button" class="btn btn-danger btn-min-width w-75 mr-1 mb-1">Menunggu Karyawan</button>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td><a href="<?= site_url('Admin/detail_transaksi/') . $t['no_transaksi']; ?>" class="btn btn-info"><i class="la la-info-circle"></i></a>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>
</div>