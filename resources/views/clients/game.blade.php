@extends('layouts.master')
@section('title')
@endsection
@section('content')
<!-- Modal -->
<div id="myModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
   <div class="bg-gray-800 rounded-lg shadow-lg w-full h-full flex flex-col">
      <div class="flex justify-between items-center p-4 border-b border-gray-500">
         <h2 class="text-xl pl-6 font-semibold text-white">{{ $logged->level->level_name }}</h2>
         <button id="closeModalBtn" class="text-gray-300 hover:text-gray-600">&times;</button>
      </div>
      <div class="p-10 flex-grow overflow-auto text-gray-300 leading-loose">
         <!-- <pre style="white-space: pre-wrap; word-wrap: break-word;">{!! $logged->level->modul !!}</pre> -->
         <div class="prose prose-invert">
            {!! $logged->level->modul !!}
         </div>
      </div>
      <div class="flex justify-end p-4 border-t border-gray-500">
         <button id="closeModalBtnFooter" class="bg-red-500 text-white px-4 py-2 rounded">Close Modul</button>
      </div>
   </div>
</div>
<div class="bg-gray-900 min-h-screen flex flex-col-reverse md:flex-row space-y-20 md:space-y-0 md:space-x-10 md:pt-20 px-10">
   <div class="w-full md:w-1/2 h-full">
      <div class="bg-slate-800 text-slate-400 rounded-t-xl pl-2 p-1">Python Editor</div>
      <textarea name="" id="py-editor" cols="60" rows="10">{{ $logged->level->main_code }}</textarea>
      <div class="rounded-b-xl flex justify-between items-center bg-slate-800 p-2">
         <button id="openModul-button" class="w-[100px] bg-slate-900 h-[50px] flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#009b49] before:to-[rgb(105,184,141)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">
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
         <div class="bg-gray-500 rounded-t-lg pl-2">Output Console</div>
         <div class="p-2">#Hasil kode di atas akan ditampilkan di sini</div>
         <div id="output" class="p-2"></div>
      </div>
   </div>
   <div class="w-full md:w-1/2 h-full">
      <!-- <div class="hidden flex justify-center rounded-xl" id="game-container">

         </div> -->
      <div class="stopwatch">
         <div class="text-center text-white" id="time">
            <span class="text-3xl" id="hr">00</span>
            <span class="text-xl">Hr</span>
            <span class="text-3xl" id="min">00</span>
            <span class="text-xl">Min</span>
            <span class="text-3xl" id="sec">00</span>
            <span class="text-xl">Sec</span>
            <span class="text-3xl" id="count">00</span>
         </div>
         <!-- <div class="mt-6 flex justify-center">
            <button class="bg-green-500 hover:bg-green-700
                     text-white font-bold py-2 px-4 rounded mr-2" id="start">Start</button>
            <button class="bg-blue-500 hover:bg-blue-700
                     text-white font-bold py-2 px-4 rounded mr-2" id="stop">Stop</button>
            <button class="bg-red-500 hover:bg-red-700
                     text-white font-bold py-2 px-4 rounded" id="reset">Reset</button>
         </div> -->
      </div>
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
               background-image: url('assets/game/asset_green.jpg');
               background-size: cover;
               /* background-color: lightgreen; */
            }

            .red {
               background-image: url('assets/game/asset_red.jpg');
               background-size: cover;
               /* background-color: lightcoral; */
            }

            .finish {
               background-image: url('assets/game/asset_finish.jpg');
               background-size: cover;
            }

            .player {
               background-image: url('assets/game/asset_player.jpg');
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
   var mainCode = `{{ $logged->level->main_code }}`;
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