<?php
    $username = $_SESSION["username"];
    $qrys_profil = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
    $row_profil = mysqli_fetch_array($qrys_profil);
    $foto = $row_profil["foto"];
    $id = $row_profil["id_user"];
?>

<div class="container">    
   <div class="row">
       <div class="col-md-12 mt-2">
           <div class="card">
               <div class="card-header bg-danger"><strong><h1>Profil</strong></div>
                    <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Foto Profil</p>
                                            <img src="foto/<?= $foto ?>" alt="" srcset="" class="card-img">
                                        </div>
                                            <div class="col-md-9">
                                                <form action="process.php" method="POST">
                                                    <input type="hidden" name="id_user" value="<?= $id ?>">
                                                    <div class="form-group">
                                                        <label>Nama </label>
                                                        <input type="text" name="name" value="<?= $row_profil["name"] ?>" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" value="<?= $row_profil["username"] ?>" readonly class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info btn-sm" name="update_profil">Perbarui Profil</button>
                                                        <!-- <a href="#" onclick="ganti()" class="btn btn-danger btn-sm">Ganti Password</a> -->
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

