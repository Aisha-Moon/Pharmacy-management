<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;

class InvoiceController extends Controller
{
   public function index(Request $request){
    $data['getRecord']=Invoice::get();
    $data['header_title']='Invoice List';

    return view('admin.invoices.list',$data);
   }
   public function create(Request $request){
    $data['getRecord']=Customer::get();
    $data['header_title']='Add Invoice ';

    return view('admin.invoices.add',$data);

   }
   public function store(Request $request)
   {
       // Validate the form data
       $request->validate([
           'customers_id' => 'required',
           'net_total' => 'required',
           'invoices_date' => 'required',
           'total_amount' => 'required',
           'total_discount' => 'required',
       ]);

       $invoice = new Invoice([
           'customers_id' => $request->customers_id,
           'net_total' => $request->net_total,
           'invoices_date' => $request->invoices_date,
           'total_amount' => $request->total_amount,
           'total_discount' => $request->total_discount,

       ]);

       $invoice->save();

       return redirect('admin/invoices')->with('success', 'Invoice saved successfully!');
   }
   public function edit($id,Request $request){
    $data['editRecord']=Invoice::find($id);
    $data['getRecord']=Customer::get();
    $data['header_title']='Edit Invoice ';

    return view('admin.invoices.edit',$data);
   }
   public function update($id,Request $request){
    $invoice=Invoice::find($id);
    $invoice->customers_id=trim($request->customers_id);
    $invoice->net_total=trim($request->net_total);
    $invoice->invoices_date=trim($request->invoices_date);
    $invoice->total_amount=trim($request->total_amount);
    $invoice->total_discount=trim($request->total_discount);
    $invoice->save();

    return redirect('admin/invoices')->with('success', 'Invoice Updated successfully!');


   }
   public function delete($id,Request $request){
    $invoice=Invoice::find($id)->delete();
    return redirect('admin/invoices')->with('success', 'Invoice Deleted successfully!');

   }
}
