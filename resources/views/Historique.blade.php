<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historique</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="font-[Outfit] bg-gray-100">
    @auth
    @include('nav') 
    <main class="p-5"> 
        <h1 class="text-2xl mt-3 mb-5">{{$user->nom}}</h1>
        <h2 class="text-2xl text-center mb-3 mt-4 "> Les Notes</h2>
        <section class="overflow-auto rounded-lg shadow bg-gray-50">
            <div class="w-full  p-4 flex justify-between items-center">
                <form class="flex items-center" action="{{route('Historique')}}" method="GET">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" name='search' id="simple-search" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search">
                    </div>
                </form>
            </div>
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
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($Note as $item)
                <tr class='text-center'>
                    <td class="p-3">{{$item['matricule_tech']}}</td>
                    <td class="p-3">{{$item['nom']}}</td>
                    <td class="p-3">{{$item['performance']}}</td>
                    <td class="p-3">{{$item['qualite_travail']}}</td>
                    <td class="p-3">{{$item['tenue_poste']}}</td>
                    <td class="p-3">{{$item['total']}}</td>
                    <td class="p-3">{{$item['semaine']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{$notes->links()}}</div>
    </section>   
    @endauth
</body>
</html>