<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_cust = $_POST["id_cust"];
    $stat_kredit = $_POST["stat_kredit"];

    $perintah = "UPDATE tbkredit SET stat_kredit = '$stat_kredit' WHERE id_cust = '$id_cust'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Simpan Data Berhasil";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Simpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] ="Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);