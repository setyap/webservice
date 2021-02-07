<?php
require("koneksi.php");
$perintah = "SELECT * FROM tbkredit ORDER BY id_cust DESC";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_cust"] = $ambil->id_cust;
        $F["nik"] = $ambil->nik;
        $F["nama"] = $ambil->nama;
        $F["tempat lahir"] = $ambil->tpt_lahir;
        $F["tanggal lahir"] = $ambil->tgl_lahir;
        $F["alamat"] = $ambil->alamat;
        $F["nama ibu"] = $ambil->nm_ibu;
        $F["telp1"] = $ambil->telp1;
        $F["telp2"] = $ambil->telp2;
        $F["status nikah"] = $ambil->stat_nikah;
        $F["tanggungan"] = $ambil->tanggungan;
        $F["status tinggal"] = $ambil->stat_tinggal;
        $F["pekerjaan"] = $ambil->pekerjaan;
        $F["type motor"] = $ambil->type_motor;
        $F["warna"] = $ambil->warna;
        $F["harga"] = $ambil->harga;
        $F["dp"] = $ambil->dp;
        $F["tenor"] = $ambil->tenor;
        $F["angsuran"] = $ambil->angsuran;
        $F["nama stnk"] = $ambil->nm_stnk;
        $F["sales"] = $ambil->sales;
        $F["stat_kredit"] = $ambil->stat_kredit;
        

        array_push($response["data"], $F);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"]= "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($konek);