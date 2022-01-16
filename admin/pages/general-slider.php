<div class="container m-auto">
    <div class="d-flex justify-content-between mt-3">
    <h5  class="slider-heading">Slider melumatlari</h5>
    <p class=""><a href="?page=add-slider" class="btn btn-danger text-end">Slider elave et</a></p>
    </div>
    
<table class="table table-bordered col-12 col-md-12 col-lg-10 mt-3 slider-table text-center mb-5" >
  <thead> 
    <tr>
      <th scope="col">Sekil</th>
      <th scope="col">Sira</th>
      <th scope="col">Durum</th>
      <th scope="col">Tarix</th>
      <th scope="col">Secimler</th>
    </tr>
  </thead>
  <tbody>
      <?php
            /* select slider data in database */
            $select = $db->prepare("SELECT * FROM slider");
            $select->execute(array());
            $show = $select->fetchALL(PDO::FETCH_ASSOC);

            foreach($show as $data){
                ?>
                <tr>
                    <td><img src="<?= "uploads/".$data["img"]; ?>" width="50" alt=""></td>
                    <td><?= $data["rank"]; ?></td>
                    <td><?= $data["isActive"]; ?></td>
                    <td><?= $data["created"]; ?></td>
                    <td>
                    <a href="?page=edit&id=<?= $data["id"]; ?>" class="btn btn-outline-primary">Duzenle</a> &nbsp
                    <a href="?page=delete&id=<?= $data["id"]; ?>" class="btn btn-outline-danger delete">Sil</a>
                    </td>
                </tr>
                <?php
            }
      ?>
  </tbody>
</table>
</div>
