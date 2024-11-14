<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DataBaseController extends Controller
{
    public function show(){
        return view('db.dashboard');
    }

    public function exportarDatabase(){
        Artisan::call('backup:run');

        // Cambiar la ubicación según config/backup.php si es necesario
        $backupPath = storage_path('app/Laravel'); // Ajustar según config/backup.php
        $backupFiles = File::files($backupPath);
    
        if (empty($backupFiles)) {
            return response()->json(['error' => 'No se encontró ningún archivo de respaldo.'], 404);
        }
    
        $latestBackup = end($backupFiles);
    
        return response()->download($latestBackup->getPathname());
    }

    public function restaurarDatabase(Request $request)
    {

        
    }
}
