<?php

namespace App\Charts;

use App\Models\Transport;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TransportChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $transports = Transport::with(['type', 'order'])->get();
        $transportBooked = 0;
        foreach ($transports as $transport) {
            foreach ($transport->order as $orderData) {
                if($orderData->order_finish === NULL){
                    $transportBooked++;
                }
            }
        }

        $data = [
            count($transports)-$transportBooked,
            $transportBooked,
        ];

        $label = [
            'Free',
            'Booked'
        ];

        return $this->chart->pieChart()
            ->setTitle('Chart Penggunaan Kendaraan')
            ->setSubtitle(date('d-M-Y'))
            ->setDataset($data)
            ->setLabels($label);
    }
}
