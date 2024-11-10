<?php

namespace App\Http\Controllers;

use App\Models\GSTBills;
use App\Models\PartiesType;
use Illuminate\Http\Request;

class GSTController extends Controller
{
    //

    public function gst_bills(Request $request)
    {

        $data['getRecords'] = GSTBills::getRecordAll($request);

        return view('admin.GST_Bills.list', $data);
    }


    public function gst_bills_add()
    {

        $data['getpartiesType'] = PartiesType::get();
        return view('admin.GST_Bills.add', $data);
    }
    public function GST_Bills_insert(Request $request)
    {

        
        // dd($request->all());
        $save = new GSTBills;
        $save->parties_types_id  = trim($request->parties_types_id);
        $save->invoice_date  = trim($request->invoice_date);
        $save->invoice_no  = trim($request->invoice_no);
        $save->description  = trim($request->description);
        $save->total_amount  = trim($request->total_amount);
        $save->cgst_rate  = trim($request->cgst_rate);
        $save->sgst_rate  = trim($request->sgst_rate);
        $save->igst_rate  = trim($request->igst_rate);
        $save->cgst_amount  = trim($request->cgst_amount);
        $save->sgst_amount  = trim($request->sgst_amount);
        $save->igst_amount  = trim($request->igst_amount);
        $save->tax_amount  = trim($request->tax_amount);
        $save->net_amount  = trim($request->net_amount);

        $save->declaration  = trim($request->declaration);
        $save->save();

        // dd($save);

        return redirect('admin/GST_Bills')->with('success', 'You have successful inserted the Bills');
    }

    public function  gst_bills_edit(Request $request, $id)
    {
        // dd($id);
        $data['getpartiesType'] = PartiesType::get();
        $data['getrecords'] = GSTBills::find($id);

        return view('admin.GST_Bills.edit', $data);
    }

    public function gst_bills_update(Request $request, $id)
    {
        $save = GSTBills::find($id);

        $save->parties_types_id  = trim($request->parties_types_id);
        $save->invoice_date  = trim($request->invoice_date);
        $save->invoice_no  = trim($request->invoice_no);
        $save->description  = trim($request->description);
        $save->total_amount  = trim($request->total_amount);
        $save->cgst_rate  = trim($request->cgst_rate);
        $save->sgst_rate  = trim($request->sgst_rate);
        $save->igst_rate  = trim($request->igst_rate);
        $save->cgst_amount  = trim($request->cgst_amount);
        $save->sgst_amount  = trim($request->sgst_amount);
        $save->igst_amount  = trim($request->igst_amount);
        $save->tax_amount  = trim($request->tax_amount);
        $save->net_amount  = trim($request->net_amount);

        $save->declaration  = trim($request->declaration);
        $save->save();

        return redirect('admin/GST_Bills')->with('success', 'You have successful updated the Bills');
    }


    public function gst_bills_delete($id)
    {
        $delete = GSTBills::find($id);


        if (!$delete) {
            return redirect()->route('admin.GST_Bills.list')->with('error', 'Party not found.');
        }
        $delete->delete();
        return redirect()->route('admin.GST_Bills.list')->with('success', 'You have successfully deleted the bills.');
    }


    public function gst_bills_view($id)
    {

        $data['getrecords'] = GSTBills::find($id);

        return view('admin.GST_Bills.view', $data);
    }
}
