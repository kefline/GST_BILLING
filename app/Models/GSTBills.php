<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GSTBills extends Model
{
    //

    protected $fillable = [
        'parties_types_id',
        'invoice_date',
        'invoice_no',
        'description',
        'total_amount',
        'cgst_rate',
        'sgst_rate',
        'igst_rate',
        'cgst_amount',
        'sgst_amount',
        'igst_amount',
        'tax_amount',
        'net_amount',
        'declaration',



    ];

    static public function getRecordAll($request)
{
    $return = self::select('g_s_t_bills.*', 'parties_types.name')
        ->join('parties_types', 'g_s_t_bills.parties_types_id', '=', 'parties_types.id')
        ->when(
            !empty($request->get('id')),
            function ($query) use ($request) {
                return $query->where('g_s_t_bills.id', '=', $request->get('id'));
            }
        )

        ->when(
            !empty($request->get('invoice_date')),
            function ($query) use ($request) {
                return $query->where('g_s_t_bills.invoice_date', '=', $request->get('invoice_date'));
            }
        )
        ->when(
            !empty($request->get('invoice_no')),
            function ($query) use ($request) {
                return $query->where('g_s_t_bills.invoice_no', '=', $request->get('invoice_no'));
            }
        )
        ->when(
            !empty($request->get('total_amount')),
            function ($query) use ($request) {
                return $query->where('g_s_t_bills.total_amount', '=', $request->get('total_amount'));
            }
        )


        //->when(!empty($request->get('name')),function($query)use($request){ return->$query})

        ->paginate(10);
         

    return $return;
}

public function getPartiesTypeName()
{
    // Define relationship to the PartiesType model
    return $this->belongsTo(PartiesType::class, 'parties_types_id');
}

}
