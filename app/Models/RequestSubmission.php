<?php

namespace App\Models;

use App\Models\RequestImage;
use Illuminate\Database\Eloquent\Model;

class RequestSubmission extends Model
{
    protected $fillable = ["email", "request_details", "pickup_city"];

    public function images() {
        return $this->hasMany(RequestImage::class);
    }
}
