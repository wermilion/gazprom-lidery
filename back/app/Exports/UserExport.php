<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{

    protected $users;
    public function __construct($users)
    {
        $this->users = $users;
    }

    public function view(): View
    {
        return view('admin.export.users', [
            'users' => $this->users
        ]);
    }
}
