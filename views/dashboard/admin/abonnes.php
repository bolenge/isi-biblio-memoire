<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h3>Liste des abonnés</h3><br>

            <table id="table-books-published" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Type d'abonnement</th>
                        <th>Montant payé</th>
                        <th>Date d'abonnement</th>
                        <th>Date fin d'abon.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    <?php while ($id < 10) : ?>
                       <tr>
                          <th><?= $id ?></th>
                          <th>Batuta</th>
                          <th>Nkuma</th>
                          <th>Sael</th>
                          <th>M</th>
                          <th>Premium</th>
                          <th>30 $</th>
                          <th>12/09/2021</th>
                          <th>10/10/2021</th>
                      </tr>
                      <?php $id++; ?>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
    <!-- /.col-xs-12 -->
</div>