<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'CustomerID',
        'MaidID',
        'PromotionID',
        'StartTime'  ,
        'EndTime'    ,
        'Total'      ,
        'BookedDate' ,
        'RangeDate'  ,
        'Note'      ,
        'Address'     ,
    ];
}
