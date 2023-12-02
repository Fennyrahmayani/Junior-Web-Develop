<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <title>Form</title>
  <style>
    h1 {
      justify-content: center;
      display: flex;
    }
    </style>
</head>

<body>
  <div class="container">
    <div class="row" style="background-color: #afeeee;">
      <div class="col p-3" style="color: white">
        <h1>NILAI PESERTA PELATIHAN</h1>
      </div>
    </div>
    <br>
    <div class="row">
      <!--
        jangan lupa untuk mengganti name="" sesuai kebutuhan inputan
      -->
      <form action="#" method="post">
        <!--<form name="formInput" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()"> -->
          <!-- setiap inputan gunakan block ini -->
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nilai Praktik</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="nilaipraktik" >
            </div>
          </div>
          <!-- sampai sini -->
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nilai Pilihan Ganda</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="nilaipg">
            </div>
          </div>
          <!-- jika diminta menampilkan combo box dari array -->
          
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nilai Kehadiran</label>
              <div class="col-sm-4">
              <select name="nilaikehadiran" class="form-select">
                <option value="-">--- Silahkan Pilih Nilai---</option>
                <?php
                $nilaikehadiran = array('10','20','30','40','50','60','70','80','90','100');
                rsort($nilaikehadiran);
                foreach($nilaikehadiran as $key => $value){
                  echo "<option value='$value'>$value</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nilai Sikap</label>
              <div class="col-sm-4">
              <select name="nilaisikap" class="form-select">
                <option value="-">--- Silahkan Pilih Nilai---</option>
                <?php
                $nilaisikap = array('10','20','30','40','50','60','70','80','90','100');
                rsort($nilaisikap);
                foreach($nilaisikap as $key => $value){
                  echo "<option value='$value'>$value</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-sm-4 offset-md-2">
              <input type="submit" class="btn btn-primary" name="submit" value="kirim">
            </div>
          </div>
        </form>
      </div>
      <hr>

      <!-- jika diminta menampilkan isian dari data yang disubmit -->
      <?php
      if (isset($_POST['submit'])) {
        $proses = array(
          'nilaipraktik' => $_POST['nilaipraktik'],
          'nilaipg' => $_POST['nilaipg'],
          'nilaikehadiran' => $_POST['nilaikehadiran'],
          'nilaisikap' => $_POST['nilaisikap']
        );
        //////////////////////////////////////////////////////////////////////////////////////////////////
        echo "menggunakan text"."<br>";
        //perintah untuk membuka atau membuat file text
        $fh = fopen("myfile.txt", "w"); 
          //perulangan array
          foreach ($proses as $proses2) {
            //menulis nilai kedalam file text
            fwrite($fh, $proses2. "<br/>");
        } 
        //mengambil nilai pada file text
        $file = file_get_contents("myfile.txt");
        //menampilkan ke layar
        echo $file;
        //menutup file text
        fclose($fh); 
        ////////////////////////////////////////////////////////////////////////////////////////////////////
        echo "Menggunakan JSON<br>";
        //membuat data dengan format json
        $data = "data.json";
        //merubah nilai format php ke dalam format json
        $datanilai = json_encode($proses, JSON_PRETTY_PRINT);
        //menulis data ke dalam file json
        file_put_contents($data, $datanilai);
        
        //mengambil data dari file json
        $ambildata = file_get_contents ($data);
        //merubah nilai fomat json ke dalam format php
        $datanilai2 = json_decode($ambildata, true);
        //menampilkan kelayar
         echo $datanilai2['nilaipraktik']."<br/>";
         echo $datanilai2['nilaipg']."<br/>";
         echo $datanilai2['nilaikehadiran']."<br/>";
         echo $datanilai2['nilaisikap']."<br/>";
        ?>
       


      <?php } ?>



    </div>
    <script src="js/bootstrap.bundle.js"></script>

    <script>
      function validateForm() {
        
        if (document.forms["formInput"]["nilaipraktik"].value == "") {
          alert("nilaipraktik Tidak Boleh Kosong");
          document.forms["formInput"]["nilaipraktik"].focus();
          return false;
        }
        if (document.forms["formInput"]["nilaipg"].value == "") {
          alert("nilaipg Tidak Boleh Kosong");
          document.forms["formInput"]["nilaipg"].focus();
          return false;
        }
        if (document.forms["formInput"]["nilaikehadiran"].value == "") {
          alert("nilaikehadiran Tidak Boleh Kosong");
          document.forms["formInput"]["nilaikehadiran"].focus();
          return false;
        }
        if (document.forms["formInput"]["nilaisikap"].value == "") {
          alert("nilaisikap Tidak Boleh Kosong");
          document.forms["formInput"]["nilaisikap"].focus();
          return false;
        }
      }
      
      
    </script>

  </body>

  </html>
