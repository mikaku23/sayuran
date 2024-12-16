  <style>
    /* Gaya untuk gambar */
    img {
        transition: all 0.3s ease-in-out;
        /* Gambar awal dalam kondisi hitam putih dan blur */
    }

    /* Efek saat kursor diarahkan ke gambar */
    img:hover {
        transform: translateY(-5px) scale(1.0); /* Membesar saat hover */
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3); /* Efek bayangan */
        border-radius: 5%;
        /* Menghapus efek grayscale dan blur saat hover */
    }
</style>
  <!-- Default box -->
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Dashboard Sayur</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col">
                      <a href="admin.php?page=create&title=create" class="btn btn-success btn-md"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                    <?php
                            include "koneksi.php";
                            $query="SELECT id,nama,data,idkondisi,gambar FROM datasayur order by id";
                            $hasil=mysqli_query($koneksi,$query);
                    ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id=1;
                    while($data=mysqli_fetch_assoc($hasil)){
                        $ide=$data['idkondisi'];
      $query1="SELECT * FROM kondisi WHERE idkondisi='$ide'";
      $find_one1=mysqli_query($koneksi,$query1);
      $data1=mysqli_fetch_assoc($find_one1);
                          $gambar = base64_encode($data['gambar']); 
            
            // Tentukan tipe gambar (misalnya JPEG, PNG, dll.)
            $tipe_gambar = 'image/JPG';
                        echo "<tr>
                            <td>P0$id</td>
                            <td>".$data['nama']."</td>
                                <td>
                                    <a href='admin.php?title=view&page=detail&id=$data[id]'>
                                        <img src='data:$tipe_gambar;base64,$gambar' 
                                            alt='Gambar' 
                                            style='width:100px; height:auto; cursor: pointer;'>
                                    </a>
                                </td>   
                            <td>".$data1['kondisi']."</td>

                            <td>
                                    <a href='admin.php?title=detail&page=detail&id=$data[id]' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>

                                     <a href='admin.php?title=edit&page=edit&id=$data[id]' class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt'></i></a>
                                     
                                     <a href='db/db.data.php?proses=hapus&id=$data[id]' class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt'></i></a>
                            </td>
                    </tr>";
                    $id++;
                    }
                    

                    ?>
                  </tbody>
                </table>
                </div>
              </div>

          </div>
          <!-- /.card-body -->

      </div>
      <!-- /.card -->