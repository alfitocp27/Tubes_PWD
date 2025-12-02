<?php
include "../database.php";
include "../layout/header.php";

$medicines = mysqli_query($conn, "SELECT * FROM medicines");
?>

<h2>Daftar Obat</h2>

<div class="grid">
<?php while ($m = mysqli_fetch_assoc($medicines)) { ?>
    <div class="card">
        <img src="../uploads/<?= $m['image'] ?>" alt="<?= $m['name'] ?>">
        <h3><?= $m['name'] ?></h3>
        <p><?= $m['description'] ?></p>
        <p><strong>Rp <?= number_format($m['price'], 0, ',', '.') ?></strong></p>
        <a href="cart.php?action=add&id=<?= $m['id'] ?>" class="btn">Add to Cart</a>
    </div>
<?php } ?>
</div>

<?php include "../layout/footer.php"; ?>
