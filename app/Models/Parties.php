<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parties extends Model
{
    protected $fillable = [
        'full_name',
        'parties_types_id',
        'phone',
        'address',
        'account_no',
        'bank_name',
        'ifsc',
        'branch_address',
        'account_holder_name',

    ];


    static public function getRecordAll($request)
    {
        return self::select('parties.*', 'parties_types.name')
            ->join('parties_types', 'parties.parties_types_id', '=', 'parties_types.id')
            ->when(
                !empty($request->get('id')),
                function ($query) use ($request) {
                    return $query->where('parties.id', '=', $request->get('id'));
                }
            )
            ->when(
                !empty($request->get('full_name')),
                function ($query) use ($request) {
                    return $query->where('parties.full_name', 'like', '%' . $request->get('full_name') . '%');
                }
            )
            ->when(
                !empty($request->get('phone')),
                function ($query) use ($request) {
                    return $query->where('parties.phone', 'like', '%' . $request->get('phone') . '%');
                }
            )
            ->when(
                !empty($request->get('created_at')),
                function ($query) use ($request) {
                    return $query->where('parties.created_at', 'like', '%' . $request->get('created_at') . '%');
                }
            )
            ->paginate(2); // pages to be shown in pagination
    }
}
