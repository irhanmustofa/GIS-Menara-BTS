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
    <p class="card-category ms-3">Data Daftar Kabupaten</p>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <a href="kabupaten_tambah.php" class="btn btn-success " type="button">
          <i class="bi bi-plus"></i>Tambah Kabupaten</a>
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
                    <a href="kabupaten_ubah.php?id=<?php echo $value["id_kabupaten"]; ?>" class="btn-sm btn btn-primary text-white">
                      <span class="bi bi-pencil-square"></span>
                    </a>
                    <a href="kabupaten_hapus.php?id=<?php echo $value["id_kabupaten"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger">
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