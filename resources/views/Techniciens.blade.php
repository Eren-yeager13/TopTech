<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes Techniciens</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
@auth
<body class="bg-gray-100 antialiased p-3 h-screen font-[Outfit]">
    
    @include('nav')
        <main class="p-5">
                <h1 class="text-2xl mt-3 mb-5 ">{{$user->nom}}</h1>
                <h2 class="text-2xl text-center mb-3 mt-4 select-none">Mes Techniciens</h2>
                @if (session('error'))
                    <div class="bg-red-400 w-full border rounded px-2"><span class="text-red-900 text-base ">{{session('error')}}</span></div>
                @endif
                @if (session('success'))
                    <div class="bg-green-400 w-full border rounded  px-2"><span class="text-green-900 text-base ">{{session('success')}}</span></div>
                @endif
                <!--       -->
                <section class="overflow-auto rounded-lg shadow bg-gray-50">
                <div class="flex justify-between items-center mx-10 my-3">
                    <form class="flex items-center" action="{{route('Techniciens')}}" method="GET">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name='search' id="simple-search" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" >
                        </div>
                    </form>

                    <div class="flex ">
                        <select id="statusFilter" class="w-full md:w-auto mx-10 flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100">
                            <option value="all">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        
    
                        <button type="button" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Ajoute un technicien
                        </button>
                    </div>
                </div>
                <!--    -->
               
               @if (!$tech->isEmpty())
               <table class="table-auto border rounded-full place-items-center w-full ">
                <thead class="bg-gray-100 border-b-2 border border-gray-200">
                    <tr>
                        <th class="p-2 font-semibold tracking-wide text-center">Matricule</th>
                        <th class="p-2 font-semibold tracking-wide text-center">Nom</th>
                        <th class="p-2 font-semibold tracking-wide text-center">status</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($tech as $item)
                    <tr class='text-center tech-row'>
                        <td class="p-3">{{$item->matricule_tech}}</td>
                        <td class="p-3">{{$item->nom}}</td>
                        @if($item->status == 'active')
                        <td class="p-3 status-cell"><span class="text-green-900 bg-green-300 px-2 py-1 border rounded-lg tracking-wider text-sm">Active</span></td>
                        @else
                        <td class="p-3 status-cell"><span class="text-gray-900 bg-gray-300 px-2 py-1 border rounded-lg tracking-wider text-sm">Inactive</span></td>
                        @endif
                        <td class="p-3 flex items-center hover:bg-gray-100">
                            <button type="button" class="flex w-full items-center hover:bg-gray-100  text-gray-700" data-modal-id="UpdateTechModal_{{ $item->id_tech }}">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                </svg>
                                Edit
                            </button>
                            @include('models.Update')
                        </td>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="bg-gray-50 text-gray-600 rounded-md py-2 px-4 border border-gray-300 dark:bg-gray-50">{{$tech->links()}}</div>
             --}}
            
             <div class="py-2 px-4">
                {{ $tech->links() }}
              </div>
             
            </section>
               @endif
            <!-- Create model-->
           @include('models.TechnicienModel')
           
            <!--  model end -->   
        </main>
  
</body>
@endauth
</html>

<script>
    const statusFilter = document.getElementById('statusFilter');

    statusFilter.addEventListener('change', function() {
        const selectedStatus = statusFilter.value;
        const rows = document.querySelectorAll('.tech-row');

        rows.forEach(row => {
            const statusCell = row.querySelector('.status-cell');
            if (!statusCell) return; // Skip rows without status cell
            if (selectedStatus === 'all' || statusCell.textContent.trim() === selectedStatus.charAt(0).toUpperCase() + selectedStatus.slice(1)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>






