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
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">RLP Home</a>
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
                                        <img src="<?= base_url('./assets/image/bahan/') . $bahan['gambar_bahan'] ?>" style="width:200px" class="img-thumbnail">
                                    </div>
                                    <div class="col mr-2">
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <input type="hidden" name="id" value="<?= $bahan['id_bahan']; ?>">
                                                <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">

                                                <div class="form-group">
                                                    <label for="nama">Nama Bahan</label>
                                                    <input name="nama" type="text" value="<?= $bahan['nama_bahan']; ?>" readonly class="form-control" id="nama">
                                                </div>

                                                <div class="form-group">
                                                    <label for="stok">Stok tersedia</label>
                                                    <input name="stok" value="<?= $bahan['stok_bahan']; ?>" type="text" readonly class="form-control" id="stok_bahan">
                                                </div>

                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah yang mau ditambah</label>
                                                    <input type="number" name="jumlah" id="jumlah" class="form-control" min='1'>
                                                    <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>

                                                <button type="submit" id="tambah" name="tambah" class="btn btn-primary"><i class="ft-plus-square"></i>
                                                    Tambah Ke Keranjang
                                                </button>
                                            </form>
                                        </div>
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