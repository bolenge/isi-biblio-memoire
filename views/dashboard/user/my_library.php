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
                                <a href="#" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Ajouter un livre </a>
                            </div>
                            <div class="col-lg-5 mt-2">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" value="" class="form-control d-inline-block"
                                            placeholder="Recherche..." style="width: 350px;">
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
                                    Début lecture
                                </th>
                                <th class="text-center">
                                    Pages lues
                                </th>
                                <th class="text-center">
                                    Fin lecture
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i < 7;$i++) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <img src="/public/img/books/semaine-4-heures.jpg" alt="Book cover" class="cover-book-list">
                                        <span>La chèvre de ma mère</span>
                                    </td>
                                    <td>Livre finance</td>
                                    <td class="text-center">20/10/2020</td>
                                    <td class="text-center">
                                        <span class="font-weight-bold">13 / 22</span>
                                    </td>
                                    <td class="text-center">
                                        ---
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                        <a href="/my-library/<?= $i ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>