<?php

class Database
{
    //properties
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "db_php";
    public $connect;

    function __construct()
    {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password);
        mysqli_select_db($this->connect, $this->database);

        // // mengecek koneksi  (jika sudah berhasil tidak di gunakan lagi)
        //if ($this->connect->connect_error) {
        //  die("koneksi gagal : " . $this->connect->connect_error);
        //}
        //echo "Koneksi Berhasil";
    }
    function tampilData()
    {
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users");
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
        //var_dump($rows); //untuk mengujimenampilkan data (jika sudah tampil tidak di gunakan lagi)
        return $rows;
    }

    function tambahData($nama, $alamat, $no_hp, $email, $jenis_kelamin)
    {
        mysqli_query($this->connect, "INSERT INTO tb_users VALUES (NULL,'$nama', '$alamat', '$no_hp', '$email','$jenis_kelamin','$foto')"); 
    }

    function editData($id)
    {
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users WHERE id='$id'");
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
        return $rows;
    }

    function updateData($id, $nama, $alamat, $no_hp, $email, $jenis_kelamin)
    {
        mysqli_query($this->connect, "UPDATE tb_users SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', e-mail = '$email', jenis kelamin = '$jenis_kelamin', 
        WHERE tb_users.id = '$id'");
    }

    function hapusData($id)
    {
        mysqli_query($this->connect, "DELETE FROM tb_users WHERE tb_users.id = '$id'");
    }
    function detailData()
    {
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users");
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
            }
}
?>