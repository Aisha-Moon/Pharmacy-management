<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function customers(Request $request){
        $data['header_title']='Customer List';

        $data['getRecord']=Customer::get();
        return view('admin.customers.list',$data);
    }
    public function add_customers(Request $request){
        $data['header_title']='Add Customer';

        return view('admin.customers.add',$data);
    }
    public function insert_add_customers(Request $request){
        $request->validate([
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'doctor_name' => 'required|string',
            'doctor_address' => 'required|string',
        ]);

        // Create a new customer record
        $customer = Customer::create([
            'name' => trim($request->input('name')),
            'contact_number' => trim($request->input('contact_number')),
            'address' => trim($request->input('address')),
            'doctor_name' => trim($request->input('doctor_name')),
            'doctor_address' => trim($request->input('doctor_address')),
        ]);

        return redirect('admin/customers')->with('success', 'Customer added successfully');
    }
    public function edit_customers($id){
        $data['getRecord']=Customer::find($id);
        $data['header_title']='Edit Customer';

        return view('admin.customers.edit',$data);
    }
    public function update_customers(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'doctor_name' => 'required|string',
            'doctor_address' => 'required|string',
        ]);

        $customer = Customer::getSingle($id);
        $customer->name=trim($request->name);
        $customer->contact_number=trim($request->contact_number);
        $customer->address=trim($request->address);
        $customer->doctor_name=trim($request->doctor_name);
        $customer->doctor_address=trim($request->doctor_address);
        $customer->save();

        return redirect('admin/customers')->with('success', 'Customer updated successfully');
    }
    public function delete_customers($id){
        $delete=Customer::getSingle($id);
        $delete->delete();

        return redirect('admin/customers')->with('success', 'Customer deleted successfully');
    }

 }

