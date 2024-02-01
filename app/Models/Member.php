<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $hidden = [
        'UserPassByte',
        'UserKeyByte',
        'UserIVByte',
        'UserPassByteW',
        'UserKeyByteW',
        'UserIVByteW',
    ];

    protected $table = 'tblMember';

    protected $primaryKey = 'MemberID';

    protected $guarded = [];

    const CREATED_AT = 'CreateDate';
    const UPDATED_AT = 'UpdateDate';
}
