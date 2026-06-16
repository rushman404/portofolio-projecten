<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ontdek je gezondheid</title>    
    <link rel="stylesheet" type="text/css" href="styleBMR.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row text-center" id="bovenkant">
        <div class="col-2">
          <img src="logo.png" height="50px" class="logo">
        </div>
        <div class="col-8">
          <h2 class="title">Ontdek je gezondheid</h2>
        </div>
        <div class="col-2">
          
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><h1 id="title">Gezondheid</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
            <li class="nav-item">
              <a class="nav-link" href="homepage.php"><h1 class="navtext">Home</h1></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="BMI.php"><h1 class="navtext">BMI berekenen</h1></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="BMR.php"><h1 class="navtext">BMR berekenen</h1></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-5" id="textblok">
          <div class="row" id="bovenkanttekst"><h1 class="text-center">BMR berekenen</h1></div>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-8" id="form">
                <form name="bmr" method="post" action="" >
                    <input id="blok3" type="radio" name="gender" value="man">Man
                    <input id="blok4" type="radio" name="gender" value="vrouw">vrouw<br><Br>
                    Leeftijd:
                    <input id="blok5" type="text" name="leeftijd" value=""><br><br>
                    Lengte in Cm: 
                    <input id="blok" type="text" name="lengte" value=""><br><br>
                    Gewicht in KG: 
                    <input type="text" name="gewicht" value=""><br><br>
                    <input id="knop" type="submit" name="submit" value="Berekenen je BMI"><br><br>
                    BMR: 
                    <input id="knop2" type="text" name="BMR" value="<?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $gewicht = $_POST['gewicht'] ?? '';
                        $lengte = $_POST['lengte'] ?? '';
                        $leeftijd = $_POST['leeftijd'] ?? '';
                        $gender = $_POST['gender'] ?? '';
        
                        if ($gewicht && $lengte && $leeftijd && $gender) {
                            if ($gender == "man") {
                                $bmr = (10 * $gewicht) + (6.25 * $lengte) - (5 * $leeftijd) + 5;
                                round($bmr, 2);
                                echo $bmr;
                            } else {
                                $bmr = (10 * $gewicht) + (6.25 * $lengte) - (5 * $leeftijd) - 161;
                                round($bmr, 2);
                                echo $bmr;
                            }
                        } else {
                            echo "Er is een fout opgetreden";
                        }
                    }
                    ?>" readonly>
                </form>
            </div>
          </div>
        </div>
        <div class="col-6"><img id="foto" src="bmr-normal-range-table-drlogy-1.png" height="370px"></div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row" id="onderkant"></div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>