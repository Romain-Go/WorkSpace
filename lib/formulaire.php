<?php
class Formulaire{
	private $method;
	private $action;
	private $nom;
	private $style;
	private $formulaireToPrint;
	private $enctype;
	
	private $ligneComposants = array();
	private $tabComposants = array();
	
	public function __construct($uneMethode, $uneAction = null , $unNom,$unStyle,$unEnctype = null){
		$this->method = $uneMethode;
		$this->action =$uneAction;
		$this->nom = $unNom;
		$this->style = $unStyle;
		$this->enctype = $unEnctype;
	}
	
	
	public function concactComposants($unComposant , $autreComposant ){
		$unComposant .=  $autreComposant;
		return $unComposant ;
	}
	
	public function ajouterComposantLigne($unComposant){
		$this->ligneComposants[] = $unComposant;
	}
	
	public function ajouterComposantTab(){
		$this->tabComposants[] = $this->ligneComposants;
		$this->ligneComposants = array();
	}
	
	public function creerLabel($unLabel){
		$composant = "<label>" . $unLabel . "</label>";
		return $composant;
	}
	public function creerLabelDiv($unLabel){
		$composant = "<div class= 'row'><div class='col-3 col-sm'><label>" . $unLabel . "</label></div>";
		return $composant;
	}
	public function creerLienCliquable($unLabel, $href){
	    $composant = "<a href = " . $href . ">" . $unLabel . "</a>";
	    return $composant;
	}
	
