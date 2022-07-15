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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">RLP Home</a>
                            </li>
                            <li class="breadcrumb-item active"><?= $title ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"><?= $title ?></h2>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>Nama Barang</td>
                                                    <td>Jumlah</td>
                                                    <td>Aksi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="<?= base_url('Admin/pesanan'); ?>" method="POST" enctype="multipart/form-data">
                                                    <?php
                                                    $i = 1; ?>
                                                    <?php foreach ($keranjang as $us) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $us['tanggal']; ?></td>
                                                            <td><?= $us['nama_bahan']; ?></td>
                                                            <td><?= $us['jumlah']; ?></td>
                                                            <td><a href="<?= base_url('Admin/delkeranjang/') . $us['id_keranjang']; ?>" class="btn btn-danger"><i class="ft-trash-2"></i></a></td>
                                                        </tr>
                                                        <input type="hidden" name="bahan[]" value="<?= $us['id_bahan']; ?>">
                                                        <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                                                        <input type="hidden" name="jumlah_p[]" value="<?= $us['jumlah']; ?>">
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                    <tr>
                                            </tbody>
                                        </table>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Karyawan</label>
                                                                    <select id="companyinput1" class="form-control" name="id_karyawan">
                                                                        <?php foreach ($karyawan as $k) :
                                                                            if ($k['role'] != 'Admin') { ?>
                                                                                <option value="<?= $k['id_user'] ?>"><?= $k['nama'] ?></option>
                                                                        <?php }
                                                                        endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Supplier</label>
                                                                    <select class="form-control" name="id_supplier">
                                                                        <?php foreach ($supplier as $s) : ?>
                                                                            <option value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?> - <?= $s['alamat_supplier'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Bukti Transaksi</label>
                                                                    <input type="file" id="donationinput3" class="form-control" class="custom-file-input" placeholder="Bukti Transaksi" name="bukti_transaksi">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea name="keterangan" type="text" class="form-control" id="keterangan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions center">
                                                    <input type="hidden" name="no_transaksi" value="T-RLP-<?= time() ?>" readonly class="form-control">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Pesan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
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