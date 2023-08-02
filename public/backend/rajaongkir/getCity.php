<?php
session_start();
$provinsi_id = $_POST['prov_id'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$provinsi_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: your-key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$city = json_decode($response, true);

$_SESSION['province'] = $city['rajaongkir']['results'][1]['province'];

?>

<?php foreach ($city['rajaongkir']['results'] as $values) { ?>
<option value="<?= $values['city_id'] ?>"><?= $values['city_name']; ?></option>
<?php } ?>