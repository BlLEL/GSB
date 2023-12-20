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
    
    <!-- RAJOUTER OPTION DE CHOISIR TOUS LES VISITEURS ET TOUS LES MOIS-->
    
    <div class="col-md-4">
        <form action="index.php?uc=suivipaiement&action=afficheTableauFrais" 
              method="post" role="form">
            <div class="choix">
                <label for="leVisiteur" accesskey="n">Choisir le Visiteur : </label>
                <select id="leVisiteur" name="leVisiteur" class="form-control">
                    <option value="none">Choisir...</option>
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                            ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                    }
                    ?>    

                </select>
            </div>


            <div class="choix">
                <label for="leMois" accesskey="n">Mois : </label>
                <select id="leMois" name="leMois" class="form-control">
                    <option value="none">Choisir...</option>
                        <?php
                    $lesMois = $pdo->getLesMoisDisponibles($id);
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    ?>    

                </select>
            </div>
            
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
            <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
                   role="button">
            <a></a>
            <button type="button" class="btn btn-primary" href="index.php?uc=suivipaiement&action=miseEnPaiement" onclick="mettreEnPaiement()">Mettre en paiement</button>
            <button id="selectAllButton" type="button" onclick="selectAllCheckboxes()">Tout sélectionner</button>
        <button id="deselectAllButton" type="button" class="hide" onclick="deselectAllCheckboxes()">Tout déselectionner</button>
  <script>
            function toggleButtons() {
            // Récupérer les boutons
            var selectButton = document.getElementById('selectAllButton');
            var deselectButton = document.getElementById('deselectAllButton');

            // Inverser la visibilité des boutons
            selectButton.classList.toggle('hide');
            deselectButton.classList.toggle('hide');
        }

        function selectAllCheckboxes() {
            // Récupérer toutes les cases à cocher dans le formulaire
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            
            // Parcourir toutes les cases à cocher et les cocher
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });

            // Appeler la fonction pour basculer les boutons
            toggleButtons();
        }

        function deselectAllCheckboxes() {
            // Récupérer toutes les cases à cocher dans le formulaire
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            
            // Parcourir toutes les cases à cocher et les désélectionner
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });

            // Appeler la fonction pour basculer les boutons
            toggleButtons();
        }
        
        function mettreEnPaiement() {
            // Récupérer toutes les cases à cocher dans le formulaire
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            
            // Vérifier si au moins une case est cochée
            var auMoinsUneCochee = Array.from(checkboxes).some(function(checkbox) {
                return checkbox.checked;
            });

            // Afficher un message ou rediriger en conséquence
            if (auMoinsUneCochee) {
                window.location.href = 'index.php?uc=suivipaiement&action=miseEnPaiement';
                // Afficher un message sur la même page (vous pouvez personnaliser cela)
                alert('Tout est bon. La mise en paiement peut être effectuée.');
                // Rediriger vers une nouvelle page (décommenter la ligne suivante)
            } else {
                alert('Veuillez cocher au moins une case avant de mettre en paiement.');
            }
        }
        </script>
        </form>
        
    </div>
</div>