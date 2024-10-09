<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $description
 * @property string $completed
 * @property string $completed_at
 * @method static where(string $string, int $id)
 */
class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
        'completed_at',
    ];
}
