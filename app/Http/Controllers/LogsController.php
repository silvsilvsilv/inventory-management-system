<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Logs;
use App\Models\Products;

class LogsController extends Controller
{
    public function getAllLogs(Request $request)
    {
        $query = Logs::query();
        $logs = $query->orderBy("created_at", "desc")->get();
        $products= Products::all();

        $user = Auth::user()->role;

        
        return $user === 'manager'? view('manager.logs',compact('logs','products')) : view('admin.logs',compact('logs','products'));
    }
}
