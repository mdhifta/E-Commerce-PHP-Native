<?php include '../../config/config.php'; ?>

<link rel="shortcut icon" href="../assets/logo.jpg">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

<div class="card-body">
  <center>
    <h1>LAPORAN PENDAPATAN (REKAPITULASI)</h1>
  </center>
  <h4>Tanggal : <?= date("d F Y", strtotime($_POST['awal'])) ?> <b>- sampai -</b> <?= date("d F Y", strtotime($_POST['akhir'])) ?></h4>
</div>

<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Costumer</th>
        <th>Nama Produk</th>
        <th>Banyak</th>
        <th>Total</th>
        <th>Tanggal Pesan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0; $total = 0; ?>
      <?php $query = $mysqli->query("SELECT tbu.fname, tbu.lname, tbt.*, tdt.banyak, tbpr.harga_produk, tbp.status, tbpr.nama_produk FROM tb_transaksi as tbt JOIN tb_user as tbu ON tbu.id_user=tbt.id_user JOIN tb_pembayaran as tbp ON tbp.id_transaksi=tbt.id_transaksi JOIN tb_dt_transaksi as tdt ON tdt.id_transaksi=tbt.id_transaksi JOIN tb_produk as tbpr ON tbpr.id_produk=tdt.id_produk WHERE tbp.status='1' AND tbt.tanggal_transaksi BETWEEN '$_POST[awal]' AND '$_POST[akhir]'"); ?>
      <?php while ($value = $query->fetch_object()) { ?>
        <tr>
          <td><?= $no+=1; ?></td>
          <td><?= $value->fname ?> <?= $value->lname; ?></td>
          <td><?= $value->nama_produk; ?></td>
          <td><?= $value->banyak; ?></td>
          <td>Rp. <?= number_format($value->harga_produk*$value->banyak); ?>;-</td>
          <td><?= date("d F Y", strtotime($value->tanggal_transaksi)); ?></td>
        </tr>

        <?php $total = $total+$value->harga_produk*$value->banyak; ?>
      <?php } ?>
    </tbody>
    <tr>
      <td colspan="4"><b>TOTAL</b></td>
      <td colspan="2"><b>Rp. <?= number_format($total); ?>;-</b></td>
    </tr>
  </table>
</div>

<div class="card-body">
  <div class="float-xl-right"><h3>Admin Lechy Beutique</h3></div><br><br><br>
  <div class="float-xl-right mb-5"><h3>(...................................)</h3></div>
</div>

<script>
    window.print();
</script>
