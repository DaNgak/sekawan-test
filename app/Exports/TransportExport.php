<?php

namespace App\Exports;

use App\Models\Transport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransportExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Transport::all();
    // }

    public function query()
    {
        return Transport::query();
    }

    public function map($transport): array {
        return [
            $transport->name,
            $transport->number_series,
            $transport->bbm_consume,
            $transport->service_schedule,
            $transport->type->name,
            count($transport->order) === 0 ? '0' : count($transport->order),
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Kendaraan',
            'Nomor Plat Kendaraan',
            'Total BBM',
            'Tanggal Terakhir Servis',
            'Tipe Kendaraan',
            'Total Order Sewa'
        ];
    }
}
