<?php

$CoachePlanner = [
    [
        'Name' => 'Sander',
        'Availability' => [0, 2, 4, 6],
        'Preference' => [2],
        'DaysWorked' => [0,4,6], 
        'Shift' => [0,1,0,1,0,1], 
        'HrsWorked' => [3, 5.5, 3, 5.5, 3, 5.5]
    ],
    [
        'Name' => 'Alexander',
        'Availability' => [0, 3, 5],
        'Preference' => [2],
        'DaysWorked' => [0,3,5], 
        'Shift' => [2,2,0,1], 
        'HrsWorked' => [2, 2, 3, 5.5]
    ],
    [
        'Name' => 'Nick',
        'Availability' => [1, 4],
        'Preference' => [3],
        'DaysWorked' => [1], 
        'Shift' => [2], 
        'HrsWorked' => [3.5]
    ],
    [
        'Name' => 'Sam',
        'Availability' => [2, 4],
        'Preference' => [3],
        'DaysWorked' => [2], 
        'Shift' => [2], 
        'HrsWorked' => [2]
    ],
    [
        'Name' => 'Daniel',
        'Availability' => [1, 3],
        'Preference' => [0, 1],
        'DaysWorked' => [1,3], 
        'Shift' => [0,1,0,1], 
        'HrsWorked' => [3, 5.5, 3, 5.5]
    ],
    [
        'Name' => 'Henok',
        'Availability' => [1, 2],
        'Preference' => [1, 2],
        'DaysWorked' => [2], 
        'Shift' => [0,1], 
        'HrsWorked' => [3, 5.5]
    ]
];

//Kruislink availability, preference 

$NamesUsed = [];

$NewPlanning = [
    'Maandag 09:00-17:30' => [],
    'Maandag 19:00-21:00' => [],
    'Dinsdag 09:00-17:30' => [],
    'Dinsdag 19:00-21:00' => [],
    'Woensdag 09:00-17:30' => [],
    'Woensdag 19:00-21:00' => [],
    'Donderdag 09:00-17:30' => [],
    'Donderdag 19:00-21:00' => [],
    'Vrijdag 09:00-17:30' => [],
    'Zaterdag 09:00-17:30' => [],
    'Zondag 09:00-17:30' => [],
]; 

for ($i = 0; $i < count($CoachePlanner); $i++) {
    $Name = $CoachePlanner[$i]['Name'];
    $Preference = $CoachePlanner[$i]['Preference'];
    $Availability = $CoachePlanner[$i]["Availability"];

    foreach ($Availability as $day) {
        
        switch($day) {
            case 0:
         
                    if (in_array(0, $Preference) || in_array(1, $Preference)){ 
                        array_push($NewPlanning, ['Maandag 09:00-17:30'],$Name);
        
                    }
                    elseif (in_array(2, $Preference) && (count($NewPlanning['Maandag 09:00-17:30']) < 1)) {
                        array_push($NewPlanning, ['Maandag 19:00-21:00'], $Name);
                    } else {
                        array_push($NewPlanning, ['Maandag 09:00-17:30'],$Name);
                    }

                    if (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Maandag 09:00-17:30'])) {
                        array_push($NewPlanning['Maandag 09:00-17:30'], $Name);
        
                        }
                        else {
                        array_push($NewPlanning['Maandag 19:00-21:00'], $Name);
                     
                        }
                    }

                break;

            case 1:
        
                    if (in_array(0, $Preference) || in_array(1, $Preference)) { 
                        array_push($NewPlanning['Dinsdag 09:00-17:30'], $Name);
               
                    }
                    elseif (in_array(2, $Preference)) { 
                        array_push($NewPlanning['Dinsdag 19:00-21:00'], $Name);
                    
                    }
                    elseif (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Dinsdag 09:00-17:30'])) {
                            array_push($NewPlanning['Dinsdag 09:00-17:30'], $Name);
                          
                    }
                    else {
                        array_push($NewPlanning['Dinsdag 19:00-21:00'], $Name);
                      
                    }
                }
                
                break;

            case 2:
             
                    if (in_array(0, $Preference) || in_array(1, $Preference)) {
                        array_push($NewPlanning['Woensdag 09:00-17:30'],$Name);
                       
                    }
                    elseif (in_array(2, $Preference)) {
                        array_push($NewPlanning['Woensdag 19:00-21:00'],$Name);
                   
                    }
                    elseif (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Woensdag 09:00-17:30'])) {
                            array_push($NewPlanning['Woensdag 09:00-17:30'],$Name);
                            
                        }
                        else {
                            array_push($NewPlanning['Woensdag 19:00-21:00'], $Name);
                        
                    }
                }
            
                break;

            case 3:
            
                    if (in_array(0, $Preference) || in_array(1, $Preference)) { 
                        array_push($NewPlanning['Donderdag 09:00-17:30'], $Name);
                    
                    }
                    elseif (in_array(2, $Preference)) {
                        array_push($NewPlanning['Donderdag 19:00-21:00'], $Name);
                       
                    }
                    elseif (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Donderdag 09:00-17:30'])) {
                            array_push($NewPlanning['Donderdag 09:00-17:30'], $Name);
                            
                    }
                        else {
                            array_push($NewPlanning['Donderdag 19:00-21:00'], $Name);
                            
                    }
                }
          
                break;

            case 4:
              
                    if (in_array(0, $Preference) || in_array(1, $Preference)) { 
                        array_push($NewPlanning['Vrijdag 09:00-17:30'], $Name);
                       
                    }
              
                    elseif (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Vrijdag 09:00-17:30'])) {
                            array_push($NewPlanning['Vrijdag 09:00-17:30'], $Name);
                          
                        }
                    }
                
                break;

            case 5:
                if
               
                    if (in_array(0, $Preference) || in_array(1, $Preference)) { 
                        array_push($NewPlanning['Zaterdag 09:00-17:30'], $Name);
                      
                    }
                    elseif (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Zaterdag 09:00-17:30'])) {
                            array_push($NewPlanning['Zaterdag 09:00-17:30'], $Name);
                            
                        }
                    }
                
                break;
            case 6:
                if (!in_array($Name, $NamesUsed)) {
                    if (in_array(0, $Preference) || in_array(1, $Preference)) { 
                        array_push($NewPlanning['Zondag 09:00-17:30'], $Name);
                       
                    }
               
                    elseif (in_array(3, $Preference)) {
                        if (empty($NewPlanning['Zondag 09:00-17:30'])) {
                            array_push($NewPlanning['Zondag 09:00-17:30'], $Name);
                        
                        }
                 
                }}
                break;
        }
    }

}

$ShiftDay = [
    'Maandag 09:00-17:30',
    'Maandag 19:00-21:00',
    'Dinsdag 09:00-17:30',
    'Dinsdag 19:00-21:00',
    'Woensdag 09:00-17:30',
    'Woensdag 19:00-21:00' ,
    'Donderdag 09:00-17:30' ,
    'Donderdag 19:00-21:00',
    'Vrijdag 09:00-17:30' ,
    'Zaterdag 09:00-17:30',
    'Zondag 09:00-17:30',
];

//Controleren op legen dagen:
for ($i = 0; $i < count($ShiftDay); $i++) {
    $shift = $ShiftDay[$i];
    if(empty($NewPlanning[$shift])) {
        // echo "LEEG: $shift ". PHP_EOL;
    }
    if(count($NewPlanning[$shift]) > 1) {
        // echo "MEER DAN EEN: $shift ". PHP_EOL;
    } 

}

//Opvullen met 
var_dump($NewPlanning);
