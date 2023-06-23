<?php
// Начинаем работу сессий. Это необходимо для хранения данных пользователя на сервере
session_start();
include('bd.php');
include('price.php');
$user = $_SESSION['id'] ?? null;


if (isset($_SESSION['id']) == false) {
  header('Location: reg.php');
}

$user = selectOne('users', ['id' => $user], $conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="scss/style.scss">
  <link rel="stylesheet" href="css/form.css">
  <link rel="shortcut icon" type="lk/image/x-icon" href="lk/img/favicon.ico">
<link rel="stylesheet" href="lk/css/metisMenu/metisMenu.min.css">
<link rel="stylesheet" href="lk/css/metisMenu/metisMenu-vertical.css">
<link rel="stylesheet" href="lk/css/nalika-icon.css">
<!-- style CSS
        ============================================ -->
<link rel="stylesheet" href="lk/style.css">
  <title><?php echo $bitcoin_rate_formatted;?>Dashboard</title>
</head>

<style>
  iframe {
    padding-left: 217px;

  }
</style>

<body>
  <?php include('tpl/sidebar.php'); ?>
  <!-- TradingView Widget BEGIN -->
  <div id='colomn'>
  <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js"
      async>
        {
          "symbols": [
            [
              "BINANCE:BTCUSD|1M"
            ],
            [
              "BINANCE:ETHUSD|1M"
            ]
          ],
            "chartOnly": false,
              "width": "99%",
                "height": 940,
                  "locale": "ru",
                    "colorTheme": "dark",
                      "autosize": false,
                        "showVolume": true,
                          "showMA": true,
                            "hideDateRanges": false,
                              "hideMarketStatus": false,
                                "hideSymbolLogo": false,
                                  "scalePosition": "right",
                                    "scaleMode": "Normal",
                                      "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                                        "fontSize": "14",
                                          "noTimeScale": false,
                                            "valuesTracking": "1",
                                              "changeMode": "price-and-percent",
                                                "chartType": "candlesticks",
                                                  "maLineColor": "#2962FF",
                                                    "maLineWidth": 1,
                                                      "maLength": 24,
                                                        "lineType": 0,
                                                          "dateRanges": [
                                                            "1d|1",
                                                            "1m|30",
                                                            "3m|60",
                                                            "12m|1D",
                                                            "60m|1W",
                                                            "all|1M"
                                                          ],
                                                            "upColor": "#22ab94",
                                                              "downColor": "#f7525f",
                                                                "borderUpColor": "#22ab94",
                                                                  "borderDownColor": "#f7525f",
                                                                    "wickUpColor": "#22ab94",
                                                                      "wickDownColor": "#f7525f"
        }
      </script>
  </div>


<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Купить</a></li>
        <li class="tab sell"><a href="#login" >Продать</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Купить BTC</h1>
          
          <form action="buy.php" method="post">

          <div class="field-wrap">
            <p style='color: #fff;'>
             Цена <?php echo $bitcoin_rate_formatted;?>
      </p>
            <input name="buy" type="text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <p style='color: #fff;'>
              Дост. <?php echo $user['balance'];?> USDT
            </p>
            <input name="sumBuy" type="number"required autocomplete="off" min="10">
          </div>
          
          <button type="submit" class="button button-block">Купить</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Продать BTC</h1>
          
          <form action="sell.php" method="post">
          
            <div class="field-wrap">
            <p style='color: #fff;'>
               Цена <?php echo $bitcoin_rate_formatted;?>
            </p>
            <input name="sell" type="text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <p style='color: #fff;'>
              Дост.<?php echo $user['btc_balance'];?> BTC
            </p>
            <input name="sumSell" type="number"required autocomplete="off" min="0.001">
          </div>
          
          
          <button class="button button-block">Продать</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  </div>
<script src="js/form.js"></script>

</body>

</html>
