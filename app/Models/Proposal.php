<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_organisasi',
        'no_telp_organisasi',
        'email_organisasi',
        'alamat_organisasi',
        'peruntukan',
        'lampiran',
        'tahapan',
        'nilai',
        'tanggal_pengajuan',
        'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value)->setTimezone('Asia/Jakarta');
        $formattedDate = $carbonDate->format('Y-m-d H:i:s');

        return $formattedDate;
    }

    public function proposalMilestone()
    {
        return $this->hasMany(ProposalMilestone::class, 'proposal_id', 'id');
    }
}
