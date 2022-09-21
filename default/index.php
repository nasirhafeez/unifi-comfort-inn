<?php

require 'header.php';
include 'config.php';

$_SESSION["id"] = $_GET['id'];
$_SESSION["ap"] = $_GET['ap'];
$_SESSION["user_type"] = "new";

# Checking DB to see if user exists or not.
$result = mysqli_query($con, "SELECT * FROM `$table_name` WHERE mac='$_SESSION[id]'");

if ($result->num_rows >= 1) {
  $row = mysqli_fetch_array($result);

  mysqli_close($con);

  $_SESSION["user_type"] = "repeat";
  header("Location: welcome.php");
} else {
  mysqli_close($con);
}

?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>
    <?php echo htmlspecialchars($business_name); ?> WiFi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="../assets/styles/bulma.min.css" />
  <link rel="icon" type="image/png" href="../assets/images/favicomatic/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="../assets/images/favicomatic/favicon-16x16.png" sizes="16x16" />
  <link rel="stylesheet" href="../assets/styles/style.css" />
</head>

<body>
  <div class="page">

    <div class="head">
      <br>
      <figure id="logo">
        <img src="../assets/images/logo.png">
      </figure>
    </div>

    <div class="main">
      <section class="section">
        <div class="container">
          <form method="post" action="connect.php">
            <div id="login" class="content is-size-6 has-text-centered">You must agree to the <a href="policy.php">Terms of Service</a></div>
            <div id="login" class="content is-size-6 has-text-centered">in order to gain internet access</div>
            <br>
            <div class="buttons is-centered">
                <button class="button is-link">I Agree</button>
            </div>
          </form>
        </div>
        <br>
      </section>
    </div>
  </div>
</body>
</html>
