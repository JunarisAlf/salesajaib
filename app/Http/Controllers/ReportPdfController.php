<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\History;
use App\Models\Property;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportPdfController extends Controller {
    public function salesReport(){
        $sales = User::with('histories')
            ->withCount('histories')->where('role', 'sales')->orderBy('histories_count', 'desc')->get();
        $count = [
            'click' =>  History::where('type', 'click')->count(),
            'submit' =>  History::where('type', 'submit')->count(),
            'property' => Property::all()->count(),
            'sold' => Transaction::count(),
            'sales' => User::where('role', 'sales')->count(),
        ];
        // $pdf = Pdf::loadView('pdf.salesReport', ['sales' => $sales, 'count' =>  $count]);
        // return $pdf->download('salesReport.pdf');
        return view('pdf.salesReport', ['sales' => $sales, 'count' =>  $count]);
        
    }
}
