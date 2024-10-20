<?php
include 'database.php';
$db = new Database();

//var_dump($_GET['aksi']); //uji coba klik tombol simpan

//membuat variabel aksi, di gunakan untuk menangkap aktifitas yang di lakukan oleh user
$aksi = $_GET['aksi'];

if ($aksi == "tambah") {
    //pengujian kirim data
    //var_dump($_POST['nama']);

    //tambah data
    $db->tambahData($_POST['nama'], $_POST['alamat'], $_POST['no_hp'], $_POST['email'], $_POST['jenis_kelamin']);
    //mengarahkan tampilan ke index
    header("location:index.php");
} elseif ($aksi == "update") {
    //update data
    $db->updateData($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['nohp'], $_POST['email'], $_POST['jenis_kelamin']);
    header("location:index.php");
} elseif ($aksi == "hapus") {
    $db->hapusData($_GET['id']);
    header("location:index.php");
} elseif ($aksi == "detail") {
    $db->detailData($_POST['nama'], $_POST['alamat'], $_POST['no_hp'], $_POST['email'], $_POST['jenis_kelamin'], $_POST['foto']);
    header("location:detail.php");
}