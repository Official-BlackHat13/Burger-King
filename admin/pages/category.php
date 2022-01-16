<div class="container">
    <div class="row">
    <div class="text-end mt-5"><a href="?page=add-category" class="btn btn-danger"><i class="fas fa-plus mr-1"></i>Kategoriya elave et</a></div>
        <div class="col-lg-10 col-12">
        <table class="table table-bordered blog-table mt-3 mb-5 text-center">
                <thead>
                    <tr>
                    <th scope="col">Kategoriya adi</th>
                    <th scope="col">Kategoriya sirasi</th>
                    <th scope="col">Kategoriya durumu</th>
                    <th scope="col">Secimler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $show = selectCategory();
                        foreach($show as $data){
                            ?>
                                <tr>
                                <td><?= $data["category_name"]; ?></td>
                                <td><?= $data["category_num"]; ?></td>
                                <td>
                                <label class="switch">
                                    <input type="checkbox" <?= $data["category_active"] == 1 ? "checked" : null; ?> id=<?= $data["category_id"]; ?> class="category-active">
                                    <span class="slider"></span>
                                </label>
                                </td>
                                <td>
                                    <a href="?page=update-category&id=<?= $data["category_id"]; ?>" class="btn btn-primary">Duzenle</a>
                                    <input type="hidden" class="category_id" value=<?= $data["category_id"]; ?>>
                                    <a href="javascript:void(0)" class="btn btn-danger delete-category">Sil</a>
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