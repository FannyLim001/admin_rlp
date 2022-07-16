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
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <img src="<?= base_url('./assets/image/transaksi/') . $transaksi['bukti_transaksi']; ?>" style="width:400px" class="img-thumbnail">
                                    </div>
                                    <div class="col mr-2">
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">

                                                <div class="form-group">
                                                    <label for="nama">Nomor Transaksi</label>
                                                    <input type="text" name="nomor_transaksi" value="<?= $transaksi['no_transaksi']; ?>" readonly class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_karyawan">Nama Karyawan</label>
                                                        <input name="nama_karyawan" type="text" value="<?= $transaksi['nama_karyawan']; ?>" readonly class="form-control" id="nama">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_karyawan">Supplier</label>
                                                    <input name="nama_karyawan" type="text" value="<?= $transaksi['nama_supplier']; ?> - <?= $transaksi['alamat_supplier']; ?>" readonly class="form-control" id="nama">
                                                </div>

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <?php if($transaksi['status_transaksi']=='Selesai') { ?>
                                                        <input name="status" type="text" value="<?= $transaksi['status_transaksi']; ?>" readonly class="form-control" id="nama">
                                                    <?php } else { ?>
                                                    <select id="companyinput1" class="form-control" name="status_transaksi">
                                                        <option value="Sedang mengambil bahan" <?php echo ($transaksi['status_transaksi'] == "Sedang mengambil bahan" ? 'selected' : '') ?>>Sedang mengambil bahan</option>
                                                        <option value="Sudah mengambil bahan" <?php echo ($transaksi['status_transaksi'] == "Sudah mengambil bahan" ? 'selected' : '') ?>>Sudah mengambil bahan</option>
                                                    </select>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <fieldset class="form-group">
                                                        <textarea readonly class="form-control" id="" rows="3"><?= $transaksi['keterangan']?></textarea>
                                                    </fieldset>

                                                </div>

                                                <?php if($transaksi['status_transaksi'] != "Selesai") { ?>
                                                <button type="submit" id="tambah" name="tambah" class="btn btn-primary"><i class="ft-plus-square"></i>
                                                    Ubah
                                                </button>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Transaksi <?= $transaksi['no_transaksi']; ?></h2>
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
                                    <table class="table">
                                        <thead class="bg-primary white">
                                            <tr>
                                                <td>No</td>
                                                <td>Nama Bahan</td>
                                                <td>Jumlah</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($detail_transaksi as $dt) :
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $dt['nama_bahan']; ?></td>
                                                    <td><?= $dt['jumlah']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                        </tbody>
                                </div>
                                </table>
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