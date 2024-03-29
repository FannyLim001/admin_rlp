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
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">RLP Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tabel <?= $title ?>
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
                            <h4 class="card-title">Tabel <?= $title ?> &nbsp;<a href="<?= site_url('bahan/add'); ?>" class="btn btn-primary"><i class="ft-plus-square"></i></a></h4>
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
                                                <th>Nama Bahan</th>
                                                <th>Stok (Kg)</th>
                                                <th>Ketersediaan Bahan</th>
                                                <th>Gambar Bahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($bahan as $b) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= $b['nama_bahan'] ?></td>
                                                    <td><?= $b['stok_bahan'] ?></td>
                                                    <td>
                                                        <?php if ($b['stok_bahan'] > 20) { ?>
                                                            <!-- Stok ada -->
                                                            <button type="button" class="btn btn-bg-gradient-x-purple-blue btn-min-width w-75 mr-1 mb-1">Stok Ada</button>
                                                        <?php
                                                        } else if ($b['stok_bahan'] > 0) { ?>
                                                            <!-- Stok Sisa Sedikit -->
                                                            <button type="button" class="btn btn-bg-gradient-x-orange-yellow btn-min-width w-75 mr-1 mb-1">Stok Sisa Sedikit</button>
                                                        <?php
                                                        } else { ?>
                                                            <!-- Habis -->
                                                            <button type="button" class="btn btn-bg-gradient-x-red-pink btn-min-width w-75 mr-1 mb-1">Habis</button>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td><img src="<?= base_url('assets/image/bahan/') . $b['gambar_bahan']; ?>" alt="pic" height="70px"></td>
                                                    <td><a class="btn btn-primary" href="<?= site_url('Admin/keranjang/') . $b['id_bahan']; ?>"><i class="ft-plus"></i></a>&nbsp;&nbsp;
                                                        <a class="btn btn-info" href="<?= site_url('bahan/edit/') . $b['id_bahan']; ?>"><i class="ft-edit"></i></a>&nbsp;&nbsp;
                                                        <button type="button" class="btn btn-danger " data-toggle="modal" data-keyboard="false" data-target="#keyboard1<?= $b['id_bahan']?>"><i class="ft-trash-2"></i></button>

                                                        <!-- Modal -->


                                                        <div class="modal fade text-left" id="keyboard1<?= $b['id_bahan']?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" aria-hidden="true">
                                                            <form action="<?= site_url('bahan/delete/') . $b['id_bahan'];?>" method="GET">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="basicModalLabel3">Konfirmasi Penghapusan</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger">Oke</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
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