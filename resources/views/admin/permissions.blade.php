@extends('layouts.admin')

@section('page-title', 'Gestione Permessi')
@section('page-description', 'Configura i permessi di accesso per utenti e uffici')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
    <div class="flex-1">
        <div class="relative">
            <input type="text" placeholder="Cerca permessi..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </div>
    </div>
    <div class="mt-4 lg:mt-0 lg:ml-6">
        <button onclick="alert('Funzionalità in sviluppo')" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold inline-flex items-center transition-all duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            Nuovo Permesso
        </button>
    </div>
</div>

<div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Utente</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ufficio</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Permessi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Livello Accesso</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Azioni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($permissions as $permission)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-semibold text-xs">{{ substr($permission['user'], 0, 1) }}</span>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $permission['user'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $permission['office'] }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach(explode(', ', $permission['permissions']) as $perm)
                                @if($perm == 'Create')
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-plus mr-1"></i>{{ $perm }}
                                    </span>
                                @elseif($perm == 'Read' || $perm == 'Read Only')
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <i class="fas fa-eye mr-1"></i>{{ $perm }}
                                    </span>
                                @elseif($perm == 'Update')
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-edit mr-1"></i>{{ $perm }}
                                    </span>
                                @elseif($perm == 'Delete')
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        <i class="fas fa-trash mr-1"></i>{{ $perm }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($permission['level'] == 'Full Access')
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-unlock mr-2"></i>
                                Accesso Completo
                            </span>
                        @elseif($permission['level'] == 'Standard')
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-user mr-2"></i>
                                Standard
                            </span>
                        @elseif($permission['level'] == 'Limited')
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Limitato
                            </span>
                        @else
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                                <i class="fas fa-eye mr-2"></i>
                                Solo Lettura
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <button onclick="alert('Funzionalità in sviluppo')" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200" title="Modifica">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="if(confirmDelete()) alert('Funzionalità in sviluppo')" class="text-red-600 hover:text-red-800 transition-colors duration-200" title="Revoca">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Distribuzione Permessi</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-unlock text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-semibold text-gray-900">Accesso Completo</div>
                        <div class="text-xs text-gray-600">Tutti i permessi</div>
                    </div>
                </div>
                <div class="text-2xl font-bold text-green-600">2</div>
            </div>

            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-semibold text-gray-900">Standard</div>
                        <div class="text-xs text-gray-600">Permessi base</div>
                    </div>
                </div>
                <div class="text-2xl font-bold text-blue-600">1</div>
            </div>

            <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-semibold text-gray-900">Limitato</div>
                        <div class="text-xs text-gray-600">Permessi ristretti</div>
                    </div>
                </div>
                <div class="text-2xl font-bold text-yellow-600">1</div>
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-eye text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-semibold text-gray-900">Solo Lettura</div>
                        <div class="text-xs text-gray-600">Visualizzazione</div>
                    </div>
                </div>
                <div class="text-2xl font-bold text-gray-600">1</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Azioni Rapide</h3>
        <div class="space-y-4">
            <button onclick="alert('Funzionalità in sviluppo')" class="w-full p-4 bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-200 rounded-lg hover:from-indigo-100 hover:to-purple-100 transition-all duration-200 text-left">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="font-semibold text-gray-900">Assegna Permessi di Gruppo</div>
                        <div class="text-sm text-gray-600">Configura permessi per più utenti</div>
                    </div>
                </div>
            </button>

            <button onclick="alert('Funzionalità in sviluppo')" class="w-full p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg hover:from-green-100 hover:to-emerald-100 transition-all duration-200 text-left">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-copy text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="font-semibold text-gray-900">Copia Permessi</div>
                        <div class="text-sm text-gray-600">Duplica configurazione esistente</div>
                    </div>
                </div>
            </button>

            <button onclick="alert('Funzionalità in sviluppo')" class="w-full p-4 bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-lg hover:from-orange-100 hover:to-red-100 transition-all duration-200 text-left">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-history text-white"></i>
                    </div>
                    <div class="ml-4">
                        <div class="font-semibold text-gray-900">Log Attività</div>
                        <div class="text-sm text-gray-600">Visualizza cronologia permessi</div>
                    </div>
                </div>
            </button>
        </div>
    </div>
</div>
@endsection