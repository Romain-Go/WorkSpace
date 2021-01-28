<?php
    $_SESSION['listeSA'] = new SuggestionsAchats(SuggestionAchatDAO::lesSuggestions());

    $formulaireSuggestionA = new Formulaire('post', 'vue/vueAjoutSA.php', 'fAjoutSA', 'fAjoutSA');
    
	$formulaireSuggestionA->ajouterComposantLigne($formulaireSuggestionA-> creerInputSubmit('submitAjoutSA', 'submitAjoutSA', 'Ajouter une SA'));
	$formulaireSuggestionA->ajouterComposantTab();

    $formulaireSuggestionA->creerFormulaire();

    $formulaireRechercheSA = new Formulaire('post', 'index.php', 'fRechercheSA', 'fRechercheSA');
    
    $formulaireRechercheSA->ajouterComposantLigne($formulaireRechercheSA->creerLabel("Rechercher une suggestion d'achat : "));
	$formulaireRechercheSA->ajouterComposantLigne($formulaireRechercheSA-> creerInputTexte('rechercheSA', 'rechercheSA', '', 1 ,'Rechercher une SA', ''));
	$formulaireRechercheSA->ajouterComposantTab();

    $formulaireRechercheSA->creerFormulaire();

    $formulaireSelectLimit = new Formulaire('post', null, 'fSelectLimit', 'fSelectLimit');

    $options = [10, 15, 20, 40];

    $formulaireSelectLimit->ajouterComposantLigne($formulaireSelectLimit->creerLabelDiv("Séléction de la limite d'affichage : "));
    $formulaireSelectLimit->ajouterComposantLigne($formulaireSelectLimit->creerSelectSpecial("fSelect", "fSelect", $options));
    $formulaireSelectLimit->ajouterComposantTab();

    $formulaireSelectLimit->creerFormulaireSpe('container');

    $nbPage = SuggestionAchatDAO::getNbPage();

    $formulaireSelectPage = new Formulaire('post', null, 'fSelectPage', 'fSelectPage');

    $nb = $nbPage[0];
    $current = $_GET['page'];

    $formulaireSelectPage->ajouterComposantLigne($formulaireSelectPage->creerInputPaginationBoostStrap($current?$current:1 , $nb));
    $formulaireSelectPage->ajouterComposantTab();

    $formulaireSelectPage->creerFormulaireSpe('container');

// Encodeur et décodeur pour l'id \\

    function generate_xor_key($length)
{
    $result = array_fill(0, $length, 0);

    for ($i = 0, $bit = 1; $i < $length; $i++) {
        for ($j = 0; $j < 3; $j++, $bit++) {
            $result[$i] |= ($bit % 2) << $j;
        }
    }

    return implode('', array_map('chr', $result));
}

// Encode an ID
// If using a custom key this can be supplied in the 4th argument
// Keys must always be strings with all the bytes in the range 0x00 - 0x08
function encode_id($id, $encodedLength = 7, $rawBits = 16, $key = null)
{
    // Because we are encoding the number into the least significant 3 bits,
    // it doesn't make sense for $rawBits > $encodedLength * 3
    $maxRawBits = $encodedLength * 3;
    if ($rawBits > $maxRawBits) {
        trigger_error('encode_id(): $rawBits must be no more than 3 times greater than $encodedLength');
        return false;
    }

    // Get a usable key
    if ($key === null) {
        $key = generate_xor_key($encodedLength);
    }

    // Start with all bytes at ASCII 0
    $result = array_fill(0, $encodedLength, 0x30);

    // Extract each relevant bit from the input and store it in the output bytes
    for ($position = 0; $position < $rawBits; $position++) {
        $bit = (($id >> $position) & 0x01) << floor($position / $encodedLength);
        $index = $position % $encodedLength;
        $result[$index] |= $bit;
    }

    // Pad the remaining bits with alternation
    // This is purely cosmetic for the output
    for (; $position < $maxRawBits; $position++) {
        $index = $position % $encodedLength;
        $bit = ($position % 2) << floor($position / $encodedLength);
        $result[$index] |= $bit;
    }

    // Convert the result to an ascii string
    return implode('', array_map('chr', $result)) ^ $key;
}

function decode_id($id, $encodedLength = 7, $rawBits = 16, $key = null)
{
    // Get a usable key
    if ($key === null) {
        $key = generate_xor_key($encodedLength);
    }

    // Convert the string to our original bytes array
    $bytes = array_map(
        'ord',
        str_split(
            str_pad($id, $encodedLength, '0', STR_PAD_LEFT) ^ $key,
            1
        )
    );

    $result = 0;

    // Put the number back together
    for ($position = 0; $position < $rawBits; $position++) {
        $index = $position % $encodedLength;
        $bit = (($bytes[$index] >> floor($position / $encodedLength)) & 0x01) << $position;
        $result |= $bit;
    }

    return $result;
}

// Fin encodeur et décodeur \\

require_once 'vue/vueSuggestionAchat.php';
?>
