<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<div class="container">    
   <div class="row">
       <div class="col-md-12 mt-2">
           <div class="card">
               <div class="card-header bg-danger"><strong><h1>Cek Paketan Gs</strong></div>
               <div class="card-body">

                    <div class="table table-responsive">   
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengirim</th>
                                    <th>Penerima</th>
                                    <th>Tanggal Penerimaan</th>
                                    <th>No. Pelanggan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                                include "../../conn.php";
                                $no = 1;
                                $qrys = mysqli_query($conn, "SELECT * FROM tb_resi");
                                foreach($qrys as $qry):
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $qry["pengirim"] ?></td>
                                    <td><?= $qry["penerima"] ?></td>
                                    <td><?= $qry["tgl_penerimaan"] ?></td>
                                    <td><?= $qry["no_pelanggan"] ?></td>
                                    <td>
                                        <?php $status = $qry["status"];
                                            if($status == 0):
                                        ?>
                                            <a onclick="return confirm('Yakin Diambil ?')" class="btn btn-danger  btn-sm" href="process.php?ambil=<?= $qry["id_resi"] ?>">Belum Diambil</a>
                                        <?php else: ?>
                                            <button disabled class="btn btn-primary  btn-sm">Sudah Diambil</button>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Yakin Hapus ?')" class="btn btn-danger btn-sm" href="process.php?delete=<?= $qry["id_resi"] ?>">Hapus</a>
                                        <a class="btn btn-primary btn-sm" href="index.php?edit=<?= $qry["id_resi"] ?>">Edit</a>
                                    </td>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table> 
                    </div> 
                </div>
           </div>
       </div>
   </div>
</div>


<script src="adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script >

    $(document).ready(function(){

       $('#myTable').DataTable(); 
    })
</script>

