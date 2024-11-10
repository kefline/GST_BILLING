<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class PartiesType extends Model
{
    //

    //if(!empty($request->get('id'))){

    //$return = $return -> where ('parties_types.id', '=' $request->get('id'));
   // }

   //if(!empty($request->get('name'))){
   //   $return = $return->where('parties_types.name', '%'. $request->get('name').%)}
    protected $fillable = [
        'name'

    ];
    static  public function getRecordAll($request){
        $return = self::select('parties_types.*');

        if (!empty($request->get('id'))) {
            $return = $return->where('parties_types.id', '=', $request->get('id'));
        }
        
        if (!empty($request->get('name'))) {
            $return = $return->where('parties_types.name', 'like', '%' . $request->get('name') . '%');
        }
        if (!empty($request->get('created_at'))) {
            $return = $return->where('parties_types.created_at', 'like', '%' . $request->get('created_at') . '%');
        } if (!empty($request->get('updated_at'))) {
            $return = $return->where('parties_types.updated_at', 'like', '%' . $request->get('updated_at') . '%');
        }

        $return = $return->paginate(5);//pages to be shown in pagination
        return $return;

    }
}
