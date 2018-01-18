<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UC extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ucs';

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
        'nome', 'ects', 'ano', 'semestre'
    ];

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }

    public function ramo()
    {
    	return $this->belongsTo('App\Ramo');
    }


}
