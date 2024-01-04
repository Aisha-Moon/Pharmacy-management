<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request){
        $data['getRecord']=Supplier::get();
        $data['header_title']='Supplier List';

        return view('admin.suppliers.list',$data);
    }
    public function create(Request $request){
        $data['header_title']='Add Supplier ';

        return view('admin.suppliers.add',$data);
    }
    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->supplier_name=trim($request->supplier_name);
        $supplier->supplier_email=trim($request->supplier_email);
        $supplier->contact_number=trim($request->contact_number);
        $supplier->address=trim($request->address);
        $supplier->save();

        return redirect('admin/suppliers')->with('success', 'supplier Added successfully');
    }
    public function edit($id){
        $data['getRecord']=Supplier::find($id);
        $data['header_title']='Edit Supplier';

        return view('admin.suppliers.edit',$data);
    }
    public function update($id,Request $request){
        $supplier=Supplier::find($id);
        $supplier->supplier_name=trim($request->supplier_name);
        $supplier->supplier_email=trim($request->supplier_email);
        $supplier->contact_number=trim($request->contact_number);
        $supplier->address=trim($request->address);
        $supplier->save();

        return redirect('admin/suppliers')->with('success', 'supplier Updated successfully');

    }
    public function delete($id){
        $supplier=Supplier::find($id)->delete();
        return redirect('admin/suppliers')->with('success', 'supplier Deleted successfully');

    }
}
