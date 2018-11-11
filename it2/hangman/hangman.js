function update() {
    document.getElementById("hangman").setAttribute("src", images[lives]);
    document.getElementById("lives").innerHTML = lives;
    
    if (lives == 0) {
        
    }
}

function enterLetter() {
    var letter = document.getElementById("letterInput").value;
    
    if (word.includes(letter)) {
        if (wrongLetters.includes(letter)) {
            alert("Du har allerede gjettet denne bokstaven!");
        }
        else {
            lives--;
            wrongLetters.add
        }
    } else {
        lives--;
    }
    
    update();
}

function start() {
    lives = 6;
    update();
}

var lives;
var images = ["images/hangman-full.png", 
              "images/hangman-5.png", 
              "images/hangman-4.png",
              "images/hangman-3.png",
              "images/hangman-2.png",
              "images/hangman-1.png",
              "images/hangman-base.png",
             ];

var wordList = ["eplekake", 
                "potetmos", 
                "sjokoladepudding", 
                "vaniljesaus", 
                "fårikål"
               ];

var word = wordList[0];
var guessedWord, wrongLetters

start();