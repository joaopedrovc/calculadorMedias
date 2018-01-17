<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';

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
        'nome', 'totalUCTS',
    ];

    public function ucs()
    {
    	return $this->hasMany('App\UC');
    }

    public function escola()
    {
        return $this->belongsTo('App\Escola');
    }
}
