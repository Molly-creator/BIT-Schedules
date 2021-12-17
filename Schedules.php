<?php

//Datastructuur waar ik voor heb gekozen is een associatieve array. Hierin kun je een relatie leggen tussen de key & value paren. 
// De beschikbaren dagen zijn als volgt: maa = 0, din = 1, woe = 2, don = 3. vrij = 4, zat=5 en zon=6.
// voorkeuren : ochtend = 0, middag = 1, avond = 2;

$CoachePlanner = [
    [
        'Name' => 'Sander',
        'Availability' => [0, 2, 4, 6],
        'Preference' => [2]
    ],
    [
        'Name' => 'Alexander',
        'Availability' => [0, 3, 5],
        'Preference' => [2]
    ],
    [
        'Name' => 'Nick',
        'Availability' => [1, 4],
        'Preference' => [3]
    ],
    [
        'Name' => 'Sam',
        'Availability' => [2, 4],
        'Preference' => [3]
    ],
    [
        'Name' => 'Daniel',
        'Availability' => [1, 3],
        'Preference' => [0, 1]
    ],
    [
        'Name' => 'Henok',
        'Availability' => [1, 2],
        'Preference' => [1, 2]
    ]
];

// Inplannen coaches, ten minste ieder een dag. Hoe ziet de data eruit als je het organiseerd op dagen van de week? Hieronder ass array met weekdagen. Vervolgens door data lussen en met switch aan de dag koppelen.
$Week = [
    'Maandag' => [],
    'Dinsdag' => [],
    'Woensdag' => [],
    'Donderdag' => [],
    'Vrijdag' => [],
    'Zaterdag' => [],
    'Zondag' => [],
];  
    
for ($i = 0; $i < count($CoachePlanner); $i++) {

    foreach ($CoachePlanner[$i]["Availability"] as $day) {
        
        switch($day) {
            case 0:
                array_push($Week['Maandag'], $CoachePlanner[$i]["Name"]);
                break;
            case 1:
                array_push($Week['Dinsdag'], $CoachePlanner[$i]["Name"]);
                break;
            case 2:
                array_push($Week['Woensdag'], $CoachePlanner[$i]["Name"]);
                break;
            case 3:
                array_push($Week['Donderdag'], $CoachePlanner[$i]["Name"]);
                break;
            case 4:
                array_push($Week['Vrijdag'], $CoachePlanner[$i]["Name"]);
                break;
            case 5:
                array_push($Week['Zaterdag'], $CoachePlanner[$i]["Name"]);
                break;
            case 6:
                array_push($Week['Zondag'], $CoachePlanner[$i]["Name"]);
                break;
        }
    }
}


// Probleem dagen loopt van ma-zon niet via n-waarde. WERKT ALLEEN ALS WEEK OMGEDRAAID IS!

$NamesUsed = [];
$Planning = [];
$listN = [];

asort($Week);

foreach($Week as $day => $val) {
    $n = count($val);
    array_push($listN, $n);
    switch ($day) {
        case "Maandag":
           
            if (in_array($val[0], $NamesUsed)) {
                array_push($NamesUsed, $val[1]);
                array_push($Planning, [$day, $val[1]]);
              
            } else {
                array_push($NamesUsed, $val[0]);
                array_push($Planning, [$day, $val[0]]);
            }
        
        break;

        case "Dinsdag":

            if (!in_array($val[0], $NamesUsed)) {
                array_push($NamesUsed, $val[0]);
                array_push($Planning, [$day, $val[0]]);
              
            } elseif (!in_array($val[1], $NamesUsed)) {
                array_push($NamesUsed, $val[1]);
                array_push($Planning, [$day, $val[1]]);
            } else {
                array_push($NamesUsed, $val[2]);
                array_push($Planning, [$day, $val[2]]);
            }
    
        break;

        case "Woensdag":
            if (!in_array($val[0], $NamesUsed)) {
                array_push($NamesUsed, $val[0]);
                array_push($Planning, [$day, $val[0]]);
              
            } elseif (!in_array($val[1], $NamesUsed)) {
                array_push($NamesUsed, $val[1]);
                array_push($Planning, [$day, $val[1]]);
            } else {
                array_push($NamesUsed, $val[2]);
                array_push($Planning, [$day, $val[2]]);
            }

       
        break;

        case "Donderdag":
           
            if (in_array($val[0], $NamesUsed)) {
                array_push($NamesUsed, $val[1]);
                array_push($Planning, [$day, $val[1]]);
              
            } else {
                array_push($NamesUsed, $val[0]);
                array_push($Planning, [$day, $val[0]]);
            }

    
        break;

        case "Vrijdag":

            if (!in_array($val[0], $NamesUsed)) {
                array_push($NamesUsed, $val[0]);
                array_push($Planning, [$day, $val[0]]);
              
            } elseif (!in_array($val[1], $NamesUsed)) {
                array_push($NamesUsed, $val[1]);
                array_push($Planning, [$day, $val[1]]);
            } else {
                array_push($NamesUsed, $val[2]);
                array_push($Planning, [$day, $val[2]]);
            }

       
        break;

        default:
            array_push($NamesUsed, $val[0]);
            array_push($Planning, [$day, $val[0]]);
        break;
    }
};

