<?php
/*
 * Settings pointing to BLAST installation details (adapted to mmb.pcb.ub.es server)
 */

$blastHome = "/Users/luisasantus/bin/blast";
$blastDbsDir = "$blastHome/DBS";
$blastExe = "$blastHome/bin/blastp";
$blastDbs = ["SwissProt" => "sprot", "PDB" => "pdb"];
$input_file_path = "/tmp/luisasantus_input.fasta";
$blastCmdLine = "$blastExe -db $blastDbsDir/" . $blastDbs['PDB'] . " -evalue 0.001 -max_target_seqs 100 -outfmt \"6 sseqid stitle evalue\" -query $input_file_path ";
?>
