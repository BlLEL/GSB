<hr>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $date = $unFraisHorsForfait['date'];
                $montant = $unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id']; ?>           
                <tr>
                    <td> <?php echo $date ?></td>
                    <td> <?php echo $libelle ?></td>
                    <td><?php echo $montant ?></td>
                    <td>
                        <button class="btn btn-success" type="submit">Corriger</button>
                        <button class="btn btn-danger" type="reset">Réinitialiser</button>
                        <button class="btn btn-warning" type="warning">Refusé</button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>
    <form method="post" 
              action="index.php?uc=validerfrais&action=majNbJustificatifs" 
              role="form">
    <div class="choix">
                        <label for="nbJustificatifs">Nombre de justificatifs : </label>
                        <input type="text" id="nbJustificatifs" 
                               name="nbJustificatif"
                               size ="5cm"
                               value="<?php echo $nbJustificatifs ?>" 
                               class="form-control">
                    </div>
        <button class="btn btn-success" type="submit">Valider</button>
        <button class="btn btn-danger" type="reset">Réinitialiser</button>
    </form>
</div>