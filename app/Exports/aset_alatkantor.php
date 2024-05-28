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
use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class aset_alatkantor implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents, WithTitle
{
    use Exportable;

    private $drawingCollection = [];
    public function collection()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatkantor', 'users.id', '=', 'aset_alatkantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatkantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatkantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatkantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatkantor.id_petugas2 as idusaha', 'aset_alatkantor.id_petugas2 as idusaha', 'unit_kerja.id as idkerja', 'users.id as id_user',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatkantor', 'users.id', '=', 'aset_alatkantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatkantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatkantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatkantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatkantor.id_petugas2 as idusaha', 'aset_alatkantor.pengguna_barang as idusaha',  'unit_kerja.id as idkerja',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $tanggal_aset = DateTime::createFromFormat("Y-m-d", $user->tanggal_aset);
            $y = $tanggal_aset->format("Y");
            $m = $tanggal_aset->format("m");
            $t = $user->kode_alatkantor;
            $id = $user->id_user;
            $ms = $user->masa_manfaat;
            $gabung = $y . $m . $t . $id . '.' . $no;
            $merek = $user->merek_alatkantor;
            $jenis = $user->jenis_alatkantor;
            $tipe = $user->tipe_alatkantor;
            $spesifikasi = $user->spesifikasi_alatkantor;
            $petugas2 = explode(',', $user->id_petugas2);
            // Create Drawing instance for image
            $drawing = new Drawing();
            $drawing->setPath($this->downloadImage($user->image)); // Download and set image path
            $drawing->setHeight(50);
            $drawing->setCoordinates('O' . ($nourut + 1));
            $this->drawingCollection[] = $drawing;
            $data->push([
                $nourut,
                $gabung,
                $no,
                $user->nama_alatkantor,
                $merek,
                $jenis,
                $tipe,
                $spesifikasi,
                $user->kondisi,
                $user->jumlah,
                $user->satuan,
                'Rp. ' . number_format($user->penyusutan, 2, ",", "."),
                'Rp. ' . number_format($user->nilaiperolehan, 2, ",", "."),
                'Rp. ' . number_format($user->nilai_residu, 2, ",", "."),
                $tanggal_aset->format("d-m-Y"),
                $ms,
                '', // Placeholder for image
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

    private function downloadImage($url)
    {
        $client = new Client();
        $response = $client->get($url);
        $imageName = basename($url);
        $imagePath = storage_path('app/public/' . $imageName);
        file_put_contents($imagePath, $response->getBody()->getContents());

        return $imagePath;
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
            'Penyusutan',
            'Nilai Perolehan',
            'Nilai Residu',
            'Tanggal Aset',
            'Masa Manfaat',
            'Foto Aset',
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
                // Add drawings to the sheet
                foreach ($this->drawingCollection as $drawing) {
                    $drawing->setWorksheet($event->sheet->getDelegate());
                }
            },
        ];
    }


    public function title(): string
    {
        return 'Aset Alat Kantor';
    }
}
