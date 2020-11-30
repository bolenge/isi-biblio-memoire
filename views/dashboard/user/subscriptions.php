<div class="content">
    <div class="row">
        <div class="col-lg-12">

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/subscribe" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Se réabonner</a>
                    <h4 class="card-title">Mes abonnements</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    Type d'abonnement
                                </th>
                                <th class="text-center">
                                    Prix
                                </th>
                                <th class="text-center">
                                    Nombre de jour
                                </th>
                                <th class="text-center">
                                    Date début
                                </th>
                                <th class="text-center">
                                    Date fin
                                </th>
                                <th class="text-center">
                                    Etat
                                </th>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i < 3;$i++) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>Premium</td>
                                    <td class="text-center">30 $</td>
                                    <td class="text-center">30 Jours</td>
                                    <td class="text-center">20/10/2020</td>
                                    <td class="text-center">19/11/2020</td>
                                    <td class="text-center">
                                        <span class="text-success">Actif</span>
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