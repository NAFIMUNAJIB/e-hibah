<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProposalMilestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'status',
        'status_by',
        'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value)->setTimezone('Asia/Jakarta');
        $formattedDate = $carbonDate->format('Y-m-d H:i:s');

        return $formattedDate;
    }
}
