
    <header class="border-b-2 border border-gray-100 p-2">
        <nav class="flex justify-between items-center mx-auto p-3" >
            <div>
                <img src="https://www.autohall.ma/bundles/client/assets/images/new_images/logo.png" alt="logo"  class="w-16">
            </div>
            <div>
                <ul class="flex items-center gap-10 ">
                    <li><a href="{{route('dashboard')}}" class="hover:text-gray-500 ">Accueil</a></li>
                    <li><a href="{{route('Techniciens')}}" class="hover:text-gray-500">Mes Techniciens</a></li>
                    <li><a href="{{route('Historique')}}" class="hover:text-gray-500">Historique</a></li>
                </ul>
            </div>
            <div >
                <ul class="flex justify-center gap-4 text-xs">
                    <li><a class="bg-red-600 text-white px-3 py-2 rounded-full " href="{{route('Disconnection')}}">
                        Disconnection 
                    </a></li>
                </ul>
            </div>
        </nav>
    </header>