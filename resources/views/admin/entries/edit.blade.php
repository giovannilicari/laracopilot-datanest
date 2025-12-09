@extends('layouts.admin')

@section('page-title', 'Modifica Pratica')
@section('page-description', 'Modifica i dettagli della pratica amministrativa')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('admin.entries.update', $entry['id']) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-calendar mr-2 text-indigo-500"></i>Data
                    </label>
                    <input type="date" id="date" name="date" value="{{ $entry['date'] }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                </div>

                <div>
                    <label for="ufficio" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-building mr-2 text-indigo-500"></i>Ufficio
                    </label>
                    <select id="ufficio" name="ufficio" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                        <option value="">Seleziona Ufficio</option>
                        @foreach($offices as $office)
                            <option value="{{ $office }}" {{ $entry['ufficio'] == $office ? 'selected' : '' }}>{{ $office }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="oggetto" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-indigo-500"></i>Oggetto
                </label>
                <input type="text" id="oggetto" name="oggetto" value="{{ $entry['oggetto'] }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                       placeholder="Inserisci l'oggetto della pratica">
            </div>

            <div>
                <label for="contenuto" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-align-left mr-2 text-indigo-500"></i>Contenuto
                </label>
                <textarea id="contenuto" name="contenuto" rows="5" required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                          placeholder="Descrizione dettagliata della pratica">{{ $entry['contenuto'] }}</textarea>
            </div>

            <div>
                <label for="spesa_prevista" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-euro-sign mr-2 text-indigo-500"></i>Spesa Prevista (€)
                </label>
                <input type="number" id="spesa_prevista" name="spesa_prevista" value="{{ $entry['spesa_prevista'] }}" step="0.01" min="0" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                       placeholder="0.00">
            </div>

            <div>
                <label for="protocollo" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-barcode mr-2 text-indigo-500"></i>Numero Protocollo
                </label>
                <input type="text" id="protocollo" name="protocollo" value="{{ $entry['protocollo'] }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                       placeholder="PROT-YYYY-XXX">
            </div>

            <div>
                <label for="document" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-indigo-500"></i>Documento Allegato
                </label>
                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                    <div class="flex items-center">
                        <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                        <span class="text-sm text-gray-700">Documento attuale: documento_001.pdf</span>
                        <a href="#" class="ml-auto text-indigo-600 hover:text-indigo-800 text-sm">
                            <i class="fas fa-download mr-1"></i>Download
                        </a>
                    </div>
                </div>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-400 transition-colors duration-200">
                    <div class="space-y-1 text-center">
                        <div class="mx-auto w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cloud-upload-alt text-white text-xl"></i>
                        </div>
                        <div class="flex text-sm text-gray-600">
                            <label for="document" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                <span>Carica nuovo file</span>
                                <input id="document" name="document" type="file" class="sr-only" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </label>
                            <p class="pl-1">o trascina qui</p>
                        </div>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX, XLS, XLSX fino a 10MB</p>
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-amber-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-amber-800">Attenzione</h3>
                        <div class="mt-2 text-sm text-amber-700">
                            <p>Le modifiche a questa pratica saranno registrate nel sistema di audit. Assicurati che le informazioni siano corrette prima di salvare.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <a href="{{ route('admin.entries') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200 inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Annulla
                </a>
                <button type="submit" onclick="showLoading(this)" class="btn-primary px-8 py-3 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg inline-flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Aggiorna Pratica
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// File upload preview
document.getElementById('document').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const fileInfo = document.createElement('div');
        fileInfo.className = 'mt-2 text-sm text-gray-600';
        fileInfo.innerHTML = `<i class="fas fa-file mr-2"></i>Nuovo file selezionato: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
        
        const existingInfo = e.target.closest('.border-dashed').querySelector('.mt-2.text-sm.text-gray-600');
        if (existingInfo) {
            existingInfo.remove();
        }
        
        e.target.closest('.border-dashed').appendChild(fileInfo);
    }
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('border-red-500');
            field.focus();
        } else {
            field.classList.remove('border-red-500');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Per favore, compila tutti i campi obbligatori.');
    }
});
</script>
@endsection