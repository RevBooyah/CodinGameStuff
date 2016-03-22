<?php


fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d", $C);

$sum=0;
$ood=array();
for ($i = 0; $i < $N; $i++){
    fscanf(STDIN, "%d", $B  );
    $ood[$i]=$B;
    $sum+=$B;
}

if($C>$sum) {
    echo "IMPOSSIBLE\n";
    exit();
}

sort($ood);
for($i=0;$i<count($ood);$i++) {
    $cont = floor(($ood[$i]>=$C/($N-$i))?$C/($N-$i):$ood[$i]);
    echo ($cont)."\n";
    $C-=$cont;
}
