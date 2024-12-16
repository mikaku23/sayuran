<?php
include "../koneksi.php";
$aksi=$_GET['proses'];


if($aksi=="create"){
    $query = mysqli_query($koneksi, "SELECT MAX(id) AS max_id FROM datasayur");
    $data = mysqli_fetch_assoc($query);
    $id = $data['max_id'] ? $data['max_id'] + 1 : 1;
    if ($id > 999) {
        echo "ID sudah mencapai batas maksimum 999.";
        exit;}

    $nama=$_POST['nama'];
    $gambar=$_POST['gambar'];
    $data=$_POST['data'];
    $idkondisi=$_POST['idkondisi'];
    
    $query="INSERT INTO datasayur SET  id='$id',nama='$nama', data='$data', idkondisi='$idkondisi', gambar='$gambar'";
    $insert=mysqli_query($koneksi,$query);

    


}elseif($aksi=="edit"){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $gambar=$_POST['gambar'];
    $data=$_POST['data'];
    $idkondisi=$_POST['idkondisi'];
    // var_dump($nisn,$nama,$alamat);

    $query="UPDATE datasayur SET nama='$nama', data='$data', idkondisi='$idkondisi', gambar='$gambar'
    WHERE id='$id'";
    $update=mysqli_query($koneksi,$query);
}elseif($aksi=='hapus'){
    $id=$_GET['id'];

    $query="DELETE FROM datasayur WHERE id='$id'";
    mysqli_query($koneksi,$query);
}
header("location:../admin.php?title=dashboard&page=dashboard");

