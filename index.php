<?php
require("./Schedules.php");
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <script src="./script.js" defer></script> -->
    <title>Coach roosters</title>
</head>

<body>
    <div class="navbar">
        <div id="logo"><a href="https://community-challenge.netlify.app"><p>community</p><p>challenge</p></a></div>
        <nav>
            
            <ul>
                <li><a href="#question-1"><span  class='material-icons'>&#xe85d;</span>vraag 1</a></li>
                <li><a href="#question-2"><span  class='material-icons'>&#xe8ef;</span> vraag 2</a></li>
                <li><a href="#question-3"><span  class='material-icons'>&#xf04c;</span>vraag 3</a></li>
                <li><a href="#question-4"><span  class='material-icons'>&#xe871;</span>vraag 4</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <h1><span>Community challenge</span> week 50</h1>
        <section id="question-1">
            
            <h2><span id='star' class='material-icons'>&#xe838;</span>
                Planning met conflicten
            </h2>
            <h3>Weekrooster coaches</h3>
            <p>
                De <span>Community Challenge</span> gaat deze week over roosters. Allereerst zet ik de beschikbaarheid van de coaches in een associatieve array <i>$CoachePlanner</i>, omdat hierin de relatie tussen een key en value meegegeven kan worden. Vervolgens maak ik een rooster dat iedere coach ten minste 1 keer inroostert. Laat vervolgens het rooster zien op een overzichtelijke manier. We gaan er voor nu nog vanuit dat een coaching sessie de gehele dag duurt en dat de coaches de gehele dag beschikbaar zijn. Het probleem is dat niet iedere coach evenveel beschikbaar is! In de tabel is te zien hoeveel coaches er per dag inzetbaar zijn.<br>
                
                <br>
                Het aantal coaches dat beschikbaar is op een dag verieert tussen min <span><?php echo min($listN); ?></span>  en max <span><?php echo max($listN); ?></span> .
                Om een programma te schrijven om dit voor mij te doen heb ik eerst een tabel gemaakt met weekdagen, aantal beschikbaren coaches en hun namen.
                Het programma kijkt naar de beschikbaarheid van iedere coach. Beginnend met de dagen met minimale inzetbare coaches, dit zijn <span>Zaterdag en Zondag</span>
                De namen van de coaches worden vervolgens in een array gezet. Het programma gaat vervolgens naar volgende dag, en als de naam in deze array <i>$NamesUsed</i> staan dan wordt deze initieel overgeslagen. De volgende naam wordt ingevuld en de naam in de array gezet.
                Op deze manier onstaat er een planning waar de namen niet dubbel gebruikt, tenzij de namen beide in de array staan. In dit geval wordt de eerste coach ingeroosterd.
            </p>

            <div class="tbl-intro">
                <h3>Coach beschikbaarheid per dag</h3>
            <table>
                <tr><th><td>Dag</td><td>n-Beschikbaar</td></td><td>Coaches</td></th></tr>
        
            <?php
       
            foreach($Week as $day => $val) {
                $n = count($val);
                echo "<tr><td>$day</td><td>$n</td>";
                 
                    foreach ($val as $name){
                    echo "<td>$name</td>";
                } echo "</tr>";
            }
          
            ?>
            </table>

            </div>
            <?php

            echo "<div id='cards-Planner'>";
            echo "<h3><span>Week planning</span></h3>";
       for ($i = 0; $i < count($Planning); $i ++) {
            $day = $Planning[$i][0];
            $coach = $Planning[$i][1];
            echo "<div class=$day ><h3>$day</h3>";
            echo "<p>$coach</p></div>";
       }; 
              
            ?>
            </div>

            
        </section>

        <section id="question-2">

            <h2><span id='star' class='material-icons'>&#xe838;</span><span id='star' class='material-icons'>&#xe838;</span>
                Meer infomatie graag!
            </h2>
 
            <p>
            Het blijkt het team van de Bit-Academy toch gelukt te zijn om een rooster te fabriceren. Met deze nieuwe gegevens maak ik een tabel waarin de coaches en werkuren staan, gerangschikt van minste tot meeste aantal uren in de week.
            <span>Vervolgens voegen we de informatie uit dit rooster toe aan de array <i>$CoachePlanner</i></span>
            </p>
            
            <div class="Hours">
            <h3>Tabel van totale werkuren per coach</h3>
            <table class="tbl-Hours" >
            <tr><th><td>Naam</td><td>Uren</td></th></tr>
            
            <?php
         
         foreach ($coachHoursWorked as $key => $values) {
            echo "<td>$values[1]</td><td>$values[0]</td></tr>";
        }; ?>
            </th></tr>
            </table>
            </div>

        </section>
        <section id="question-3">
            <h2><span id='star' class='material-icons'>&#xe838;</span><span id='star' class='material-icons'>&#xe838;</span><span id='star' class='material-icons'>&#xe838;</span>
                De voorkeur van de coaches
            </h2>
            <h3>Wat is het percentage van voorkeur in huidige rooster?</h3>
            <p>
                Het Bit-Academy rooster heeft de array gevuld met nieuwe informatie. De tabel hieronder is een weergaven op basis van het rooster en de al bekende voorkeuren.
                Per coach is te zien wat het aantal dagen, diensten, de voorkeur, het aantal uren en hoeveel daarvan in opgeven voorkeur zijn.

            <table class="Overview-tbl">
            <tr><th><td>Naam</td><td>Voorkeur</td><td>N-dagen</td><td>Ingeroostert op</td><td>Uren</td><td>Uren in voorkeur</td><td>Dienst</td><td>Voorkeur?</td></th></tr>
            <?php
            for ($i = 0; $i < count($CoachePlanner); $i++) {
                $Name = $CoachePlanner[$i]['Name'];
                $Available = $CoachePlanner[$i]['Availability'];
                $Preference = $CoachePlanner[$i]['Preference'];
               
                $Shift = array_column($CoachePlanner[$i], 'Shift');
                $Hrs = array_column($CoachePlanner[$i], 'HrsWorked');
                $DaysWorked = array_column($CoachePlanner[$i], 'DaysWorked');
  
                foreach ($Hrs as $key => $val) {
                    $Hrs = array_sum($val) . PHP_EOL;
                } 
            
                echo "<tr><td>$Name</td><td>";
                
                foreach($Preference as $enum) {
                    if($enum == 0) {echo "<p>ochtend</p>";}
                    if($enum == 1) {echo "<p>middag</p>";}
                    if($enum == 2) {echo "<p>avond</p>";}
                    if($enum == 3) {echo "<p>geen</p>";}                   
                }
            
                echo"</td>";

                foreach ($DaysWorked as $array => $enum){
                    echo"<td>" . count($enum);
                }
                echo"</td><td>";
                foreach ($DaysWorked as $array){
                    foreach ($array as $key => $enum) {
                    if($enum == 0) {echo "<p>ma</p>";}
                    if($enum == 1) {echo "<p>di</p>";}
                    if($enum == 2) {echo "<p>wo</p>";}
                    if($enum == 3) {echo "<p>do</p>";}
                    if($enum == 4) {echo "<p>vr</p>";}
                    if($enum == 5) {echo "<p>za</p>";}
                    if($enum == 6) {echo "<p>zo</p>";}
                }}
                echo "</td><td>" . $Hrs . "</td>";
                foreach ($PrefHours[$Name] as $key) {
                echo "<td>$key</td><td>";
            }
                foreach ($Shift as $array) {
                    foreach ($array as $key => $enum) {
                    if($enum == 0) {echo "<p>ochtend</p>";}
                    if($enum == 1) {echo "<p>middag</p>";}
                    if($enum == 2) {echo "<p>avond</p>";}
                }}
                
                echo "</td><td>";
                foreach ($Shift as $array) {
                    foreach ($array as $key => $enum) {
                        
                        if (in_array($enum, $Preference)) {
                            echo "<p>Ja</p>";
                        } elseif($Preference == 3) {
                            echo "<p>n.v.t.</p>";
                        } else {echo "<p>Nee</p>";}
                    }}
                

                foreach($Preference as $enum) {
                    if($enum == 3) {echo "<p>n.v.t.</p>";}                   
                }
                echo "</td></tr></th>"; 
            };
            ?>
            </table>
            <h3>Welke coach heeft meeste voorkeurs werkuren?</h3>
            <p>Coach <span>Daniel</span> heeft met <span>100 %</span> van de uren in zijn voorkeur de voor hem gunstigste tijden in het rooster gekregen.
            Ook <span>Henok</span> mag niet klagen, hoewel deze coach slecht 1 werkdag heeft. <span>Sander</span> is het minst in zijn voorkeur ingedeeld, zeker aangezien hij de coach is met de meeste werkuren!. Een roosterwijziging zal voor hem positief kunnen uitvallen.
            </p>
            
            </table>
            <div id="cards-Preference">
               
                <div>
                    <h3>Sander</h3>
                    <img src="./figuur.png" alt="Drawing of contour of man">
                    <p>Werkuren: 25.5, <br>daarvan 0 in voorkeur</p>
                    <p><span><?php echo round(((0/25.5) * 100),2) . " %"; ?></span></p>
                    <Progress bar value="0" max="25.5"></Progress bar>
                </div>
           
                <div>
                    <h3>Alexander</h3>
                    <img src="./figuur.png" alt="Drawing of contour of man">
                    <p>Werkuren: 12.5, <br>daarvan 4 in voorkeur</p>
                    <p><span><?php echo round(((4/12.5) * 100),2) . " %"; ?></span></p>
                    
                    <Progress bar value="4" max="12.5"></Progress bar>
                </div>

                <div>
                    <h3>Nick</h3>
                    <img src="./figuur.png" alt="Drawing of contour of man">
                    <p>Werkuren: 3.5, <br>geen voorkeur</p>
                    <p><span><?php echo "N.v.t"; ?></span></p>
                    <Progress bar value="null" max="3.5"></Progress bar>
                </div>
                <div>
                    <h3>Sam</h3>
                    <img src="./figuur.png" alt="Drawing of contour of man">
                    <p>Werkuren: 2, <br>geen voorkeur</p>
                    <p><span><?php echo "N.v.t"; ?></span></p>
                    
                    <Progress bar value="null" max="2"></Progress bar>
                </div>
                <div>
                    <h3>Daniel</h3> 
                    <img src="./figuur.png" alt="Drawing of contour of man">
                    <p>Werkuren: 17, <br>daarvan 17 in voorkeur</p>
                    <p><span><?php echo round(((17/17) * 100),2) . " %"; ?></span></p>
                   
                    <Progress bar value="17" max="17"></Progress bar>
                </div>
                <div>
                    <h3>Henok</h3>
                    <img src="./figuur.png" alt="Drawing of contour of man">
                    <p>Werkuren: 8.5, <br> daarvan 5.5 in voorkeur</p>
                    <p><span><?php echo round(((5.5/8.5) * 100),2) . " %"; ?></span></p>
                    <Progress bar value="5.5" max="8.5"></Progress bar>
                </div>
            </div>

        </section>

        <section id="question-4">
            <h2><span id='star' class='material-icons'>&#xe838;</span><span id='star' class='material-icons'>&#xe838;</span><span id='star' class='material-icons'>&#xe838;</span><span id='star' class='material-icons'>&#xe838;</span>
                Nieuw Rooster
            </h2>
            <h3>Plannen op basis van voorkeur.</h3>
            <p>
            
            <div class="Generate-Schedule">
            <p>
                Voordat ik een nieuwe planning ga maken geef ik nogmaals de beschikbaarheid en de voorkeuren van de coaches. Dit overzicht is aanvankelijk misschien een beetje onoverzichtelijk, maar handig om te zien op <span> welke dagen wie beschikbaar is, en wat de voorkeurs-dienst van die persoon is.</span>
                Ik ga ervan uit dat elke coach ten minste een keer ingeroostert moet worden. De aantal uren dat de coaches in het huidige rooster werken volg ik niet. Het onderstaande rooster wordt bepaald met grofweg hetzelfde programma als het eerste (bovenaan de pagina)! 
                Wanneer er een geen voorkeur of meer dan een coach dezelfde voorkeur hebben wordt de eerste naam ingeroostert.
            </p>
            
            <table class="tbl-av-days">
            <tr><th>Beschikbaarheid: Dag - Naam - Voorkeur</th></tr>
            <?php
     
            foreach($Week as $day => $val) {
                $n = count($val);
                echo "<tr><th>$day</th></tr><tr><td>$n</td>";
                 
                    foreach ($val as $name){
                    echo "<td>$name</td><td><span>";
                
                for ($i = 0; $i < count($CoachePlanner); $i ++) {
                    $CoachName = $CoachePlanner[$i]['Name'];
                    $Preference = $CoachePlanner[$i]['Preference'];
                    $Available = $CoachePlanner[$i]['Availability'];

                    if($name == $CoachName) {
                        foreach($Preference as $enum) {
                            if($enum == 0) {echo "<p>ochtend</p>";}
                            if($enum == 1) {echo "<p>middag</p>";}
                            if($enum == 2) {echo "<p>avond</p>";}
                            if($enum == 3) {echo "<p>geen</p>";}                   
                        }
                    }
                    }
                }
            }
          
            ?>
    
            </table>

            <div class="Rooster">
            <h2>Nieuw Rooster naar voorkeur coaches</h2>
            <p>Hieronder is het eindresultaat te zien van alle gevens die zijn verzamelend en bestudeerd.</p>
            <table class="tbl-Rooster">
            <tr><th>Rooster</th></tr>
            <?php
            
                foreach ($ShiftPlanning as $shift => $Name) {
                    echo "<tr><td>$shift</td>";
                    foreach($Name as $coach) {
                        echo "<td>$coach</td></tr>";  
                    }
                    
                }
            
                ?>
   
            </table>
            </div>      
        
        </section>
    </div>

</body>
<div class="footerbar">
    <footer>
        <ul>
            
            <li><a href="https://github.com/Molly-creator/BIT-Schedules"><img src="./icons8-github-24.png" alt="GitHub cat-icon">git</a></li>
            <span>Dorian van Buel</span>
        </ul>
</div>
</footer>
</html>