	public function creerMessage($unMessage){
		$composant = "<label class='message'>" . $unMessage . "</label>";
		return $composant;
	}
	
	
	public function creerInputTexte($unNom, $unId, $uneValue = null, $required , $placeholder = null, $pattern){
		$composant = "<input type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}
	
	
	public function creerInputMdp($unNom, $unId,  $required , $placeholder , $pattern){
		$composant = "<input type = 'password' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}
	
	public function creerLabelFor($unFor,  $unLabel){
		$composant = "<label for='" . $unFor . "'>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerSelect($unNom, $unId, $options){
		$composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
		foreach ($options as $option){
			$composant .= "<option value = " ;
			$composant .= $option ."'>".$option;
			$composant .= "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}	
	public function creerSelectBoostStrap($unNom, $options){
		$composant = '<select name="'.$name.'"class="form-select" aria-label="Default select example">';
		foreach ($options as $option){
			$composant .= "<option value = " ;
			$composant .= $option ."'>".$option;
			$composant .= "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}
	public function creerSelectBoostStrapOnChangeHard($unNom, $unId, $unLabel, $options){
		$composant = "<select  name = '" . $unNom . "' onchange='this.form.submit()' id = '" . $unId . "' ><option value=0>-- Choisissez en une --";
		foreach ($options as $option){
			$composant .= "<option value = " ;
			$composant .= $option ."'>".$option;
			$composant .= "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}
	public function creerSelectSpecial($unNom, $unId, $options){
		$composant = "<div class='col-9'><select  name = '" . $unNom . "' onchange='this.form.submit()' id = '" . $unId . "' ><option value=0>-- Choisissez en une --";
		foreach ($options as $option){
			$composant .= "<option value = " ;
			$composant .= $option ."'>".$option;
			$composant .= "</option>";
		}
		$composant .= "</select></div></div>";
		return $composant;
	}
	public function creerSelectBoostStrapOnChange($unNom, $options){
		$composant = '<select name="'.$name.'"class="form-select" onchange="this.form.submit()" aria-label="Default select example">';
		foreach ($options as $option){
			$composant .= "<option value = " ;
			$composant .= $option ."'>".$option;
			$composant .= "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}
	
	public function creerInputSubmit($unNom, $unId, $uneValue){
		$composant = "<input class = 'bouton' type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = '" . $uneValue . "'/> ";
		return $composant;
	}

	public function creerInputImage($unNom, $unId, $uneSource){
		$composant = "<input type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "src = '" . $uneSource . "'/> ";
		return $composant;
	}
	public function crerImputFile($unId , $unNom,$required){
	    $composant = "<input type = 'file' id = '". $unId . "' name = '" .$unNom."' accept = '.pdf'";
	    if ( $required = 1){
	        $composant .= "required";
	    }
	    $composant .= "/>";
	    return $composant;
	}
	public function creerInputPaginationBoostStrap($current = 1, $nbPage){
		$bornInf = MAX(1, $current-2);
		$bornMax = MIN($nbPage, $current+2);
		$composant = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		if($current < 2){
			$composant .= '<li class="page-item disabled"><a disabled class="page-link" href="?page=' . ($current-1) . '" tabindex="-1" aria-disabled="true">Précédent</a></li>';
		}else{
			$composant .= '<li class="page-item"><a class="page-link" href="?page=' . ($current-1) . '">Précédent</a></li>';
		}
		for($i = $bornInf; $i <= $bornMax ; $i++){
			if($i == $current){
				console_log($i-1);
				$composant .= '<li class="page-item disabled"><a disabled class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
			}else{
				$composant .= '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
			}	
		}		
		if($current == $nbPage){
			$composant .= '<li class="page-item disabled"><a disabled class="page-link" href="?page=' . ($current+1) . '" tabindex="'.$nbPage.'" aria-disabled="true">Suivant</a></li>';
		}else{
			$composant .= '<li class="page-item"><a class="page-link" href="?page=' . ($current+1) . '">Suivant</a></ul></nav>';
		}
		return $composant;
	}
	public function creerInputPagination($current = 1, $nbPage){
		$bornInf = MAX(1, $current-2);
		$bornMax = MIN($nbPage, $current+2);
		$composant = '<div class="pagination">';
		if($current == 1){
			$composant .= '<a disabled href="?page=1">Début</a>';
		}else{
			$composant .= '<a href="?page=1">Début</a>';
		}
		if($current < 2){
			$composant .= '<a disabled href="?page=' . ($current-1) . '">Précédent</a>';
		}else{
			$composant .= '<a href="?page=' . ($current-1) . '">Précédent</a>';
		}
		for($i = $bornInf; $i <= $bornMax ; $i++){
			$composant .= '<a href="?page=' . $i . '">' . $i . '</a>';
		}
		if($current == $nbPage){
			$composant .= '<a disabled href="?page=' . ($current+1) . '">Suivant</a>
			<a disabled href="?page='. $nbPage .'">Fin</a>
			</div>';
		}else{
			$composant .= '<a href="?page=' . ($current+1) . '">Suivant</a><a href="?page='. $nbPage .'">Fin</a>
			</div>';
		}
		return $composant;
	}
	public function creerInputImg($libelle, $src){
		$composant = '<input type="image" id="image" alt="' . $libelle . '"
		src="' . $src . '">';
		return $composant;
	}



	
	
	public function creerFormulaire(){
		$this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
		$this->formulaireToPrint .= "action = '" .  $this->action . "' ";
		$this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "class = '" .  $this->style . "' >";

		foreach ($this->tabComposants as $uneLigneComposants){
			$this->formulaireToPrint .= "<div class = 'ligne'>";
			foreach ($uneLigneComposants as $unComposant){
				$this->formulaireToPrint .= $unComposant ;
			}
			$this->formulaireToPrint .= "</div>";
		}
		$this->formulaireToPrint .= "</form>";
		return $this->formulaireToPrint ;
	}
	public function creerFormulaireSpe($class){
		$this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
		$this->formulaireToPrint .= "action = '" .  $this->action . "' ";
		$this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "class = '" .  $this->style . "' >";

		foreach ($this->tabComposants as $uneLigneComposants){
			$this->formulaireToPrint .= "<div class = '" . $class . "'>";
			foreach ($uneLigneComposants as $unComposant){
				$this->formulaireToPrint .= $unComposant ;
			}
			$this->formulaireToPrint .= "</div>";
		}
		$this->formulaireToPrint .= "</form>";
		return $this->formulaireToPrint ;
	}
	
	public function afficherFormulaire(){
		echo $this->formulaireToPrint ;
	}
	
	public function creerInputDate($nom, $value, $min, $max){
		$composant = '<input type="date" id="start" name="' . $nom . '" value="' . $value . '" min="' . $min . '" max="' . $max . '">';
		return $composant;
	}
}