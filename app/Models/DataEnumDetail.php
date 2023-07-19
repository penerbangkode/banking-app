<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEnumDetail extends Model
{
    CONST NATIONALITY_TYPE = 'NATIONALITY_TYPE';
    CONST IDENTITY_TYPE = 'IDENTITY_TYPE';
    CONST GENDER_TYPE = 'GENDER_TYPE';

    use HasFactory;
}
