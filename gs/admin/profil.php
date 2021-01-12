<?php
    $id_user = $_SESSION["id_user"];
    $qrys_profil = mysqli_query($conn, "SELECT * FROM tb_users WHERE id_user = '$id_user'");
    $row_profil = mysqli_fetch_array($qrys_profil);
    $foto = $row_profil["foto"];
?>

<div class="container">    
   <div class="row">
       <div class="col-md-12 mt-2">
           <div class="card">
               <div class="card-header bg-danger"><strong><h1>Profil</strong>
                    <div style="float: right;"><a class="btn btn-success btn-sm" href="index.php?edit_profil">Edit Profil</a></div>
               </div>
                    <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Foto Profil</p>
                                            <img src="foto/<?= $foto ?>" alt="Cek Paketan Gs" class="card-img">
                                        </div>
                                            <div class="col-md-9">
                                                <form action="">
                                                    <div class="form-group">
                                                        <label>Nama </label>
                                                        <input type="text" value="<?= $row_profil["name"] ?>" readonly class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" value="<?= $row_profil["username"] ?>" readonly class="form-control" required>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>   


                            </div>

                    </div>
               </div>
           </div>
       </div>
   </div>
</div>

