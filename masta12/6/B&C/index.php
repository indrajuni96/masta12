<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Indra Juniyanto</title>

  <!-- Img -->
  <link rel="shortcut icon" href="asset/gambar/1.png">

  <!-- Bootstrap -->
  <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- SweetAlert 2 -->
  <script src="asset/sweetalert/sweetalert2.all.js"></script>
  <!-- <script src="asset/sweetalert/sweetalert2.min.js"></script>
<link rel="stylesheet" href="asset/sweetalert/sweetalert2.min.css"> -->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php
        require_once 'config/database.php';

    //     echo "<script> 
    //     Swal.fire({
    //       type: 'error',
    //       title: 'Oops...',
    //       text: 'Something went wrong!'
    //     })
    // </script>";
    // echo "<script>Swal.fire('Data $nama telah berhasil dihapus','','success') </script>";
    ?>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a href="https://www.arkademy.com/"><img src="asset/gambar/1.png" alt="" width="150px" class="pr-5"></a>
    <h5 class="my-0 mr-md-auto font-weight-normal">ARKADEMY BOOTCAMP</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <!-- <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a> -->
    </nav>
    <!-- <a class="btn btn-outline-primary" href="#">Sign up</a> -->
  </div>

  <div class="container mt-5">
    <div style="margin-left:1050px;margin-top:170px;">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalADD" style="color:white;">
        ADD
      </button>
    </div>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Work</th>
          <th scope="col">Salary</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
                    $sql = $conn->query("SELECT a.id, a.name as nama, b.name, c.salary FROM `nama` a INNER JOIN work b ON a.id_work = b.id INNER JOIN kategori C on a.id_salary = c.id");
                        while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
                        $get_id = $data['id'];
                ?>
        <tr>
          <td><?= $data['nama'];?></td>
          <td><?= $data['name'];?></td>
          <td><?= $data['salary'];?></td>
          <td width="15%">  
            <a href="prosesDelete.php?id=<?= $get_id;?>&nama=<?= $data['nama']; ?>" class="btn btn-danger tombol-hapus"> <img src="asset/gambar/delete.png" alt="delete" width="20px"></a>
            <a href="#" data-toggle='tooltip' data-placement='top' class="btn btn-success openModalEdit" id="<?= $get_id; ?>"><img src="asset/gambar/edit.png" alt="edit" width="20px"></a>            
          </td>
        </tr>
        <?php
                  }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Modal ADD -->  
    <div class="modal fade" id="ModalADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="prosesTambah.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Name..." required>
              </div>
              <div class="form-group">
                <select class="form-control" name="work" placeholder="Work..." required>
                  <option value="">--pilih--</option>
                  <?php
                                    $queryWork = $conn->query("SELECT * FROM work ");
                                    while($dataWork = $queryWork->fetch_array(MYSQLI_ASSOC)){
                                ?>
                  <option value="<?= $dataWork['id']?>"><?= $dataWork['name']?></option>
                  <?php       
                                    }
                                ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="salary" placeholder="Salary..." required>
                  <option value="">--pilih--</option>
                  <?php
                                    $querySalary = $conn->query("SELECT * FROM kategori ");
                                    while($dataSalary = $querySalary->fetch_array(MYSQLI_ASSOC)){
                                ?>
                  <option value="<?= $dataSalary['id']?>"><?= $dataSalary['salary']?></option>
                  <?php       
                                    }
                                ?>
                </select>
              </div>
          </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-warning" value="ADD" name="submit" style="color:white;">
            </div>
            </form>
        </div>
      </div>
    </div>

  <!-- END MODAL ADD -->

   <!-- Modal EDIT -->  
   <div class="modal fade" id="ModalEDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="prosesUbah.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Name..." required>
              </div>
              <div class="form-group">
                <select class="form-control" name="work" placeholder="Work..." required>
                  <option value="">--pilih--</option>
                  <?php
                                    $queryWork = $conn->query("SELECT * FROM work ");
                                    while($dataWork = $queryWork->fetch_array(MYSQLI_ASSOC)){
                                ?>
                  <option value="<?= $dataWork['id']?>"><?= $dataWork['name']?></option>
                  <?php       
                                    }
                                ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="salary" placeholder="Salary..." required>
                  <option value="">--pilih--</option>
                  <?php
                                    $querySalary = $conn->query("SELECT * FROM kategori ");
                                    while($dataSalary = $querySalary->fetch_array(MYSQLI_ASSOC)){
                                ?>
                  <option value="<?= $dataSalary['id']?>"><?= $dataSalary['salary']?></option>
                  <?php       
                                    }
                                ?>
                </select>
              </div>
          </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-warning" value="ADD" name="submit">
            </div>
            </form>
        </div>
      </div>
   </div>
  <!-- END MODAL EDIT -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="asset/bootstrap/js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="asset/bootstrap/js/bootstrap.min.js"></script>

  <!-- Javascript Manual -->
  <!-- Open Modal Edit -->
  <script type="text/javascript">
       $(document).ready(function () {
       $(".openModalEdit").click(function(e) {
          var ids = $(this).attr("id");
           $.ajax({ 
                 url: "formEdit.php",
                 type: "GET", 
                 data : {id: ids},
                 success: function (ajaxData){
                   $("#ModalEDIT").html(ajaxData);
                   $("#ModalEDIT").modal('show',{backdrop: 'true'});
                 }
               });
            });
          });
    </script>
    <?php

    if(isset($_SESSION['nama'])){

      $nama = $_SESSION['nama'];

      echo "<script> 
        Swal.fire({
          showCloseButton: true,
          showConfirmButton: false,
          type: 'success',
          title: '',
          text: 'Data $nama telah berhasil dihapus'
        })
    </script>";

      unset($_SESSION['nama']);
    }    
    ?>
</body>

</html>