<?php
session_start();
$from = $_POST['from'];
$city_id = $_POST['city_id'];
$courir = $_POST['courir'];
$weight = 200;

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=".$from."&destination=".$city_id."&weight=".$weight."&courier=".$courir."",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: your-key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$data = json_decode($response, true);

$_SESSION['getKurir'] = $data['rajaongkir']['query']['courier'];
$_SESSION['getProvince'] = $data['rajaongkir']['destination_details']['province'];
$_SESSION['getCity'] = $data['rajaongkir']['destination_details']['city_name'];

?>

<?php
for ($k=0; $k < count($data['rajaongkir']['results']); $k++) { ?>
<option value="">-- Pilih Jenis Paket --</option>
<?php for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
    $service = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
    $description = $data['rajaongkir']['results'][$k]['costs'][$l]['description'];
    $etd = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];
    $value = number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);
    ?>
<option value="<?= $etd; ?>|<?= $value; ?>"><?= $service; ?>(Rp. <?= $value; ?>)-(<?= $etd ?> HARI)</option>
<?php } ?>
<?php } ?>