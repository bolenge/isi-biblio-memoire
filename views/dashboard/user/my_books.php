<div class="content">
    <div class="row">
        <div class="col-lg-12">
            
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4 class="card-title">Liste de mes publications</h4>
                            </div>
                            <div class="col-lg-3">
                                <a href="/my-books/create" class="btn btn-primary float-right">Publier un livre <i class="fa fa-send"></i></a>
                            </div>
                            <div class="col-lg-5 mt-2">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" value="" class="form-control d-inline-block" placeholder="Recherche..." style="width: 350px;">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="nc-icon nc-zoom-split"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    Titre
                                </th>
                                <th>
                                    Catégorie
                                </th>
                                <th class="text-center">
                                    Date soumis
                                </th>
                                <th class="text-center">
                                    Etat publication
                                </th>
                                <th class="text-center">
                                    Mise en ligne
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                                <th class="text-center">
                                    Fichiers
                                </th>
                            </thead>
                            <tbody>
                                <?php if (!empty($books)) : ?>
                                    <?php $i = 1 ?>
                                    <?php foreach ($books as $book) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= sub_string($book->title, 20) ?></td>
                                            <td><?= $book->category ?></td>
                                            <td class="text-center"><?= date_format(new \DateTime($book->createdAt), 'd/m/Y') ?></td>
                                            <td class="text-center">
                                                <span class="text-<?= $book->statePub == 'true' ? "success" :  "warning" ?>"><?= $book->statePub == 'true' ? "Publié" :  "En attente" ?></span>
                                            </td>
                                            <td class="text-center">
                                                <?= $book->datePub ? date_format(new \DateTime($book->datePub), 'd/m/Y', ) :  "---" ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= $book->statePub == 'true' ? "/books/".$book->id :  "#" ?>" <?= $book->statePub != 'true' ? 'onclick="alertNoReadUnPubBook()"' :  "" ?>  class="disabled">Lire</a> |
                                                <a href="#" class="disabled">Détail</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="/<?= $book->fileDoc ?>" download="/<?= $book->fileDoc ?>" target="_blank">Docs <i class="fa fa-file-word-o"></i></a> |
                                                <a href="#">Audio <i class="fa fa-play-circle-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="lead text-center">Vous n'avez publié aucun livre</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>