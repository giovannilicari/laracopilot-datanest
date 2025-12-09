<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function checkAuth()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function dashboard()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $stats = [
            'total_entries' => 247,
            'pending_entries' => 18,
            'total_offices' => 12,
            'active_users' => 45,
            'total_budget' => '€2,450,000',
            'monthly_entries' => 67
        ];

        $recentEntries = [
            ['date' => '2024-01-15', 'office' => 'Ufficio Tecnico', 'oggetto' => 'Manutenzione ordinaria', 'spesa' => '€15,000'],
            ['date' => '2024-01-14', 'office' => 'Ufficio Amministrativo', 'oggetto' => 'Forniture ufficio', 'spesa' => '€2,500'],
            ['date' => '2024-01-14', 'office' => 'Ufficio Urbanistica', 'oggetto' => 'Consulenza tecnica', 'spesa' => '€8,000'],
            ['date' => '2024-01-13', 'office' => 'Ufficio Ragioneria', 'oggetto' => 'Software gestionale', 'spesa' => '€12,000'],
            ['date' => '2024-01-12', 'office' => 'Ufficio Personale', 'oggetto' => 'Formazione dipendenti', 'spesa' => '€3,500']
        ];

        return view('admin.dashboard', compact('stats', 'recentEntries'));
    }

    public function entries()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $entries = [
            [
                'id' => 1,
                'date' => '2024-01-15',
                'ufficio' => 'Ufficio Tecnico',
                'contenuto' => 'Riparazione sistema idraulico edificio comunale',
                'oggetto' => 'Manutenzione ordinaria',
                'spesa_prevista' => '€15,000.00',
                'protocollo' => 'PROT-2024-001',
                'document' => 'documento_001.pdf',
                'status' => 'Approvato'
            ],
            [
                'id' => 2,
                'date' => '2024-01-14',
                'ufficio' => 'Ufficio Amministrativo',
                'contenuto' => 'Acquisto materiale per uffici comunali',
                'oggetto' => 'Forniture ufficio',
                'spesa_prevista' => '€2,500.00',
                'protocollo' => 'PROT-2024-002',
                'document' => 'documento_002.pdf',
                'status' => 'In Revisione'
            ],
            [
                'id' => 3,
                'date' => '2024-01-14',
                'ufficio' => 'Ufficio Urbanistica',
                'contenuto' => 'Consulenza per piano regolatore generale',
                'oggetto' => 'Consulenza tecnica',
                'spesa_prevista' => '€8,000.00',
                'protocollo' => 'PROT-2024-003',
                'document' => 'documento_003.pdf',
                'status' => 'Pendente'
            ],
            [
                'id' => 4,
                'date' => '2024-01-13',
                'ufficio' => 'Ufficio Ragioneria',
                'contenuto' => 'Implementazione nuovo software contabile',
                'oggetto' => 'Software gestionale',
                'spesa_prevista' => '€12,000.00',
                'protocollo' => 'PROT-2024-004',
                'document' => 'documento_004.pdf',
                'status' => 'Approvato'
            ],
            [
                'id' => 5,
                'date' => '2024-01-12',
                'ufficio' => 'Ufficio Personale',
                'contenuto' => 'Corso di aggiornamento per dipendenti',
                'oggetto' => 'Formazione dipendenti',
                'spesa_prevista' => '€3,500.00',
                'protocollo' => 'PROT-2024-005',
                'document' => 'documento_005.pdf',
                'status' => 'In Corso'
            ]
        ];

        return view('admin.entries', compact('entries'));
    }

    public function createEntry()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $offices = [
            'Ufficio Tecnico',
            'Ufficio Amministrativo',
            'Ufficio Urbanistica',
            'Ufficio Ragioneria',
            'Ufficio Personale',
            'Ufficio Legale',
            'Ufficio Ambiente',
            'Ufficio Cultura',
            'Ufficio Sport',
            'Ufficio Sociale',
            'Ufficio Tributi',
            'Ufficio Demografico'
        ];

        return view('admin.entries.create', compact('offices'));
    }

    public function storeEntry(Request $request)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        // In a real application, this would save to database
        return redirect()->route('admin.entries')->with('success', 'Entry created successfully!');
    }

    public function editEntry($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $offices = [
            'Ufficio Tecnico',
            'Ufficio Amministrativo',
            'Ufficio Urbanistica',
            'Ufficio Ragioneria',
            'Ufficio Personale',
            'Ufficio Legale',
            'Ufficio Ambiente',
            'Ufficio Cultura',
            'Ufficio Sport',
            'Ufficio Sociale',
            'Ufficio Tributi',
            'Ufficio Demografico'
        ];

        $entry = [
            'id' => $id,
            'date' => '2024-01-15',
            'ufficio' => 'Ufficio Tecnico',
            'contenuto' => 'Riparazione sistema idraulico edificio comunale',
            'oggetto' => 'Manutenzione ordinaria',
            'spesa_prevista' => '15000',
            'protocollo' => 'PROT-2024-001'
        ];

        return view('admin.entries.edit', compact('entry', 'offices'));
    }

    public function updateEntry(Request $request, $id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        // In a real application, this would update in database
        return redirect()->route('admin.entries')->with('success', 'Entry updated successfully!');
    }

    public function deleteEntry($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        // In a real application, this would delete from database
        return redirect()->route('admin.entries')->with('success', 'Entry deleted successfully!');
    }

    public function offices()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $offices = [
            ['id' => 1, 'name' => 'Ufficio Tecnico', 'manager' => 'Ing. Mario Rossi', 'employees' => 8, 'budget' => '€500,000'],
            ['id' => 2, 'name' => 'Ufficio Amministrativo', 'manager' => 'Dott.ssa Laura Bianchi', 'employees' => 12, 'budget' => '€300,000'],
            ['id' => 3, 'name' => 'Ufficio Urbanistica', 'manager' => 'Arch. Giuseppe Verdi', 'employees' => 6, 'budget' => '€400,000'],
            ['id' => 4, 'name' => 'Ufficio Ragioneria', 'manager' => 'Rag. Anna Neri', 'employees' => 10, 'budget' => '€250,000'],
            ['id' => 5, 'name' => 'Ufficio Personale', 'manager' => 'Dott. Franco Gialli', 'employees' => 4, 'budget' => '€150,000']
        ];

        return view('admin.offices', compact('offices'));
    }

    public function users()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $users = [
            ['id' => 1, 'name' => 'Mario Rossi', 'email' => 'mario.rossi@office.gov', 'role' => 'Manager', 'office' => 'Ufficio Tecnico', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Laura Bianchi', 'email' => 'laura.bianchi@office.gov', 'role' => 'Manager', 'office' => 'Ufficio Amministrativo', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Giuseppe Verdi', 'email' => 'giuseppe.verdi@office.gov', 'role' => 'Manager', 'office' => 'Ufficio Urbanistica', 'status' => 'Active'],
            ['id' => 4, 'name' => 'Anna Neri', 'email' => 'anna.neri@office.gov', 'role' => 'Manager', 'office' => 'Ufficio Ragioneria', 'status' => 'Active'],
            ['id' => 5, 'name' => 'Franco Gialli', 'email' => 'franco.gialli@office.gov', 'role' => 'Clerk', 'office' => 'Ufficio Personale', 'status' => 'Inactive']
        ];

        return view('admin.users', compact('users'));
    }

    public function permissions()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $permissions = [
            ['id' => 1, 'user' => 'Mario Rossi', 'office' => 'Ufficio Tecnico', 'permissions' => 'Create, Read, Update, Delete', 'level' => 'Full Access'],
            ['id' => 2, 'user' => 'Laura Bianchi', 'office' => 'Ufficio Amministrativo', 'permissions' => 'Create, Read, Update', 'level' => 'Standard'],
            ['id' => 3, 'user' => 'Giuseppe Verdi', 'office' => 'Ufficio Urbanistica', 'permissions' => 'Read, Update', 'level' => 'Limited'],
            ['id' => 4, 'user' => 'Anna Neri', 'office' => 'Ufficio Ragioneria', 'permissions' => 'Create, Read, Update, Delete', 'level' => 'Full Access'],
            ['id' => 5, 'user' => 'Franco Gialli', 'office' => 'Ufficio Personale', 'permissions' => 'Read Only', 'level' => 'View Only']
        ];

        return view('admin.permissions', compact('permissions'));
    }

    public function documents()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $documents = [
            ['id' => 1, 'name' => 'documento_001.pdf', 'entry_id' => 1, 'office' => 'Ufficio Tecnico', 'size' => '2.4 MB', 'uploaded' => '2024-01-15'],
            ['id' => 2, 'name' => 'documento_002.pdf', 'entry_id' => 2, 'office' => 'Ufficio Amministrativo', 'size' => '1.8 MB', 'uploaded' => '2024-01-14'],
            ['id' => 3, 'name' => 'documento_003.pdf', 'entry_id' => 3, 'office' => 'Ufficio Urbanistica', 'size' => '3.2 MB', 'uploaded' => '2024-01-14'],
            ['id' => 4, 'name' => 'documento_004.pdf', 'entry_id' => 4, 'office' => 'Ufficio Ragioneria', 'size' => '1.5 MB', 'uploaded' => '2024-01-13'],
            ['id' => 5, 'name' => 'documento_005.pdf', 'entry_id' => 5, 'office' => 'Ufficio Personale', 'size' => '900 KB', 'uploaded' => '2024-01-12']
        ];

        return view('admin.documents', compact('documents'));
    }

    public function reports()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $reportData = [
            'monthly_stats' => [
                'January' => ['entries' => 67, 'budget' => 245000],
                'February' => ['entries' => 54, 'budget' => 198000],
                'March' => ['entries' => 71, 'budget' => 287000],
                'April' => ['entries' => 63, 'budget' => 234000],
                'May' => ['entries' => 58, 'budget' => 211000]
            ],
            'office_stats' => [
                'Ufficio Tecnico' => 89,
                'Ufficio Amministrativo' => 76,
                'Ufficio Urbanistica' => 45,
                'Ufficio Ragioneria' => 67,
                'Ufficio Personale' => 34
            ]
        ];

        return view('admin.reports', compact('reportData'));
    }

    public function settings()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $settings = [
            'system_name' => 'Office Management System',
            'admin_email' => 'admin@office.gov',
            'max_file_size' => '10MB',
            'allowed_extensions' => 'pdf, doc, docx, xls, xlsx',
            'session_timeout' => '30 minutes',
            'backup_frequency' => 'Daily'
        ];

        return view('admin.settings', compact('settings'));
    }
}