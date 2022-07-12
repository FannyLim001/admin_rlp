<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
			<div class="content-header-left col-md-4 col-12 mb-2">
				<h3 class="content-header-title">Edit Bahan</h3>
			</div>
			<div class="content-header-right col-md-8 col-12">
				<div class="breadcrumbs-top float-md-right">
					<div class="breadcrumb-wrapper mr-1">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a>
							</li>
							<li class="breadcrumb-item active">Cards
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
									<h4 class="card-title">Form Edit Bahan</h4>
								</div>
								<div class="card-body">
									<form action="<?= base_url('bahan/update'); ?>" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id_bahan" class="form-control" value="<?= $bahan['id_bahan'] ?>">
										<div class="form-body">
											<div class="form-group">
												<label for="donationinput1" class="sr-only">Nama Bahan</label>
												<input type="text" id="donationinput1" class="form-control" placeholder="Nama Bahan" name="nama_bahan" value="<?= $bahan['nama_bahan']; ?>">
											</div>
											<div class="form-group">
												<label for="donationinput2" class="sr-only">Stok (Kg)</label>
												<input type="text" id="donationinput2" class="form-control" placeholder="Ketersediaan Bahan" name="stok_bahan" value="<?= $bahan['stok_bahan']; ?>">
											</div>
											<div class="form-group">
												<label for="donationinput3" class="sr-only">Gambar Bahan</label>
												<div class="custom-file">
													<div class="row">
														<div class="col-11">
															<input type="file" id="donationinput3" class="form-control" class="custom-file-input" placeholder="Gambar Bahan" name="gambar_bahan" id="customFileLang">
														</div>
														<div class="col">
															<img src="<?= base_url('/assets/img/bahan/') . $bahan['gambar_bahan'] ?>" style="width: 200px" class="img-thumbnail">
														</div>
													</div>
												</div>
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

<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	})
</script>