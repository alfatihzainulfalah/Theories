<?php
$nama_mob = isset($_GET['mob']) ? $_GET['mob'] : '';

$data_file = 'data.json';
if (file_exists($data_file)) {
    $data = json_decode(file_get_contents($data_file), true);
    $mob_data = null;
    foreach ($data as $mob) {
        if ($mob['nama_mob'] === $nama_mob) {
            $mob_data = $mob;
            break;
        }
    }

    if ($mob_data) {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teori Mob</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            background-image: url('media/bg.png');
            background-size: cover;
            color: #e0e0e0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }
        .container {
            max-width: 1400px;
            width: 95%;
            background-color: rgba(42, 42, 42, 0.9);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.9);
            text-align: center;
            position: relative;
        }
        @font-face {
            font-family: 'Minecraft';
            src: url('../fonts/mc-ten-lowercase-alt.ttf') format('opentype');
        }
        @font-face {
            font-family: 'Minecrafter';
            src: url('../fonts/Minecraft-font.otf') format('opentype');
        }
        .title {
            font-size: 50px;
            font-family: 'Minecraft', sans-serif;
            color: #ffcc00;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .judul {
            font-size: 32px;
            color: #ffcc00;
            margin-bottom: 25px;
            font-family: 'Minecraft', sans-serif;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        .image {
            flex: 1 1 35%;
            max-width: 35%;
        }
        .image img {
            width: 100%; /* Lebih kecil dari teks */
            border-radius: 15px;
            border: 5px solid #ffcc00;
        }
        .text {
            flex: 1 1 60%; /* Membuat textarea lebih besar */
            max-width: 60%;
            background-color: rgba(51, 51, 51, 0.95);
            border-radius: 15px;
            padding: 30px;
            border: 3px solid #ffcc00;
            font-family: 'Minecrafter', sans-serif;
            color: #e0e0e0;
            text-align: left;
            font-size: 20px;
            max-height: 700px;
            overflow-y: auto;
        }
        .text textarea {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            color: #e0e0e0;
            font-family: inherit;
            resize: none;
            padding: 0;
            outline: none;
            font-size: 20px;
            line-height: 1.6;
            max-height: 600px;
        }
        .minecraft-button {
            font-family: 'Minecraft', sans-serif;
            text-decoration: none;
            color: #ffffff;
            background-color: #2e8b57;
            padding: 15px 20px;
            border-radius: 10px;
            border: 3px solid #3c763d;
            box-shadow: 3px 3px 0 #1d4724;
            transition: all 0.1s ease;
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
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
    <a href="index.php" class="minecraft-button">
        Kembali
    </a>
    <div class="title">
        <?php echo htmlspecialchars($mob_data['nama_mob']); ?>
    </div>
    <div class="judul">
        <?php echo htmlspecialchars($mob_data['nama_teori']); ?>
    </div>
    <div class="content">
        <div class="image">
            <img src="<?php echo htmlspecialchars($mob_data['foto']); ?>" alt="Foto Mob">
        </div>
        <div class="text">
            <textarea readonly><?php echo htmlspecialchars($mob_data['teori']); ?></textarea>
        </div>
    </div>
</div>

</body>
</html>



<?php
} else {
    echo '<h1>Data tidak ditemukan</h1>';
    echo '<p>Maaf, teori untuk mob yang Anda cari tidak tersedia.</p>';
}
} else {
    echo '<h1>Error</h1>';
    echo '<p>File data.json tidak ditemukan.</p>';
}
?>
