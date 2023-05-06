<?php

namespace App\Charts;

use App\Models\Film;
use App\Models\Transaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TicketFilmChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $ticketFilm = Transaction::get();
        $data = [
            $ticketFilm->whereBetween('created_at', ['2023-01-01 16:44:44', '2023-01-31 16:44:44'])->count(),
            $ticketFilm->whereBetween('created_at', ['2023-02-01 16:44:44', '2023-02-31 16:44:44'])->count(),
            $ticketFilm->whereBetween('created_at', ['2023-03-01 16:44:44', '2023-03-31 16:44:44'])->count(),
            $ticketFilm->whereBetween('created_at', ['2023-04-01 16:44:44', '2023-04-31 16:44:44'])->count(),
            $ticketFilm->whereBetween('created_at', ['2023-05-01 16:44:44', '2023-05-31 16:44:44'])->count(),
        ];
        $label = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
        ];
        return $this->chart->barChart()
            ->setTitle('Penjualan Ticket PerBulan')
            ->setSubtitle(date('Y'))
            ->addData('Tiket',$data)
            ->setLabels($label);
    }

}
