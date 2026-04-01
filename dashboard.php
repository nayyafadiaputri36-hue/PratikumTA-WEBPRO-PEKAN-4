<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>

<h2>Selamat datang, <?php echo $_SESSION['user']; ?></h2>
<a href="logout.php">Logout</a>

<hr>

<!-- 🔹 FORM TAMBAH DATA (CREATE) -->
<h3>Tambah Pengaduan</h3>
<form method="POST">
    <textarea name="isi" required></textarea><br>
    <button name="tambah">Kirim</button>
</form>

<hr>

<!-- 🔹 PROSES CREATE -->
<?php
if (isset($_POST['tambah'])) {
    $isi = $_POST['isi'];
    mysqli_query($conn, "INSERT INTO pengaduan (isi) VALUES ('$isi')");
    header("Location: dashboard.php");
}
?>

<!-- 🔹 TAMPILKAN DATA (READ) -->
<h3>Data Pengaduan</h3>

<?php
$data = mysqli_query($conn, "SELECT * FROM pengaduan");

while ($d = mysqli_fetch_array($data)) {
?>
    <p>
        <?php echo $d['isi']; ?>
        | <a href="?edit=<?php echo $d['id']; ?>">Edit</a>
        | <a href="?hapus=<?php echo $d['id']; ?>">Hapus</a>
    </p>
<?php } ?>

---

<!-- 🔹 DELETE -->
<?php
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pengaduan WHERE id=$id");
    header("Location: dashboard.php");
}
?>

---

<!-- 🔹 EDIT & UPDATE -->
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id=$id");
    $e = mysqli_fetch_array($edit);
?>

<h3>Edit Data</h3>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $e['id']; ?>">
    <textarea name="isi"><?php echo $e['isi']; ?></textarea><br>
    <button name="update">Update</button>
</form>

<?php } ?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $isi = $_POST['isi'];

    mysqli_query($conn, "UPDATE pengaduan SET isi='$isi' WHERE id=$id");
    header("Location: dashboard.php");
}
?>