// dagen zijn als volgt: maa = 0, din = 1, woe = 2, don = 3. vrij = 4, zat=5 en zon=6.
// UPDATE CoachePlanner associatie array; Aanhouden enumeration van dagen en dagdelen/

array_push($CoachePlanner[0], ['DaysWorked' => [0,4,6], 'Shift' => [0,1,0,1,0,1], 'HrsWorked' => [3, 5.5, 3, 5.5, 3, 5.5]] );
array_push($CoachePlanner[1], ['DaysWorked' => [0,3,5], 'Shift' => [2,2,0,1], 'HrsWorked' => [2, 2, 3, 5.5]]);
array_push($CoachePlanner[2], ['DaysWorked' => [1], 'Shift' => [2], 'HrsWorked' => [3.5]]);
array_push($CoachePlanner[3], ['DaysWorked' => [2], 'Shift' => [2], 'HrsWorked' => [2]]);
array_push($CoachePlanner[4], ['DaysWorked' => [1,3], 'Shift' => [0,1,0,1], 'HrsWorked' => [3, 5.5, 3, 5.5]]);
array_push($CoachePlanner[5], ['DaysWorked' => [2], 'Shift' => [0,1], 'HrsWorked' => [3, 5.5]]);

//Maken lijst met alleen totaal aantal uren gewerkt per coach. Deze sorteren we van hoog naar laag op basis van naam en gewerkte uren.
$coachHoursWorked = [];
for ($i = 0; $i < count($CoachePlanner); $i++) {
    $Name = $CoachePlanner[$i]['Name'];
    $Preference = $CoachePlanner[$i]['Preference'];
    $Shift = $CoachePlanner[$i][0]['Shift'];

    $Hrs = array_sum($CoachePlanner[$i][0]['HrsWorked']);
    array_push($coachHoursWorked, [$Hrs, $Name]);
};
sort($coachHoursWorked);

// Percentage voorkeur uitrekenen. Hiervoor kijken in CoacePlanner array naar 'Preference', 'HrsWorked' en 'Shift' in de .
// Werkuren verdeeld in ochtend/middag/avond (tot 12.00/ tot 18.00/tot 00.00).
$PrefHours = [
    'Sander' => [],
    'Alexander' => [],
    'Nick' => [],
    'Sam' => [],
    'Daniel' => [],
    'Henok' => [],
];

for ($i = 0; $i < count($CoachePlanner); $i++) {
    $Name = $CoachePlanner[$i]['Name'];
    $Preference = $CoachePlanner[$i]['Preference'];
    $Shift = $CoachePlanner[$i][0]['Shift'];
    $Hrs = $CoachePlanner[$i][0]['HrsWorked'];

    
    $Teller = 0;
    for ($j = 0; $j < 10; $j++) {
        // if (in_array($Shift[$j], $Preference)) {
            Switch(in_array($Shift[$j], $Preference)) {
                case True:
                    $Teller += $Hrs[$j];
            }
           
    }
    array_push($PrefHours[$Name], $Teller);
}


$ShiftPlanning = [
    'Maandag 09:00-17:30' => ["Alexander"],
    'Maandag 19:00-21:00' => ["Sander"],
    'Dinsdag 09:00-17:30' => ["Daniel"],
    'Dinsdag 19:00-21:00' => ["Henok"],
    'Woensdag 09:00-17:30' => ["Sam"],
    'Woensdag 19:00-21:00' => ["Sander"],
    'Donderdag 09:00-17:30' => ["Daniel"],
    'Donderdag 19:00-21:00' => ["Alexander"],
    'Vrijdag 09:00-17:30' => ["Nick"],
    'Zaterdag 09:00-17:30' => ["Alexander"],
    'Zondag 09:00-17:30' => ["Sander"],
]; 