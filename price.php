
<?php

  // Запрос к API Coinbase
  $url = 'https://api.coinbase.com/v2/exchange-rates?currency=BTC';
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  $bitcoin_rate = $data['data']['rates']['USD'];
  $bitcoin_rate_formatted = number_format((float)$bitcoin_rate, 2, '.', '');





