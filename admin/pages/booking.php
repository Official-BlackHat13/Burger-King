<div class="container-fluid">
  <div class="row">
      <div class="col-12 col-xl-9">
        <h4 class="mt-3 mb-5 booking-title">Rezerv eden sexslerin siyahisi</h4>
        <table class="table table-bordered table-hover mt-3 booking-table"">
          <thead>
            <tr>
              <th scope="col">Ad</th>
              <th scope="col">Email</th>
              <th scope="col">Telefon nomresi</th>
              <th scope="col">Tarix</th>
              <th scope="col">Zaman</th>
              <th scope="col">Qonaq sayi</th>
            </tr>
          </thead>
          <tbody>
            
                <?php
                    $select = $db->prepare("SELECT * FROM booking");
                    $select->execute(array());
                    $row = $select->fetchALL(PDO::FETCH_ASSOC);

                    foreach($row as $data){
                        ?>
                            <tr>
                            <th scope="row"><?= $data["person_name"]; ?></th>
                            <td><?= $data["person_email"]; ?></td>
                            <td><?= $data["person_mobile"]; ?></td>
                            <td><?= $data["person_date"]; ?></td>
                            <td><?= $data["person_time"]; ?></td>
                            <td><?= $data["person_guest"]; ?></td>
                            </tr>
                        <?php
                    }
                ?>
              
            
            
          </tbody>
        </table>
      </div>
  </div>
</div>
