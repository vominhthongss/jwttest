<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = [
        'content',
    ];

    public static function getAllTask()
    {
        return self::select('*')->get();
    }
}
