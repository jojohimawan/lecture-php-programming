  <?php 
    function validateForm() {
      $errors = array();

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nama = $_POST['nama'];
          if (empty($nama)) {
              $errors[] = 'Nama wajib diisi';
          } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
              $errors[] = 'Hanya huruf dan spasi yang diizinkan';
          }
      }

      return $errors;
    }

    $errors = validateForm();
    $check = "Lihat hasil konversi";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $nilai = $_POST["nilai"];
      $nama = $_POST["nama"];

    if($nilai >= 81 && $nilai <= 100) {
        $predikat = "A";
        $warna = "text-emerald-500";
        $title = "Exquisite!";
    } elseif($nilai >= 71 && $nilai <= 80) {
        $predikat = "AB";
        $warna = "text-emerald-500";
        $title = "Astonishing!";
    } elseif($nilai >= 66 && $nilai <= 70) {
        $predikat = "B";
        $warna = "text-amber-400";
        $title = "Good Job!";
    } elseif($nilai >= 60 && $nilai <= 65) {
        $predikat = "BC";
        $warna = "text-amber-400";
        $title = "You Can Do Better!";
    } elseif($nilai >= 56 && $nilai <= 60) {
        $predikat = "C";
        $warna = "text-red-500";
        $title = "You Should Study";
    } elseif($nilai >= 41 && $nilai <= 55) {
        $predikat = "D";
        $warna = "text-red-500";
        $title = "Are You Okay?";
    } elseif($nilai >= 0 && $nilai <= 40) {
        $predikat = "E";
        $warna = "text-red-500";
        $title = "Just Drop Out Already";
    } else {
        $predikat = "Nilai diluar nalar";
        $warna = "text-sky-500";
        $title = "Lah?";
    }
  }
    
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
  </head>
  <body class=""> 
      <nav class="p-5 bg-white border-gray-200">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      <a href="#" class="flex items-center">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
          <span class="self-center text-xl font-semibold whitespace-nowrap">Converter</span>
      </a>
      <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Home</a>
          </li>
          <li>
            <a href="./predikat.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Predikat</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Pricing</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Contact</a>
          </li>
        </ul>
      </div>
    </div>
      </nav>

      <div class="container mx-auto mt-36">
          <div class="my-16 w-1/2 mx-auto">
              <h1 class="text-left text-slate text-5xl font-bold">Konversi Nilai</h1>
          </div>
      
          <div class="w-1/2 mx-auto my-16">
              <form action="" method="post" class="mb-16">
                  <label for="nama" class="block mb-4 text-2xl font-normal text-slate dark:text-white">Masukkan nama:</label>
                  <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-6 py-3.5 mb-8" placeholder="Type your score">

                  <label for="nilai" class="block mb-4 text-2xl font-normal text-slate dark:text-white">Masukkan nilai:</label>
                  <input type="number" id="nilai" name="nilai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-6 py-3.5 mb-8" placeholder="Type your score" required>

                  <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3.5 text-center ">Konversi</button>
              </form>

          <div class="container mx-auto">
          <?php
                  if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo '<p class="text-center text-red-500 text-2xl font-normal mb-16">' . $error . '</p>';
                    }
                  } else if(!empty($nilai)) {
                    echo '<button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block w-full text-white bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-base px-6 py-3.5 text-center" type="button">'.$check.'</button>';
                  }
              ?>
          </div>

        <!-- Main modal -->
        <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Hasil Konversi
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500">Nama</p>
                    <?php 
                      echo '<p class="text-left text-slate text-2xl font-normal">'.$nama.'</p>';
                    ?>
                    <p class="text-base leading-relaxed text-gray-500">Nilai dan Predikat</p>
                    <?php
                    echo '<p class="text-2xl '.$warna.' my-10 font-bold text-left">'.$predikat."</p>";
                    echo '<p class="text-2xl '.$warna.' my-10 font-bold text-left">'.$title."</p>";
                    ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
          </div>

    

      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
  </body>
  </html>