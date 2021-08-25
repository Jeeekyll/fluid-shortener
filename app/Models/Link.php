<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
      'original_link',
      'short_link',
    ];

    public function getLinkDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d F, Y');
    }
}
