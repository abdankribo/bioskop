<?php

namespace App\Charts;

use App\Models\LogActivity;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LogActivityChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $logActivity = LogActivity::get();
        $data = [
            $logActivity->whereBetween('logged_at', ['2023-01-01 16:44:44', '2023-01-31 16:44:44'])->count(),
            $logActivity->whereBetween('logged_at', ['2023-02-01 16:44:44', '2023-02-31 16:44:44'])->count(),
            $logActivity->whereBetween('logged_at', ['2023-03-01 16:44:44', '2023-03-31 16:44:44'])->count(),
            $logActivity->whereBetween('logged_at', ['2023-04-01 16:44:44', '2023-04-31 16:44:44'])->count(),
            $logActivity->whereBetween('logged_at', ['2023-05-01 16:44:44', '2023-05-31 16:44:44'])->count(),
        ];
        $label = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
        ];
        return $this->chart->lineChart()
            ->setTitle('Jumlah Pengunjung')
            ->setSubtitle(date('Y'))
            ->addData('Pengunjung',$data)
            ->setLabels($label);
    }
}
