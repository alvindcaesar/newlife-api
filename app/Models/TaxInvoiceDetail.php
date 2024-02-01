<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxInvoiceDetail extends Model
{
    use HasFactory;

    
    protected $table = 'tblDispurDetails';

    // protected $primaryKey = 'DispurNo';

    protected $guarded = [];

    const CREATED_AT = 'CreateDate';
    const UPDATED_AT = 'UpdateDate';
}
