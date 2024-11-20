<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Penggajian</title>
  </head>
  <body>
    <?php
  if (isset($_POST['proses'])) {
    $no= $_POST['no'];
    $nama=$_POST['nama'];
    $unit=$_POST['unit'];
    $tanggal=$_POST['tanggalgaji'];

    //gaji
    $jabatan=$_POST['jabatan'];
    $lama=$_POST['lama'];
    $status=$_POST['status'];

    //potongan
    $bpjs=$_POST['bpjs'];
    $pinjaman=$_POST['pinjaman'];
    $cicilan=$_POST['cicilan'];
    $infaq=$_POST['infaq'];

    class gajiassalaam{
      public $gajikotor;
      public $gajibersih;
      public function  identitas($no,$nama,$unit,$tanggal){
        ?>
          <center>
            <div class="card" width="50%">
            <div class="card-header bg-success text-white">
            <h2>Struk Gaji</h2>
            <h5><?php echo "$nama" ?></h5>
            </div>
        <div class="card-body" style="color:blue; font-family: arial;">
        <table>
            <tr>
                <td>No</td>
                <td>:</td>
                <td><?php echo $no ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $nama ?></td>
            </tr>
            <tr>
                <td>Unit Pendidikan</td>
                <td>:</td>
                <td><?php echo $unit ?></td>
            </tr>
            <tr>
                <td>Tanggal Gaji</td>
                <td>:</td>
                <td><?php echo $tanggal ?></td>
            </tr>

            


        <?php
      }
      public function gaji($jabatan,$lama,$status){
        switch ($jabatan) {
          case 'Kepala Sekolah':
              $gaji=10000000;
              break;
              case 'Wakasek':
                  $gaji=7500000;
                  break;
                  case 'Guru':
                      $gaji=5000000;
                      break;
                      case 'OB':
                          $gaji=2500000;
                          break;
          
          default:
              # code...
              break;
      }
  
        ?>
                <tr>
                  <td colspan="3" align="center">
                  <h3>Gaji</h3>
                  </td>
                </tr>
        
        <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $jabatan ?></td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td>:</td>
                <td><?php echo "Rp".number_format  ($gaji) ?></td>
            </tr>
            <tr>
                <td>Lama Kerja</td>
                <td>:</td>
                <td><?php echo "$lama tahun"; ?></td>
            </tr>
            <tr>
                <td>Status Kerja</td>
                <td>:</td>
                <td><?php echo $status ?></td>
            </tr>
            <tr>
                <td>Bonus</td>
                <td>:</td>
                <td><?php 
                if ($status == "Tetap") {
                    $bonus=500000;
                    echo "Rp".number_format ($bonus);
                }else {
                    $bonus=0;
                    echo "-";
                } 
                ?></td>
            </tr>
            <tr>
                <td>Gaji Kotor</td>
                <td>:</td>
                <td><?php 
                $this->gajikotor=$gaji+$bonus;
                echo "Rp".number_format ($this->gajikotor);

                ?></td>
            </tr>
            
        
        <?php
      }
      public function potongan($bpjs,$pinjaman,$cicilan,$infaq){
        ?>
                <tr>
                  <td colspan="3" align="center">
                    <h3>Potongan</h3>
      </td>
      </tr>
        
            <tr>
                <td>BPJS</td>
                <td>:</td>
                <td><?php echo "Rp".number_format ($bpjs); ?></td>
            </tr>
            <tr>
                <td>Pinjaman</td>
                <td>:</td>
                <td><?php echo "Rp".number_format ($pinjaman); ?></td>
            </tr>
            <tr>
                <td>Tabungan</td>
                <td>:</td>
                <td><?php echo "Rp".number_format ($cicilan); ?></td>
            </tr>
            <tr>
                <td>Lainnya</td>
                <td>:</td>
                <td><?php echo "Rp".number_format ($infaq); ?></td>
            </tr>
            <tr>
                <td>Total Potongan</td>
                <td>:</td>
                <td><?php
                $totalpotong=$bpjs+$pinjaman+$cicilan+$infaq;
                echo "Rp".number_format ($totalpotong);
                ?></td>
            </tr>
            
            <tr>
                  <td colspan="3" align="center">
                  <h3>Total</h3>
                  </td>
                </tr>
 
            
                <tr>
                    <td>Gaji Bersih</td>
                    <td>:</td>
                    <td>
                        <?php
                            $this->gajibersih=$this->gajikotor-$totalpotong;
                            echo "Rp".number_format ($this->gajibersih);
                        ?>
                    </td>
                </tr>
            </table>
            </div>
            </div>
        </center>
        <?php
      }
    }
    $gaji=new gajiassalaam();

    echo $gaji->identitas($no,$nama,$unit,$tanggal)."<br>";
    echo $gaji->gaji($jabatan,$lama,$status)."<br>";
    echo $gaji->potongan($bpjs,$pinjaman,$cicilan,$infaq);
    
    ?>

<?php
  }
    ?>




  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>