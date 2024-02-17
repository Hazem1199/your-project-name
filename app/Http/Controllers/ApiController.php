<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SrmModel; // Replace YourModel with the actual model for your SRM_Basic_Data table

class ApiController extends Controller
{
    public function fetchData()
    {
        $server = 'mysql-163434-0.cloudclusters.net';
        $port = 18635;
        $dbName = 'SRM_Basic_Data';
        $username = 'admin';
        $password = 'System@2025';

        try {
            // Connect to the database using Eloquent
            config(['database.connections.mysql.host' => $server]);
            config(['database.connections.mysql.port' => $port]);
            config(['database.connections.mysql.database' => $dbName]);
            config(['database.connections.mysql.username' => $username]);
            config(['database.connections.mysql.password' => $password]);

            $data = SrmModel::all(); // Replace YourModel with the actual model for your SRM_Basic_Data table

            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions (database connection error, etc.)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
