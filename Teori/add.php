<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nama_mob = $_POST['nama_mob'];
  $nama_teori = $_POST['nama_teori'];
  $teori = $_POST['teori'];
  $foto_mob = $_POST['foto_mob']; 

  $dataFile = 'data.json';
  $data = json_decode(file_get_contents($dataFile), true) ?: [];

  $new_data = [
    'nama_mob' => $nama_mob,
    'foto' => $foto_mob, 
    'nama_teori' => $nama_teori,
    'teori' => $teori
  ];
  $data[] = $new_data;

  file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <title>Tambah Mob</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Press Start 2P', cursive;
      background: url('../img/bg.png') no-repeat center center fixed;
      background-size: cover;
      color: #d3d3d3;
    }

    .container {
      width: 90%;
      max-width: 800px;
      margin: 100px auto;
      padding: 20px;
      background: #2e2e2e;
      border-radius: 8px;
      border: 4px solid #5a5a5a;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.8);
      text-align: center;
    }

    .header {
      font-size: 20px;
      color: #9acd32;
      margin-bottom: 20px;
      text-shadow: 2px 2px 0 #000;
    }

    .content img {
      display: block;
      margin: 0 auto;
      width: 150px;
      border: 4px solid #5a5a5a;
      border-radius: 8px;
      margin-bottom: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
    }

    .form label {
      font-size: 12px;
      color: #a9a9a9;
      text-align: left;
      display: block;
      margin-top: 15px;
    }

    .form select,
    .form input[type="text"],
    .form textarea {
      width: 100%;
      padding: 10px;
      font-size: 12px;
      background-color: #3b3b3b;
      border: 2px solid #5a5a5a;
      border-radius: 4px;
      color: #ffffff;
      margin-top: 5px;
      font-family: 'Press Start 2P', cursive;
    }

    .form button {
      width: 45%;
      padding: 12px;
      font-size: 14px;
      font-weight: bold;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      margin: 10px 5px;
      background: #556b2f;
      color: #fff;
      box-shadow: 0px 4px 0px #3b3b3b;
      transition: all 0.2s ease;
      font-family: 'Press Start 2P', cursive;
    }

    .form button:hover {
      background: #6b8e23;
      box-shadow: 0px 2px 0px #3b3b3b;
    }

    .form button:active {
      background: #3b3b3b;
      box-shadow: 0px 0px 0px;
    }

    .form .button-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
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
  <div class="container">
    <div class="back-button">
      <a href="index.php" class="minecraft-button">
          Kembali
      </a>
    </div>
    <div class="header">
      Punya Teori?
    </div>
    <div class="content">
      <img id="mob_image" src="media/creeper.png" alt="Gambar Mob">
    </div>
    <div class="form">
      <form action="add.php" method="post">
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" onchange="updateMobOptions()" required>
          <option value="">Pilih Kategori</option>
          <option value="overworld">Overworld</option>
          <option value="nether">Nether</option>
          <option value="theEnd">The End</option>
        </select>

        <label for="nama_mob">Nama Mob:</label>
        <select id="nama_mob" name="nama_mob" onchange="updateMobImage()" required>
          <option value="">Pilih Mob</option>
        </select>

        <input type="hidden" id="foto_mob" name="foto_mob">

        <label for="nama_teori">Nama Teori:</label>
        <input type="text" id="nama_teori" name="nama_teori" required>

        <label for="teori">Teori:</label>
        <textarea id="teori" name="teori" rows="10" required></textarea>

        <div class="button-container">
          <!-- <button type="button" onclick="window.location.href='index.php'">Go Back</button> -->
          <button type="submit">Tambah</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const mobsByCategory = {
      overworld: [
        { name: 'Zombie', image: 'media/zombie.png' },
        { name: 'Creeper', image: 'media/creeper.png' },
        { name: 'Skeleton', image: 'media/skeleton.png' }
      ],
      nether: [
        { name: 'Ghast', image: 'media/ghast.png' },
        { name: 'Blaze', image: 'media/blaze.png' },
        { name: 'Wither Skeleton', image: 'media/wither_skeleton.png' }
      ],
      theEnd: [
        { name: 'Ender Dragon', image: 'media/ender_dragon.png' },
        { name: 'Enderman', image: 'media/enderman.png' }
      ]
    };

    function updateMobOptions() {
      const category = document.getElementById('kategori').value;
      const mobSelect = document.getElementById('nama_mob');
      const mobImage = document.getElementById('mob_image');

      mobSelect.innerHTML = '';

      if (category) {
        const mobs = mobsByCategory[category];

        mobs.forEach(mob => {
          const option = document.createElement('option');
          option.value = mob.name;
          option.textContent = mob.name;
          mobSelect.appendChild(option);
        });

        if (mobs.length > 0) {
          mobImage.src = mobs[0].image;
        }
      }
    }

    function updateMobImage() {
      const category = document.getElementById('kategori').value;
      const mobSelect = document.getElementById('nama_mob').value;
      const mobImage = document.getElementById('mob_image');
      const fotoMobInput = document.getElementById('foto_mob'); 
      
      const selectedMob = mobsByCategory[category].find(mob => mob.name === mobSelect);
      if (selectedMob) {
        mobImage.src = selectedMob.image;
        fotoMobInput.value = selectedMob.image;
      }
    }
  </script>
</body>
</html>
