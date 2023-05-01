<?php


$koneksi = mysqli_connect("localhost", "root", "", "tugas_kelompok3");

//login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekuser = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $hitung = mysqli_num_rows($cekuser);

if($hitung>0){
    //kalau data ditemukan
    $ambildatarole = mysqli_fetch_array($cekuser);
    $role = $ambildatarole['role'];

    if($role=='admin'){
        //kalau admin 
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = 'admin';
        //tampilan dashboard admin
        header('location : admin/dashboard1.php');
    } else{
        // kalau bukan admin
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = 'user';
        //tampilan dashboard user
        header('location : user/dashboard2.php');
    }
} else{
    echo 'username/password salah'

}

}

?>