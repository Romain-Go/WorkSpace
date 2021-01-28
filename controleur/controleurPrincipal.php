<?php

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}


if(isset($_GET['suggestionAchatMenu'])){
	$_SESSION['suggestionAchatMenu']= $_GET['suggestionAchatMenu'];
}
else
{
	if(!isset($_SESSION['suggestionAchatMenu'])){
		$_SESSION['suggestionAchatMenu']="accueil";
	}
}

$messageErreurConnexion='';

if(isset($_POST['submitConnex'])){
    
    $_SESSION['login'] = $_POST["login"];
    $_SESSION['mdp'] = $_POST["mdp"];
    $unUser = new Utilisateur($_SESSION['login'], $_SESSION['mdp']);
    $_SESSION['identification']=UtilisateurDAO::verification($unUser);

    if($_SESSION['identification']){
        $_SESSION['suggestionAchatMenu']="accueil";
    }else{
        $messageErreurConnexion='mot de passe incorrect ou login incorrect';
        $_SESSION['login'] = null;
        $_SESSION['mdp'] = null;
    }
}

if(isset($_POST['submitInscp'])){
    $_SESSION['suggestionAchatMenu']="inscription";
}

if(isset($_POST['retour'])){
    $_SESSION['suggestionAchatMenu']="connexion";
}

if(isset($_POST['submitAjoutSA'])){
    SuggestionAchatDAO::ajoutSuggestionAchat();
}


$suggestionAchatMenu = new Menu("suggestionAchatMenu");


// if(isset($_SESSION['login']) == null){
// }else {
$suggestionAchatMenu->ajouterComposant($suggestionAchatMenu->creerItemLien("accueil", "Accueil"));
$suggestionAchatMenu->ajouterComposant($suggestionAchatMenu->creerItemLien("suggestionachat", "Suggestions achats"));
$suggestionAchatMenu->ajouterComposant($suggestionAchatMenu->creerItemLien("connexion", "Connexion"));


// }

$menuPrincipal = $suggestionAchatMenu->creerMenu($_SESSION['suggestionAchatMenu'],'suggestionAchatMenu');

include_once dispatcher::dispatch($_SESSION['suggestionAchatMenu']);
