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
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithTitle;

class aset_kendaraandanambulance implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents, WithTitle
{
    use Exportable;

    public function collection()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_kendaraandanambulance', 'users.id', '=', 'aset_kendaraandanambulance.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_kendaraandanambulance.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'aset_kendaraandanambulance.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'aset_kendaraandanambulance.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'aset_kendaraandanambulance.id_petugas2 as idusaha', 'aset_kendaraandanambulance.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('aset_kendaraandanambulance', 'users.id', '=', 'aset_kendaraandanambulance.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_kendaraandanambulance.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'aset_kendaraandanambulance.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'aset_kendaraandanambulance.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'aset_kendaraandanambulance.id_petugas2 as idusaha', 'aset_kendaraandanambulance.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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

            $merek = $user->merek_kendaraan;
            $jenis = $user->jenis_kendaraan;
            $nopol = $user->nopol;
            $petugas2 = explode(',', $user->id_petugas2);
            $data->push([
                $nourut,
                $no,
                $user->nama_kendaraandanambulance,
                $jenis,
                $merek,
                $user->kode_aset_kendaraandanambulance,
                $nopol,
                $user->kepemilikan_stnk,
                $user->norangka,
                $user->nomesin,
                $user->nobpkb,
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
            'No Aset',
            'Nama Aset/Kendaraan',
            'Jenis Kendaraan',
            'Merek',
            'Kode Aset',
            'No Polisi',
            'Kepemilikan/STNK',
            'No Rangka',
            'No Mesin',
            'No BPKB',
            'Kondisi',
            'Jumlah',
            'Satuan',
            'Nilai Perolehan',
            'Tanggal Aset',
            'Foto Aset/Kendaraan',
            'Alamat',
            'Pengelola Barang',
            'Pengguna Barang',
            'Kuasa Pengguna Barang',
            'Unit Kerja',
            'Bidang',
            'Petugas 1',
            'Petugas 2',
            'Keterangan',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Z1')->applyFromArray([
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
                $event->sheet->getStyle('A1:Z1')->applyFromArray([
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
        return 'Aset Kendaraan dan Ambulance';
    }
}
