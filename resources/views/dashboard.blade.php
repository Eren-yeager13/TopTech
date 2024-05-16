<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 antialiased h-screen font-[Outfit] p-3"> 
    @auth
    @include('nav')
        <main class="p-5"> 
            <h1 class="text-2xl mt-3 mb-5">{{$user->nom}}</h1>
            <h2 class="text-2xl text-center mb-3 mt-4 ">Technicien de la Semaine</h2>
            @if (session('success'))
            <div class="bg-green-400 w-full border rounded  px-2"><span class="text-green-900 text-base ">{{session('success')}}</span></div>
            @endif
            @error('error')
                <div class="bg-red-400 w-full border rounded px-2"><span class=" text-red-800 text-base"> {{$message}}</span></div>
            @enderror
            <section class="overflow-auto rounded-lg shadow bg-gray-50">
                    <div class="w-full  p-4 flex justify-between items-center">
                        <form class="flex items-center" action="{{route('dashboard')}}" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="simple-search" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search">
                            </div>
                        </form>
                        <button type="button" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 p focus:outline-none ">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Evaluez un technicien
                        </button>
                    </div>
                    @if(!$Note->isEmpty())
                <table class="table-auto border rounded-full place-items-center w-full ">
                    <thead class="bg-gray-100 border-b-2 border border-gray-200">
                        <tr>
                            <th class="p-3 font-semibold tracking-wide text-center">Matricule</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Nom</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Note Performance</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Note Qualité du travail</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Note Tenue du poste</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Total</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Semaine</th>
                            <th class="p-3 font-semibold tracking-wide text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($Note as $item)
                        <tr class='text-center bg-gray-50'>
                            <td class="p-3">{{$item['matricule_tech']}}</td>
                            <td class="p-3">{{$item['nom']}}</td>
                            <td class="p-3">{{$item['performance']}}</td>
                            <td class="p-3">{{$item['qualite_travail']}}</td>
                            <td class="p-3">{{$item['tenue_poste']}}</td>
                            <td class="p-3">{{$item['total']}}</td>
                            <td class="p-3">{{$item['semaine']}}</td>
                            <td class="flex items-center justify-center pt-1.5">
                                <button type="button" data-modal-id="dropdown-menu-{{ $item['id_note'] }}"
                                class="inline-flex items-center text-sm font-medium hover:bg-gray-200 p-1.5 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            @include('dropdown.Notedropdown')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            @endif
           @include('models.Evaluation')
        </main>
        @endauth
</body>
</html>