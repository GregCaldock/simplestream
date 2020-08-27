<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timetable extends Model
{
    use SoftDeletes, UsesUuid;

    /**
     * The table the Model uses
     *
     * @var string
     */
    protected $table = 'timetable';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'programme_id', 'start_time', 'end_time',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_time',
        'end_time'
    ];

    /**
     * The programme the timetable entry belongs to
     *
     * @return BelongsTo
     */
    public function programme(): BelongsTo
    {
        return $this->belongsTo(Programme::class);
    }
}
