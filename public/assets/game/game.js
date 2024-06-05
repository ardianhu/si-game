// CODE EDITOR
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
       output: function(text) {
          const pre = document.createElement('pre'); // buat elemen baru
          pre.innerText = text; // isi elemen dengan output
          console.log(text);
          outputDiv.appendChild(pre);
          commandsArray.push(text.trim());
       },
       read: builtinRead
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


// console.log(typeof(levelNumber))
const level = parseInt(levelNumber);
// console.log(typeof(level))
switch (level) {
    case 1:
        mainPosition = { x: 0, y: 4 };
        playerPosition = {...mainPosition};
        // Define the board layout with 0 for green tiles, 1 for red tiles, and 2 for the finish tile
        boardLayout = [
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1, 1, 1, 1],
            [0, 0, 0, 0, 0, 0, 0, 2],
            [1, 1, 1, 1, 1, 1, 1, 1],
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
    if (boardLayout[y][x] === 1) {
        setTimeout(() => {
            alert('You lost!');
            resetGame();
            callback();
        }, 400);
    } else if (boardLayout[y][x] === 2) {
        setTimeout(() => {
            alert('You win!');
            resetGame();
            callback();
        }, 400);
    } else {
        callback();
    }
}

function resetGame() {
    console.log(mainPosition);
    playerPosition = {...mainPosition}
    console.log(playerPosition)
    updatePlayerPosition();
}

function processCommands() {
    commandsArray.forEach((command, index) => {
        setTimeout(() => {
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
    });
}

// document.addEventListener('keydown', handleKeyPress);
document.addEventListener('DOMContentLoaded', createBoard);
