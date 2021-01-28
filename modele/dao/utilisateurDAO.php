<?php
class UtilisateurDAO{
    
    public static function verification(Utilisateur $utilisateur){
        
        $requetePrepa = DBConnex::getInstance()->prepare("select * from utilisateur where LOGINUTILISATEUR = :login and  MDPUTILISATEUR = :mdp");
        $login = $utilisateur->getLogin();
        $motDePasse = $utilisateur->getMdp();
        
        $requetePrepa->bindParam( ":login", $login);
        $requetePrepa->bindParam( ":mdp" ,  $motDePasse);
        $requetePrepa->execute();
        
        $reponse = $requetePrepa->fetch();
        return $reponse;
    }
    
    
    public static function getInfos(){
        
        $requetePrepa = DBConnex::getInstance()->prepare("select * from UTILISATEUR where LOGINUTILISATEUR = :login ");
        $login = $_SESSION['login'];
        $requetePrepa->bindParam( ":login", $login);
        $result = $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        
        
        if(!empty($liste)){
            foreach($liste as $value){
                $unUser = new Utilisateur();
                $unUser->hydrate($value);
            }
        }
        return $unUser;
    }
    
    public static function inscription(){
        $requetePrepa = DBConnex::getInstance()->prepare("insert into utilisateur values(:nom, :prenom, :login, :mdp, 'Client', :ville, :codePostal, :rue)");
        
        $rue = $_POST['rue'];
        $ville = $_POST['ville'];
        $codepostal = $_POST['codePostal'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $requetePrepa->bindParam(":rue", $rue);
        $requetePrepa->bindParam(":ville", $ville);
        $requetePrepa->bindParam(":codepostal", $codepostal);
        $requetePrepa->bindParam(":nom", $nom);
        $requetePrepa->bindParam(":prenom", $prenom);
        $requetePrepa->bindParam(":login", $login);
        $requetePrepa->bindParam(":mdp", $mdp);
        
        $requetePrepa->execute();
    }
    
}

