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
 */

?>
        <link href="./styles/bootstrap/bootstrap-comptable.css" rel="stylesheet" type="text/css"/>

<hr>

<div class="row">
    
    <div class="col-md-4">
        <form action="index.php?uc=etatFrais&action=voirEtatFrais" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstMois" accesskey="n">Choisir le Visiteur : </label>
                <select id="lstMois" name="lstMois" class="form-control">
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


            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $id = $unMois['mois'];
                        $prenom = $unMois['numAnnee'];
                        $nom = $unMois['numMois'];
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
           
        </form>
        
    </div>
    
</div>
    <h2>Valider la fiche de frais</h2>
<h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              role="form">
            <fieldset>       
                                    <div class="form-group">
                        <label for="idFrais">Forfait Etape</label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[ETP]"
                               size="10" maxlength="5" 
                               value="0" 
                               class="form-control">
                    </div>
                                        <div class="form-group">
                        <label for="idFrais">Frais Kilométrique</label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[KM]"
                               size="10" maxlength="5" 
                               value="0" 
                               class="form-control">
                    </div>
                                        <div class="form-group">
                        <label for="idFrais">Nuitée Hôtel</label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[NUI]"
                               size="10" maxlength="5" 
                               value="0" 
                               class="form-control">
                    </div>
                                        <div class="form-group">
                        <label for="idFrais">Repas Restaurant</label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[REP]"
                               size="10" maxlength="5" 
                               value="0" 
                               class="form-control">
                    </div>
                                    <button class="btn btn-success" type="submit">Corriger</button>
                <button class="btn btn-danger" type="reset">Réinitialiser</button>
            </fieldset>
        </form>
    </div>
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
                        
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>


<!--
<div class="panel panel-info">
    <div class="panel-heading" style="color: white; background-color: #df6900 ">Descriptif des éléments hors forfait 
    <table class="table table-bordered table-responsive" style="color : black; background-color: white;">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>                
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant']; ?>
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
-->