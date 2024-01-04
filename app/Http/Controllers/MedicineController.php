<?php

namespace App\Http\Controllers;

use App\Models\MedicinesStock;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function medicines(Request $request){
        $data['getRecord']=Medicine::where('is_delete',0)->get();
        $data['header_title']='Medicine List ';

        return view('admin.medicines.list',$data);
    }
    public function add_medicines(){
        $data['header_title']='Add Medicine';

        return view('admin.medicines.add',$data);
    }
    public function insert_add_medicines(Request $request){
        $request->validate([
            'name' => 'required|string',
            'packing' => 'required|string',
            'generic_name' => 'required|string',
            'supplier_name' => 'required|string',
        ]);


        $medicine=new Medicine();
        $medicine->name=trim($request->name);
        $medicine->packing=trim($request->packing);
        $medicine->generic_name=trim($request->generic_name);
        $medicine->supplier_name=trim($request->supplier_name);
        $medicine->save();

        return redirect('admin/medicines')->with('success', 'Medicine added successfully');
    }
    public function edit_medicines($id){
        $data['getRecord']=Medicine::find($id);
        $data['header_title']='Edit Medicine';

        return view('admin.medicines.edit',$data);
    }
    public function update_medicines(Request $request, $id='')
    {
        $request->validate([
            'name' => 'required|string',
            'packing' => 'required|string',
            'generic_name' => 'required|string',
            'supplier_name' => 'required|string',
        ]);
        if(!empty($id)){
            $medicine=Medicine::find($id);
        }else{
            $medicine=new Medicine();
        }

        $medicine->name=trim($request->name);
        $medicine->packing=trim($request->packing);
        $medicine->generic_name=trim($request->generic_name);
        $medicine->supplier_name=trim($request->supplier_name);
        $medicine->save();

        return redirect('admin/medicines')->with('success', 'Medicine updated successfully');
    }
    public function delete_medicines($id){
        $delete=Medicine::getSingle($id);
        $delete->is_delete=1;
        $delete->save();

        return redirect('admin/medicines')->with('success', 'Medicine deleted successfully');
    }


    //medicine stocks starts here
    public function medicines_stock_list(){
        $data['getRecord']=MedicinesStock::get();
        $data['header_title']='Medicine Stock List';

        return view('admin.medicines_stock.list',$data);
    }
    public function medicines_stock_add(){
        $data['getRecord']=Medicine::where('is_delete',0)->get();
        $data['header_title']='Add Medicine Stock';

        return view('admin.medicines_stock.add',$data);

    }
    public function medicines_stock_store(Request $request){
        $stock=new MedicinesStock();
        $stock->medicines_id=$request->medicines_id;
        $stock->batch_id=$request->batch_id;
        $stock->expiry_date=$request->expiry_date;
        $stock->quantity=$request->quantity;
        $stock->mrp=$request->mrp;
        $stock->rate=$request->rate;
        $stock->save();

        return redirect('admin/medicines_stock')->with('success','Medicine Stock Added Successfully');
    }
    public function medicines_stock_edit($id,Request $request){
        $data['oldRecord']=MedicinesStock::find($id);
        $data['getRecord']=Medicine::where('is_delete',0)->get();
        $data['header_title']='Edit Medicine Stock';

        return view('admin.medicines_stock.edit',$data);

    }
    public function medicines_stock_update($id,Request $request){
        $stock=MedicinesStock::find($id);
        $stock->medicines_id=$request->medicines_id;
        $stock->batch_id=$request->batch_id;
        $stock->expiry_date=$request->expiry_date;
        $stock->quantity=$request->quantity;
        $stock->mrp=$request->mrp;
        $stock->rate=$request->rate;
        $stock->save();

        return redirect('admin/medicines_stock')->with('success','Medicine Stock Updated Successfully');
    }
    public function medicines_stock_delete($id){
        $delete=MedicinesStock::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Medicine Stock Deleted Successfully');
    }
}
