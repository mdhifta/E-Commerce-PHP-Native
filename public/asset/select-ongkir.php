<!-- get api raja ongkir -->
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: d5d063661ea5040d7a868a98fb0c99c0"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$province = json_decode($response, true);
?>
<!-- get raja ongkir end -->

<div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
  <h5>Pilih Jasa Ongkir</h5>
  <form action="#" method="post">

    <div class="form-group">
      <label for="">Provinsi</label>
      <select id="province" name="province">
        <option value="">-- Pilih Provinsi --</option>
        <?php foreach ($province['rajaongkir']['results'] as $values) { ?>
          <option value="<?= $values['province_id'] ?>"><?= $values['province']; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Kota/kabupaten</label>
      <select id="city" name="city">
        <option value="">-- Pilih Kota/Kabupaten --</option>
      </select>
    </div>

    <div class="form-group">
      <label for="">Jasa/Kurir</label>
      <select id="courir" name="courir">
        <option value="">-- Pilih Kurir/Jasa --</option>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">POS</option>
      </select>
    </div>

    <div class="form-group" id="getPrice">
      <select id="type" name="type">
        <option value="">-- Pilih Jenis Paket --</option>
      </select>
    </div>
    <div class="form-group" id="setPrice"></div>
  </form>
</div>

<script src="../vendor/assets/js/jquery-2.2.4.min.js"></script>
