<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ramos';

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

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }

    public function ucs()
    {
        return $this->hasMany('App\UC');
    }
}
