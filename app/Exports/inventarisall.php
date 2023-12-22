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

class inventaris_kendaraan implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents, WithTitle
{
    use Exportable;

    public function collection()
    {
        $loggedInUserId = session('data')->id;
        $loggedInUserName = session('data')->name;

        $users = DB::table('users')
            ->join('inventaris_kendaraan', 'users.id', '=', 'inventaris_kendaraan.pengguna_barang')
            ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_kendaraan.id_unit_kerja')
            ->join('ruangan', 'ruangan.id', '=', 'inventaris_kendaraan.id_ruangan')
            ->join('petugas', 'petugas.id', '=', 'inventaris_kendaraan.id_petugas1')
            ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas');

        $unit_kerja = DB::table('users')
            ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id');

        $ruangan = DB::table('users')
            ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id');

        $petugas = DB::table('users')
            ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id');

        if ($loggedInUserId == '1') {
            $users = $users->get();
            $unit_kerja = $unit_kerja->get();
            $ruangan = $ruangan->get();
            $petugas = $petugas->get();
        } else {
            $users = $users->where('users.name', '=', $loggedInUserName)->get();
            $unit_kerja = $unit_kerja->where('users.name', '=', $loggedInUserName)->get();
            $ruangan = $ruangan->where('users.name', '=', $loggedInUserName)->get();
            $petugas = $petugas->where('users.name', '=', $loggedInUserName)->get();
        }

        if (!session()->has('username')) {
            return redirect("/");
        }

        $data = collect();

        // Add data rows
        $nourut = 0;
        foreach ($users as $user) {
            $nourut++;
            $no = $user->no_inventaris;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));

            $date = DateTime::createFromFormat("Y-m-d h:i:s", $user->date_created);
            $tanggalbarang = DateTime::createFromFormat("Y-m-d", $user->tanggal_barang);

            $merek = $user->merek_kendaraan;
            $jenis = $user->jenis_kendaraan;
            $nopol = $user->nopol;
            $petugas2 = explode(',', $user->id_petugas2);
            $data->push([
                $nourut,
                $user->kode_barang_kendaraan,
                $no,
                $user->nama_barang_kendaraan,
                $jenis,
                $user->merek_kendaraan,
                $nopol,
                $user->kepemilikan_stnk,
                $user->norangka,
                $user->nomesin,
                $user->nobpkb,
                $user->kondisi,
                $user->jumlah,
                $user->satuan,
                'Rp. ' . number_format($user->nilaiperolehan, 2, ",", "."),
                $tanggalbarang->format("d-m-Y"),
                url("../assets/images/inventaris/" . $user->image), // Display URL of the photo
                $user->alamat,
                $user->pengelola_barang,
                $user->usernamanya,
                $user->usernamanya,
                $user->namakerja,
                $user->ruangannama,
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
            'Kode Barang',
            'No Inventaris',
            'Nama Barang/Kendaraan',
            'Jenis Kendaraan',
            'Merek',
            'No Polisi',
            'Kepemilikan/STNK',
            'No Rangka',
            'No Mesin',
            'No BPKB',
            'Kondisi',
            'Jumlah',
            'Satuan',
            'Nilai Perolehan',
            'Tanggal Barang',
            'Foto Barang',
            'Alamat',
            'Pengelola Barang',
            'Pengguna Barang',
            'Kuasa Pengguna Barang',
            'Unit Kerja',
            'Ruangan',
            'P. Pencatat',
            'Penanggung Jawab',
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
        return 'Inventaris Kendaraan';
    }
}
