

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test COVID 19</title>
    <?php
    include("connection.php");
    include("header.php");
    include("session.php");
    session_start();
    if(!isset($_SESSION['User_ID'])){
      session_destroy();
      header("Location:index.php");
      echo $_SESSION['User_ID'];
    }
    ?>
    <style >
      .parallax{
        background-image: url("dd.jpg");
        width: 100%;
        height: 600px;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .content{
        display: block;
        width: 100%;
        height: 700px;
      }
      .content h1{
        font-size: 56px;
        margin-top: 80px;
      }
      .stcky-item{
        position: sticky;
        top: 0;
        height: 50px;
      }
      .grey-box{
        margin: 10px;
        background-color: #cccccc;
        border-radius: 10px;
        height: 100px;
      }
      .spinner{
        width: 100px;
        height: 100px;
        border: 10px solid #cccccc;
        border-top: 10px solid red;
        border-radius: 100px;
        animation: rotates 2s  infinite;
      }
      @@keyframes rotates {
        0%{transform: rotate(0deg);}
        100% {transform: rotate(360deg);}
      }
      #dp{
        width: 100px;
        height: 100px;
        border: thick solid #cfc;
        border-radius: 50%;
        box-sizing: border-box;
        background-image: url('images/save_icon.png');
        background-size: cover;

        box-shadow: grey 0px 0px 20px;
      }
    </style>
  </head>
  <body>
    <div class="col-md-6">
      <div class="spinner">

      </div>
      <div class="row" id="dp">
        <img src="" alt="">

      </div>
    </div>
    <div class="col-md-6">
      <div class="stcky-item" style="background-color:green;"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="stcky-item" style="background-color:yellow;"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="stcky-item" style="background-color:blue;"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="stcky-item" style="background-color:red;"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
      <div class="grey-box"></div>
    </div>
  </body>
</html>
