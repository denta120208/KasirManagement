<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GenericExport implements FromView
{
    protected $view;
    protected $data;

    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function view(): View
    {
        // Set header agar tidak error saat dibuka di Excel
        \Illuminate\Support\Facades\Response::macro('excel', function ($content) {
            return response($content)
                ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        });
        return view($this->view, $this->data);
    }
}
