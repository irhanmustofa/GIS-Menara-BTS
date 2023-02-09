<?php 
include "header.php";

$kategori = array();
$ambil_kategori = $koneksi -> query("SELECT * FROM kategori");
while ($tiap_kategori = $ambil_kategori -> fetch_assoc()){
	$kategori[]=$tiap_kategori;
}

?>
<div class="row">
  <div class="card mt-4" >
    <h4 class="card-title mt-3 ms-3">Daftar Kategori</h4>
    <p class="card-category ms-3">Data Kategori</p>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus"></i> Tambah
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title mt-3 ms-3">Input Data Kategori</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <label class="form-label">Tipe Menara</label>
                    <input type="text" class="form-control" name="tipe_menara" required="required">
                  </div>
                  <div class="d-grid gap-2 d-md-block text-end">
                    <button class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
                <?php 

                if (isset($_POST["simpan"])) {
                  $tipe = $_POST["tipe_menara"];


                  $koneksi -> query("INSERT INTO kategori(tipe_menara) VALUES ('$tipe')");
                  echo "<script>alert ('Data berhasil ditambahkan')</script>";
                  echo "<script>location = 'kategori_tampil.php'</script>";
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="table table-responsive">
        <table id="datatabel" class="table table-bordered table-striped table-sm table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Tipe Menara</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kategori as $key => $value): ?>

              <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["tipe_menara"]; ?></td>
                <td>
                  <a href="menara_tampil.php?id=<?php echo $value["id_kategori"]; ?>" class="btn-sm btn btn-success text-white" data-bs-toggle="tooltip" title="Lihat">
                    <span class="bi bi-info-square"></span>
                  </a>

                  <a href="kategori_ubah.php?id=<?php echo $value["id_kategori"]; ?>" class="btn-sm btn btn-primary text-white" data-bs-toggle="tooltip" title="Ubah">
                    <span class="bi bi-pencil-square"></span>
                  </a>



                <a href="kategori_hapus.php?id=<?php echo $value["id_kategori"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger" data-bs-toggle="tooltip" title="Hapus">
                  <span class="bi bi-trash-fill"></span>
                </a>
              </td>
            </tr>

          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<?php 
include "footer.php";
?>