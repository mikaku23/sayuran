 <?php
      include "koneksi.php";
      $id=$_GET['id'];
      $query="SELECT * FROM datasayur WHERE id='$id'";
      $find_one=mysqli_query($koneksi,$query);
      $data=mysqli_fetch_assoc($find_one);

$ide=$data['idkondisi'];
      $query1="SELECT * FROM kondisi WHERE idkondisi='$ide'";
      $find_one1=mysqli_query($koneksi,$query1);
      $data1=mysqli_fetch_assoc($find_one1);
      ?>

<style>

.jus {
    text-align: justify;
}

</style>
 <!-- Default box -->
 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Data <?=$data['nama'] ?></h3>

         <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
             </button>

         </div>
     </div>
     <div class="card-body">

         <div class="form-group">
             <label for="nama">Nama</label>
             <input type="text" class="form-control" id="nama" name="nama" disabled value="<?=$data['nama'] ?>">
         </div>
         <div class="form-group">
             <label for="kondisi">Kondisi</label>
             <input type="text" class="form-control" id="kondisi" name="kondisi" disabled value="<?=$data1['kondisi'] ?>">
         </div>
<div class="form-group">
    <label for="gambar">Data</label>
    <br>
   <img src="data:image/jpeg;base64,<?= base64_encode($data['gambar']) ?>" alt="<?=$data['nama']?>" style="width:200px; height:auto; filter: " class="img-fluid" />


             <br>
             <p class="jus"><?=$data['data'] ?></p>
         </div>

     </div>
     <!-- /.card-body -->

     <div class="card-footer text-right">
         <a href='admin.php?page=dashboard&title=dashboard'>
             <button type="submit" class="btn btn-primary">
                 <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
         </a>

     </div>
 </div>
 <!-- /.card -->