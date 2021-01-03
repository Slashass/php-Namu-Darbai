var pageCounter = 1;
var animalContainer = document.getElementById("animal-info");
var btn = document.getElementById("btn");

// Mygtuko paskirimas
btn.addEventListener("click", function () {
    var ourRequest = new XMLHttpRequest();
    // Is kur traukia info
    ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
    // persiuncia info per JSON filtra
    ourRequest.onload = function () {
        // ERRORS tikrinimas del status 
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var ourData = JSON.parse(ourRequest.responseText);
            renderHTML(ourData);
        } else {
            console.log("We connected to the server, but it returned an error.");
        }
    };
    // ERRORS
    ourRequest.onerror = function () {
        console.log("Connection error");
    }

    // siuncia ka turim gaut
    ourRequest.send();
    // naudo 3 puslapius max nes trys skitringi JSON
    pageCounter++;
    if (pageCounter > 3) {
        btn.classList.add("hide-me");
    }
});

// HTML veikimas
function renderHTML(data) {
    var htmlString = "";
    for (i = 0; i < data.length; i++) {
        htmlString += "<p>" + data[i].name + " is a " + data[i].species + " likes to eat";
        for (ii = 0; ii < data[i].foods.likes.length; ii++) {
            if (ii == 0) {
                htmlString += data[i].foods.likes[ii];
            } else {
                htmlString += " and " + data[i].foods.likes[ii];
            }
        }
        htmlString += ' and disklikes ';
        for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
            if (ii == 0) {
                htmlString += data[i].foods.dislikes[ii];
            } else {
                htmlString += " and " + data[i].foods.dislikes[ii];
            }
        }
        htmlString += '.</p>'
    }

    animalContainer.insertAdjacentHTML('beforeend', htmlString);
}