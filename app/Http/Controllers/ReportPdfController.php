<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\History;
use App\Models\Property;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ReportPdfController extends Controller {
    public function salesReport(Request $req){
        $periode = $req->periode;
        $st_date = '';
        $end_date = '';
        $sales = [];
        $count = [];
        if ($periode == 'day'){
            $st_date = Carbon::now()->startOfDay()->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->endOfDay()->format('Y-m-d H:i:s');
        }else if($periode == 'week'){
            $st_date = Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');
        }
        else if($periode == 'month'){
            $st_date = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        }else if($periode == 'range'){
            $st_date = Carbon::createFromDate($req->date_start)->setTime(00, 00, 0)->format('Y-m-d H:i:s');
            $end_date = Carbon::createFromDate($req->end)->setTime(23, 59, 59)->format('Y-m-d H:i:s');
        }else if($periode == 'all'){
            $st_date = Carbon::now()->startOfCentury()->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->endOfDay()->format('Y-m-d H:i:s');
            $sales = User::with('histories')
                ->withCount('histories')
                ->where('role', 'sales')
                ->orderBy('histories_count', 'desc')
                ->get();
            $count = [
                'click' =>  History::where('type', 'click')->count(),
                'submit' =>  History::where('type', 'submit')->count(),
                'property' => Property::all()->count(),
                'sold' => Transaction::count(),
                'sales' => User::where('role', 'sales')->count(),
            ];
            return view('pdf.salesReport', ['sales' => $sales, 'count' =>  $count, 'st_date' =>$st_date, 'end_date' => $end_date]);
        }
        $sales = User::with('histories')
                ->withCount(['histories' => function(Builder $query) use($st_date, $end_date){
                    $query->whereBetween('created_at', [$st_date, $end_date]);
                }])
                ->where('role', 'sales')
                ->orderBy('histories_count', 'desc')
                ->get();

        $count = [
            'click' =>  History::where('type', 'click')->whereBetween('created_at', [$st_date, $end_date])->count(),
            'submit' =>  History::where('type', 'submit')->whereBetween('created_at', [$st_date, $end_date])->count(),
            'property' => Property::all()->count(),
            'sold' => Transaction::whereBetween('created_at', [$st_date, $end_date])->count(),
            'sales' => User::where('role', 'sales')->count(),
        ];
        // $pdf = Pdf::loadView('pdf.salesReport', ['sales' => $sales, 'count' =>  $count]);
        // return $pdf->download('salesReport.pdf');
        return view('pdf.salesReport', ['sales' => $sales, 'count' =>  $count, 'st_date' =>$st_date, 'end_date' => $end_date]);
    }

    
}
