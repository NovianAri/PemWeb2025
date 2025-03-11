<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: Login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['form_data'] = $_POST;
    header("Location: CV.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Informasi Pribadi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color: #f5f5f5;
            padding: 1rem;
        }

        .box {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin: 1rem 0;
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-section {
            margin-bottom: 1.5rem;
        }

        h3 {
            color: #444;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #ddd;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1rem;
        }

        .input-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            color: #555;
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        input, textarea {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: #f9f9f9;
            color: #333;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .education-item {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .education-item h4 {
            color: #444;
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
            font-weight: 600;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background: #007bff;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        button:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .box {
                padding: 1rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="box" id="Form">
        <h1>Formulir Informasi Pribadi</h1>
        <form method="POST">
            <div class="form-section">
                <h3>Tentang Saya</h3>
                <div class="input-group">
                    <label for="about">Ceritakan tentang diri Anda:</label>
                    <textarea id="about" name="about" required></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3>Detail Pribadi</h3>
                <div class="input-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="phone">Nomor Telepon:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="input-group">
                    <label for="birth_place">Alamat Domisili:</label>
                    <input type="text" id="birth_place" name="birth_place" required>
                </div>
                <div class="input-group">
                    <label for="date">Tanggal Lahir:</label>
                    <input type="date" id="date" name="date" required>
                </div>
            </div>

            <div class="form-section">
                <h3>Riwayat Pendidikan</h3>
                <div class="education-item">
                    <h4>Universitas</h4>
                    <div class="input-group">
                        <label>Nama Universitas:</label>
                        <input type="text" name="school[]">
                    </div>
                    <div class="input-group">
                        <label>Jurusan/Program Studi:</label>
                        <input type="text" name="major">
                    </div>
                    <div class="input-group">
                        <label>Tanggal Mulai:</label>
                        <input type="month" name="start_date[]">
                    </div>
                    <div class="input-group">
                        <label>Tanggal Selesai:</label>
                        <input type="month" name="end_date[]">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Keahlian</h3>
                <div class="input-group">
                    <label>Keahlian yang dimiliki (pisahkan dengan koma):</label>
                    <input type="text" name="skills" placeholder="Contoh: HTML, CSS, PHP, Public Speaking">
                </div>
            </div>

            <div class="form-section">
                <h3>Bahasa yang Dikuasai</h3>
                <div class="input-group">
                    <label>Tuliskan bahasa yang Anda kuasai:</label>
                    <input type="text" name="languages" placeholder="Contoh: Indonesia, Inggris">
                </div>
            </div>

            <button type="submit">Buat CV</button>
        </form>
    </div>
</body>
</html>
