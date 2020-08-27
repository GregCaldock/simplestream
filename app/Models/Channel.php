<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use SoftDeletes;

    /**
     * The table the Model uses
     *
     * @var string
     */
    protected $table = 'channels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon',
    ];

    /**
     * The Programmes belonging to the Channel
     *
     * @return HasMany
     */
    public function programmes(): HasMany
    {
        return $this->hasMany(Programme::class);
    }
}
