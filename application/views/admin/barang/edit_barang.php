<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Edit Barang</h3>
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
        <div class="content-body"><!-- ../../../theme-assets/images/carousel/22.jpg -->

<!-- Content types section start -->
<section id="content-types">
	<div class="row match-height">

		<div class="col-xl-12 col-md-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<h4 class="card-title">Form Edit Barang</h4>
					</div>
					<div class="card-body">
                    <form action="<?= base_url('barang/update'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_barang" class="form-control" value="<?= $barang['id_barang'] ?>">
							<div class="form-body">
								<div class="form-group">
									<label for="donationinput1" class="sr-only">Nama Barang</label>
									<input type="text" id="donationinput1" class="form-control" placeholder="Nama Barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>">
								</div>
								<div class="form-group">
									<label for="donationinput2" class="sr-only">Ketersediaan Barang</label>
									<input type="text" id="donationinput2" class="form-control" placeholder="Ketersediaan Barang" name="ketersediaan_barang" value="<?= $barang['ketersediaan_barang']; ?>">
								</div>
								<div class="form-group">
									<label for="donationinput3" class="sr-only">Gambar Barang</label>
									<input type="file" id="donationinput3" class="form-control" placeholder="Gambar Barang" name="gambar_barang">
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