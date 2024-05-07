<div id="form_add_record" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-lg font-bold mb-4">Agregar Registro</h2>
        
        <form>
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-2" for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="w-full border-gray-300 rounded-md p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-2" for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="w-full border-gray-300 rounded-md p-2"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">Agregar</button>
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="closePopup()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function closePopup() {
        document.querySelector('#form_add_record').classList.add('hidden');
    }
</script>