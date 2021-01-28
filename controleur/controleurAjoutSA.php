<?php
require_once '../lib/formulaire.php';

$formulaireAjoutSA = new Formulaire('post', '../index.php', 'fAjoutSA', 'fAjoutSA');

$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerLabel('NNO : '));
$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerInputTexte('nno', 'nno', '', 1, 'Entrez le NNO', ''));
$formulaireAjoutSA->ajouterComposantTab();

$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerLabel('Quantité : '));
$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerInputTexte('quantite', 'quantite', '',  1, 'Entrez la quantite', ''));
$formulaireAjoutSA->ajouterComposantTab();

$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerLabel('Date au plus tôt : '));
$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerInputDate('dateTot', '', '2020-01-01', '2030-12-31'));
$formulaireAjoutSA->ajouterComposantTab();

$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerLabel('Date au plus tard : '));
$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerInputDate('dateTard', '', '2020-01-01', '2030-12-31'));
$formulaireAjoutSA->ajouterComposantTab();

$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerLabel('Site de livraison : '));
$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA->creerInputTexte('siteLivraison', 'siteLivraison', '',  1, 'Entrez le site de livraison', ''));
$formulaireAjoutSA->ajouterComposantTab();

$formulaireAjoutSA->ajouterComposantLigne($formulaireAjoutSA-> creerInputSubmit('submitAjoutSA', 'submitAjoutSA', 'Ajouter'));
$formulaireAjoutSA->ajouterComposantTab();

$formulaireAjoutSA->creerFormulaire();

// if(isset($_POST['submitAjoutSA'])){
//     $_SESSION['MenuPrincipal']="AjoutSA";
// }

// require_once '../vue/vueAjoutSA.php';
?>