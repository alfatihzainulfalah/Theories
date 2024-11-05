<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $teori = $_POST['teori'];
  $_SESSION['teori'] = $teori; // Menyimpan teori dalam sesi

  header('Location: add.php'); // Kembali ke add.php setelah submit
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Isi Teori</title>
  <style>
    /* Styling minimal untuk tampilan form teori */
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      width: 90%;
      max-width: 600px;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    textarea {
      width: 100%;
      height: 300px;
      padding: 10px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #4CAF50;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="teori.php" method="post">
      <label for="teori">Isi Teori Anda:</label>
      <textarea name="teori" id="teori" required><?= isset($_SESSION['teori']) ? $_SESSION['teori'] : ''; ?></textarea>
      <button type="submit">Simpan Teori</button>
    </form>
  </div>
</body>
</html>
