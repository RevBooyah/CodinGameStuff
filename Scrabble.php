<?php

$val = array('a'=>1,'b'=>3,'c'=>3,'d'=>2,'e'=>1,'f'=>4,'g'=>2,'h'=>4,
    'i'=>1,'j'=>8,'k'=>5,'l'=>1,'m'=>3,'n'=>1,'o'=>1,'p'=>3,'q'=>10,
    'r'=>1,'s'=>1,'t'=>1,'u'=>1,'v'=>4,'w'=>4,'x'=>8,'y'=>4,'z'=>10);
    
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++) {
    $W[$i] = stream_get_line(STDIN, 30, "\n");
}
$letters = stream_get_line(STDIN, 8, "\n");
//error_log(var_export($W,true));
//error_log(var_export($letters,true));

$al = wordToArray($letters);  // al = all letters

$possible = array();
foreach($W as $k=>$dw) {
    $dwl = wordToArray($dw);
    if(wordMatch($al,$dwl)) {
        $wv = wordval($dw);
        if(!in_array($wv,$possible)) {
            $possible[$dw]=wordval($dw);   
        }
    }
}
asort($possible);
end($possible);
echo key($possible);

function wordMatch($aLetters,$aDictLetters) {
    foreach($aDictLetters as $l=>$q) {
        if(!isset($aLetters[$l]) || $q>$aLetters[$l]) return(false);
    }
    return(true);   
}

function wordToArray($word) {
    $al=array();
    for($x=0;$x<strlen($word);$x++){
        $al[$word[$x]]=isset($al[$word[$x]])?$al[$word[$x]]+1:1;
    }    
    return($al);
}

function wordval($word) {
    global $val;
    $total=0;
    for($x=0;$x<strlen($word);$x++) {
        $l = $word[$x];
        $total= $total + $val[$l];
    }
    return($total);
}
    
