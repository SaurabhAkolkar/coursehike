<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInvoiceDetail;
use Auth;
use PDF;
use Carbon\Carbon;
use App\InvoiceDetail;

class PurchaseHistoryController extends Controller
{
    public function index(){
        $invoice = UserInvoiceDetail::with('details','details.course','details.course.user')->where([ ['user_id', Auth::user()->id] , ['status','paid'] ])->get();
        return view('learners.pages.purchase-history',compact('invoice'));
    }

    public function downloadPdf($id){
        $invoiceData = UserInvoiceDetail::findorfail($id);
        $date = Carbon::parse($invoiceData->create_at)->isoFormat('D/M/YYYY');
        $invoiceDetailData = InvoiceDetail::with('course','course.user')->where('invoice_id', $id)->get();

        $pdf = PDF::loadView('learners.pages.invoicePDF', compact('invoiceData'));

        
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
