<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #a2d5f2;
        }

        .profile-container {
            text-align: center;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-container:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
        }

        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid #a2d5f2;
        }

        .info {
            background-color: rgba(255, 255, 255, 0.5);
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            font-size: 18px;
            color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        strong {
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="https://i.pinimg.com/564x/d9/f0/dd/d9f0dd60f2de23fb4ea8fa950a198b62.jpg" alt="Foto Profil">
        <div class="info">
            <strong>Nama:</strong> <?= $nama ?>
        </div>
        <div class="info">
            <strong>NPM:</strong> <?= $npm ?>
        </div>
        <div class="info">
            <p><strong>Kelas:</strong> <?= $nama_kelas ?? 'Kelas tidak ditemukan' ?></p>
        </div>
    </div>
</body>

</html>