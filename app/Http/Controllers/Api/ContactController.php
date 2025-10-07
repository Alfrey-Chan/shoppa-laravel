<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;
use App\Mail\ContactSubmissionMail;
use App\Mail\RequestSubmissionMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["data" => "Contact Inquiries"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "topic" => "required|string",
            "message" => "required|string",
        ]);

        $contactSubmission = ContactSubmission::create([
            "email" => $validated["email"],
            "topic" => $validated["topic"],
            "message" => $validated["message"],
        ]);

        Mail::to(config('mail.admin_email'))
            ->send(new ContactSubmissionMail($contactSubmission));

        return response()->json([
            "message" => "Contact message successfully sent!"
        ], 200);
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
