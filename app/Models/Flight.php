<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Flight extends Model
{

    protected $fillable = [
        'plane_id',
        'airport_origin_id',
        'airport_destination_id',
        'time_duration',
        'date',
        'hour_output',
        'arrival_tbime',
        'old_price',
        'price',
        'total_plots',
        'is_promotion',
        'image',
        'qty_stops',
        'description'
    ];

    public function getItems($pages)
    {
        return $this->with(['origin', 'destination'])->paginate($pages);
    }

    public function newFlight(Request $request, $nameFile)
    {
        $dataForm = $request->all();
        $dataForm['image'] = $nameFile;

        return $this->create($dataForm);
    }

    public function origin()
    {
        return $this->belongsTo(Airport::class, 'airport_origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'airport_destination_id');
    }

    public function planes()
    {
        return $this->belongsTo(Plane::class, 'plane_id');
    }

    // public function getDateAttribute($value)
    // {

    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    public function updateFlight(Request $request, $nameFile = '')
    {

        $dataForm = $request->all();
        $dataForm['image'] = $nameFile;

        return $this->update($dataForm);
    }


    public function search(Request $request, $pages)
    {
        $flights = $this->where(function ($query) use ($request) {
            $code = $request->code;
            $date = $request->date;
            $qty_stops = $request->qty_stops;
            $airport_origin_id = $request->airport_origin_id;
            $airport_destination_id = $request->airport_destination_id;

            if ($code) {
                $query->where('id', $code);
            }

            if ($date) {
                $query->where('date', '>=', $date);
            }

            if ($qty_stops) {
                $query->where('qty_stops', $qty_stops);
            }

            if ($airport_origin_id) {
                $query->where('airport_origin_id', $airport_origin_id);
            }

            if ($airport_destination_id) {
                $query->where('airport_destination_id', $airport_destination_id);
            }
        })->with(['origin', 'destination'])->paginate($pages);


        return $flights;
    }
}
