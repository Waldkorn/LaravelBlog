<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlatformOwnerController extends ViewShareController
{
    public function downloadDBDump(){

      if (Auth::user() && Auth::user()->hasRole('platform_owner')) {

          $command;
          $dbConnection = env('DB_CONNECTION');
          $dbName = env('DB_DATABASE');
          $dbHost = env('DB_HOST');
          $dbPort = env('DB_PORT');
          $dbUsername = env('DB_USERNAME');
          $dbPassword = env('DB_PASSWORD');

          switch ($dbConnection) {
            case "mysql":
                $command = "mysqldump $dbName -h$dbHost -P$dbPort -u$dbUsername -p$dbPassword > database_backup.sql";
                break;
            case "pgsql":
                $command = "PGPASSWORD='$dbPassword' pg_dump -h $dbHost -p $dbPort -U $dbUsername $dbName > database_backup.sql";
                break;
          }

          exec($command);
          return response()->download('database_backup.sql')->deleteFileAfterSend(true);
      }
      else {
          return abort(404);
      }
    }
}
