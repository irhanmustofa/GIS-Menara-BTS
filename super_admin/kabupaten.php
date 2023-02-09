<?php 
include "header.php";
$kabupaten = array();
$ambil_kabupaten = $koneksi -> query("SELECT * FROM kabupaten");
while ($tiap_kabupaten = $ambil_kabupaten -> fetch_assoc()){
  $kabupaten[]=$tiap_kabupaten;
}
?>
<div class="row">
  <div class="card mt-4" >
    <h4 class="card-title mt-3 ms-3">Daftar Kabupaten</h4>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-plus"></i> Tambah Kabupaten
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title mt-3 ms-3">Input Data Kabupaten</h4>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="mb-3">
                      <label class="form-label">Kode Kabupaten</label>
                      <input type="text" class="form-control" name="kode_kabupaten" required="required">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama Kabupaten</label>
                      <input type="text" class="form-control" name="nama_kabupaten" required="required">
                    </div>
                    <div class="d-grid gap-2 d-md-block text-end">
                      <button class="btn btn-primary" name="simpan">Simpan</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                  <?php 

                  if (isset($_POST["simpan"])) {
                    $kode = $_POST["kode_kabupaten"];
                    $nama = $_POST["nama_kabupaten"];


                    $koneksi -> query("INSERT INTO kabupaten(kode_kabupaten,nama_kabupaten) VALUES ('$kode','$nama')");
                    echo "<script>alert ('Data ditambahkan')</script>";
                    echo "<script>location = 'kabupaten.php'</script>";
                  }

                  ?>
                </div>
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
              <th>Kode Kabupaten/Kota</th>
              <th>Nama Kabupaten/Kota</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kabupaten as $key => $value): ?>

              <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["kode_kabupaten"]; ?></td>
                <td><?php echo $value["nama_kabupaten"]; ?> </td>
                <td>
                  <a href="kabupaten_ubah.php?id=<?php echo $value["id_kabupaten"]; ?>" class="btn-sm btn btn-primary text-white" data-bs-toggle="tooltip" title="Ubah">
                    <span class="bi bi-pencil-square"></span>
                  </a>
                  <a href="kabupaten_hapus.php?id=<?php echo $value["id_kabupaten"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger" data-bs-toggle="tooltip" title="Hapus">
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