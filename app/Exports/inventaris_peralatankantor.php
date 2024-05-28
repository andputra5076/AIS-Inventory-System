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
use Illuminate\Support\Facades\Log;

class Inventaris_Peralatankantor implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents, WithTitle
{
    use Exportable;

    private $drawingCollection = [];

    public function collection()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'inventaris_peralatankantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'inventaris_peralatankantor.id_petugas2 as idusaha', 'unit_kerja.id as idkerja', 'users.id as id_user',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'inventaris_peralatankantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'inventaris_peralatankantor.id_petugas2 as idusaha', 'inventaris_peralatankantor.pengguna_barang as idusaha',  'unit_kerja.id as idkerja',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('username')) {
            return redirect("/");
        }

        $data = collect();
        $nourut = 0;

        foreach ($users as $user) {
            $nourut++;
            $no = str_pad($user->no_inventaris, 6, '0', STR_PAD_LEFT);

            $tanggalbarang = DateTime::createFromFormat("Y-m-d", $user->tanggal_barang);
            $gabung = $tanggalbarang->format("Ym") . $user->kode_peralatankantor . $user->id_user . '.' . $no;
            $merek = $user->merek_peralatankantor;
            $jenis = $user->jenis_peralatankantor;
            $tipe = $user->tipe_peralatankantor;
            $spesifikasi = $user->spesifikasi_peralatankantor;
            $petugas2 = explode(',', $user->id_petugas2);

            // Create Drawing instance for image
            $imagePath = $this->downloadImage($user->image); // Download and set image path
            if ($imagePath) {
                $drawing = new Drawing();
                $drawing->setPath($imagePath);
                $drawing->setHeight(50);
                $drawing->setCoordinates('O' . ($nourut + 1));
                $drawing->setWorksheet($event->sheet->getDelegate()); 
                $this->drawingCollection[] = $drawing;
            }

            $data->push([
                $nourut,
                $gabung,
                $no,
                $user->nama_peralatankantor,
                $merek,
                $jenis,
                $tipe,
                $spesifikasi,
                $user->kondisi,
                $user->jumlah,
                $user->satuan,
                'Rp. ' . number_format($user->nilaiperolehan, 2, ",", "."),
                $tanggalbarang->format("d-m-Y"),
                '',
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
            'Nama Barang',
            'Jenis Barang',
            'Merek',
            'Tipe',
            'Spesifikasi',
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

    private function downloadImage($url)
    {
        try {
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            Log::info('Downloading image from URL: ' . $url);

            $client = new \GuzzleHttp\Client();
            $response = $client->get($url);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Failed to download image: ' . $url);
            }

            $imageName = basename($url);
            $imagePath = storage_path('../../public/assets/images/inventaris/' . $imageName);

            Log::info('Image saved to path: ' . $imagePath);

            file_put_contents($imagePath, $response->getBody()->getContents());

            return $imagePath;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            $placeholderPath = storage_path('../../public/assets/images/inventaris/placeholder.png');
            if (file_exists($placeholderPath)) {
                return $placeholderPath;
            } else {
                Log::error('Placeholder image not found at: ' . $placeholderPath);
                return null;
            }
        }
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:W1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '000000'],
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
                        'color' => ['argb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => '000000'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                foreach ($this->drawingCollection as $drawing) {
                    $drawing->setWorksheet($event->sheet->getDelegate());
                }
            },
        ];
    }

    public function title(): string
    {
        return 'Inventaris Peralatan Kantor';
    }
}
