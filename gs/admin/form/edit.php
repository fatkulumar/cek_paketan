<?php
    if(isset($_GET["edit"])){
        $id = $_GET["edit"];
        $qrys = mysqli_query($conn, "SELECT * FROM tb_resi WHERE `id_resi` = '$id'");
        $row = mysqli_fetch_array($qrys);
    }

?>

<div class="container">    
  <div class="row">
    <div class="col-md-12 mt-2">
      <div class="card">
        <div class="card-header bg-danger"><strong><h1>Edit Paketan Gs</strong></div>
          <div class="card-body">

            <form class="mt-3 mb-3" action="../process.php" method="POST">
                <input type="hidden" name="id_update" value="<?= $id ?>">
                <div class="form-group">
                    <label for="pengirim">Pengirim</label>
                    <input class="form-control" type="text" name="pengirim" value="<?= $row["pengirim"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="penerima">Penerima</label>
                    <input class="form-control" type="text" name="penerima" value="<?= $_SESSION["name"] ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="tgl_penerimaan">Tanggal Penerimaan</label>
                    <input class="form-control" type="text" name="tgl_penerimaan" value="<?= $row["tgl_penerimaan"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_pelanggan">No. Pelanggan</label>
                    <input class="form-control" type="text" name="no_pelanggan" value="<?= $row["no_pelanggan"] ?>" required>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="update">Update Paketan</button>
                </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
