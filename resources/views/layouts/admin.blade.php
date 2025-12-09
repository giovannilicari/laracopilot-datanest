<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Sistema Gestionale Uffici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-gradient { background: linear-gradient(135deg, #1e293b 0%, #334155 100%); }
        .nav-item:hover { background: rgba(255, 255, 255, 0.1); transform: translateX(4px); }
        .nav-item { transition: all 0.3s ease; }
        .nav-item.active { background: rgba(99, 102, 241, 0.2); border-right: 3px solid #6366f1; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-primary { background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); }
        .btn-primary:hover { background: linear-gradient(135deg, #5856eb 0%, #7c3aed 100%); transform: translateY(-1px); }
        .animate-fade-in { animation: fadeIn 0.6s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar-gradient w-64 flex-shrink-0 shadow-xl">
            <div class="flex items-center justify-center h-16 border-b border-gray-600">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-cogs text-2xl text-indigo-400"></i>
                    <span class="text-white text-lg font-bold">Admin Panel</span>
                </div>
            </div>
            
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.entries') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.entries*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i>
                        <span>Gestione Pratiche</span>
                    </a>
                    
                    <a href="{{ route('admin.offices') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.offices') ? 'active' : '' }}">
                        <i class="fas fa-building mr-3"></i>
                        <span>Uffici</span>
                    </a>
                    
                    <a href="{{ route('admin.users') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="fas fa-users mr-3"></i>
                        <span>Utenti</span>
                    </a>
                    
                    <a href="{{ route('admin.permissions') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.permissions') ? 'active' : '' }}">
                        <i class="fas fa-shield-alt mr-3"></i>
                        <span>Permessi</span>
                    </a>
                    
                    <a href="{{ route('admin.documents') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.documents') ? 'active' : '' }}">
                        <i class="fas fa-folder-open mr-3"></i>
                        <span>Documenti</span>
                    </a>
                    
                    <a href="{{ route('admin.reports') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span>Report</span>
                    </a>
                    
                    <a href="{{ route('admin.settings') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Impostazioni</span>
                    </a>
                </div>
                
                <div class="px-4 mt-8 pt-4 border-t border-gray-600">
                    <a href="{{ route('home') }}" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg">
                        <i class="fas fa-arrow-left mr-3"></i>
                        <span>Torna al Sito</span>
                    </a>
                    
                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="nav-item flex items-center w-full px-4 py-3 text-gray-300 rounded-lg">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-sm text-gray-600 mt-1">@yield('page-description', 'Benvenuto nel pannello di amministrazione')</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm text-gray-500">
                                Benvenuto, <span class="font-medium text-gray-900">{{ session('admin_user.name', 'Admin') }}</span>
                            </div>
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg animate-fade-in">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg animate-fade-in">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <div class="animate-fade-in">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Add interactive effects
        $(document).ready(function() {
            // Sidebar navigation hover effects
            $('.nav-item').hover(
                function() {
                    $(this).addClass('bg-white/10');
                },
                function() {
                    if (!$(this).hasClass('active')) {
                        $(this).removeClass('bg-white/10');
                    }
                }
            );

            // Card hover effects
            $('.card-hover').hover(
                function() {
                    $(this).addClass('shadow-lg');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.bg-green-100, .bg-red-100').fadeOut();
            }, 5000);
        });

        // Confirm delete actions
        function confirmDelete(message = 'Sei sicuro di voler eliminare questo elemento?') {
            return confirm(message);
        }

        // Show loading state for forms
        function showLoading(button) {
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Caricamento...';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
            }, 2000);
        }
    </script>
</body>
</html>