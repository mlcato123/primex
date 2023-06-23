<?php
// Начинаем работу сессий. Это необходимо для хранения данных пользователя на сервере
session_start();
include('../bd.php');

$user = $_SESSION['id'] ?? null;


if (isset($_SESSION['id']) == false) {
    header('Location: ../reg.php');
}

$user = selectOne('users', ['id' => $user], $conn);

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="ru"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Главная</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Главная.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.11.4, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Главная">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="ru">
    <section class="u-align-center u-clearfix u-section-1" id="sec-f6b6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h3 class="u-text u-text-default u-text-1"style="color:#fff;">Вывод BTC</h3>
        <p class="u-text u-text-default u-text-2" style="color:#fff;">Доступно на вывод: <?php echo $user['btc_balance'];?></p>
        <div class="u-form u-form-1">
          <form action="" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px" source="email" name="form">
            <div class="u-form-group u-form-name u-label-none">
              <label for="name-3b9a" class="u-label"></label>
              <input type="text" placeholder="Адрес кошелька" id="name-3b9a" name="address" class="u-input u-input-rectangle" required>
            </div>
            <div class="u-form-group u-label-none">
              <label for="email-3b9a" class="u-label"></label>
              <input type="number" placeholder="количество на вывод" id="email-3b9a" name="number" class="u-input u-input-rectangle" required>
            </div>
            <div class="u-align-center u-form-group u-form-submit">
              <a href="#" class="u-btn u-btn-submit u-button-style">Вывести</a>
              <input type="submit" value="submit" class="u-form-control-hidden">
            </div>
            
            <input type="hidden" value="" name="recaptchaResponse">
            <input type="hidden" name="formServices" value="0c30805fad02c7acad6fdec6aecab338">
          </form>
        </div>
      </div>
    </section>
    
    
    
  
</body></html>