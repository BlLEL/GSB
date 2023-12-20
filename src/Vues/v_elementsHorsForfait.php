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
                <form method="post" 
              action="index.php?uc=validerfrais&action=majHorsFraisForfait" 
              role="form">
            <?php foreach ($lesFraisHorsForfait as $unFraisHorsForfait) { ?>
                        <tr>
                            <td>
                                <input type="date" name="lesFraisHF[<?php echo $unFraisHorsForfait['id'] ?>][date]" size="10" value="<?php echo Outils\Utilitaires::dateFrancaisVersAnglais($unFraisHorsForfait['date']) ?>" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="lesFraisHF[<?php echo $unFraisHorsForfait['id'] ?>][libelle]" size="10" value="<?php echo htmlspecialchars($unFraisHorsForfait['libelle']) ?>" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="lesFraisHF[<?php echo $unFraisHorsForfait['id'] ?>][montant]" size="10" value="<?php echo $unFraisHorsForfait['montant'] ?>" class="form-control">
                            </td>
                            <td>
                                <input type="hidden" name="lesFraisHF[<?php echo $unFraisHorsForfait['id'] ?>][id]" value="<?php echo $unFraisHorsForfait['id'] ?>">
                                <button class="btn btn-success" type="submit">Corriger</button>
                                <button class="btn btn-danger" type="reset">Réinitialiser</button>
                                <button class="btn btn-warning" type="submit">Refuser</button>
                            </td>
                        </tr>
                    <?php } ?>
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