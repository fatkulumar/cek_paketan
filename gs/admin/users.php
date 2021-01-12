<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<div class="container">    
   <div class="row">
       <div class="col-md-12 mt-2">
           <div class="card">
               <div class="card-header bg-danger"><strong><h1>Admin Gs Paketan</strong></div>
               <div class="card-body">

                    <div class="table table-responsive">   
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                                include "../../conn.php";
                                $no = 1;
                                $qrys = mysqli_query($conn, "SELECT username, foto, name FROM tb_users");
                                foreach($qrys as $qry):
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $qry["name"] ?></td>
                                    <td><?= $qry["username"] ?></td>
                                    <td class="brand-link">
                                        <?php $foto = $qry["foto"] ?>
                                        <img class="brand-image img-circle elevation-3" width="50px" src="foto/<?= $foto ?>" alt="">
                                    
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

