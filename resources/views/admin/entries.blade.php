@extends('layouts.admin')

@section('page-title', 'Gestione Pratiche')
@section('page-description', 'Visualizza e gestisci tutte le pratiche amministrative')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
    <div class="flex-1">
        <div class="flex items-center space-x-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" placeholder="Cerca pratiche..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Tutti gli Uffici</option>
                <option value="tecnico">Ufficio Tecnico</option>
                <option value="amministrativo">Ufficio Amministrativo</option>
                <option value="urbanistica">Ufficio Urbanistica</option>
                <option value="ragioneria">Ufficio Ragioneria</option>
                <option value="personale">Ufficio Personale</option>
            </select>
        </div>
    </div>
    <div class="mt-4 lg:mt-0 lg:ml-6">
        <a href="{{ route('admin.entries.create') }}" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold inline-flex items-center transition-all duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            Nuova Pratica
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ufficio</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contenuto</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Oggetto</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Spesa Prevista</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Protocollo</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Documento</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stato</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Azioni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($entries as $entry)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $entry['date'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $entry['ufficio'] }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 max-w-xs truncate" title="{{ $entry['contenuto'] }}">
                            {{ $entry['contenuto'] }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $entry['oggetto'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-green-600">{{ $entry['spesa_prevista'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-mono text-indigo-600">{{ $entry['protocollo'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm inline-flex items-center">
                            <i class="fas fa-download mr-1"></i>
                            {{ $entry['document'] }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($entry['status'] == 'Approvato')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Approvato
                            </span>
                        @elseif($entry['status'] == 'In Revisione')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                In Revisione
                            </span>
                        @elseif($entry['status'] == 'Pendente')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fas fa-hourglass-half mr-1"></i>
                                Pendente
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-play-circle mr-1"></i>
                                In Corso
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.entries.edit', $entry['id']) }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200" title="Modifica">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="if(confirmDelete()) { document.getElementById('delete-form-{{ $entry['id'] }}').submit(); }" class="text-red-600 hover:text-red-800 transition-colors duration-200" title="Elimina">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="delete-form-{{ $entry['id'] }}" action="{{ route('admin.entries.delete', $entry['id']) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6 flex items-center justify-between">
    <div class="text-sm text-gray-700">
        Visualizzazione di <span class="font-medium">1</span> - <span class="font-medium">{{ count($entries) }}</span> di <span class="font-medium">{{ count($entries) }}</span> risultati
    </div>
    <div class="flex space-x-2">
        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
            Precedente
        </button>
        <button class="px-3 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-lg hover:bg-indigo-700 transition-colors duration-200">
            1
        </button>
        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
            Successivo
        </button>
    </div>
</div>

<script>
// Add search functionality
document.querySelector('input[placeholder="Cerca pratiche..."]').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Add office filter functionality
document.querySelector('select').addEventListener('change', function(e) {
    const filterValue = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        if (filterValue === '') {
            row.style.display = '';
        } else {
            const officeCell = row.children[1].textContent.toLowerCase();
            if (officeCell.includes(filterValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
});
</script>
@endsection