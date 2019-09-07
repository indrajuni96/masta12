<?php
    if(isset($_GET['id'])){
        require_once 'config/database.php';
        $id = $_GET['id'];

        $sql  = "SELECT a.name , a.id_work, a.id_salary  FROM `nama` a INNER JOIN work b ON a.id_work = b.id INNER JOIN kategori C on a.id_salary = c.id WHERE a.id = $id";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
    }  
?>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="prosesEdit.php" method="POST">
        <input type="hidden" name="id" value="<?= $id?>">
        <div class="form-group">
          <input type="text" class="form-control" name="nama" placeholder="Name..." required value="<?= $data['name'];?>">
        </div>
        <div class="form-group">
          <select class="form-control" name="work" placeholder="Work..." required>
            <option value="">--pilih--</option>
            <?php
                                    $queryWork = $conn->query("SELECT * FROM work ");
                                    while($dataWork = $queryWork->fetch_array(MYSQLI_ASSOC)){
                                ?>
            <option <?php if($data['id_work'] == $dataWork['id'] ){echo "selected";} ?> value="<?= $dataWork['id']?>"><?= $dataWork['name']?></option>
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
            <option <?php if($data['id_salary'] == $dataSalary['id'] ){echo "selected";} ?> value="<?= $dataSalary['id']?>"><?= $dataSalary['salary']?></option>
            <?php       
                                    }
                                ?>
          </select>
        </div>
    
        <div class="modal-footer">
        <input type="submit" class="btn btn-warning" value="EDIT" name="simpan" style="color:white;">
            <!-- <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan"> -->
        </div>
      </form>
    </div>
  </div>
</div>