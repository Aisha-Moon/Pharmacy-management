<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request){
        $data['getRecord']=Purchase::get();
        $data['header_title']='Purchase List';

        return view('admin.purchases.list',$data);
    }
    public function create(Request $request){
        $data['getSupplier']=Supplier::get();
        $data['getInvoice']=Invoice::get();
        $data['header_title']='Add Purchase ';

        return view('admin.purchases.add',$data);

       }
       public function store(Request $request){
        $purchase=new Purchase();
        $purchase->suppliers_id=$request->suppliers_id;
        $purchase->invoices_id=$request->invoices_id;
        $purchase->voucher_number=$request->voucher_number;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->total_amount=$request->total_amount;
        $purchase->payment_status=$request->payment_status;

        $purchase->save();

        return redirect('admin/purchases')->with('success', 'Purchase saved successfully!');
       }
       public function edit($id,Request $request){
        $data['editRecord']=Purchase::find($id);
        $data['getSupplier']=Supplier::get();
        $data['getInvoice']=Invoice::get();
        $data['header_title']='Edit Purchase';

        return view('admin.purchases.edit',$data);
       }
       public function update($id,Request $request){
        $purchase=Purchase::find($id);
        $purchase->suppliers_id=$request->suppliers_id;
        $purchase->invoices_id=$request->invoices_id;
        $purchase->voucher_number=$request->voucher_number;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->total_amount=$request->total_amount;
        $purchase->payment_status=$request->payment_status;

        $purchase->save();

        return redirect('admin/purchases')->with('success', 'Purchase Updated successfully!');

       }
       public function delete($id){
        $supplier=Purchase::find($id)->delete();
        return redirect('admin/purchases')->with('success', 'Purchase Deleted successfully');

    }
}
