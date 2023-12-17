<html>
  <head>
    <link rel="shortcut icon" href="../Resources/hmbct.png" />
    <title>CommandExec-4</title>
  </head>
  <body>
    <div style="background-color:#afafaf;padding:15px;border-radius:20px 20px 0px 0px">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='commandexec.html';">Main Page</button>
    </div>
    <div style="background-color:#c9c9c9;padding:20px;">
      <h1 align="center">Browse The Files!</h1>
    <form align="center" action="CommandExec-4.php" method="$_GET">
      What's it:
      <input type="text" name="typeBox" value=""><br>
      <input type="submit" value="Submit">
    </form>
  </div>
  <div style="background-color:#ecf2d0;padding:20px;border-radius:0px 0px 20px 20px" align="center">
  <?php
if (!file_exists(".hidden")) {
    mkdir(".hidden");
    file_put_contents(".hidden/log4.txt", "flag:secret");
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        system("attrib +h .hidden");
    }
}

if (isset($_GET["typeBox"])) {
    $target = $_GET["typeBox"];
    
    // Sanitize input to prevent XSS and Command Injection
    $target = htmlspecialchars($target, ENT_QUOTES, 'UTF-8');
    
    echo htmlentities(shell_exec($target), ENT_QUOTES, 'UTF-8');
    if ($_GET["typeBox"] == "secret") {
        echo "You really found my secret!";
    }
}
?>

  </div>
  </body>
</html>
