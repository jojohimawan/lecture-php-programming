<?php 
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: ./../auth/login.php");
    }

    require_once "../php/conn.php";
    require_once "../php/functions.php";

    $id = $_GET["id"];

    $mhs = queryRead("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if( isset($_POST["submit"]) ) {
        if( queryUpdate($_POST) > 0 ) {
            echo 
                '<script> 
                alert("Sukses Update")
                document.location.href = "../index.php"
                </script>
            ';
        } else {
            echo 
                '<script> 
                alert("Gagal Update")
                document.location.href = "../index.php"
                </script>
            ';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <title>Home</title>
</head>
    <body class="bg-slate-50">

    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
    </button>

    <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-8 overflow-y-auto bg-white border-r">
        <ul class="font-medium">
            <li>
                <a href="../index.php" class="flex items-center p-5 text-slate-500 rounded-lg hover:bg-slate-50">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-medium:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../crud/crud.php" class="flex items-center p-5 text-slate-500 rounded-lg hover:bg-slate-50">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-medium:text-slate-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Actions</span>
                </a>
            </li>
            <li>
                <a href="./../auth/logout.php" class="flex items-center p-5 text-red-500 rounded-lg bg-red-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                </a>
            </li>
        </ul>
        <div id="dropdown-cta" class="p-5 mt-6 mx-3 rounded-lg bg-green-50" role="alert">
            <div class="flex items-center mb-3">
                <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">Beta</span>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-800 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-green-200 inline-flex h-6 w-6" data-dismiss-target="#dropdown-cta" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <p class="mb-3 text-sm text-green-700">
                Preview the new Flowbite dashboard navigation! You can turn the new navigation off for a limited time in your profile.
            </p>
            <a class="text-sm text-green-700 underline font-medium hover:text-green-800  " href="#">Turn new navigation off</a>
        </div>
    </div>
    </aside>

    <div class="py-12 px-24 sm:ml-64">
        <div class="w-full justify-between p-4 pb-12 mb-12 border-b">
            <div>
                <span class="text-4xl text-slate-700 font-regular">Edit Data Mahasiswa</span>
            </div>
        </div>

        <form action="" method="post" class="p-4" enctype="multipart/form-data">
            <div class="mb-6">
                <input type="hidden" id="id" name="id" value="<?= $mhs["id"] ?>">
                <input type="hidden" id="berkaslama" name="berkaslama" value="<?= $mhs["berkas"] ?>">
            </div>
            <div class="mb-6">
                <label for="berkas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                <img src="./../berkas/<?= $mhs['berkas'] ?>" alt="Image">
                <input type="file" id="berkas" name="berkas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-6">
                <label for="nrp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NRP</label>
                <input type="text" id="nrp" name="nrp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $mhs["nrp"] ?>" required>
            </div>
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $mhs["nama"] ?>" required>
            </div>
            <div class="mb-6 flex-row w-full gap-y-2">
                <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin </p>
                <div class="flex flex-column w-full gap-x-3">
                    <div class="flex items-center px-4 border border-gray-200 rounded">
                        <input <?php if($mhs["jenis_kelamin"] == "Laki-Laki") { echo 'checked'; } ?> id="jenis_kelamin_1" type="radio" value="Laki-Laki" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="jenis_kelamin_1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">Laki-Laki</label>
                    </div>
                    <div class="flex items-center px-4 border border-gray-200 rounded">
                        <input <?php if($mhs["jenis_kelamin"] == "Perempuan") { echo 'checked'; } ?> id="jenis_kelamin_2" type="radio" value="Perempuan" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="jenis_kelamin_2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                <select type="text" id="jenis_kelamin" name="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option class="text-base" value="1">1</option>
                    <option class="text-base" value="2">2</option>
                    <option class="text-base" value="3">3</option>
                    <option class="text-base" value="4">4</option>
                    <option class="text-base" value="5">5</option>
                    <option class="text-base" value="6">6</option>
                    <option class="text-base" value="7">7</option>
                    <option class="text-base" value="8">8</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="jenjang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenjang</label>
                <select type="text" id="jenis_kelamin" name="jenjang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option class="text-base" value="D3">D3</option>
                    <option class="text-base" value="D4">D4</option>
                    <option class="text-base" value="S2 Terapan">S2 Terapan</option>
                    <option class="text-base" value="PJJ">PJJ</option>
                    <option class="text-base" value="LJ">LJ</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                <select type="text" id="jenis_kelamin" name="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option class="text-base" value="Teknik Informatika">Teknik Informatika</option>
                    <option class="text-base" value="Teknik Komputer">Teknik Komputer</option>
                    <option class="text-base" value="Teknik Elektronika">Teknik Elektronika</option>
                    <option class="text-base" value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                    <option class="text-base" value="Teknik Mekatronika">Teknik Mekatronika</option>
                    <option class="text-base" value="Teknologi Game">Teknologi Game</option>
                    <option class="text-base" value="Teknologi Rekayasa Internet">Teknologi Rekayasa Internet</option>
                    <option class="text-base" value="Teknologi Rekayasa Multimedia">Teknologi Rekayasa Multimedia</option>
                    <option class="text-base" value="Sains Data Terapan">Sains Data Terapan</option>
                    <option class="text-base" value="Elektro Industri">Elektro Industri</option>
                    <option class="text-base" value="Sistem Pembangkit Energi">Sistem Pembangkit Energi</option>
                    <option class="text-base" value="Multimedia dan Broadcasting">Multimedia dan Broadcasting</option>
                </select>
            </div>
            <div class="mb-6">
                <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</p>
                <div class="flex flex-column w-full gap-x-3">
                    <div class="flex items-center px-4 border border-gray-200 rounded">
                        <input <?php if($mhs["kelas"] == "A") { echo 'checked'; } ?> id="kelas_1" type="radio" value="A" name="kelas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="kelas_1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">A</label>
                    </div>
                    <div class="flex items-center px-4 border border-gray-200 rounded">
                        <input <?php if($mhs["kelas"] == "B") { echo 'checked'; } ?> id="kelas_2" type="radio" value="B" name="kelas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="kelas_2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">B</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center gap-x-3" name="submit">Submit</button>
        </form>
    </div>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    </body>
</html>