<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Student;

class School extends Model {

    use HasFactory,
        SoftDeletes;

    public $timestamps = true;
    protected $table = 'schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the comments for the article.
     */
    public function students() {
        return $this->hasMany(Student::class);
    }

}
