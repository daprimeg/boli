<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class InvoiceController extends Controller
{
    public function view()
    {
        return view('invoice.invoice');
    }

    public function downloadPDF()
    {
        $html = view('invoice.invoice')->render();

        $mpdf = new Mpdf([
            'format' => 'A4',
       
        ]);

        $mpdf->WriteHTML($html);
        return $mpdf->Output('invoice_0001.pdf', 'I');
    }
}
