<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>PHP Read</title>
    </head>
    <body>

        <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 w-full top-0 left-0 border-b border-gray-200">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="https://jojohimawan.github.io/" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap">CRUD PHP App</span>
                </a>
                <div class="flex md:order-2">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Get started</button>
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Read</a>
                    </li>
                    <li>
                        <a href="./create.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Create</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        
        <div class="mt-24 container mx-auto px-10">
            <div class="mb-10">
                <span class="text-2xl text-slate-700 font-medium">Tabel Read</span>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <?php
                    require_once "conn.php";
                    $sql = "SELECT * FROM mahasiswa";
                    if($result = mysqli_query($conn, $sql)) {
                        if(mysqli_num_rows($result) > 0) {
                            echo'<table class="w-full text-sm text-left text-gray-500">';
                            echo'<thead class="text-xs text-gray-700 uppercase bg-gray-50">';
                                echo'<tr>';
                                    echo'<th scope="col" class="px-6 py-3">
                                        ID
                                    </th>';
                                    echo'<th scope="col" class="px-6 py-3">
                                        NRP
                                    </th>';
                                    echo'<th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>';
                                    echo'<th scope="col" class="px-6 py-3">
                                        Jenis Kelamin
                                    </th>';
                                    echo'<th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>';
                                echo'</tr>';
                            echo'</thead>';
                            echo'<tbody>';
                                while($row = mysqli_fetch_array($result)) {
                                    echo'<tr class="bg-white border-b">';
                                    echo'<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" name="id">'
                                        .$row['id'].
                                    '</th>';
                                    echo'<td class="px-6 py-4">'
                                        .$row['nrp'].
                                    '</td>';
                                    echo'<td class="px-6 py-4">'
                                        .$row['nama'].
                                    '</td>';
                                    echo'<td class="px-6 py-4">'
                                        .$row['jenis_kelamin'].
                                    '</td>';
                                    echo'<td class="flex gap-x-2 px-6 py-4" name="id">
                                    <a href="./update.php?id='.$row['id'].'" class="font-medium text-yellow-500 dark:text-blue-500 hover:underline">Update</a>
                                    <a href="./delete.php?id='.$row['id'].'" class="font-medium text-red-500 dark:text-blue-500 hover:underline">Delete</a>
                                    </td>';
                                echo'</tr>';
                                }
                    echo'</tbody>';
                echo'</table>';
                mysqli_free_result($result);
                
                        }
                    }
                ?>
                
            </div>

            
        </div>


    </body>
</html>