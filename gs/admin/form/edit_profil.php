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
               <div class="card-header bg-danger"><strong><h1>Edit Profil</strong></div>
                    <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-body">
                                        <p class="login-box-msg" style="color: red;">
                                        
                                            <?php 
                                                if(isset($_SESSION["pesan_profil_file"])){
                                                echo $_SESSION["pesan_profil_file"];
                                                unset($_SESSION["pesan_profil_file"]);
                                                } 
                                            ?>
                                        </p>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Foto Profil</p>
                                                <div id="fotos">
                                                    <img id="tampil_foto" src="foto/<?= $foto ?>" alt="Cek Paketan Gs" class="card-img">
                                                </div>
                                        </div>
                                            <div class="col-md-9">
                                                <form action="process.php" method="POST" enctype="multipart/form-data">
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
                                                        <label></label>
                                                        <input id="imgInp" type="file" name="file">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info btn-sm" name="update_profil">Perbarui Profil</button>
                                                        <!-- <a href="#" onclick="ganti()" class="btn btn-danger btn-sm">Ganti Password</a> -->
                                                    </div>
                                                    <!-- <form runat="server">
                                                        <input type='file' id="imgInp" />
                                                        <img id="blah" src="#" alt="your image" />
                                                        </form>
                                                </form> -->
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



<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#tampil_foto').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

