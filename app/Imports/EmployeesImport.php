<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmployeesImport implements ToCollection, WithUpserts, WithStartRow
{
    public function collection(Collection $rows)
    {

        // $value = $worksheet->getCell('A1')->getValue();
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);

        foreach ($rows as $row) {

            Employee::updateOrCreate(
                [
                    'nip' => $row[0],
                ],
                [
                    'nama'          => $row[1],
                    'gelar'         => $row[2],
                    'tempat_lahir'  => $row[3],
                    'tanggal_lahir'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m-d'),
                    'umur_thn'      => $row[5],
                    'umur_bln'      => $row[6],
                    'tmt_kerja'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7])->format('Y-m-d'),
                    'mk_tahun'      => $row[8],
                    'mk_bulan'      => $row[9],
                    'tmt_organik'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10])->format('Y-m-d'),
                    'gol_ruang'     => $row[11],
                    'tmt_pangkat'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12])->format('Y-m-d'),
                    'mk_pkt_th'     => $row[13],
                    'mk_pkt_bl'     => $row[14],
                    'jenis_pangkat' => $row[15],
                    'mkg_thn'       => $row[16],
                    'mkg_bln'       => $row[17],
                ]
            );
        }
        // dd($rows);
    }

    public function uniqueBy()
    {
        return 'nip';
    }

    public function startRow(): int
    {
        return 2;
    }
}
