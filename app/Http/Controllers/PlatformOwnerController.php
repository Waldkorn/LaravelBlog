<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\BankDetails;

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

    public function downloadInvoiceSpreadsheet(){

        if (Auth::user() && Auth::user()->hasRole('platform_owner')) {

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            //set header
            $sheet->setCellValue('A1', 'IBAN');
            $sheet->setCellValue('B1', 'BIC');
            $sheet->setCellValue('C1', 'mandaatid');
            $sheet->setCellValue('D1', 'mandaatdatum');
            $sheet->setCellValue('E1', 'bedrag');
            $sheet->setCellValue('F1', 'naam');
            $sheet->setCellValue('G1', 'beschrijving');
            //$sheet->setCellValue('H1', 'endtoendid');
            $bankdetails = BankDetails::get();

            for ($i = 0; $i < count($bankdetails); $i++){
              $excelRow = $i + 2;
              $sheet->setCellValue('A' . $excelRow, $bankdetails[$i]->IBAN);
              $sheet->setCellValue('B' . $excelRow, $bankdetails[$i]->BIC);
              $sheet->setCellValue('C' . $excelRow, $bankdetails[$i]->mandaat_id);
              $sheet->setCellValue('D' . $excelRow, $bankdetails[$i]->created_at->todatestring());
              $sheet->setCellValue('E' . $excelRow, '10');
              $sheet->setCellValue('F' . $excelRow, $bankdetails[$i]->name);
              $sheet->setCellValue('G' . $excelRow, 'Maandelijkse afschrijving mijn blog');
            }

            $writer = new Xlsx($spreadsheet);
            $writer->save('invoices.xlsx');

            return response()->download('invoices.xlsx')->deleteFileAfterSend(true);
          }
          else {
              return abort(404);
          }

    }




}
