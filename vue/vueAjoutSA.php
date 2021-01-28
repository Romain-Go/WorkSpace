<div class="conteneur">
	<head>
		<style type="text/css">
			@import url(../styles/ajoutSA.css);
		</style>
		<title>Ajout SA</title>
	</head>
	<header>
		<?php include 'haut.php' ;?>
		<nav class='menuPrincipal'>
		<ul class="suggestionAchatMenu"><li><a href="/SuggestionAchat/index.php?suggestionAchatMenu=accueil"><span>Accueil</span></a></li></ul>
		</nav>
	</header>
	<main>
		<div class='textAccueil'>
			<h1>Ajouter une suggestion d'achat</h1>
			<?php
				include '../controleur/controleurAjoutSA.php';
				// var_dump($formulaireAjoutSA);
				$formulaireAjoutSA->afficherFormulaire();
			?>
		</div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>