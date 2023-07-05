<?php

namespace App\Http\Controllers\Document\Pdf;

use Barryvdh\DomPDF\Facade\Pdf;
use App\ViewModels\Document\Pdf\CarViewModel;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     *
     */
    public function __invoke(string $car_id)//:\Illuminate\Http\Response
    {
        $viewModel = new CarViewModel($car_id);
//        echo '<pre>';
//        var_dump($viewModel->getCarSectionBySectionKey(CarViewModel::HISTORY_API_URL_KEY));
//        die();
//        return $viewModel->view('pdf.car');
        $pdf = PDF::loadView('pdf.car', $viewModel->toArray())->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);;
        $pdf->getDomPDF()->setProtocol($_SERVER['DOCUMENT_ROOT']);
        return $pdf->stream("{$viewModel->getCarFileName()}.pdf");
    }
}
