<?php
//use to delete bom

$basedir="."; //dir to delete
$auto=1; //auto delete bom or not, 1: delete, 0: not

if ($dh = opendir($basedir)) {
while (($file = readdir($dh)) !== false) {
if ($file!='.' && $file!='..' && !is_dir($basedir."/".$file)) echo "filename: $file ".checkBOM("$basedir/$file")." <br>";
}
closedir($dh);
}

function checkBOM ($filename) {
global $auto;
$contents=file_get_contents($filename);
$charset[1]=substr($contents, 0, 1); 
$charset[2]=substr($contents, 1, 1); 
$charset[3]=substr($contents, 2, 1); 
if (ord($charset[1])==239 && ord($charset[2])==187 && ord($charset[3])==191) {
if ($auto==1) {
$rest=substr($contents, 3);
rewrite ($filename, $rest);
return ("<font color=red>BOM found, automatically removed.</font>");
} else {
return ("<font color=red>BOM found.</font>");
}
} 
else return ("BOM Not Found.");
}

function rewrite ($filename, $data) {
$filenum=fopen($filename,"w");
flock($filenum,LOCK_EX);
fwrite($filenum,$data);
fclose($filenum);
}
?>