<td class="flex items-center pt-1.5">
    <button id="dropdown-toggle" class="inline-flex items-center text-sm font-medium hover:bg-gray-200 p-1.5 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none " type="button">
        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
        </svg>
    </button>
<div id="dropdown-menu" 
    class="hidden bg-gray-50 rounded shadow absolute justify-start">
    <ul class="py-1 text-sm ">
        <li>
            <button type="button" data-modal-toggle="UpdateTechModal " id="UpdateTechModal" class="flex w-full items-center py-2 px-4 hover:bg-gray-100  text-gray-700">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                </svg>
                Edit
            </button>
        </li>
    </ul>
    @include('../models/Update')
</div>
</td>
<script>
    const toggleButton = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');

    toggleButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        dropdownMenu.classList.add('flex')
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!dropdownMenu.contains(event.target) && !toggleButton.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            dropdownMenu.classList.toggle('felx');

        }
    });
</script>