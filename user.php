<?php
require("koneksi.php");
$perintah = "SELECT * FROM user ORDER BY id_user DESC";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_user"] = $ambil->id_user;
        $F["username"] = $ambil->username;
        $F["name"] = $ambil->name;
        $F["password"] = $ambil->password;
        $F["jabatan"] = $ambil->jabatan;
        

        array_push($response["data"], $F);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"]= "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($konek);