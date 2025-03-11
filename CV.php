<?php
session_start();

// Cek apakah pengguna sudah login dan sudah mengisi form
if (!isset($_SESSION['user_email']) || !isset($_SESSION['form_data'])) {
    header("Location: Login.php");
    exit();
}

$data = $_SESSION['form_data'];

// Fungsi untuk memformat bulan dan tahun
function formatMonthYear($date) {
    if (empty($date)) return "Sekarang";
    $dateObj = DateTime::createFromFormat('Y-m', $date);
    return $dateObj ? $dateObj->format('F Y') : "Tanggal Tidak Valid";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .cv-container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #333;
        }

        .header p {
            color: #666;
            margin: 5px 0;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h2 {
            font-size: 20px;
            color: #222;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .section p {
            color: #444;
            line-height: 1.6;
        }

        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            padding: 8px 12px;
            background-color: #f9f9f9;
            margin-bottom: 6px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .education-item {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f6f6f6;
            border-left: 4px solid #007bff;
            border-radius: 5px;
        }

        .education-item h3 {
            margin: 0 0 5px;
            font-size: 18px;
            color: #007bff;
        }

        .education-item p {
            margin: 0 0 5px;
            color: #444;
        }

        .education-item span {
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 600px) {
            .cv-container {
                padding: 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .section h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="header">
            <h1><?php echo htmlspecialchars($data['name']); ?></h1>
            <p><?php echo htmlspecialchars($data['birth_place']); ?> | <?php echo htmlspecialchars($data['date']); ?></p>
            <p>Email: <?php echo htmlspecialchars($data['email']); ?> | Telepon: <?php echo htmlspecialchars($data['phone']); ?></p>
        </div>

        <div class="section">
            <h2>Tentang Saya</h2>
            <p><?php echo nl2br(htmlspecialchars($data['about'])); ?></p>
        </div>

        <div class="section">
            <h2>Informasi Kontak</h2>
            <ul>
                <li>Email: <?php echo htmlspecialchars($data['email']); ?></li>
                <li>Telepon: <?php echo htmlspecialchars($data['phone']); ?></li>
                <li>Alamat Domisili: <?php echo htmlspecialchars($data['birth_place']); ?></li>
                <li>Tanggal Lahir: <?php echo htmlspecialchars($data['date']); ?></li>
            </ul>
        </div>

        <div class="section">
            <h2>Riwayat Pendidikan</h2>
            <div class="education-item">
                <h3><?php echo htmlspecialchars($data['school'][0]); ?></h3>
                <p>Jurusan: <?php echo htmlspecialchars($data['major']); ?></p>
                <span>
                    <?php echo formatMonthYear($data['start_date'][0]); ?> - 
                    <?php echo formatMonthYear($data['end_date'][0]); ?>
                </span>
            </div>
        </div>

        <div class="section">
            <h2>Keahlian</h2>
            <?php
                $skills = array_map('trim', explode(',', $data['skills']));
                echo '<ul>';
                foreach ($skills as $skill) {
                    echo '<li>' . htmlspecialchars($skill) . '</li>';
                }
                echo '</ul>';
            ?>
        </div>

        <div class="section">
            <h2>Bahasa yang Dikuasai</h2>
            <?php
                $languages = array_map('trim', explode(',', $data['languages']));
                echo '<ul>';
                foreach ($languages as $lang) {
                    echo '<li>' . htmlspecialchars($lang) . '</li>';
                }
                echo '</ul>';
            ?>
        </div>
    </div>
</body>
</html>
