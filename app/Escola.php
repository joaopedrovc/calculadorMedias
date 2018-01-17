<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'escolas';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
    ];

    public function cursos()
    {
    	return $this->hasMany('App\Curso');
    }
}
