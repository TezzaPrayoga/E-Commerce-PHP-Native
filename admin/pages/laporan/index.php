<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=home">Home</a>
        </li>
        <li class="breadcrumb-item">
            Laporan
        </li>
    </ol>
    <div class="card">
        <div class="card-header bg-primary">
            <h2>Data Laporan</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form target="_blank" action="lapHari.php">
                        <div class="form-group">
                            <label>Laporan Harian</label>
                            <input type="date" value="<?php echo date('Y-m-d') ?>" name="hari" class="form-control">
                        </div>
                        <button class="btn btn-primary btn-sm">Cetak</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form target="_blank" action="lapBulan.php">
                        <div class="form-group">
                            <label>Laporan Bulanan</label>
                            <input type="month" value="<?php echo date('Y-m') ?>" name="bulan" class="form-control  ">
                        </div>
                        <button class="btn btn-primary btn-sm">Cetak</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form target="_blank" action="lapTahun.php">
                        <div class="form-group">
                            <label>Laporan Tahunan</label>
                            <input type="number" value="<?php echo date('Y') ?>" name="tahun" class="form-control  ">
                        </div>
                        <button class="btn btn-primary btn-sm">Cetak</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form target="_blank" action="lapProduk.php">
                        <div class="form-group">
                            <label>Laporan Produk</label>
                            <input type="submit" name="hari" class="form-control btn-primary" value="Cetak">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



</div>

<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">Home</a>
		</li>
		<li class="breadcrumb-item">
			Pembelian
		</li>

	</ol>
	<div class="card">
		<div class="card-header bg-primary">
			<h2>Data Transaksi</h2>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style='text-align: center;'>No</th>
							<th style='text-align: center;'>No Transaksi </th>
							<th style='text-align: center;'>Tanggal</th>
							<th style='text-align: center;'>Nama Produk</th>
                            <th style='text-align: center;'>Status Pembelian</th>
							<th style='text-align: center;'>Jumlah Beli</th>
							<th style='text-align: center;'>Harga</th>
                            <th style='text-align: center;'>Sub Harga</th>
                            <th width="270px" style='text-align: center;'>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ambil	= $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pembelian_produk ON tb_pembelian.pembelian_id=tb_pembelian_produk.pembelian_id JOIN tb_produk ON tb_pembelian_produk.produk_id=tb_produk.produk_id");
						$no = 1;
						while ($pecah = $ambil->fetch_assoc()) {
                            @$totalharga += $pecah['pembelian_sub_harga'];
						?>
							<tr>
                                <td style='font-weight:bold; text-align:center;'><?php echo $no++ ?></td>
                                <td style='text-align: center;'><?php echo $pecah['pembelian_id'] ?></td>
                                <td><?php echo tgl_indo(tgl_indo($pecah['pembelian_tgl'])) ?></td>
                                <td><?php echo $pecah['produk_nama'] ?></td>
                                <td><?php echo $pecah['pembelian_status'] ?></td>
                                <td><?php echo $pecah['pembelian_produk_jumlah'] ?></td>
                                <td><?php echo rupiah($pecah['pembelian_produk_harga']) ?></td>
                                <td><?php echo rupiah($pecah['pembelian_sub_harga']) ?></td>
                                <td>
									<a class="btn btn-success" href="?page=pages/pembelian/edit&id=<?php echo $pecah['pembelian_id'] ?>">Update Status</a>
									<a class="btn btn-primary" href="?page=pages/pembelian/detail&id=<?php echo $pecah['pembelian_id'] ?>">Detail</a>
								</td>
                            </tr>
                            
						<?php 	} ?>
					</tbody>
                    <tfoot>
                                <tr>
                                <td colspan="7" style='font-weight:bold;'>Total</td>
                                <td style='font-weight:bold;'><?php echo rupiah($totalharga) ?></td>
                                </tr>
                            </tfoot>
				</table>




			</div>
		</div>
	</div>



</div>