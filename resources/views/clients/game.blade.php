<!DOCTYPE html>
<html>

<head>
   <title>Python in the Browser</title>
   <script type="text/javascript" src="{{ asset('storage/assets/py-js/skulpt.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('storage/assets/py-js/skulpt-stdlib.js') }}"></script>
   <script src="{{ asset('storage/assets/cm/lib/codemirror.js') }}"></script>
   <link rel="stylesheet" href="{{ asset('storage/assets/cm/lib/codemirror.css') }}">
   <link rel="stylesheet" href="{{ asset('storage/assets/cm/theme/dracula.css') }}">
   <script src="{{ asset('storage/assets/cm/mode/python/python.js') }}"></script>
   <script src="{{ asset('storage/assets/phaser/dist/phaser-arcade-physics.min.js') }}"></script>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <style>
      /* * {
         border: solid 1px red;
      } */
   </style>
</head>

<body class="bg-gray-700">
   <div class="min-h-screen flex">
      <div class="w-1/2 h-full p-10">
         <div class="bg-slate-800 text-slate-400 rounded-t-xl pl-2 p-1">Python Editor</div>
         <textarea name="" id="py-editor" cols="30" rows="10">
#jangan hapus kode ini
#pertama kita akan belajar bagaimana cara untuk menampilkan output dari program python
#dengan cara mengetikkan print('ubah tulisan ini dengan output yang diinginkan')
#masukkan kode di bawah ini
</textarea>
         <div class="rounded-b-xl flex justify-between items-center bg-slate-800 p-2">
            <button id="run-button" class="px-4 py-2 bg-slate-400 text-slate-800 rounded-xl">Run</button>
            <div class="text-slate-600"></div>
            <button id="ready-button" class="px-4 py-2 bg-slate-400 text-slate-800 rounded-xl">Mulai Game</button>
         </div>
         <div class="font-mono bg-neutral-800 border-gray-100 border border-solid text-gray-50 rounded-lg min-h-[100px] mt-5">
            <div class="bg-gray-500 rounded-t-lg pl-2">Output</div>
            <div class="p-2">#Hasil kode di atas akan ditampilkan di sini</div>
            <div id="output" class="p-2"></div>
         </div>
      </div>
      <div class="w-1/2 h-full p-10">
         <div class="hidden rounded-xl" id="game-container">

         </div>

         <!-- <div class="circle"></div> -->
      </div>
   </div>


   <script>
      var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('py-editor'), {
         lineNumbers: true,
         mode: "python",
         lineNumber: true,
         theme: 'dracula'
      })
   </script>
   <script>
      document.getElementById("ready-button").addEventListener("click", function(){
         document.getElementById("game-container").classList.remove("hidden");
      });
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
      const imageUrl = @json(asset('storage/assets/phaser_asset/preload/uniba.jpeg'));
      const dude = @json(asset('storage/assets/phaser_asset/preload/dude.png'));
      const grass = @json(asset('storage/assets/phaser_asset/preload/path.png'));
      const finish = @json(asset('storage/assets/phaser_asset/preload/finish.png'));
      const win = @json(asset('storage/assets/phaser_asset/preload/win.jpeg'));
      var config = {
         type: Phaser.AUTO,
         parent: 'game-container',
         width: 800,
         height: 600,
         physics: {
            default: 'arcade',
            arcade: {
               gravity: {
                  y: 300
               },
               debug: false
            }
         },
         scene: {
            preload: preload,
            create: create,
            // update: update,
            update: movePlayerBasedOnInnerHTML
         }
      }
      var game = new Phaser.Game(config);

      function preload() {
         this.load.image('bg', imageUrl);
         this.load.image('grass', grass);
         this.load.image('finish', finish);
         this.load.image('win', win);
         this.load.spritesheet('dude', dude, {
            frameWidth: 32,
            frameHeight: 48
         });
      }

      function create() {
         this.add.image(400, 300, 'bg');

         platforms = this.physics.add.staticGroup();
         finishline = this.physics.add.group({
            key: 'finish',
            repeat: 1,
            setXY: {
               x: 750,
               y: 300,
               stepX: 0
            }
         });

         platforms.create(400, 598, 'grass');

         player = this.physics.add.sprite(100, 200, 'dude');


         player.setBounce(0.2);
         player.setCollideWorldBounds(true);

         this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('dude', {
               start: 0,
               end: 3
            }),
            frameRate: 10,
            repeat: -1
         });

         this.anims.create({
            key: 'turn',
            frames: [{
               key: 'dude',
               frame: 4
            }],
            frameRate: 20
         });

         this.anims.create({
            key: 'right',
            frames: this.anims.generateFrameNumbers('dude', {
               start: 5,
               end: 8
            }),
            frameRate: 10,
            repeat: -1
         });
         this.physics.add.collider(player, platforms);
         this.physics.add.collider(finishline, platforms);
         this.physics.add.overlap(player, finishline, isfinish, null, this);
         // cursors = this.input.keyboard.createCursorKeys();
      }

      function isfinish(player, finishline) {
         finishline.disableBody(true, true);
         this.add.image(400, 300, 'win').setScale(2);
         var victoryMessage = this.add.text(100, 100, 'Congratulations! You Win!', {
            fontSize: '32px',
            fill: '#000000'
         });
      }

      function movePlayerBasedOnInnerHTML() {
         var innerHTML = document.getElementById('output').innerHTML.trim(); // Replace 'your-element-id' with the actual element ID

         if (innerHTML === 'move') {
            player.setVelocityX(160); // Move the player to the right
            player.anims.play('right', true);
         } else {
            player.setVelocityX(0);
            player.anims.play('turn');
         }
      }


      // function update() {
      //    if (cursors.left.isDown) {
      //       player.setVelocityX(-160);

      //       player.anims.play('left', true);
      //    } else if (cursors.right.isDown) {
      //       player.setVelocityX(160);

      //       player.anims.play('right', true);
      //    } else {
      //       player.setVelocityX(0);

      //       player.anims.play('turn');
      //    }

      //    if (cursors.up.isDown && player.body.touching.down) {
      //       player.setVelocityY(-330);
      //    }
      // }
      // // class Example extends Phaser.Scene {
      //    preload() {
      //       this.load.setBaseURL('https://labs.phaser.io');

      //       this.load.image('sky', 'assets/skies/space3.png');
      //       this.load.image('logo', 'assets/sprites/phaser3-logo.png');
      //       this.load.image('red', 'assets/particles/red.png');
      //    }

      //    create() {
      //       this.add.image(400, 300, 'sky');

      //       const particles = this.add.particles(0, 0, 'red', {
      //          speed: 100,
      //          scale: {
      //             start: 1,
      //             end: 0
      //          },
      //          blendMode: 'ADD'
      //       });

      //       const logo = this.physics.add.image(400, 100, 'logo');

      //       logo.setVelocity(100, 200);
      //       logo.setBounce(1, 1);
      //       logo.setCollideWorldBounds(true);

      //       particles.startFollow(logo);
      //    }
      // }

      // const config = {
      //    type: Phaser.AUTO,
      //    parent: 'game-container',
      //    width: 800,
      //    height: 600,
      //    scene: Example,
      //    physics: {
      //       default: 'arcade',
      //       arcade: {
      //          gravity: {
      //             y: 200
      //          }
      //       }
      //    }
      // };

      // const game = new Phaser.Game(config);
   </script>
</body>

</html>