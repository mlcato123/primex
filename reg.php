<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>формы регистрации с авторизацией</title>
  <link rel="stylesheet" href="css/styles.css" />
</head>
<body translate="no">
  <div class="container log-in">
    <div class="box"></div>
    <div class="container-forms">
      <div class="container-info">
        <div class="info-item">
          <div class="table">
            <div class="table-cell">
              <p>
                У вас есть аккаунт?
              </p>
              <div class="btn">
                Авторизоваться
              </div>
            </div>
          </div>
        </div>
        <div class="info-item">
          <div class="table">
            <div class="table-cell">
              <p>
                У вас нет аккаунта?
              </p>
              <div class="btn">
                Зарегистрироваться
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-form">
        <form action="testreg.php" method="post">
          <div class="form-item log-in">
            <div class="table">
              <div class="table-cell">
                <input name="login" placeholder="login" type="text">
                <input name="password" placeholder="password" type="Password">
                <input type="submit" name="submit" value="Авторизоваться" class="btn" style="border: 0;">
              </div>
            </div>
          </div>
        </form>
        <form action="save_user.php" method="post">
          <div class="form-item sign-up">
            <div class="table">
              <div class="table-cell">
                <input name="login" placeholder="login" type="text">
                <input name="password" placeholder="password" type="Password">
                <input type="submit" value="Зарегеистрироваться" class="btn" style="border: 0;">
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>