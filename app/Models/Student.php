<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\School;

class Student extends Model {

    use HasFactory,
        SoftDeletes;

    public $timestamps = true;
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'school_id', 'order'
    ];

    /**
     * Get the schools.
     */
    public function School() {
        return $this->belongsTo(School::class);
    }

}
