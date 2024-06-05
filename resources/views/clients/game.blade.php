@extends('layouts.master')
@section('title')
@endsection
@section('content')
<div class="bg-gray-900 min-h-screen flex flex-col-reverse md:flex-row space-y-20 md:space-y-0 md:space-x-10 md:pt-20 px-10">
   <div class="w-full md:w-1/2 h-full">
      <div class="bg-slate-800 text-slate-400 rounded-t-xl pl-2 p-1">Python Editor</div>
      <textarea name="" id="py-editor" cols="30" rows="10">
#jangan hapus kode ini
#pertama kita akan belajar bagaimana cara untuk menampilkan output dari program python
#dengan cara mengetikkan print('ubah tulisan ini dengan output yang diinginkan')
#masukkan kode di bawah ini
</textarea>
      <div class="rounded-b-xl flex justify-between items-center bg-slate-800 p-2">
         <button class="w-[100px] bg-slate-900 h-[50px] flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#009b49] before:to-[rgb(105,184,141)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">
            Modul
         </button>
         <button id="run-button" class="w-[100px] bg-slate-900 h-[50px] flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#009b49] before:to-[rgb(105,184,141)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">
            Run
         </button>
         <!-- <button id="modal-button" class="px-4 py-2 bg-slate-400 text-slate-800 rounded-xl">Modul</button>
         <div class="text-slate-600"></div>
         <button id="run-button" class="px-4 py-2 bg-slate-400 text-slate-800 rounded-xl">Run</button> -->
      </div>
      <!-- <div class="text-white">
         <h1>Welcome, {{ $logged->name }}</h1>
         <h1>{{ $logged->level->level_name }}</h1>
         <h1>{{ $logged->level->level_number }}</h1>
         <h1>{{ $logged->level->main_code }}</h1>
      </div> -->
      <div id="user_data" data-level-number="{{ $logged->level->level_number }}">{{ $logged->level->level_number }}</div>
      <div class="font-mono bg-neutral-800 border-gray-100 border border-solid text-gray-50 rounded-lg min-h-[100px] mt-5">
         <div class="bg-gray-500 rounded-t-lg pl-2">Output</div>
         <div class="p-2">#Hasil kode di atas akan ditampilkan di sini</div>
         <div id="output" class="p-2"></div>
      </div>
   </div>
   <div class="w-full md:w-1/2 h-full">
      <!-- <div class="hidden flex justify-center rounded-xl" id="game-container">

         </div> -->
      <div class="flex justify-center rounded-xl">
         <!-- <canvas id="game-canvas" class="w-full bg-blue-700"></canvas> -->
         <style>
            #game-board {
               display: grid;
               gap: 1px;
               width: 80vmin;
               /* Using viewport units to make it responsive */
               height: 80vmin;
               /* Ensure the board is square */
               grid-template-columns: repeat(8, 1fr);
               /* Create 8 equal columns */
               grid-template-rows: repeat(8, 1fr);
               /* Create 8 equal rows */
            }

            .tile {
               position: relative;
               display: flex;
               justify-content: center;
               align-items: center;
               font-size: 24px;
            }

            .green {
               background-image: url('assets/game/pavement.png');
               background-size: cover;
               /* background-color: lightgreen; */
            }

            .red {
               background-image: url('assets/game/water.png');
               background-size: cover;
               /* background-color: lightcoral; */
            }

            .finish {
               background-image: url('assets/game/finish.png');
               background-size: cover;
            }

            .player {
               background-image: url('assets/game/player.png');
               background-size: cover;
               /* background-color: yellow; */
            }
         </style>
         <div id="game-board"></div>
      </div>

      <!-- <div class="circle"></div> -->
   </div>
</div>

<script>
   var levelNumber = "{{ $logged->level->level_number }}";
</script>
<script src="{{ asset('/assets/game/game.js') }}"></script>
<script>
   // // Initialize CodeMirror editor
   // const editor = CodeMirror.fromTextArea(document.getElementById('py-editor'), {
   //    mode: {
   //       name: "python",
   //       version: 3,
   //       singleLineStringErrors: false
   //    },
   //    lineNumbers: true,
   //    indentUnit: 4,
   //    matchBrackets: true
   // });

   // function builtinRead(x) {
   //    if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined) {
   //       throw "File not found: '" + x + "'";
   //    }
   //    return Sk.builtinFiles["files"][x];
   // }

   // function runCode() {
   //    const outputDiv = document.getElementById('output');
   //    outputDiv.innerHTML = ''; // Clear previous output

   //    Sk.configure({
   //       output: function(text) {
   //          const pre = document.createElement('pre');
   //          pre.innerText = text;
   //          console.log(pre);
   //          outputDiv.appendChild(pre);
   //       },
   //       read: builtinRead
   //    });

   //    (Sk.TurtleGraphics || (Sk.TurtleGraphics = {})).target = 'output';

   //    const code = editor.getValue();
   //    Sk.misceval.asyncToPromise(function() {
   //       return Sk.importMainWithBody("<stdin>", false, code, true);
   //    }).then(function(mod) {
   //       console.log(code);
   //    }, function(err) {
   //       const pre = document.createElement('pre');
   //       pre.innerText = err.toString();
   //       outputDiv.appendChild(pre);
   //    });
   // }

   // document.getElementById('run-button').addEventListener('click', runCode);
</script>

<!-- <script>
   var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('py-editor'), {
      lineNumbers: true,
      mode: "python",
      lineNumber: true,
      theme: 'dracula'
   })
</script>
<script>
   document
      .getElementById("run-button")
      .addEventListener("click", function() {
         var code = myCodeMirror.getValue();
         myCodeMirror.setValue(code);
         const codeInpput = myCodeMirror.getValue();
         // console.log(codeInpput);
         console.log(code);
         var outputArea = document.getElementById("output");
         Sk.pre = outputArea;
         Sk.configure({
            output: function(text) {
               outputArea.textContent = text;
            },
         });
         Sk.misceval.asyncToPromise(function() {
               return Sk.importMainWithBody("<stdin>", false, code, true);
            })
            .then(function() {
               console.log('move')
               var outputResult = document.getElementById("output").innerHTML.trim();
               const circle = document.querySelector(".circle");
               if (outputResult === "move") {
                  // Move the circle to the right by changing the left position
                  circle.style.marginLeft = "200px";
                  console.log("move");
               }
            })
            .catch(function(err) {
               console.error("Error running Python code:", err);
            });
      });
</script> -->
@endsection
@section('script')
@endsection