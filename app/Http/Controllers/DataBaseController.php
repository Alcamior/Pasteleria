<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\DbDumper\Databases\MySql;


class DataBaseController extends Controller
{
    public function show(){
        return view('db.dashboard');
    }

    public function exportarDatabase(){

        // Obtener la información de la base de datos
        $dbHost = env('DB_HOST');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPassword = env('DB_PASSWORD');

        // Ruta donde se guardará el archivo de respaldo
        $backupPath = storage_path('app/backups/' . $dbName . '_' . date('Y-m-d_H-i-s') . '.sql');

        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');
        $tables = collect($tables)->map(fn($table) => (array) $table)->flatten();

        // Inicializar el contenido SQL
        $sql = '';

        // Recorrer cada tabla y obtener su estructura y datos
        foreach ($tables as $table) {
            // Obtener la estructura de la tabla
            $createTableQuery = DB::select("SHOW CREATE TABLE `{$table}`")[0]->{'Create Table'};
            $sql .= "\n\n-- Estructura de la tabla {$table}\n";
            $sql .= $createTableQuery . ";\n\n";

            // Obtener los datos de la tabla
            $rows = DB::table($table)->get();

            if ($rows->isNotEmpty()) {
                // Generar la inserción de datos en formato SQL
                $sql .= "-- Datos de la tabla {$table}\n";
                foreach ($rows as $row) {
                    // Procesar cada fila de la tabla
                    $columns = implode('`, `', array_keys((array) $row));
                    $values = implode("', '", array_map(fn($value) => addslashes($value), array_values((array) $row)));
                    $sql .= "INSERT INTO `{$table}` (`{$columns}`) VALUES ('{$values}');\n";
                }
            }
        }

        // Guardar el contenido SQL en un archivo
        File::put($backupPath, $sql);

        // Retornar el archivo de respaldo generado
        return response()->download($backupPath);
    }

    public function restaurarDatabase(Request $request)
    {
        try {
            // Verificar si el archivo se subió correctamente
            $file = $request->file('backup_file');
            if (!$file || !$file->isValid()) {
                return back()->with('error', 'Archivo no válido o no se cargó correctamente.');
            }
    
            // Leer el archivo SQL y ejecutarlo
            $sql = file_get_contents($file->getRealPath());
            DB::unprepared($sql);
            return back()->with('success');
        } catch (\Exception $e) {
            Log::error('Error en la restauración de la base de datos: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error al restaurar la base de datos.');
        }
        
    }
}
