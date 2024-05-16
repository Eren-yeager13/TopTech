    <div id="UpdateTechModal_{{ $item->id_tech }}" tabindex="-1" aria-hidden="true" 
         class="hidden overflow-y-auto text-left overflow-x-hidden fixed bg-opacity-50 bg-black h-screen top-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow : sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900 ">Update Tech</h3>
                    <button type="button" id="CloseUpdateModel_{{ $item->id_tech }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{route('updateTech',$item->id_tech)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nom</label>
                            <input type="text" name="nom" id="Nom" value="{{$item->nom}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nom de Technicien" required="">
                        </div>
                        <div>
                            <label for="Matricule" class="block mb-2 text-sm font-medium text-gray-900 ">Matricule</label>
                            <input type="text" name="matricule_tech" value="{{$item->matricule_tech}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder=" Matricule" required="">
                        </div>
                        <div>
                            <label for="stuats" class="block mb-2 text-sm font-medium text-gray-900 ">status</label>
                            <select name="stuats"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" >
                                <option value="">Select un Statu</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center :bg-primary-600 :hover:bg-primary-700 :focus:ring-primary-800">Update Tech</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const modalButton = document.querySelector('[data-modal-id="UpdateTechModal_{{ $item->id_tech }}"]');
    const modal = document.getElementById("UpdateTechModal_{{ $item->id_tech }}");
    const modelClose = document.getElementById("CloseUpdateModel_{{ $item->id_tech }}");

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


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalContainer = document.querySelector('.modal-container');
    
            modalContainer.addEventListener("click", function (event) {
                const target = event.target;
                if (target && target.dataset.modalToggle === "modal") {
                    const modalId = target.dataset.modalId;
                    const modal = document.getElementById(modalId);
    
                    modal.classList.toggle("hidden"); // Toggle modal visibility
                    modal.classList.add("flex");
                }
    
                if (target && target.dataset.closeBtnId) {
                    const modalId = target.dataset.closeBtnId;
                    const modal = document.getElementById(modalId);
    
                    modal.classList.toggle("flex");
                    modal.classList.add("hidden");
                }
            });
        });
    </script> --}}


