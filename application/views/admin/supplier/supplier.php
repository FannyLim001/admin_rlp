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
                            <h4 class="card-title">Tabel <?= $title ?> &nbsp;<a href="<?= site_url('supplier/add'); ?>" class="btn btn-primary"><i class="ft-plus-square"></i></a></h4>
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
                                                <th>Nama Supplier</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($supplier as $s) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $s['nama_supplier'] ?></td>
                                                <td><?= $s['alamat_supplier'] ?></td>
                                                <td><?= $s['no_telp'] ?></td>
                                                <td><a href="<?= site_url('supplier/edit/') . $s['id_supplier']; ?>" class="btn btn-info"><i class="ft-edit"></i></a>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-danger " data-toggle="modal" data-keyboard="false" data-target="#keyboard1<?= $s['id_supplier'] ?>"><i class="ft-trash-2"></i></button>

                                                        <!-- Modal -->


                                                        <div class="modal fade text-left" id="keyboard1<?= $s['id_supplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" aria-hidden="true">
                                                            <form action="<?= site_url('supplier/delete/') . $s['id_supplier']; ?>" method="GET">
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