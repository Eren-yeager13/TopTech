    <div id="UpdateEvaluation_{{$item['id_note']}}" tabindex="-1" aria-hidden="true"
     class=" hidden overflow-y-auto overflow-x-hidden text-left fixed bg-opacity-50 bg-black h-screen top-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow  sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                    <h3 class="text-lg font-semibold text-gray-900 ">Edite Evaluation</h3>
                    <button type="button" id="CloseEvaluationModel_{{$item['id_note']}}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{route('UpdateEvaluation',$item['id_note'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">

                        <div>
                            <label for="Technicien" class="block mb-2 text-sm font-medium text-gray-900 ">Technicien</label>
                            <input type="text" name="Technicien" id="Technicien" value="{{$item['nom']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " disabled>
                        </div>

                        <div>
                            <label for="semaine" class="block mb-2 text-sm font-medium text-gray-900 ">Semaine</label>
                            <input type="date" value="{{$item['semaine']}}" name="semaine" step=7 min=2022-01-03  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " required>
                        </div>

                        <div>
                            <label for="performance" class="block mb-2 text-sm font-medium text-gray-900 ">Note Performance</label>
                            <input type="number" value="{{$item['performance']}}" name="performance" oninput="calculateTotal_{{$item['id_note']}}()"  id="performance_{{$item['id_note']}}" max="20" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " required>
                        </div>
                        <div>
                            <label for="qualite_travail" class="block mb-2 text-sm font-medium text-gray-900 ">Note Qualité du travail</label>
                            <input type="number"  name="qualite_travail" value="{{$item['qualite_travail']}}" oninput="calculateTotal_{{$item['id_note']}}()"  id="qualite_travail_{{$item['id_note']}}" max="20" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " required>
                        </div>
                        <div>
                            <label for="tenue_poste" class="block mb-2 text-sm font-medium text-gray-900 ">Note Tenue du poste</label>
                            <input type="number"  name="tenue_poste" value="{{$item['tenue_poste']}}" oninput="calculateTotal_{{$item['id_note']}}()"  id="tenue_poste_{{$item['id_note']}}" max="20" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " required>
                        </div>

                        <div>
                            <label for="Total" class="block mb-2 text-sm font-medium text-gray-900 " >Total</label>
                            <input type="number" readonly name="total" id="total_{{$item['id_note']}}"  max="20" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " >
                        </div>
                       

                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Edite
                    </button>
                </form>
            </div>
        </div>
    </div>





<script language="javascript">
        function calculateTotal_{{$item['id_note']}}() {
        var note_performance = parseInt(document.getElementById('performance_{{$item['id_note']}}').value) || 0;
        var note_qualite_travail = parseInt(document.getElementById('qualite_travail_{{$item['id_note']}}').value) || 0;
        var note_tenue_poste = parseInt(document.getElementById('tenue_poste_{{$item['id_note']}}').value) || 0;

        var total = (note_performance + note_qualite_travail + note_tenue_poste)/3;
        document.getElementById("total_{{$item['id_note']}}").value = total.toFixed(2);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modalButton = document.querySelector(`[data-modal-id="UpdateEvaluation_{{ $item['id_note'] }}"]`);
        const modal = document.getElementById("UpdateEvaluation_{{ $item['id_note'] }}");
        const modelClose = document.getElementById("CloseEvaluationModel_{{$item['id_note']}}");
        modalButton.addEventListener("click", function () {
            modal.classList.remove("hidden"); // Remove hidden class to show the dropdown menu
            modal.classList.add("flex");
        });

        modelClose.addEventListener("click", function () {
            modal.classList.toggle("flex");
            modal.classList.add("hidden");
        });
    });


</script>