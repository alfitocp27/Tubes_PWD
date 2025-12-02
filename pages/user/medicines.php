<?php
include '../../database.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    redirect('../../login.php');
}

$user_id = $_SESSION['user_id'];

// Ambil semua obat
$medicines = mysqli_query($db, "SELECT * FROM medicines ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Obat</title>
    <link rel="stylesheet" href="../../assets/css/user.css">
</head>

<body>
    <?php include "../../layout/userHeader.html"; ?>

    <div class="container">
        <h2>🛒 Katalog Obat</h2>

        <div class="card">
            <div style="
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
                gap: 20px;">
                
                <?php while ($m = mysqli_fetch_assoc($medicines)): ?>
                <div class="card">
                    <img src="../../uploads/medicines/<?php echo $m['image']; ?>"
                         style="width:100%; height:180px; object-fit:cover; border-radius:8px;">

                    <h3><?php echo htmlspecialchars($m['name']); ?></h3>
                    <p><?php echo htmlspecialchars($m['category']); ?></p>
                    <p><strong>Rp <?php echo number_format($m['price'], 0, ',', '.'); ?></strong></p>

                    <a href="cart.php?add=<?php echo $m['id']; ?>" class="btn btn-primary">
                        ➕ Tambah ke Keranjang
                    </a>
                </div>
                <?php endwhile; ?>

            </div>
        </div>

    </div>
</body>
</html>

