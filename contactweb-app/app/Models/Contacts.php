<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'name', 'contact', 'email'];

    protected $table = 'contacts';
}
