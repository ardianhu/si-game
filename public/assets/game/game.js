// CODE EDITOR

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// Initialize CodeMirror editor
const editor = CodeMirror.fromTextArea(document.getElementById('py-editor'), {
    mode: {
       name: "python",
       version: 3,
       singleLineStringErrors: false
    },
    lineNumbers: true,
    indentUnit: 4,
    matchBrackets: true,
    theme: 'ayu-dark'
 });

 editor.setSize('100%', '100%');

 function builtinRead(x) {
    if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined) {
       throw "File not found: '" + x + "'";
    }
    return Sk.builtinFiles["files"][x];
 }

 let commandsArray = [];

 function runCode() {
    const outputDiv = document.getElementById('output');
    outputDiv.innerHTML = ''; // Clear previous output
    commandsArray = []; // clear previous commands

    Sk.configure({
        inputfun: function (prompt) {
            return window.prompt(prompt);
        },
        inputfunTakesPrompt: true,
       output: function(text) {
          const pre = document.createElement('pre'); // buat elemen baru
          pre.innerText = text; // isi elemen dengan output
          console.log(text);
          outputDiv.appendChild(pre);
          commandsArray.push(text.trim());
       },
       read: builtinRead,
       execLimit: 200, // limit execution
    });

    (Sk.TurtleGraphics || (Sk.TurtleGraphics = {})).target = 'output';

    const code = editor.getValue();
    Sk.misceval.asyncToPromise(function() {
       return Sk.importMainWithBody("<stdin>", false, code, true);
    }).then(function(mod) {
       console.log(code);
       processCommands();
    }, function(err) {
       const pre = document.createElement('pre');
       pre.innerText = err.toString();
       outputDiv.appendChild(pre);
    });
 }

 document.getElementById('run-button').addEventListener('click', runCode);


// GAME 
const board = document.getElementById('game-board');
const boardSize = 8;

let playerPosition = { x: 0, y: 0 };
let mainPosition = { x: 0, y: 0 };
let boardLayout = [
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0]
];


// starter code
// var starterCode = mainCode
// console.log(starterCode)

