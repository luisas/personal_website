<?php
session_start();


include_once('config-server.php');

#If file is uploaded
if ($_FILES['uploadFile']['name']) {
    $_REQUEST['fasta']=  file_get_contents($_FILES['uploadFile']['tmp_name']);
}
# IF NO INPUT!
if (!$_REQUEST['fasta']) {
  include 'errors/norequest.php';
  exit();
} else {

    if (!isFasta($_REQUEST['fasta'])) {
        $rawSequence = (string) strtoupper($_REQUEST['fasta']);
        if(!isRawSequence($rawSequence)){
          include 'errors/notvalidinput.html';
          exit();
        }else{
          $fasta = $rawSequence;
        }
    } else {
        $fasta = $_REQUEST['fasta'];
    }
    $fasta_file = fopen($input_file_path, "w") or die("Unable to open file!");
    fwrite($fasta_file, $fasta);
    fclose($fasta_file);
}

exec($blastCmdLine, $data, $status);
if (0 === $status) {
    include 'showResults.html';
 } else {
     echo "Something went wrong! Command failed with status: $status";
}

#FUNCTIONS
function isFasta($f) {
    return (substr($f,0,1) == ">");
}

function isRawSequence($str){

    return True;
    #TO BE FIXED
    $protein_letters = "ACDEFGHIKLMNPQRSTVWY*";
    $str=str_split($str);
    for ($i = 0; $i < count($str); $i++){
      $char = (string) $str[$i];
      #print($char);
      if (mb_strpos("ACDEFGHIKLMNPQRSTVWY*","B") == false) {
          #print("Here: ".$protein_letters);
          #print("Wrog Charachter: ".$char."--\n");
          #print($i);
          return True;
      }
    }
    return True;
}

function parse_Fasta ($f) {
    $sqs = explode(">", $f);
    $data=Array();
    foreach ($sqs as $s) {
        if ($s) {
            $lines = explode("\n",$s,2);
            list($db,$id,$info) = explode("|",$lines[0]);
            list ($swp,$info) = explode(" ",$info,2);
            $data[$id] = array('db'=> $db, 'id'=> $id, 'swpid' => $swp, 'info' => $info, 'sequence' => $lines[1]);
        }
    }
    return $data;
}
?>
