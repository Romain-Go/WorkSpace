<?php


$formulaireInscriptionInfoPerso = new Formulaire('post', 'index.php', 'fdemandeInscri', 'fdemandeInscri');

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('nom', 'Nom :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputTexte('nom','nom', '',1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('prenom', 'Prenom :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputTexte('prenom','prenom', '',1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('rue', 'Rue :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputTexte('rue','rue', '',1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('ville', 'Ville :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputTexte('ville','ville', '',1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('codePostal', 'Code Postal :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputTexte('codePostal','codePostal', '',1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('login', 'Login :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputTexte('login','login', '',1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerLabelFor('mdp', 'Mot De Passe :'), 1);
$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputMdp('mdp','mdp', 1,0,0), 1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputSubmit('enregistrer','enregistrer','Enregistrer'),1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->ajouterComposantLigne($formulaireInscriptionInfoPerso->creerInputSubmit('retour','retour','Retour'),1);
$formulaireInscriptionInfoPerso->ajouterComposantTab();

$formulaireInscriptionInfoPerso->creerFormulaire();







if(isset($_POST['retour'])){
    $_SESSION['bioMP']="connexion";
}

if(isset($_POST['enregistrer'])){
    try{
        utilisateurDAO::inscription();
        //echo "<script>alert('Creation utilisateur valid�e');</script>";
        $_SESSION['bioMP']="accueil";
    }catch(Exception $e){
        echo "Erreur : " . $e->getMessage();
        echo "<script>alert('Erreur dans l'enregistrement');</script>";
    }
}


//header("Refresh:0");
require_once 'vue/vueInscription.php' ;


