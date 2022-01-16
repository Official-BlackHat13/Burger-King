<?php
    //select teams from database
    $select = $db->prepare("SELECT * FROM cheaf_team");
    $select->execute(array());
    $selectALL = $select->fetchALL(PDO::FETCH_ASSOC);
?>
    <!-- chef table -->
    <div class="container">
        <div class="row">
            <div class="col-11 m-auto">
                <table class="table table-bordered mt-3 mb-5 ml-xl-5 text-center">
                    <a href="?page=add-chef" class="btn btn-danger d-inline-block mt-5 float-end mb-3"><i class="fas fa-plus align-middle"></i> Yeni isci elave et</a>
                    <thead>
                        <tr>
                        <th scope="col">Iscinin sekili</th>
                        <th scope="col">Iscinin adi</th>
                        <th scope="col">Iscinin Vezifesi</th>
                        <th scope="col">Tarix</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Secimler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($selectALL as $data){
                                ?>
                                     <tr>
                                        <td><img src="<?= 'uploads/'.$data['team_img']; ?>" width="50" alt=""></td>
                                        <td><?= $data["team_person"]; ?></td>
                                        <td><?= $data["team_person_position"]; ?></td>
                                        <td><?= substr($data["team_date"], 0, -8); ?></td>
                                        <td>
                                            <label class="switch">
                                            <input type="checkbox" <?= $data["team_active"] == 1 ? "checked" : null; ?> id=<?= $data["team_ID"]; ?> class="aktivePassive">
                                            <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="?page=update-chef&id=<?= $data["team_ID"]; ?>" class="btn btn-primary">Duzenle</a> &nbsp;
                                            <input type="hidden" class="delete_chef_id" value="<?= $data['team_ID']; ?>">
                                            <input type="hidden" id="delete_chef_img" value="<?= $data["team_ID"]; ?>">
                                            <a href="javascript:void(0)" class="btn btn-danger delete_chef">Sil</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
       
       