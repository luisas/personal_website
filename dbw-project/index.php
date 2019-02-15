<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>
    <h2>Blast</h2>
    <h3>Execute Blast through my webpage</h3>

    <form action="blast.php" id="input" name="input" method="POST" enctype="multipart/form-data">
        <p><em>Enter FASTA sequence files or a raw sequence!</em></p>
        <textarea name="fasta" cols="60" rows="5" placeholder="Paste here your sequence"></textarea><br>
        <input name="uploadFile" type="file"><br>
        <br>
        <input type="submit" value="Send data"> <input type="reset" value="Clear data">

    </form>
  </center>
  </body>
</html>
