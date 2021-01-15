<?php
    include "conn.php";
	//Get Data Kabupaten
	$curl = curl_init();	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: 34ba8c898e9b6129bb68fe4528978c29",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

    curl_close($curl);
    // echo json_encode($response, true);

	// echo "<label>Kota Asal</label><br>";
	// echo "<select name='asal' id='asal'>";
	// echo "<option>Pilih Kota Asal</option>";
        $data = json_decode($response, true);
        
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
		    // echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
            // echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_id']."</option>";
            $data1 = $data['rajaongkir']['results'][1]['city_name'];
            $data2 = $data['rajaongkir']['results'][2]['city_name'];
            $data3 = $data['rajaongkir']['results'][3]['city_name'];
            $data4 = $data['rajaongkir']['results'][4]['city_name'];
		}
    // echo "</select><br><br><br>";

    $qrys_hitung = mysqli_query($conn, "SELECT id_resi FROM tb_resi");
    $hitung = [];
    while($row_hitung = mysqli_fetch_array($qrys_hitung)){
        $hitung[] = $row_hitung;
    }

    echo $nomor = count($hitung);
    
?>
<form action="" method="" class="form">
    <input type="hidden" readonly id="nomor" name="nomor" value="<?= $nomor ?>">
    <input type="hidden" readonly id="pengirim" name="pengirim" value="<?= $data1 ?>">
    <input type="hidden" readonly id="penerima" name="penerima" value="<?php
        if(isset($_SESSION["name"])) {
            echo $_SESSION["name"];
        }else{
            echo "Cek Paketan";
        }
    ?>">
    <input type="hidden" readonly id="tgl_penerimaan" name="tgl_penerimaan" value="<?= date("d-m-Y") ?>">
    <input type="hidden" readonly id="no_pelanggan" name="no_pelanggan" value="<?= $data4 ?>">
</form>

<!-- <input type="text" id="barcode" autofocus> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
<script src="assets/jquery.js"></script>

<script>
$(document).ready(function(){



    var pengirim = $('#pengirim').val()
    var penerima = $('#penerima').val()
    var tgl_penerimaan = $('#tgl_penerimaan').val()
    var no_pelanggan = $('#no_pelanggan').val()
    var data = { penerima : penerima, pengirim : pengirim, tgl_penerimaan : tgl_penerimaan, no_pelanggan : no_pelanggan }
    $('#barcode').keyup(function() {
        //alert(data)
        $.ajax({
            url: 'insert_api.php',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function(data) {
                console.log(data)
               // alert(data);
                var i = $("#nomor").val();
                var nomor = parseInt(i) + 1
                var html = "<tr><td>"+ nomor +"</td><td>" + data.pengirim + "</td><td>" + data.penerima + "</td><td>" + data.tgl_penerimaan + "</td><td>" + data.no_pelanggan + "</td><td><span class='btn btn-danger btn-sm'>Belum Diambil</span></td></tr>"
                // console.log(data.pengirim)
                $("#add").append(html)
                $('#barcode').val("")
            }
        })
    })
})
</script>
    
</body>
</html>