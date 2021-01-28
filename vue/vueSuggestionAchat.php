<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class='texteAccueil'>
			<div class='container'>
				<div class='row'>
					<div class='col-12'>
						<div class='table-responsive-xxl'>
						<table class='table table-light table-hover'>
							<th scope='col'>Numéro commande</th><th scope='col'>NNO</th><th scope='col'>Quantité</th><th scope='col'>Date au plus tard</th><th scope='col'>Date au plus tôt</th><th scope='col'>Site de livraison</th>
							<?php
							$formulaireSuggestionA->afficherFormulaire();
							$formulaireRechercheSA->afficherFormulaire();
								$i = 0;
								foreach ($_SESSION['listeSA']->getSuggestions() as $uneStation)
								{
									$lesSA[$i] =  "<tr><td>" . encode_id($_SESSION['listeSA']->getSuggestions()[$i]->getId()) . "</td><td>" . $_SESSION['listeSA']->getSuggestions()[$i]->getNNO() . "</td><td>" . $_SESSION['listeSA']->getSuggestions()[$i]->getQuantite() . "</td><td>" . $_SESSION['listeSA']->getSuggestions()[$i]->getDateTot() . "</td><td>" . $_SESSION['listeSA']->getSuggestions()[$i]->getDateTard() . "</td><td>" . $_SESSION['listeSA']->getSuggestions()[$i]->getSiteLivraison() . "</td></tr>";
									echo $lesSA[$i];
									$i++ ;
								}
							?>
							</table>
							<?php $formulaireSelectLimit->afficherFormulaire(); 
							$formulaireSelectPage->afficherFormulaire(); ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>