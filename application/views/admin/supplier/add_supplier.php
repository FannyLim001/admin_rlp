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
							<li class="breadcrumb-item active"><?= $title ?>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<!-- ../../../theme-assets/images/carousel/22.jpg -->

			<!-- Content types section start -->
			<section id="content-types">
				<div class="row match-height">

					<div class="col-xl-12 col-md-12">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<h4 class="card-title">Form <?= $title ?></h4>
								</div>
								<div class="card-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<div class="form-group">
												<label for="donationinput1" class="sr-only">Nama Supplier</label>
												<input type="text" id="donationinput1" value="<?= set_value('nama_supplier'); ?>" class="form-control" placeholder="Nama Supplier" name="nama_supplier">
												<?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="donationinput2" class="sr-only">Email</label>
												<input type="text" id="donationinput2" value="<?= set_value('alamat_supplier'); ?>" class="form-control" placeholder="Alamat Supplier" name="alamat_supplier">
												<?= form_error('alamat_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<label for="donationinput3" class="sr-only">Password</label>
												<input type="text" id="donationinput3" value="<?= set_value('no_telp'); ?>" class="form-control" placeholder="Nomor Telepon" name="no_telp">
												<?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="form-actions center">
											<button type="submit" class="btn btn-outline-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Content types section end -->

			</section>
			<!-- // Card Headings section end -->
		</div>
	</div>
</div>