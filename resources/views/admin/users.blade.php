@extends('layouts.admin')

@section('page-title', 'Gestione Utenti')
@section('page-description', 'Visualizza e gestisci tutti gli utenti del sistema')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
    <div class="flex-1">
        <div class="flex items-center space-x-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" placeholder="Cerca utenti..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Tutti i Ruoli</option>
                <option value="manager">Manager</option>
                <option value="clerk">Impiegato</option>
                <option value="admin">Amministratore</option>
            </select>
        </div>
    </div>
    <div class="mt-4 lg:mt-0 lg:ml-6">
        <button onclick="alert('Funzionalità in sviluppo')" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold inline-flex items-center transition-all duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-user-plus mr-2"></i>
            Nuovo Utente
        </button>
    </div>
</div>

<div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Utente</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ruolo</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ufficio</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stato</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Azioni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-semibold text-sm">{{ substr($user['name'], 0, 1) }}</span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $user['name'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $user['email'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user['role'] == 'Manager')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-user-tie mr-1"></i>
                                Manager
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                <i class="fas fa-user mr-1"></i>
                                Impiegato
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $user['office'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user['status'] == 'Active')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Attivo
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-1"></i>
                                Inattivo
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <button onclick="alert('Funzionalità in sviluppo')" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200" title="Modifica">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="alert('Funzionalità in sviluppo')" class="text-green-600 hover:text-green-800 transition-colors duration-200" title="Permessi">
                                <i class="fas fa-shield-alt"></i>
                            </button>
                            <button onclick="if(confirmDelete()) alert('Funzionalità in sviluppo')" class="text-red-600 hover:text-red-800 transition-colors duration-200" title="Elimina">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-white text-lg"></i>
            </div>
            <div class="ml-4">
                <div class="text-2xl font-bold text-gray-900">{{ count($users) }}</div>
                <div class="text-sm text-gray-600">Utenti Totali</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-check text-white text-lg"></i>
            </div>
            <div class="ml-4">
                <div class="text-2xl font-bold text-gray-900">{{ count(array_filter($users, fn($u) => $u['status'] == 'Active')) }}</div>
                <div class="text-sm text-gray-600">Utenti Attivi</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-tie text-white text-lg"></i>
            </div>
            <div class="ml-4">
                <div class="text-2xl font-bold text-gray-900">{{ count(array_filter($users, fn($u) => $u['role'] == 'Manager')) }}</div>
                <div class="text-sm text-gray-600">Manager</div>
            </div>
        </div>
    </div>
</div>
@endsection