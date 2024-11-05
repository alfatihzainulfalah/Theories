<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Theories</title>
    <link rel="icon" type="image/png" href="media/avatarHead3.png">
    <link rel="stylesheet" href="media/style.css">
    <link href="https://fonts.bunny.net/css?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/minecraft-framework-css@1.1.9/css/main.css">
    <script src="https://unpkg.com/minecraft-framework-css@1.1.9/css/assets/script.js"></script>

    <style>
      @font-face {
            font-family: 'MinecraftFont';
            src: url('../fonts/Minecrafter.Reg.ttf') format('opentype');
        }
      .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
      }

      .add-button {
        display: block;
        margin: 10px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        width: 100px;
        text-decoration: none;
        text-align: center;
        font-family: 'MinecraftFont', sans-serif;
        margin-right: 1rem;
        margin-left: 1rem;
      }

      @font-face {
            font-family: 'Minecraft';
            src: url('../fonts/mc-ten-lowercase-alt.ttf') format('opentype');
        }
      .headline{
        font-family: 'Minecrafter', sans-serif;
        font-size: 3rem;
        text-align: center;
        color: #55a630;
        margin-top: 40px;
        text-shadow: 3px 3px 0 #3a5d2b;
      }

      /* card */
      @font-face {
        font-family: 'Minecrafter';
        src: url(../fonts/Minecraft-font.otf) format('opentype');
      }

      .main2_feature_content {
        margin-top: 10px;
      }

      .main2_feature_content span {
        text-decoration: none;
      }

      .main2_feature {
        text-decoration: none; 
        color: inherit;
      }

      .main2_feature_headline {
        display: block;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 5px;
        font-family: 'Minecrafter', sans-serif;
        margin-bottom: 25px;
        margin-top: 20px;
      }

      .main2_feature_text {
        display: block;
        font-size: 16px;
        color: #666;
        font-family: 'Minecrafter', sans-serif;
      }

      .main2_feature:hover {
        text-decoration: none;
        color: #fff;
      }
      .inline {
          display: flex;
          gap: 10px;
      }

      .button-java {
          padding: 20px 20px; 
          border: none; 
          border-radius: 5px; 
          cursor: pointer;
          text-decoration: none;
          color: white;
          background-color: #007bff;
          font-family: 'Minecrafter', sans-serif; 
          transition: background-color 0.3s;
      }

      .button-java:hover {
          background-color: #0056b3;
      }
      .back-button {
          position: absolute;
          top: 20px;
          left: 20px;
      }

      .minecraft-button {
          font-family: 'Minecraft', sans-serif;
          text-decoration: none;
          color: #ffffff;
          background-color: #2e8b57;
          padding: 12px 20px;
          border-radius: 8px;
          border: 2px solid #3c763d; 
          box-shadow: 3px 3px 0 #1d4724;
          text-align: center;
          display: inline-block;
          transition: all 0.1s ease;
      }

      .minecraft-button:hover {
          background-color: #3c763d; 
          box-shadow: 2px 2px 0 #1d4724; 
          transform: translate(-2px, -2px);
      }
    </style>
  </head>
  <body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div id="more"></div>
      <div class="main2">
        <a class="headline">Minecraft Theories</a>
      <div class="button-container">

      <div class="back-button">
          <a href="../home.php" class="minecraft-button">
            Kembali
          </a>
      </div>

      <div class="inline">
          <a href="add.php" class="button-java">Add Teori</a>
      </div>

        </a>
      </div>
    <div class="main2_features_div">
      <div class="main2_features_div" id="main2FeaturesDiv">
          <?php
          $data = json_decode(file_get_contents('data.json'), true);
          if ($data) {
            foreach ($data as $mob) {
              echo '
              <a href="teori-mob.php?mob=' . urlencode($mob['nama_mob']) . '" class="main2_feature">
                <img class="main2_feature_img" alt="Feature Image" src="' . $mob['foto'] . '">
                <div class="main2_feature_content">
                  <span class="main2_feature_headline">' . $mob['nama_mob'] . '</span>
                  <span class="main2_feature_text">' . $mob['nama_teori'] . '</span>
                </div>
              </a>';
            }
          }
          ?>
      </div>
    </div>
    </div>
  </body>
</html>
