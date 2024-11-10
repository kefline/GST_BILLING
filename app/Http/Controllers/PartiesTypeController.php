<?php

namespace App\Http\Controllers;

use App\Models\PartiesType;
use Illuminate\Http\Request;
use App\Models\Parties;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PartiesTypeController extends Controller
{
    //

    public function parties_type_list(Request $request)
    {
        $data['getRecords'] = PartiesType::getRecordAll($request); //pagination
        return view('admin.parties_Type.list', $data);
    }
    public function parties_type_add()
    {
        return view('admin.parties_Type.add');
    }



    public function parties_type_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:parties_types,name',
        ]);

        $partiesType = new PartiesType;
        $partiesType->name = trim($request->name);
        $partiesType->save();

        return redirect()->route('admin.parties_Type.list')->with('success', 'Parties Type added successfully');
    }

    public function parties_type_edit(Request $request, $id)
    {
        $data['getRecord'] = PartiesType::find($id);

        return view('admin.parties_Type.edit', $data);
    }

    public function parties_type_update(Request $request, $id)
    {
        // dd($request->all());
        $save = PartiesType::find($id);
        $save->name = trim($request->name);
        $save->save();
        return redirect('admin/parties_Type/list')->with('success', 'You have updated successful ');
    }
    public function parties_type_delete($id)
    {
        $delete = PartiesType::find($id);
        $delete->delete();
        return redirect('admin/parties_Type/list')->with('success', 'You have deleted successful ');
    }

    public function parties_type_pdf_generator()
    {
        $getRecordAll = PartiesType::get();
        $data = [
            'title' => 'welcome to jopkee17@gmail.com',
            'date' => date('d/m/Y'),
            'Parties' => $getRecordAll,

        ];

        // $pdf = PDF::loadView('pdf_generator', $data);
        // return $pdf->download('kefline.pdf');
        return view('admin.parties_Type.pdf_generator');
    }



    public function parties(Request $request)
    {
        $data['getRecords'] = Parties::getRecordAll($request);
        return view('admin.parties.list', $data);
    }

    public function parties_add(Request $request)
    {

        $data['getpartiesType'] = PartiesType::get();
        return view('admin.parties.add', $data);
    }

    public function parties_insert(Request $request)
    {
        $request->validate([
            'parties_types_id' => 'required|exists:parties_types,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'account_no' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'ifsc' => 'nullable|string|max:11',
            'branch_address' => 'nullable|string|max:255',
            'account_holder_name' => 'nullable|string|max:255',
        ]);

        $save = new Parties;

        $save->parties_types_id = trim($request->parties_types_id);
        $save->full_name = trim($request->full_name);
        $save->phone = trim($request->phone);
        $save->address = trim($request->address);
        $save->account_no = trim($request->account_no);
        $save->bank_name = trim($request->bank_name);
        $save->ifsc = trim($request->ifsc);
        $save->branch_address = trim($request->branch_address);
        $save->account_holder_name = trim($request->account_holder_name);

        $save->save();

        return redirect('admin/parties')->with('success', 'You have successfully added the party.');
    }


    public function parties_edit(Request $request, $id)
    {
        $data['getRecord'] = Parties::find($id);

        if (!$data['getRecord']) {
            return redirect()->route('admin.parties.add')->with('error', 'Record not found.');
        }

        $data['getpartiestype'] = PartiesType::get();

        return view('admin.parties.edit', $data);
    }

    public function parties_update($id, Request $request)
    {
        $save = Parties::find($id);

        if (!$save) {
            return redirect('admin/parties')->with('error', 'Party not found.');
        }

        $save->parties_types_id = trim($request->parties_types_id);
        $save->full_name = trim($request->full_name);
        $save->phone = trim($request->phone);
        $save->address = trim($request->address);
        $save->account_no = trim($request->account_no);
        $save->bank_name = trim($request->bank_name);
        $save->ifsc = trim($request->ifsc);
        $save->branch_address = trim($request->branch_address);
        $save->account_holder_name = trim($request->account_holder_name);

        $save->save();

        return redirect('admin/parties')->with('success', 'You have successfully edited the party.');
    }


    public function parties_delete($id, Request $request)
    {
        $delete = Parties::find($id);

        if (!$delete) {
            return redirect()->route('admin.parties.list')->with('error', 'Party not found.');
        }

        $delete->delete();

        return redirect()->route('admin.parties.list')->with('success', 'You have successfully deleted the party.');
    }
}
