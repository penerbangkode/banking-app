<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycTask extends Model
{
    use HasFactory;
    CONST TASK_NEW_ACCOUNT_REQUEST = 'NEW_ACCOUNT_REQUEST';
    CONST TASK_ADDITIONAL_ACCOUNT_REQUEST = 'ADDITIONAL_ACCOUNT_REQUEST';
    CONST TASK_ADDITIONAL_CARD_REQUEST = 'ADDITIONAL_CARD_REQUEST';
    CONST TASK_DISABLE_CARD_REQUEST = 'DISABLE_CARD_REQUEST';
}
