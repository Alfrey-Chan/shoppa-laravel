<?php

namespace App\Http\Controllers\Api;

use App\Models\RequestImage;
use Illuminate\Http\Request;
use App\Models\RequestSubmission;
use App\Mail\RequestSubmissionMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\RequestReceivedMail;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "request_details" => "required",
            "pickup_city" => "required|string",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg|max:2048"
        ]);

        $requestSubmission = RequestSubmission::create([
            "email" => $validated["email"],
            "request_details" => $validated["request_details"],
            "pickup_city" => $validated["pickup_city"],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // store the file in storage/app/public/request-images
                $path = $image->store('request-images', 'public');

                RequestImage::create([
                    "request_submission_id" => $requestSubmission->id,
                    "image_path" => $path,
                    "original_name" => $image->getClientOriginalName(),
                    "file_size" => $image->getSize(),
                    "mime_type" => $image->getMimeType()
                ]);
            }
        }

        Mail::to(config('mail.admin_email'))
            ->send(new RequestSubmissionMail($requestSubmission));

        Mail::to($requestSubmission->email)
            ->send(new RequestReceivedMail($requestSubmission));

        return response()->json([
            "message" => "Request submitted successfully!",
            "data" => $requestSubmission->load('images')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
