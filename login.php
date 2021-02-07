<?php

include 'koneksi.php';
 if($_POST){

    //Data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $response = []; //Data Response

    //Cek username didalam databse
    $userQuery = $connection->prepare("SELECT * FROM user WHERE username = ?");
    $userQuery->execute(array($username));
    $query = $userQuery->fetch();
    //cek status login
    if($userQuery->rowCount() == 0){
        $response['status'] = false;
        $response['message'] = "username Tidak Terdaftar";
    } else {
        // Cek password di db
        $passwordDB = $query['password'];
        if(strcmp($password,$passwordDB) == 0){
            $response['status'] = true;
            $response['message'] = "Login Berhasil";
            $response['data'] = [
              
                'id_user' => $query['id_user'],
                'username' => $query['username'],
                'name' => $query['name'],
                'jabatan' => $query['jabatan']
            ];
        } else {
            $response['status'] = false;
            $response['message'] = "Password Anda salah";
        }
    }

    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo $json;

}
?>