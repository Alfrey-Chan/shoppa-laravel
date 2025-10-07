<?php

namespace App\Models;

use App\Models\RequestSubmission;
use Illuminate\Database\Eloquent\Model;

class RequestImage extends Model
{
    protected $fillable = [
        "request_submission_id",
        "image_path",
        "original_name",
        "file_size",
        "mime_type"
    ];

    public function requestSubmission() 
    {
        return $this->belongsTo(RequestSubmission::class);
    }
}
