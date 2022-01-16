    <?php
        $select = $db->prepare("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name ORDER BY article_id DESC");
        $select->execute([]);
        $list = $select->fetchALL(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row">
            <div class="text-end mt-5"><a href="?page=add-article" style="font-weight: bold;" class="btn btn-danger"><i class="fas fa-plus mr-1"></i>Meqale elave et</a></div>
            <div class="col-12 col-md-12 col-lg-10 col-xl-11 m-auto">
            <table class="table table-bordered blog-table mt-3 mb-5">
                <thead>
                    <tr>
                    <th scope="col">Meqalenin sekili</th>
                    <th scope="col">Meqalenin basliqi</th>
                    <th scope="col">Meqalenin Muellifi</th>
                    <th scope="col">Meqalenin tarixi</th>
                    <th scope="col">Meqalenin durumu</th>
                    <th scope="col">Secimler</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        foreach($list as $article){
                            ?>
                                <tr>
                                    <td><img src="<?= "uploads/".$article["article_img"]; ?>" width="50" alt=""></td>
                                    <td><?= $article["article_title"]; ?></td>
                                    <td><?= $article["article_author"]; ?></td>
                                    <td><?= substr($article["article_date"],0, -9); ?></td>
                                    <td>
                                        <label class="switch">
                                        <input type="checkbox" <?= $article["article_active"] == 1 ? "checked" : null; ?> id=<?= $article["article_id"]; ?> class="active_article">
                                        <span class="slider"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="?page=update-article&id=<?= $article["article_id"]; ?>" class="btn btn-primary">Duzenle</a>
                                        <input type="hidden" class="delete_article_id" value=<?= $article["article_id"]; ?>>
                                        <a href="javascript:void(0)" class="btn btn-danger delete-article">Sil</a>
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
    