<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'status', 'finished_at', 'slug'];

    protected $appends = ['details', 'my_rank'];

    public function getMyRankAttribute()
    {
        $rank = 0;

        foreach($this->results()->orderByDesc('point')->get() as $result)
        {
            $rank += 1;
            if(auth()->user()->id == $result->user_id)
            {
                return $rank;
            }
        }
    }

    public function getDetailsAttribute()
    {
        return [
            'avg' => $this->results()->avg('point'),
            'join_count' => $this->results()->count(),
        ];
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }

    public function topTen()
    {
        return $this->results()->orderByDesc('point')->take(10);
    }

    public function my_result()
    {
        return $this->hasOne('App\Models\Result')->where('user_id', auth()->user()->id);
    }

    public function questions() {
        return $this->hasMany('App\Models\Questions');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
