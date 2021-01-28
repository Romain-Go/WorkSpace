<?php
class SuggestionAchat
{
    use Hydrate;
    private $id;
    private $nno;
    private $quantite;
    private $dateTard;
    private $dateTot;
    private $siteLivraison;

	public function __construct($pId = null, $pNNO = null, $pQuantite = null, $pDateTa = null, $pDateTo = null, $pSiteLivraison = null)
	{
		$this->id = $pId;
		$this->nno = $pNNO;
		$this->quantite = $pQuantite;
		$this->dateTard = $pDateTa;
		$this->dateTot = $pDateTo;
		$this->siteLivraison = $pSiteLivraison;
	}

    public function getId() {
        return $this->id;
    }

    public function setId($pId) {
        $this->id = $pId;
    }

	public function getNNO() {
		return $this->nno;
	}

	public function setNNO($pNNO) {
		$this->nno = $pNNO;
	}

	public function getQuantite() {
		return $this->quantite;
	}

	public function setQuantite($pQuantite) {
		$this->quantite = $pQuantite;
	}

	public function getDateTot() {
		return $this->dateTot;
	}

	public function setDateTot ($pDateTo) {
		$this->dateTot = date('d/m/Y', strtotime($pDateTo));
	}

	public function getDateTard() {
		return $this->dateTard;
	}

	public function setDateTard ($pDateTa) {
		$this->dateTard = date('d/m/Y', strtotime($pDateTa));
	}

	public function getSiteLivraison() {
		return $this->siteLivraison;
	}

	public function setSiteLivraison($pSiteLivraison) {
		$this->siteLivraison = $pSiteLivraison;
	}
}
?>