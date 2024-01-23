<?php

// Deals
$deals_curl = curl_init();
curl_setopt_array($deals_curl, array(
  CURLOPT_URL => 'https://www.cheapshark.com/api/1.0/deals?storeID=1&upperPrice=15',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array('Authorization: Bearer HB8GNgfdRXS9c_sksTdTBw'),
));
$deals = curl_exec($deals_curl);
curl_close($deals_curl);

// Store
$store_curl = curl_init();
curl_setopt_array($store_curl, array(
  CURLOPT_URL => 'https://www.cheapshark.com/api/1.0/stores',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array('Authorization: Bearer HB8GNgfdRXS9c_sksTdTBw'),
));
$store = curl_exec($store_curl);
curl_close($store_curl);

// // Deals & Store Merge
// $curl1 = array( 1 => $deals );
// $curl2 = array( 2 => $store );
// $curls = array_merge($curl1, $curl2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Discount</title>
  <style>
    body {
      max-width: 1250px;
      margin: auto;
      text-align: center;
      font-family: 'Mulish', sans-serif;
      border: solid 1px #fff;
      box-shadow: 0 0 1em 0 #2e8b5788;
    }
    a {
      color: seagreen;
      text-decoration: none;
    }
    .main {
      display: flex;
      flex-direction: row;
      flex-flow: row wrap;
      gap: 0.05em 1em;
      justify-content: center;
    }
    .game {
      width:375px;
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 0.25em;
      margin: 0.5em 0;
      padding: 0.5em 0.5em;
      /* border-top: solid 1px #aaa; */
      /* border-bottom: solid 1px #aaa; */
      box-shadow: 0 0 0.25em 0 #2e8b5788;
    }
    .detail {
      display: flex;
      flex-direction: column;
      width: 100%;
    }
    .img {
      display: flex;
      align-item: center;
      justify-content: center;
    }
    .title {
      font-weight: 900;
    }
  </style>
</head>
<body>
   <h1 style="text-align:center">Deals</h1>
    <div class="main">
  <?php
    foreach (json_decode($deals, true) as $key => $value) {
      echo  '<div class="game"><div class="img"><img src="' . $value['thumb'] . '"></div><br>
            <div class="detail"><a href="https://store.steampowered.com/app/' . $value['steamAppID'] . '">
            <div class="title">' . $value['title'] . "" . '</a></div> $' . $value['salePrice'] . '<br>
            <strike>$' . $value['normalPrice'] . '</strike>
            </div>⭐' . $value['steamRatingPercent']/10 . '</div>';
      foreach (json_decode($store, true) as $key => $value) {
        echo $value['storeName'];
      }
    }
  ?>
</div>

   <h4>by Nievl</h4>

</body>
</html>