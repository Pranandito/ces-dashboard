<?php

namespace App\Http\Controllers;

use App\Models\Submersible;

class exportController extends Controller
{
    public function exportCsv()
    {
        $filename = 'submersible-data.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');

            // Header CSV
            fputcsv($handle, [
                'Tegangan (V)',
                'Daya (W)',
                'Energi Harian (Wh)',
                'Energi Total (Wh)',
                'Debit (l/min)',
                "Volume Harian (l)",
                "Volume Total (l)",
                "Durasi Pemakaian Harian (s)",
                "Durasi Pemakaian Total (s)",
                "Intensitas Cahaya (Lux)",
                "Suhu (C)",
                "Suhu Harian (C)",
                "Durasi Koneksi (s)",
                "Created At"
            ]);

            $data = Submersible::get();

            foreach ($data as $row) {
                fputcsv($handle, [
                    $row->tegangan,
                    $row->daya,
                    $row->energi_harian,
                    $row->energi_total,
                    $row->debit,
                    $row->volume_harian,
                    $row->volume_total,
                    $row->durasi_pemakaian_harian,
                    $row->durasi_pemakaian_total,
                    $row->intensitas_cahaya,
                    $row->suhu,
                    $row->suhu_harian,
                    $row->durasi_koneksi,
                    $row->created_at->format('d-m-Y H:i')
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
