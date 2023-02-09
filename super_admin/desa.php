<?php 
include "header.php";
$kecamatan = array();
$ambil_kecamatan = $koneksi -> query("SELECT * FROM kecamatan");
while ($tiap_kecamatan = $ambil_kecamatan -> fetch_assoc()){
  $kecamatan[]=$tiap_kecamatan;
} 
$desa = array();
$ambil_desa = $koneksi -> query("SELECT * FROM desa LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan");
while ($tiap_desa = $ambil_desa -> fetch_assoc()){
  $desa[]=$tiap_desa;
}
?>
<div class="row">
  <div class="card mt-4" >
    <h4 class="card-title mt-3 ms-3">Daftar Desa/Kelurahan</h4>
    <p class="card-category ms-3">Data Desa/Kelurahan</p>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus"></i> Tambah Desa/Kelurahan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title mt-3 ms-3">Input Data Desa/Kelurahan</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <select class="form-control" name="kecamatan" required="required">
                      <option value="">--Pilih Kecamatan</option>
                      <?php foreach ($kecamatan as $key => $value): ?>
                        <option value="<?php echo $value["id_kecamatan"]; ?>"><?php echo $value["nama_kecamatan"]; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kode Desa/Kelurahan</label>
                    <input type="text" class="form-control" name="kode_desa" required="required">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Desa/Kelurahan</label>
                    <input type="text" class="form-control" name="nama_desa" required="required">
                  </div>
                  <div class="d-grid gap-2 d-md-block text-end">
                    <button class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
                <?php 

                if (isset($_POST["simpan"])) {
                  $kecamatan = $_POST["kecamatan"];
                  $kode = $_POST["kode_desa"];
                  $nama = $_POST["nama_desa"];


                  $koneksi -> query("INSERT INTO desa(id_kecamatan,kode_desa,nama_desa) VALUES ('$kecamatan','$kode','$nama')");
                  echo "<script>alert ('Data ditambahkan')</script>";
                  echo "<script>location = 'desa.php'</script>";
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
              <th>Kecamatan</th>
              <th>Kode Desa/Kelurahan</th>
              <th>Nama Desa/Kelurahan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($desa as $key => $value): ?>

              <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["nama_kecamatan"]; ?></td>
                <td><?php echo $value["kode_desa"]; ?></td>
                <td><?php echo $value["nama_desa"]; ?> </td>
                <td>
                  <a href="desa_ubah.php?id=<?php echo $value["id_desa"]; ?>" class="btn-sm btn btn-primary text-white" data-bs-toggle="tooltip" title="Ubah">
                    <span class="bi bi-pencil-square"></span>
                  </a>
                  <a href="desa_hapus.php?id=<?php echo $value["id_desa"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger" data-bs-toggle="tooltip" title="Hapus">
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