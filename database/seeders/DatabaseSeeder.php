<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Level;
use App\Models\Theme;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Level::create([
            'level_name' => 'Introduction',
            'level_number' => 1,
            'main_code' => '# gunakan perintah di bawah untuk menjalankan karakter
# "moveRight" untuk bergerak ke kanan
# "moveLeft" untuk bergerak ke kiri
# "moveUp" untuk bergerak ke atas
# "moveDown" untuk bergerak ke bawah
# masukkan perintah di atas ke dalam fungsi print() untuk menjalankan karakter
# contoh: print("moveRight")
print()
',
            'modul' => '<div class="text-lg font-bold">Selamat datang di game Dell-A</div>
Game ini adalah game adventure interaktifinteraktif yang dirancang untuk melatih keterampilan pemrograman Python sambil menghadirkan pengalaman bermain yang menyenangkan. Dalam permainan ini, pemain diminta untuk mengetik kode Python yang akan menggerakkan karakter utama berdasarkan perintah spesifik yang diberikan sebagai output. Tujuan utama dari permainan ini adalah untuk membawa karakter ke titik akhir atau finish point.
<br><div class="text-lg font-bold">Logika Permainan</div>
Input Kode Python: Pemain harus menulis kode Python sebagai input yang berisi perintah untuk menggerakkan karakter.
Perintah Gerakan Karakter: Perintah-perintah untuk menggerakkan karakter adalah sebagai berikut:
<ul class="list-disc list-inside">
               <li><code>moveRight</code>: Menggerakkan karakter ke kanan.</li>
               <li><code>moveDown</code>: Menggerakkan karakter ke bawah.</li>
               <li><code>moveLeft</code>: Menggerakkan karakter ke kiri.</li>
               <li><code>moveUp</code>: Menggerakkan karakter ke atas.</li>
            </ul>
Penggunaan print() dalam Python: Perintah-perintah di atas harus dipanggil menggunakan fungsi print() bawaan dari Python. Misalnya, untuk menggerakkan karakter ke kanan, pemain harus mengetik print("moveRight").
Tujuan Permainan: Karakter harus bergerak menuju titik finish point sesuai dengan instruksi yang diberikan melalui kode Python yang ditulis oleh pemain.
<br><div class="text-lg font-bold">Contoh kode:</div>
<pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>print("moveRight") // untuk menggerakkan karakter ke kanan
print("moveDown") // untuk menggerakkan karakter ke bawah
print("moveRight") // untuk menggerakkan karakter ke kanan
print("moveUp") // untuk menggerakkan karakter ke atas</code></pre>
<p>Permainan ini tidak hanya menguji kemampuan pemain dalam menulis kode Python yang benar, tetapi juga kemampuan mereka dalam merencanakan langkah-langkah untuk mencapai tujuan dengan efektif. Selamat bermain dan semoga sukses membawa karakter Anda ke finish point!</p>'
        ]);
        Level::create([
            'level_name' => 'Variabel dan Tipe Data',
            'level_number' => 2,
            'main_code' => '# gunakan variabel yang telah ada untuk menjalankan karakter
rightCommand = "moveRight"
leftCommand = "moveDown"
upCommand = "moveUp"
downCommand = "moveLeft"
# masukkan variabel di atas ke dalam fungsi print() tanpa tanda petik untuk menjalankan karakter
# perhatikan isi dari variabel yang akan digunakan bukan nama dari variabel 
print(rightCommand)
',
            'modul' => '<div class="text-lg font-bold">Variabel dan Tipe Data</div>
<p>Variabel adalah lokasi memori yang dicadangkan untuk menyimpan nilai-nilai. Ini berarti bahwa ketika Anda membuat sebuah variabel Anda memesan beberapa ruang di memori. Variabel menyimpan data yang dilakukan selama program dieksekusi, yang natinya isi dari variabel tersebut dapat diubah oleh operasi - operasi tertentu pada program yang menggunakan variabel.
Penulisan variabel Python sendiri juga memiliki aturan tertentu, yaitu:</p>
<ul class="list-disc list-inside">
   <li>Karakter pertama harus berupa huruf atau garis bawah/underscore _</li>
   <li>Karakter selanjutnya dapat berupa huruf, garis bawah/underscore _ atau angka</li>
   <li>Karakter pada nama variabel bersifat sensitif (case-sensitif). Artinya huruf kecil dan huruf besar dibedakan. Sebagai contohvariabel <code>namaDepan</code> dan <code>namadepan</code> adalah variabel yang berbeda</li>
</ul>
<div class="text-lg font-bold">Variabel dan Tipe Data</div>
<p>Tipe data adalah suatu media atau memori pada komputer yang digunakan untuk menampung informasi. Python sendiri mempunyai tipe data yang cukup unik bila kita bandingkan dengan bahasa pemrograman yang lain. Contoh tipe data : String, Number , List.</p>


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tipe Data
                </th>
                <th scope="col" class="px-6 py-3">
                    Contoh
                </th>
                <th scope="col" class="px-6 py-3">
                    Penjelasan
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Boolean
                </th>
                <td class="px-6 py-4">
                    True atau False
                </td>
                <td class="px-6 py-4">
                    Menyatakan benar(true) yang bernilai 1, atau salah(false) yang bernilai 0
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    String
                </th>
                <td class="px-6 py-4">
                    "Ayo belajar Python"
                </td>
                <td class="px-6 py-4">
                    Menyatakan karakter/kalimat bisa berupa huruf angka, dll (diapit tanda " atau \');
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Integer
                </th>
                <td class="px-6 py-4">
                    25 atau 1209
                </td>
                <td class="px-6 py-4">
                    Menyatakan bilangan bulat
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Float
                </th>
                <td class="px-6 py-4">
                    3.14 atau 0.99
                </td>
                <td class="px-6 py-4">
                    Menyatakan bilangan yang mempunyai koma
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Hexadecimal
                </th>
                <td class="px-6 py-4">
                    9a atau 1d3
                </td>
                <td class="px-6 py-4">
                    Menyatakan bilangan dalam format heksa (bilangan berbasis 16)
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Complex
                </th>
                <td class="px-6 py-4">
                    1 + 5j
                </td>
                <td class="px-6 py-4">
                    Menyatakan pasangan angka real dan imajiner
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    List
                </th>
                <td class="px-6 py-4">
                    [\'xyz\', 786, 2.23]
                </td>
                <td class="px-6 py-4">
                    Data untaian yang menyimpan berbagai tipe data dan isinya bisa diubah-ubah
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Tuple
                </th>
                <td class="px-6 py-4">
                    (\'xyz\', 786, 2.23)
                </td>
                <td class="px-6 py-4">
                    Data untaian yang menyimpan berbagai tipe data dan isinya tidak bisa diubah
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    Dictionary
                </th>
                <td class="px-6 py-4">
                    Data untaian yang menyimpan berbagai tipe data berupa pasangan penunjuk dan nilai
                </td>
                <td class="px-6 py-4">
                    { \'nama\' : \'sugi\', \'id\': 2 }
                </td>
            </tr>
        </tbody>
    </table>
</div>
<p>Namun jangan khawatir kita hanya akan mempelajari beberapa tipe data yang sering digunakan dalam pemrograman python.</p>
'
        ]);
        Level::create([
            'level_name' => 'Aritmatika',
            'level_number' => 3,
            'main_code' => '# gunakan variabel yang telah ada untuk menjalankan karakter

informatika = 274
sistemInformasi = 125
total = informatika + sistemInformasi

# lengkapi kode di bawah ini
# isi variabel berhenti dan terapkan operator aritmatika pada variabel hasil sehingga mempunyai nilai 390
berhenti = 
hasil = total

# jangan hapus kode dibawah ini
if (hasil == 390):
    print("moveRight")
    print("moveRight")
    print("moveDown")
',
            'modul' => '<div class="text-lg font-bold">Variabel dan Tipe Data</div>
            <p>Operator Aritmatika adalah operator yang digunakan untuk melakukan operasi matematika seperti penjumlahan, pengurangan, pembagian, perkalian, perpangkatan, menghitung sisa bagi (modulus), dan lain sebagainya. Di bawah ini adalah tabel operator aritmetika yang terdapat pada bahasa pemrograman Python.</p>
            <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Operasi
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    +
                </th>
                <td class="px-6 py-4">
                    Menambahkan dua obyek
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    -
                </th>
                <td class="px-6 py-4">
                    Mengurangi obyek dengan obyek lain
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    *
                </th>
                <td class="px-6 py-4">
                    Perkalian
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    **
                </th>
                <td class="px-6 py-4">
                    Pangkat
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    /
                </th>
                <td class="px-6 py-4">
                    Pembagian
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    //
                </th>
                <td class="px-6 py-4">
                    Pembagian bulat bawah
                </td>
            </tr>
            <tr class="border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    %
                </th>
                <td class="px-6 py-4">
                    Sisa hasil bagi (Modulus)
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
<p>Jadi pada dasarnya operator aritmatika dalam python sangat mirip dengan operator aritmatika pada matematika. Namun, pada python kita harus memperhatikan beberapa hal seperti tipe data yang digunakan, dan lain sebagainya.</p>'
        ]);
        Level::create([
            'level_name' => 'Conditional Statement / Seleksi Kondisi',
            'level_number' => 4,
            'main_code' => '# isi variabel di bawah dengan nilai yang benar

# isi variabel isMoveRightTwice dengan nilai boolean
isMoveRightTwice = 

# isi variabel jumlahMoveDown dengan nilai integer ketika program berjalan
jumlahMoveDown = int(input("Masukkan jumlah moveDown: (1/2/3)"))

# cocokkan nilai variabel jumlahMoveLeft dengan fungsi if yang anda buat di bawah
# anda bisa langsung mengisi nilai atau menggunakan fungsi input() untuk mengisi nilai nanti ketika program berjalan
jumlahMoveLeft =

if isMoveRightTwice == True:
    print("moveRight")
    print("moveRight")
else:
    print("isMoveRight false")

if jumlahMoveDown == 1:
    print("moveDown")
elif jumlahMoveDown == 2:
    print("moveDown")
    print("moveDown")
elif jumlahMoveDown == 3:
    print("moveDown")
    print("moveDown")
    print("moveDown")
else:
    print("invalid option")
    
# buat perintah if di bawah ini untuk menjalanan karakter ke kiri
if
',
            'modul' => '<div class="text-lg font-bold">Seleksi Kondisi</div>
            <p>Pada umumnya dalam membuat program, selalu ada seleksi dimana diperlukan pengecekan suatu kondisi untuk mengarahkan program agar berjalan sesuai keinginan. Pada Python untuk melakukan suatu pengecekan kondisi, terdapat tiga macam statemen. Antara lain :</p>
            <ul class="list-disc list-inside">
               <li>Perintah if</li>
               <li>Perintah if - else</li>
               <li>Perintah if - elif - else</li>
            </ul>
            <div class="text-lg font-bold">if</div>
            <p>Statemen if digunakan untuk melakukan penyeleksian dimana jika kondisi bernilai benar maka progam akan mengeksekusi statemen dibawahnya. Dalam python, untuk penulisan pengkondisian dan statemen di pisahkan oleh tanda titik dua ( : ). Contohnya,</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code># Program perintah if
nama = "python"
if nama == "python":
    print("Hallo " + nama)
# hasilnya akan menjadi Hallo python.</code></pre>
            <p>Untuk setiap penulisan perintah if setelah penentuan kondisi maka dilanjutkan dengan penulisan tanda titik dua ( : ). Tanda titik dua ini berarti jika kondisi bernilai benar maka statemen-statemen setelah tanda titik dua akan di jalankan</p>
            <div class="text-lg font-bold">if - else</div>
            <p>Statemen if – else digunakan untuk melakukan penyeleksian kondisi dimana jika kondisi bernilai benar maka program akan mengeksekusi statemen 1. Namun, jika nilai kondisi bernilai salah maka statemen 2 yang akan dieksekusi</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>kunci = "Python"
password = input("Masukkan Password: ")
if password == kunci:
    print("Password Benar")
else:
    print("Password Salah")</code></pre>
            <p>penggunaan input() dalam variabel memungkinkan variabel diisi nilai ketika program telah berjalan</p>
            <div class="text-lg font-bold">if - elif - else</div>
            <p>Statemen if – else - elif digunakan untuk melakukan penyeleksian kondisi dimana kondisi yang diberikan lebih dari 1 kondisi atau memiliki beberapa kondisi. Jika kondisi pertama bernilai benar maka lakukan seleksi kondisi ke-dua dan seterusnya. Bentuk umum perntah if – else – elif </p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>angka = int(input("Masukkan angka: "))
if angka > 0:
    print("Angka Positif")
elif angka < 0:
    print("Angka Negatif")
else:
    print("Angka Nol")</code></pre>
            <p>Penggunaan int() dalam variabel angka berfungsi untuk mengatur nilai dari variabel, dalam kasus ini nilai dari variabel harus integer atau int</p>'
        ]);

        Level::create([
            'level_name' => 'Perulangan / Looping',
            'level_number' => 5,
            'main_code' => 'commands = ["moveRight", "moveRight", "moveRight", "moveUp", "moveUp", "moveRight", "moveRight"]
# buat perulangan for di bawah ini menggunakan variabel commands
for

# buat variabel di bawah ini dengan nama daftarPerintah yang berisi 4 perintah "moveDown"

for perintah in daftarPerintah:
    print(perintah)

# perbaiki kode while di bawah ini (update nilai sisaBaterai di dalam kode while agar tidak infinite loop)
sisaBaterai = 3
kosong = 0
while sisaBaterai > kosong:
    print("moveLeft")',
            'modul' => '<div class="text-lg font-bold">Perulangan</div>
            <p>Perintah perulangan di gunakan untuk mengulang pengeksekusian statemen-statemen hingga berkali-kali sesuai dengan iterasi yang diinginkan. Dalam python, perintah untuk perulangan (loop) adalah while dan for.</p>
            <div class="text-lg font-bold">While</div>
            <p>Perintah while pada python merupakan perintah yang paling umum digunakan untuk proses iterasi. Konsep sederhana dari perintah while adalah ia akan mengulang mengeksekusi statemen dalam blok while selama nilai kondisinya benar. Dan ia akan keluar atau tidak melakukan eksekusi blok statemen jika nilai kondisinya salah.</p>
            <p>Contoh</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>a = 0
b = 10
while a < b:
    print(a)
    a = a + 1</code></pre>
            <p>Perintah di atas akan menghasilkan output 0 sampai 9. nilai awal a adalah 0. Kemudian ketika a kurang dari b maka akan di eksekusi print(a) dan a akan di tambah 1, penambahan ini dilakukan untuk menghindari infinity loop atau perulangan tak terbatas dengan cara mengubah nilai a ( a = a + 1 ) di dalam kode while. Jika tidak ada perubahan dalam nilai a maka program akan terus berjalan, dalam kasus ini akang menghasilkan 0 dengan jumlah tak terbatas, karena a = 0(tidak berubah) dan a < 10.</p>
            <div class="text-lg font-bold">For</div>
            <p>Perintah for dalam python mempunyai ciri khas tersendiri dibandingkan dengan bahasa pemrograman lain. Tidak hanya mengulang bilangan-bilangan sebuah ekspresi aritmatik, atau memberikan keleluasaan dalam mendefinisikan iterasi perulangan dan menghentikan perulangan pada saat kondisi tertentu. Dalam python, statemen for bekerja mengulang berbagai macam tipe data sekuensial seperti List, String, dan Tuple.</p>
            <p>Contoh</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>daftarAngka = [1, 2, 3, 4, 5]
for angka in daftarAngka:
    print(angka)</code></pre>
            <p>Perintah di atas akan menghasilkan output 1, 2, 3, 4, 5. Perintah for akan mengulang setiap elemen yang ada di dalam daftarAngka kemudian nilai tiap elemen akan dimasukkan ke dalam variabel baru angka dan di print.</p>
            <div class="text-lg font-bold">Break</div>
            <p>Perintah break digunakan untuk menghentikan jalannya proses iterasi pada statemen for atau while. Statemen yang berada di bawah break tidak akan di eksekusi dan program akan keluar dari proses looping.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>x = 4
while x < 5:
    if x == 3:
        break
    print(x)
    x = x + 1
else:
    print("Loop selesai")</code></pre>
            <div class="text-lg font-bold">Continue</div>
            <p>Statemen continue menyebabkan alur program kembali ke perintah looping. Jadi jika dalam sebuah perulangan terdapat statemen continue, maka program akan kembali ke perintah looping untuk iterasi selanjutnya.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>n = 10
while n:
    n = n - 1
    if n % 2 != 0:
        continue
    print(n)</code></pre>
            <div class="text-lg font-bold">Pass</div>
            <p>Statemen pass mengakibatkan program tidak melakukan tindakan apa-apa. Perintah pass biasanya digunakan untuk mengabaikan suatu blok statemen perulangan, pengkondisian, class, dan fungsi yang belum didefinisikan badan programnya agar tidak terjadi error ketika proses compilasi.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>while True : pass</code></pre>
            <p>Namun tenang saja, kita hanya akan menggunakan for dan while saja untuk saat ini. Semangat!</p>
            '
        ]);
        Level::create([
            'level_name' => 'Fungsi / Function',
            'level_number' => 6,
            'main_code' => 'def moveUp(steps):
    for step in range(steps):
        print("moveUp")

# buat fungsi untuk moveRight, moveDown, dan moveLeft di bawah ini
# anda bebas menggunakan nama fungsi dan variable yang anda inginkan
def

def

def

# tambahkan parameter step yang berupa angka sebagai jumlah langkah karakter di dalam moveUp(), contoh moveUp(1)
moveUp()
# panggil fungsi telah anda buat di bawah ini
',
            'modul' => '<div class="text-lg font-bold">Fungsi / Function</div>
            <p>Fungsi (Function) adalah suatu program terpisah dalam blok sendiri yang berfungsi sebagai sub-program (modul program) yang merupakan sebuah program kecil untuk memproses sebagian dari pekerjaan program utama. Fungsi digunakan untuk mengumpulkan beberapa perintah yang sering dipakai dalam sebuah program.</p>
            <p>Fungsi juga bisa diartikan sebagai bagian dari program yang dapat digunakan kembali. Hal ini bisa dicapai dengan memberi nama pada blok statemen, kemudian nama ini dapat dipanggil di manapun dalam program. Kita telah menggunakan beberapa fungsi builtin seperti range.</p>
            <p>Fungsi dalam Python didefinisikan menggunakan kata kunci def. Setelah def ada nama pengenal fungsi diikut dengan parameter yang diapit oleh tanda kurung dan diakhir dingan tanda titik dua :. Baris berikutnya berupa blok fungsi yang akan dijalankan jika fungsi dipanggil.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>def moveRight():
    print("moveRight")

moveRight()</code></pre>
            <p>Seperti contoh di atas, kita bisa membuat sebuah fungsi yang berisi kode. Untuk menjalankan kode tersebut kita cukup memanggil nama fungsinya saja. Hal ini akan sangat membantu ketika kita mempunyai banyak kode, dengan membuat sebuah fungsi kita bisa menggunakan fungsi tanpa membuat kode yang baru.</p>
            <p>Contoh fungsi dengan parameter</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>def tampilkanPerintah(perintah):
    print(perintah)

tampilkanPerintah("moveRight")</code></pre>
            <p>Contoh di atas adalah contoh fungsi dengan parameter. Fungsi tampilkanPerintah akan menerima parameter perintah dan akan menampilkan perintah tersebut. Ketika kita memanggil fungsi tampilkanPerintah("moveRight") maka akan menampilkan moveRight.</p>
            <div class="text-lg font-bold">Keuntungan menggunakan fungsi</div>
            <ul class="list-disc list-inside">
               <li>Program besar dapat di pisah-pisah menjadi program-program kecil melalui function.</li>
               <li>Kemudahan dalam mencari kesalahan-kesalahan karena alur logika jelas dan kesalahan dapat dilokalisasi dalam suatu modul tertentu.</li>
               <li>Memperbaiki atau memodifikasi program dapat dilakukan pada suatu modul tertentu saja tanpa menggangu keseluruhan program.</li>
               <li>Dapat digunakan kembali (Reusability) oleh program atau fungsi lain.</li>
               <li>Meminimalkan penulisan perintah yang sama.</li>
            </ul>
            <div class="text-lg font-bold">Standard library function</div>
            <p>Selain kita bisa membuat Fungsi sendiri, kita juga bisa menggunakan fungsi bawaan Python yang dapat digunakan oleh pengguna. Fungsi-fungsi ini disebut sebagai fungsi standar. Fungsi standar ini dapat digunakan tanpa mengimpor modul apa pun. Beberapa fungsi standar yang sering digunakan adalah:</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>input() : Untuk menerima input dari pengguna
print() : Untuk menampilkan output ke layar
raw_input() : Untuk menerima input dari pengguna dalam bentuk string termasuk karakter spasi atau white space
open() : Untuk membuka file
max() : Untuk mencari nilai maksimum dari suatu objek
min() : Untuk mencari nilai minimum dari suatu objek
abs() : Untuk mencari nilai absolut dari suatu objek
len() : Untuk menghitung panjang dari suatu objek
range() : Untuk membuat deret angka
type() : Untuk mengetahui tipe data dari suatu objek</code></pre>
            '
        ]);
        Level::create([
            'level_name' => 'List dan Tuple',
            'level_number' => 7,
            'main_code' => 'def listCommand(listPerintah):
    for perintah in listPerintah:
        print(perintah)

listPerintah = ["moveDown", "moveRight", "moveUp", "moveUp", "moveUp", "moveLeft", "moveLeft", "moveUp", "moveUp"]
# modifikasi listPerintah dengan cara contoh listPerintah[4] = "moveRight"
listPerintah 
# delete satu element yang tidak diperlukan
del
listCommand(listPerintah)

# buat fungsi tupleCommands yang bisa menerima parameter tupleRight dan tupleDown, contoh: contohFungsi(parameter1, parameter2)
# gabungkan tupleRight dan tupleDown menjadi variable baru contoh: tupleAll
# kemudian gunakan for untuk menjalankan semua perintah di dalam variable baru yang anda buat
def

tupleRight = ("moveRight", "moveRight", "moveRight", "moveRight")
tupleDown = ("moveDown", "moveDown", "moveDown", "moveDown")
tupleCommands(tupleRight, tupleDown)
',
            'modul' => '<div class="text-lg font-bold">List</div>
            <p>Dalam bahasa pemrograman Python, struktur data yang paling dasar adalah urutan atau lists. Setiap elemen-elemen berurutan akan diberi nomor posisi atau indeksnya. Indeks pertama dalam list adalah nol, indeks kedua adalah satu dan seterusnya.</p>
            <p>Python memiliki enam jenis urutan built-in, namun yang paling umum adalah list dan tuple. Ada beberapa hal yang dapat Anda lakukan dengan semua jenis list. Operasi ini meliputi pengindeksan, pengiris, penambahan, perbanyak, dan pengecekan keanggotaan. Selain itu, Python memiliki fungsi built-in untuk menemukan panjang list dan untuk menemukan elemen terbesar dan terkecilnya.</p>
            <div class="text-lg font-bold">Membuat List Python</div>
            <p>List adalah tipe data yang paling serbaguna yang tersedia dalam Bahasa Python, yang dapat ditulis sebagai daftar nilai yang dipisahkan koma (item) antara tanda kurung siku. Hal penting tentang daftar adalah item dalam list tidak boleh sama jenisnya.</p>
            <p>Membuat list sangat sederhana, tinggal memasukkan berbagai nilai yang dipisahkan koma di antara tanda kurung siku. Dibawah ini adalah contoh sederhana pembuatan list dalam bahasa Python.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>list1 = [\'physics\', \'chemistry\', 1997. 2000]
list2 = [1, 2, 3, 4, 5]
list3 = ["a", "b", "c", "d"]</code></pre>
            <p>Untuk mengakses sebuah nilai dalam list python, gunakan tanda kurung siku untuk mengiris beserta indeks atau indeks untuk mendapatkan nilai yang tersedia pada indeks tersebut</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>list1 = [\'physics\', \'chemistry\', 1997. 2000]
print("list1[0]: ", list1[0])
print("list1[2]: ", list1[2])</code></pre>
            <p>Output dari kode di atas adalah: physics dan 1997. index dari list dimulai dari 0, jadi:</p>
            <ul class="list-disc list-inside">
               <li>list1[0] adalah physics</li>
               <li>list1[1] adalah chemistry</li>
               <li>list1[2] adalah 1997</li>
               <li>list1[3] adalah 2000</li>
            </ul>
            <div class="text-lg font-bold">Menghapus List</div>
            <p>Untuk menghapus nilai di dalam list python, Anda dapat menggunakan salah satu pernyataan del jika Anda tahu persis elemen yang Anda hapus. Anda dapat menggunakan metode remove() jika Anda tidak tahu persis item mana yang akan dihapus.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>list1 = [\'physics\', \'chemistry\', 1997. 2000]
del list1[2]
print("list1 setelah dihapus elemen dengan index 2: ", list1)</code></pre>
            <p>Output dari kode di atas adalah: physics, chemistry, 2000. Karena elemen dengan index 2 yaitu 1997 telah dihapus.</p>
            <br>
            <div class="text-lg font-bold">Tuple</div>
            <p>Sebuah tupel adalah urutan objek Python yang tidak berubah. Tupel adalah urutan, seperti daftar. Perbedaan utama antara tupel dan daftarnya adalah bahwa tupel tidak dapat diubah tidak seperti List Python. Tupel menggunakan tanda kurung, sedangkan List Python menggunakan tanda kurung siku.</p>
            <p>Membuat tuple semudah memasukkan nilai-nilai yang dipisahkan koma. Secara opsional, Anda dapat memasukkan nilai-nilai yang dipisahkan koma ini di antara tanda kurung juga.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>tuple1 = (\'physics\', \'chemistry\', 1997, 2000)
tuple2 = (1, 2, 3, 4, 5)
tuple3 = ("a", "b", "c", "d")</code></pre>
            <p>Untuk mengakses nilai dalam tuple, gunakan tanda kurung siku untuk mengiris bersamaan dengan indeks atau indeks untuk mendapatkan nilai yang tersedia pada indeks tersebut</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>tuple1 = (\'physics\', \'chemistry\', 1997, 2000)
tuple2 = (1, 2, 3, 4, 5, 6, 7)
print("tuple1[0]: ", tuple1[0])
print("tuple2[1:5]: ", tuple2[1:5])</code></pre>
            <p>Tupel tidak berubah, yang berarti Anda tidak dapat memperbarui atau mengubah nilai elemen tupel. Anda dapat mengambil bagian dari tupel yang ada untuk membuat tupel baru seperti ditunjukkan oleh contoh berikut.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>tuple1 = (12, 34.56)
tuple2 = (\'abc\', \'xyz\')
# tuple1[0] = 100 # Error: karena tuple tidak dapat diubah
tuple3 = tuple1 + tuple2
print(tuple3)</code></pre>
            <p>Output dari kode di atas adalah: (12, 34.56, \'abc\', \'xyz\'). Karena tuple tidak dapat diubah, tapi kita bisa membuat tuple baru dan beri nilai dengan tuple yang telah ada.</p>
            <p>Menghapus elemen tuple individual tidak mungkin dilakukan. Tentu saja, tidak ada yang salah dengan menggabungkan tupel lain dengan unsur-unsur yang tidak diinginkan dibuang.</p>
            <p>Untuk secara eksplisit menghapus keseluruhan tuple, cukup gunakan del statement.</p>
            <pre class="w-auto inline-block bg-gray-900 text-white p-4 rounded"><code>tuple1 = (\'physics\', \'chemistry\', 1997, 2000)
del tuple1</code></pre>
            '
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
