<div id="createProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed bg-opacity-50 bg-black h-screen top-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow  sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="text-lg font-semibold text-gray-900 ">Ajoute un Technicien</h3>
                <button type="button" id="close" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{Route('AddTech')}}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nom</label>
                        <input type="text" name="nom" id="Nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nom de Technicien" required="">
                    </div>
                    <div>
                        <label for="Matricule" class="block mb-2 text-sm font-medium text-gray-900 ">Matricule</label>
                        <input type="text" name="matricule_tech"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder=" Matricule" required="">
                    </div>
                    
                    <div>
                        <label for="Stuats" class="block mb-2 text-sm font-medium text-gray-900 ">Stuats</label>
                        <select name="stuats" value='' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex mt-4 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Ajoute un Technicien
                </button>
            </form>
            <!--  body end    -->
        </div>
        <!--  content  end -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const modalButton = document.querySelector(
        '[data-modal-toggle="createProductModal"]'
    );
    const modal = document.getElementById("createProductModal");
    const modelClose=document.getElementById("close")

    modalButton.addEventListener("click", function () {
        modal.classList.toggle("hidden"); // Toggle modal visibility
        modal.classList.add("flex");
    });
    modelClose.addEventListener("click", function () {
        modal.classList.toggle("flex");
        modal.classList.add("hidden");
    });
});
</script>