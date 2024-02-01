<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxInvoice extends Model
{
    use HasFactory;

    
    protected $table = 'tblDispur';

    protected $primaryKey = 'DispurID';

    protected $guarded = [];

    const CREATED_AT = 'CreateDate';
    const UPDATED_AT = 'UpdateDate';
}
