<?
function removeSpecialChars($input_string, $allowedChars =array(), $numbers_alphabet=true, $rus_alphabet=true, $eng_alphabet=true){
    $rusAlphabet = array(
        'й','ц','у','к','е','н','г','ш','щ','з','х','ъ','ф','ы','в','а','п','р','о','л','д','ж','э','я','ч','с','м','и','т','ь','б','ю','ё',
        'Й','Ц','У','К','Е','Н','Г','Ш','Щ','З','Х','Ъ','Ф','Ы','В','А','П','Р','О','Л','Д','Ж','Э','Я','Ч','С','М','И','Т','Ь','Б','Ю','Ё'
    );
    $engAlphabet = array(
        'q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m',
        'Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M'
    );
    
    $numbersAlphabet = array( '0','1','2','3','4','5','6','7','8','9' );
    $alphabet   = array();
    foreach ($allowedChars as $char) {
        foreach (preg_split('//u', $char, null, PREG_SPLIT_NO_EMPTY) as $item) {
            $alphabet[] =$item;
        }
    }
    if($numbers_alphabet)   { $alphabet    =  array_merge($alphabet, $numbersAlphabet);}
    if($rus_alphabet)       { $alphabet    =  array_merge($alphabet, $rusAlphabet);}
    if($eng_alphabet)       { $alphabet    =  array_merge($alphabet, $engAlphabet);}
    $input_chars_array = preg_split('//u', $input_string, null, PREG_SPLIT_NO_EMPTY);
    $n = count($input_chars_array);
    $p = count($alphabet);
    $result = '';
    for($i=0;$i<$n;$i++){
        $inp_char = $input_chars_array[$i];
        for($j=0;$j<$p;$j++){
            if($alphabet[$j] == $inp_char){$result=$result.$inp_char;}
        }
    }
    return $result;
}
echo "<pre>";
echo (removeSpecialChars("123", array(''),true,true,true));
?>