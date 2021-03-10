<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInvoiceDetail;
use Auth;
use PDF;
use App\User;
use Carbon\Carbon;
use App\InvoiceDetail;

class PurchaseHistoryController extends Controller
{
    public function index(){
        $invoice = UserInvoiceDetail::has('details')->with('details','details.course','details.course.user')->where(['user_id'=> Auth::user()->id , 'status'=>'paid' ])->get();
        return view('learners.pages.purchase-history',compact('invoice'));
    }

    public function downloadPdf($id){
        $invoice = UserInvoiceDetail::findorfail($id);
        $date = Carbon::parse($invoice->create_at)->isoFormat('D/M/YYYY');
        $invoiceDetailData = InvoiceDetail::with('course','course.user')->where('invoice_id', $id)->get()->unique('course_id');
        $user = User::findOrFail(Auth::user()->id);

        $pdf = PDF::loadView('learners.pages.invoicePDF', compact('invoice','invoiceDetailData', 'user','date'))->stream('lila-invoice.pdf');
    
           
        return $pdf;
    }
}
