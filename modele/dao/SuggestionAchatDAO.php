<?php
    require_once 'dBConnex.php';

class SuggestionAchatDAO{

    public static function lesSuggestions(){
        $result = [];
        $a = 10;
        $b = 0;
        $nbPage = SuggestionAchatDAO::getNbPage();
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT id, nno, quantite, dateTard, dateTot, siteLivraison FROM SUGGESTION_ACHAT LIMIT :mini, :limite");
        if(!isset($_POST['fSelect']) || $_POST['fSelect'] == 0){
            $requetePrepa->bindParam(':limite', $a, PDO::PARAM_INT);
        }else{
            $requetePrepa->bindParam(':limite', $_POST['fSelect'],PDO::PARAM_INT);
        }
        if(!isset($nbPage) || $nbPage == 0){
            $requetePrepa->bindParam(':mini', $b, PDO::PARAM_INT);
        }else{
            $requetePrepa->bindParam(':mini', $nbPage,PDO::PARAM_INT);
        }

        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $value){
                $uneSA = new suggestionAchat();
                $uneSA->hydrate($value);
                $result[] = $uneSA;
            }
        }
        return $result;
    }

    public static function ajoutSuggestionAchat(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO SUGGESTION_ACHAT (nno, quantite, dateTard, dateTot, siteLivraison) VALUES (:nno, :quantite, :dateTot, :dateTard, :siteLivraison)");
        $requetePrepa->bindParam(':nno', $_POST['nno']);
        $requetePrepa->bindParam(':quantite', $_POST['quantite']);
        $requetePrepa->bindParam(':dateTot', $_POST['dateTot']);
        $requetePrepa->bindParam(':dateTard', $_POST['dateTard']);
        $requetePrepa->bindParam(':siteLivraison', $_POST['siteLivraison']);
        $requetePrepa->execute();
    }

    public static function getNbPage(){
        $result = [];
        $a = 10;
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT CEIL(COUNT(id)/:div) FROM SUGGESTION_ACHAT");
        if(!isset($_POST['fSelect']) || $_POST['fSelect'] == 0){
            $requetePrepa->bindParam(':div', $a, PDO::PARAM_INT);
        }else{
            $requetePrepa->bindParam(':div', $_POST['fSelect'],PDO::PARAM_INT);
        }
        $requetePrepa->execute();

        $nbPage = $requetePrepa->fetch();
        return $nbPage;
    }
}


?>