// console.log(typeof(levelNumber))
const level = parseInt(levelNumber);
// console.log(typeof(level))
switch (level) {
    case 1:
        mainPosition = { x: 3, y: 4 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 2, 0, 2, 1, 1, 1],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [1, 1, 2, 0, 2, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
        case 2:
        mainPosition = { x: 2, y: 4 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [1, 1, 0, 0, 2, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
        case 3:
        mainPosition = { x: 2, y: 4 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [1, 1, 0, 0, 2, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
        case 4:
        mainPosition = { x: 2, y: 3 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [1, 1, 1, 1, 0, 1, 1, 1],
            [1, 1, 1, 2, 0, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
        case 5:
        mainPosition = { x: 1, y: 3 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 0, 0, 0, 1],
            [1, 1, 1, 1, 0, 1, 0, 1],
            [1, 0, 0, 0, 0, 1, 0, 1],
            [1, 1, 1, 1, 1, 1, 0, 1],
            [1, 1, 1, 2, 0, 0, 0, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
        case 6:
        mainPosition = { x: 1, y: 5 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 0, 0, 0, 0, 0, 0, 1],
            [1, 0, 1, 1, 1, 1, 0, 1],
            [1, 0, 0, 0, 0, 0, 0, 1],
            [1, 0, 1, 1, 1, 1, 0, 1],
            [1, 0, 1, 2, 0, 0, 0, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
        case 7:
        mainPosition = { x: 1, y: 5 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 0, 0, 0, 0, 0, 1, 1],
            [1, 0, 1, 1, 1, 0, 1, 1],
            [1, 0, 0, 0, 1, 0, 1, 1],
            [1, 1, 1, 0, 1, 0, 1, 1],
            [1, 0, 0, 0, 1, 2, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1]
        ];
        break;
    default:
        playerPosition = { x: 0, y: 0 };
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [0, 0, 0, 0, 0, 0, 0, 2],
            [0, 1, 1, 1, 1, 1, 0, 0],
            [0, 1, 0, 0, 0, 1, 0, 0],
            [0, 1, 0, 1, 0, 1, 0, 0],
            [0, 1, 0, 1, 0, 1, 0, 0],
            [0, 0, 0, 1, 0, 1, 0, 0],
            [1, 1, 0, 1, 0, 0, 0, 0],
            [1, 0, 0, 0, 0, 1, 1, 0]
        ];
        break;

}

let isGameOver = false
let commandTimeouts = []

function createBoard() {
    for (let y = 0; y < boardSize; y++) {
        for (let x = 0; x < boardSize; x++) {
            const tile = document.createElement('div');
            tile.classList.add('tile');
            if (boardLayout[y][x] === 0) {
                tile.classList.add('green');
            } else if (boardLayout[y][x] === 1) {
                tile.classList.add('red');
            } else if (boardLayout[y][x] === 2) {
                tile.classList.add('finish');
            }
            board.appendChild(tile);
        }
    }
    updatePlayerPosition();
}

function updatePlayerPosition() {
    console.log(playerPosition);
    document.querySelectorAll('.tile').forEach(tile => tile.classList.remove('player'));
    const playerIndex = playerPosition.y * boardSize + playerPosition.x;
    const playerTile = board.children[playerIndex];
    playerTile.classList.add('player');
}

function handleCommand(command, callback) {
    if (isGameOver) return

    const { x, y } = playerPosition;
    if (command === 'moveUp' && y > 0) {
        playerPosition.y -= 1;
    } else if (command === 'moveDown' && y < boardSize - 1) {
        playerPosition.y += 1;
    } else if (command === 'moveLeft' && x > 0) {
        playerPosition.x -= 1;
    } else if (command === 'moveRight' && x < boardSize - 1) {
        playerPosition.x += 1;
    }
    updatePlayerPosition();
    if (callback) {
        callback();
    }
}

function checkGameState(callback) {
    const { x, y } = playerPosition;
    var finalCode = editor.getValue();
    var starterCode = mainCode;
    var validated = false
    if (validateCode(finalCode, starterCode)) {
        validated = true
    }
    console.log(validated)
    if (boardLayout[y][x] === 1) {
        isGameOver = true
        setTimeout(() => {
            // alert('You lost!');
            Swal.fire({
                title: 'You lost!',
                text: 'You hit a red mine!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
            clearCommandTimeouts(); // Clear remaining timeouts
            resetGame();
            callback();
        }, 400);
    } else if (boardLayout[y][x] === 2 && validated) {
        isGameOver = true
        setTimeout(() => {
            stopTimer();
            Swal.fire({
                title: 'Congratulations!',
                text: 'You won!',
                icon: 'success',
                confirmButtonText: 'Next Level'
            }).then((result) => {
                if (result.isConfirmed) {
                    const time = `${hour}:${minute}:${second}.${count}`;
                    $.ajax({
                        url: '/update-level',
                        type: 'POST',
                        data: {
                            level: level,
                            time: time
                        },
                        success: function(response) {
                            console.log(response.message);
                            
                            if (response.message == 'You have completed the game') {
                                Swal.fire({
                                    title: 'Congratulations!',
                                    text: 'You have completed the game!',
                                    icon: 'success',
                                    confirmButtonText: 'Close'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/'
                                    }
                                });
                            } else {
                                window.location.href = '/game'
                            }
                        },
                        error: function(error) {
                            console.error('Error updating level:', error);
                        }
                    });
                }
            });
            clearCommandTimeouts(); // Clear remaining timeouts
            resetGame();
            callback();
        }, 400);
    } else if (boardLayout[y][x] === 2 && !validated) {
        isGameOver = true
        setTimeout(() => {
            stopTimer();
            Swal.fire({
                title: 'Cheating Detected!',
                text: 'you are prohibited from changing the starter code!',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            clearCommandTimeouts(); // Clear remaining timeouts
            resetGame();
            callback();
        }, 500);
    } else {
        callback();
    }
}

function resetGame() {
    console.log(mainPosition);
    playerPosition = {...mainPosition}
    console.log(playerPosition)
    updatePlayerPosition();
    isGameOver = false
}

function clearCommandTimeouts() {
    commandTimeouts.forEach(timeoutID => clearTimeout(timeoutID));
    commandTimeouts = [];
}

function processCommands() {
    commandsArray.forEach((command, index) => {
        const timeoutID = setTimeout(() => {
            if (isGameOver) return; // Prevent processing further commands if game is over
            handleCommand(command, () => {
                if (index === commandsArray.length - 1) {
                    checkGameState(() => {
                        setTimeout(resetGame, 400); // Ensure reset after all commands
                    });
                } else {
                    checkGameState(() => {}); // Check state after each command
                }
            });
        }, index * 400); // 400 milliseconds delay

        commandTimeouts.push(timeoutID); // Store the timeout ID
    });
}

// document.addEventListener('keydown', handleKeyPress);
document.addEventListener('DOMContentLoaded', createBoard);


// TIMER
let hour = 0;
            let minute = 0;
            let second = 0;
            let count = 0;
            let timer;
 
            $('#start').on('click', function () {
                // Check if the timer is already running
                if (!timer) {
                    timer = setInterval(stopWatch, 10);
                }
            });
 
            $('#stop').on('click', function () {
                clearInterval(timer);
                timer = null; // Reset timer variable
            });

            function startTimer() {
                if (!timer) {
                    timer = setInterval(stopWatch, 10);
                }
            }

            function stopTimer() {
                clearInterval(timer);
                timer = null; // Reset timer variable
            }
 
            $('#reset').on('click', function () {
                clearInterval(timer);
                timer = null; // Reset timer variable
                hour = 0;
                minute = 0;
                second = 0;
                count = 0;
                updateDisplay();
            });
 
            function stopWatch() {
                count++;
 
                if (count == 100) {
                    second++;
                    count = 0;
                }
 
                if (second == 60) {
                    minute++;
                    second = 0;
                }
 
                if (minute == 60) {
                    hour++;
                    minute = 0;
                    second = 0;
                }
 
                updateDisplay();
            }
 
            function updateDisplay() {
                $('#hr').text(hour.toString().padStart(2, '0'));
                $('#min').text(minute.toString().padStart(2, '0'));
                $('#sec').text(second.toString().padStart(2, '0'));
                $('#count').text(count.toString().padStart(2, '0'));
            }

// modal
$('#openModul-button').click(function() {
    $('#myModal').removeClass('hidden');
});

$('#closeModalBtn, #closeModalBtnFooter').click(function() {
    if (!timer) {
        timer = setInterval(stopWatch, 10);
    }
    $('#myModal').addClass('hidden');
});

// Close modal when clicking outside of it
$(window).click(function(event) {
    if ($(event.target).is('#myModal')) {
        $('#myModal').addClass('hidden');
    }
});

// Validate code
function validateCode(finalCode, starterCode) {
    // Decode HTML entities in the starter code
    starterCode = decodeHTMLEntities(starterCode);

    // Split the code into lines and trim each line
    var finalLines = finalCode.split('\n').map(line => line.trim());
    var starterLines = starterCode.split('\n').map(line => line.trim());

    // Join final lines back to a single string for easier search
    var finalCodeString = finalLines.join('\n');

    // console.log("Final Code String:", finalCodeString);
    // console.log("Starter Lines:", starterLines);

    // Check if each line of the starter code is present in the final code
    for (var i = 0; i < starterLines.length; i++) {
        var starterLine = starterLines[i];

        // console.log(`Checking starter line ${i + 1}: ${starterLine}`);

        // Search for the current starter line in the final code string
        if (!finalCodeString.includes(starterLine)) {
            console.log(`Starter line ${i + 1} not found in final code`);
            return false;
        }
    }

    return true;
}
function decodeHTMLEntities(text) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = text;
    return textArea.value;
}