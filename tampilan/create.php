<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data sayur</title>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" nomodule></script>
    <style>
    .reset-icon {
        font-size: 1.2em;
        vertical-align: middle;
        position: relative;
        top: -2px;
    }
    </style>
</head>

<body>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Sayur</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <form action="db/db.data.php?proses=create" method="POST">
            <div class="card-body"> 
                <div class="form-group">
                    <label for="nama">Nama Sayur</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama sayur"
                        required>
                </div>
                <div class="form-group">
                    <label for="data">Data</label>
                     <textarea class="form-control" rows="3" cols="50" id="data" name="data" placeholder="Masukkan Data" required></textarea>
                </div>
                <div class="form-group">
                    <label for="idkondisi">Kondisi Sayur</label>
                    <select class="form-control" id="idkondisi" name="idkondisi" required>
                        <option value="">Pilih Kondisi Sayur</option>
                        <?php
                        include "koneksi.php";
                        // Query untuk mengambil id dan nama barang
                        $query = mysqli_query($koneksi, "SELECT idkondisi, kondisi FROM kondisi ");
                        while ($data = mysqli_fetch_assoc($query)) {
                            // Gabungkan id dan nama dalam satu value
                            echo "<option value='" . $data['idkondisi'] . "-" . $data['kondisi'] . "'>" . $data['idkondisi'] . "-" . $data['kondisi'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">gambar</label>
                    <input type="file" accept="image/*" class="form-control" id="gambar" name="gambar" placeholder="Masukkan gambar" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <a href='admin.php?title=dashboard&page=dashboard'>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-left"></i> Kembali
                    </button>
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="reset" class="btn btn-warning">
                    <ion-icon name="refresh-circle-outline" class="reset-icon"></ion-icon> Reset
                </button>
            </div>
        </form>
    </div>
</body>

</html>