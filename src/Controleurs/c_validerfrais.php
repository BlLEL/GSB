<?php

/**
 * Gestion des frais
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
 */

use Outils\Utilitaires;

$idVisiteur = $_SESSION['idVisiteur'];
$mois = Utilitaires::getMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
switch ($action) {
    case 'AfficheFicheFrais':
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
        $moisASelectionner = $leMois;
        include PATH_VIEWS . 'v_listeMois.php';
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = Utilitaires::dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        include PATH_VIEWS . 'v_afficheFicheFrais.php';
    case 'saisirFrais':
        if ($pdo->estPremierFraisMois($idVisiteur, $mois)) {
            $pdo->creeNouvellesLignesFrais($idVisiteur, $mois);
        }
        break;
    case 'validerMajFraisForfait':
        $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
        $montantHorsForfait = $pdo->getSommeMontantFraisHorsForfait($leVisiteur,$leMois);
        if (Utilitaires::lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);
        } else {
            Utilitaires::ajouterErreur('Les valeurs des frais doivent être numériques');
            include PATH_VIEWS . 'v_erreurs.php';
        }
        break;
    case 'validerCreationFrais':
        $dateFrais = Utilitaires::dateAnglaisVersFrancais(
            filter_input(INPUT_POST, 'dateFrais', FILTER_SANITIZE_FULL_SPECIAL_CHARS)
        );
        $libelle = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $montant = filter_input(INPUT_POST, 'montant', FILTER_VALIDATE_FLOAT);
        Utilitaires::valideInfosFrais($dateFrais, $libelle, $montant);
        if (Utilitaires::nbErreurs() != 0) {
            include PATH_VIEWS . 'v_erreurs.php';
        } else {
            $pdo->creeNouveauFraisHorsForfait($idVisiteur, $mois, $libelle, $dateFrais, $montant);
        }
        break;
    case 'supprimerFrais':
        $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pdo->supprimerFraisHorsForfait($idFrais);
        break;
    case 'ValidationFiches':
        $lesVisiteurs = $pdo->getListeVisiteur();
        $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
        $lesCles = array_keys($lesVisiteurs);
        $visiteursASelectionner = $lesCles[0];
        $lesClesBis = array_keys($lesMois);
        $moisASelectionner = $lesClesBis[0];
        $leMois = filter_input(INPUT_POST, 'leMois', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $leVisiteur = filter_input(INPUT_POST, 'leVisiteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $infofichefrais = $pdo->getLesInfosFicheFrais($leVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $unFraisForfait = $pdo->getLesValeursFrais();
        
        include PATH_VIEWS . 'v_afficheFicheFrais.php';
        break;
    case 'validerfrais':
        $lesVisiteurs = $pdo->getListeVisiteur();
        $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
        // Afin de sélectionner par défaut le dernier mois dans la zone de liste
        // on demande toutes les clés, et on prend la première,
        // les mois étant triés décroissants
        $lesCles = array_keys($lesVisiteurs);
        $visiteursASelectionner = $lesCles[0];
        $lesClesBis = array_keys($lesMois);
        $moisASelectionner = $lesClesBis[0];
        include PATH_VIEWS . 'v_afficheFicheFrais.php';
        break;
    

}
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
//require PATH_VIEWS . 'v_listeFraisForfait.php';
//require PATH_VIEWS . 'v_listeFraisHorsForfait.php';

