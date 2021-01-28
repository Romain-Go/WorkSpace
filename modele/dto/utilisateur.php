<?php
class Utilisateur
{
    use Hydrate;
    private $idUtilisateur;
    private $codeFormule;
    private $rue;
    private $ville;
    private $codePostale;
    private $numeroPermis;
    private $lieuObtention;
    private $dateObtenion;
    private $email;
    private $rib;
    private $role;
    private $chequeDossier;
    private $assuranceDossier;
    private $permisDossier;
    private $justificatifDom;
    private $ribDossier;
    private $dateNaissance;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    
    
    public function __construct($unLogin,$unMdp){
        $this->login=$unLogin;
        $this->mdp=$unMdp;
    }
    
    public function getIdUtilisateur(){
        return $this->codeFormule;
    }
        
    public function setIdUtilisateur($unidUtilisateur){
        $this->idUtilisateur =  $unidUtilisateur;
    }
    
    public function getCodeFormule(){
        return $this->codeFormule;
    }
    
    public function setCodeFormule($unCodeFormule){
        $this->codeFormule =  $unCodeFormule;
    }
    
    public function getRue(){
        return $this->rue;
    }
    
    public function setRue($uneRue){
        $this->rue =  $uneRue;
    }
    
    public function getVille(){
        return $this->ville;
    }
    
    public function setVille($uneVille){
        $this->ville =  $uneVille;
    }
    
    public function getCodepostale(){
        return $this->codepostale;
    }
    
    public function setCodepostale($unCodepostale){
        $this->codepostale =  $unCodepostale;
    }
    
    public function getNumeroPermis(){
        return $this->numeroPermis;
    }
    
    public function setNumeroPermis($unNumeroPermis){
        $this->numeroPermis =  $unNumeroPermis;
    }
    
    public function getLieuObtention(){
        return $this->lieuObtention;
    }
    
    public function setLieuObtention($unLieuObtention){
        $this->lieuObtention =  $unLieuObtention;
    }
    
    public function getDateObtenion(){
        return $this->dateObtenion;
    }
    
    public function setDateObtenion($uneDateObtenion){
        $this->dateObtenion =  $uneDateObtenion;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($unEmail){
        $this->email =  $unEmail;
    }
    
    public function getRib(){
        return $this->rib;
    }
    
    public function setRib($unRib){
        $this->rib =  $unRib;
    }
    
    public function getRole(){
        return $this->role;
    }
    
    public function setRole($unRole){
        $this->role =  $unRole;
    }
    
    public function getChequeDossier(){
        return $this->chequeDossier;
    }
    
    public function setChequeDossier($unChequeDossier){
        $this->chequeDossier =  $unChequeDossier;
    }
    
    public function getAssuranceDossier(){
        return $this->assuranceDossier;
    }
    
    public function setAssuranceDossier($uneAssuranceDossier){
        $this->assuranceDossier =  $uneAssuranceDossier;
    }
    
    public function getPermisDossier(){
        return $this->permisDossier;
    }
    
    public function setPermisDossier($unPermisDossier){
        $this->permisDossier =  $unPermisDossier;
    }
    
    public function getJustificatifDom(){
        return $this->justificatifDom;
    }
    
    public function setJustificatifDom($unJustificatifDom){
        $this->justificatifDom =  $unJustificatifDom;
    }
    
    public function getRibDossier(){
        return $this->ribDossier;
    }
    
    public function setRibDossier($unRibDossier){
        $this->ribDossier =  $unRibDossier;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function setNom($unNom){
        $this->nom =  $unNom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function setPrenom($unPrenom){
        $this->prenom =  $unPrenom;
    }
    
    public function getDateNaissance(){
        return $this->dateNaissance;
    }
    
    public function setDateNaissance($uneDateNaissance){
        $this->dateNaissance =  $uneDateNaissance;
    }

    public function getLogin(){
        return $this->login;
    }
    
    public function setLogin($unLogin){
        $this->login =  $unLogin;
    }
    
    public function getMdp(){
        return $this->mdp;
    }
    
    public function setMdp($unMdp){
        $this->mdp =  $unMdp;
    }
    
}