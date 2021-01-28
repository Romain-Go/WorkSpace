<?php


if(!isset($_SESSION['identification']) || !$_SESSION['identification']){

	$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
	
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Identifiant :'));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, 'Entrez votre identifiant', ''));
	$formulaireConnexion->ajouterComposantTab();

	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :'));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
	$formulaireConnexion->ajouterComposantTab();

	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Se connecter'));
	$formulaireConnexion->ajouterComposantTab();
	
	
	
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerLienCliquable('Créer un compte','http://localhost/biorelai/index.php?bioMP=inscription'));
	$formulaireConnexion->ajouterComposantTab();
	
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
	$formulaireConnexion->ajouterComposantTab();
	
	$formulaireConnexion->creerFormulaire();
	
	
	$formulaireInscription = new Formulaire('post', 'index.php', 'fInscription', 'fInscription');
	
	$formulaireInscription->ajouterComposantLigne($formulaireInscription-> creerInputSubmit('submitInscp', 'submitInscp', 'Inscrivez vous'));
	$formulaireInscription->ajouterComposantTab();
	
	$formulaireInscription->creerFormulaire();
	
	

	require_once 'vue/vueConnexion.php' ;

}
else{
	$_SESSION['identification']=[];
	$_SESSION['MP']="accueil";
	header('location: index.php');
}