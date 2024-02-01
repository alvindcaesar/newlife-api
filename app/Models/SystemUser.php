<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    use HasFactory;

    protected $hidden = [
        'UserPassByte',
        'UserKeyByte',
        'UserIVByte',
        'UserPassByteW',
        'UserKeyByteW',
        'UserIVByteW',
        'SessionUnique'
    ];

    protected $table = 'tblUser';

    protected $primaryKey = 'UserID';

    protected $guarded = [];

    const CREATED_AT = 'CreateDate';
    const UPDATED_AT = 'UpdateDate';
}
