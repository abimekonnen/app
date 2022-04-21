<?php

namespace App\Http\Controllers;
namespace App\Exports;
use Illuminate\Http\Request;

class AtmController extends Controller
{
    public function index()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
