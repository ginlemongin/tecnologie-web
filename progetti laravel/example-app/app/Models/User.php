<?php

/**cancello il modello user gia esistente e do il comando php artisan make:model User nel
 * cmd, mi crea questo file
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
}
