console.log("BIT Week Challenge");
//Gekozen datastructuur is een associatieve array;
//Hierin zet ik alle informatie van de coaches;
//Dagen van de week: ma=0, di=1,woe=2,don=3,vrij=4,za=5,zon=6;
//Dagdeel: ochtend =0, middag=1, avond =2;

var CoachePlanner = [
    {
        'Name': 'Sander',
        'Availability': [0, 2, 4, 6],
        'Preference': [2]
    },
    {
        'Name': 'Alexander',
        'Availability': [0, 3, 5],
        'Preference': [2]
    },
    {
        'Name': 'Nick',
        'Availability': [1, 4],
        'Preference': null
    },
    {
        'Name': 'Sam',
        'Availability': [2, 4],
        'Preference': null
    },
    {
        'Name': 'Daniel',
        'Availability': [1, 3],
        'Preference': [0, 2]
    },
    {
        'Name': 'Henok',
        'Availability': [1, 2],
        'Preference': [1, 2]
    }
];

//Kijk of iedere dag beschikbaar is en welke coaches dit zijn.

var Monday = [];


CoachePlanner.forEach(element => {

    if (element['Availability'].includes(0)) {
        console.log("maandag", element['Name']);
        Monday.append(element['Name']);

    } else if (element['Availability'].includes(1)) {
        console.log("dinsdag ", element['Name']);

    } else if (element['Availability'].includes(2)) {
        console.log("woensdag", element['Name']);

    } else if (element['Availability'].includes(3)) {
        console.log("donderdag", element['Name']);

    } else if (element['Availability'].includes(4)) {
        console.log("vrijdag", element['Name']);

    } else if (element['Availability'].includes(5)) {
        console.log("zaterdag", element['Name'])

    } else if (element['Availability'].includes(6)) {
        console.log("zondag", element['Name']);
    }
});

console.log(Monday);
// const Card = document.getElementById("cards-Planner").querySelectorAll('div');

// console.log(Card);
// console.log(CoachePlanner['Name'])

// // const Pcard = document.querySelectorAll('p');


// CoachePlanner.forEach(element => { 
//     console.log(element['Name']);

//     for ($i =0;$i <length;$i++) {

//     }

// });

// Card.forEach(el => {
//     el.textContent = element['Name'];
// })