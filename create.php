<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $tpt_lahir = $_POST["tpt_lahir"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];
    $nm_ibu = $_POST["nm_ibu"];
    $telp1 = $_POST["telp1"];
    $telp2 = $_POST["telp2"];
    $stat_nikah = $_POST["stat_nikah"];
    $tanggungan = $_POST["tanggungan"];
    $stat_tinggal = $_POST["stat_tinggal"];
    $pekerjaan = $_POST["pekerjaan"];
    $type_motor = $_POST["type_motor"];
    $warna = $_POST["warna"];
    $harga = $_POST["harga"];
    $dp = $_POST["dp"];
    $tenor = $_POST["tenor"];
    $angsuran = $_POST["angsuran"];
    $nm_stnk = $_POST["nm_stnk"];
    $sales = $_POST["sales"];
    $stat_kredit = $_POST["stat_kredit"];

    $perintah = "INSERT INTO tbkredit (nik, nama, tpt_lahir, 
        tgl_lahir, alamat, nm_ibu, telp1, telp2, stat_nikah, 
        tanggungan, stat_tinggal, pekerjaan, type_motor, warna, harga, 
        dp, tenor, angsuran, nm_stnk, sales, stat_kredit) 
        VALUES('$nik','$nama','$tpt_lahir','$tgl_lahir','$alamat',
        '$nm_ibu','$telp1','$telp2','$stat_nikah','$tanggungan',
        '$stat_tinggal','$pekerjaan','$type_motor','$warna','$harga','$dp',
        '$tenor','$angsuran','$nm_stnk','$sales','$stat_kredit')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] ="Simpan Data Berhasil";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] ="Gagal Menyimpan Data";
    }

}
else{
    $response["kode"] = 0;
    $response["pesan"] ="Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);