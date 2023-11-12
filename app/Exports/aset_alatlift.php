<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use DateTime;
use Date;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class aset_alatlift implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents, WithTitle
{
    use Exportable;

    public function collection()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatlift', 'users.id', '=', 'aset_alatlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlift.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'aset_alatlift.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlift.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'aset_alatlift.id_petugas2 as idusaha', 'aset_alatlift.id_petugas2 as idusaha', 'unit_kerja.id as idkerja', 'users.id as id_user',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatlift', 'users.id', '=', 'aset_alatlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlift.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'aset_alatlift.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlift.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'aset_alatlift.id_petugas2 as idusaha', 'aset_alatlift.pengguna_barang as idusaha',  'unit_kerja.id as idkerja',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        if (!session()->has('username')) {
            return redirect("/");
        }

        $data = collect();

        // Add data rows
        $nourut = 0;
        foreach ($users as $user) {
            $nourut++;
            $no = $user->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));

            $date = DateTime::createFromFormat("Y-m-d h:i:s", $user->date_created);
            $tanggalaset = DateTime::createFromFormat("Y-m-d", $user->tanggal_aset);

            $merek = $user->merek_alatlift;
            $jenis = $user->jenis_alatlift;
            $tipe = $user->tipe_alatlift;
            $spesifikasi = $user->spesifikasi_alatlift;
            $petugas2 = explode(',', $user->id_petugas2);
            $data->push([
                $nourut,
                $user->kode_alatlift,
                $no,
                $user->nama_alatlift,
                $merek,
                $jenis,
                $tipe,
                $spesifikasi,
                $user->kondisi,
                $user->jumlah,
                $user->satuan,
                'Rp. ' . number_format($user->nilaiperolehan, 2, ",", "."),
                $tanggalaset->format("d-m-Y"),
                url("../assets/images/aset/" . $user->image), // Display URL of the photo
                $user->alamat,
                $user->pengelola_barang,
                $user->usernamanya,
                $user->usernamanya,
                $user->namakerja,
                $user->bidangnama,
                $user->petugasnama,
                isset($petugas2[1]) ? $petugas2[1] : '-',
                isset($user->keterangan) ? $user->keterangan : '-',
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'No Urut',
            'Kode Aset',
            'No Aset',
            'Nama Aset',
            'Jenis Aset',
            'Merek',
            'Tipe',
            'Spesifikasi',
            'Kondisi',
            'Jumlah',
            'Satuan',
            'Nilai Perolehan',
            'Tanggal Aset',
            'Foto Aset',
            'Alamat',
            'Pengelola Barang',
            'Pengguna Barang',
            'Kuasa Pengguna Barang',
            'Unit Kerja',
            'Bidang',
            'Petugas 1',
            'Penanggung Jawab',
            'Keterangan',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:W1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'], // Set the color to white
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '000000'], // Set the background color to black
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $lastColumn = $sheet->getHighestColumn();
        $dataRange = 'A2:' . $lastColumn . $sheet->getHighestRow();

        $sheet->getStyle($dataRange)->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:W1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFF'], // Set the color to white
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => '000000'], // Set the background color to black
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }


    public function title(): string
    {
        return 'Aset Alat Lift';
    }
}
