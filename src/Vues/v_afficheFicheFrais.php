<?php
/**
 * Vue État de Frais
 *
 * PHP Version 8
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 * @link      https://getbootstrap.com/docs/3.3/ Documentation Bootstrap v3
 * 
 */
?>

<div class="row">

    <div class="col-md-4">
        <form action="index.php?uc=validerfrais&action=ValidationFiches" 
              method="post" role="form">
            <div class="form-group2">
                <label for="leVisiteur" accesskey="n">Choisir le Visiteur : </label>
                <select id="leVisiteur" name="leVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        if ($id == $visiteursASelectionner) {
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>


            <div class="form-group2">
                <label for="leMois" accesskey="n">Mois : </label>
                <select id="leMois" name="leMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numMois = $unMois['numMois'];
                        $numAnnee = $unMois['numAnnee'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
        </form>

    </div>

</div>
<hr>
<h2>Valider la fiche de frais</h2>
<h3>Eléments forfaitisés</h3>
<div class="col-md-4">
    <form action="index.php?uc=validerfrais&action=ValidationFiches"
          <form method="post" 
          role="form">
            <fieldset>       
                <div class="form-group">
                    <label for="idFrais">Forfait Etape</label>
                    <input type="text" id="idFrais" 
                           name="lesFrais[ETP]"
                           size="10" maxlength="5" 
                           value="<?php
                           foreach ($lesFraisForfait as $unFraisForfait) {
                               if ($unFraisForfait['id'] == ['ETP']) {
                                   echo $unFraisForfait['montant'];
                               }
                           }
                           ?>"  
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="idFrais">Frais Kilométrique</label>
                    <input type="text" id="idFrais" 
                           name="lesFrais[KM]"
                           size="10" maxlength="5" 
                           value="<?php
                           foreach ($lesFraisForfait as $unFraisForfait) {
                               if ($unFraisForfait[0] == ['KM']) {
                                   echo $unFraisForfait['montant'];
                           }}
                           var_dump($unFraisForfait['montant']);
                           ?>"  
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="idFrais">Nuitée Hôtel</label>
                    <input type="text" id="idFrais" 
                           name="lesFrais[NUI]"
                           size="10" maxlength="5" 
                           value="<?php
                           if ($unFraisForfait[0] == ['NUI']) {
                                   echo $unFraisForfait['montant'];
                           }
                           ?>"  
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="idFrais">Repas Restaurant</label>
                    <input type="text" id="idFrais" 
                           name="lesFrais[REP]"
                           size="10" maxlength="5" 
                           value="<?php
                           if ($unFraisForfait[0] == ['REP']) {
                                   echo $unFraisForfait['montant'];
                           }
                           ?>"  
                           class="form-control">
                </div>
                <button class="btn btn-success" type="submit">Corriger</button>
                <button class="btn btn-danger" type="reset">Réinitialiser</button>
            </fieldset>
        </form>
    </form>
</div>
<?php
/**
 * Vue État de Frais
 *
 * PHP Version 8
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 * @link      https://getbootstrap.com/docs/3.3/ Documentation Bootstrap v3
 * 
 */
?>
<hr>
<!-- <div class="panel panel-primary">
    <div class="panel-heading">Fiche de frais du mois 
<?php echo $numMois . '-' . $numAnnee ?> : </div>
    <div class="panel-body">
        <strong><u>Etat :</u></strong> <?php echo $libEtat ?>
        depuis le <?php echo $dateModif ?> <br> 
        <strong><u>Montant validé :</u></strong> <?php echo $montantValide ?>
    </div>
</div> -->
<!--
<div class="panel panel-info">
    <div class="panel-heading">Eléments forfaitisés</div>
    <table class="table table-bordered table-responsive">
        <tr>
<?php
foreach ($lesFraisForfait as $unFraisForfait) {
    $libelle = $unFraisForfait['libelle'];
    ?>
                                <th> <?php echo htmlspecialchars($libelle) ?></th>
    <?php
}
?>
        </tr>
        <tr>
<?php
foreach ($lesFraisForfait as $unFraisForfait) {
    $quantite = $unFraisForfait['quantite'];
    ?>
                                <td class="qteForfait"><?php echo $quantite ?> </td>
    <?php
}
?>
        </tr>
    </table>
</div>
-->

<div class="panel panel-info">
    <div class="panel-heading">Descriptif des éléments hors forfait 
        <?php
        foreach ($lesFraisForfait as $unFraisForfait) {
            echo $infofichefrais['nbJustificatifs'];
        }
        ?> justificatifs reçus</div>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>                
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];
            ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
            </tr>
            <?php
        }
        ?>

    </table>
</div>