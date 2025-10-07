<h2>New Request Submission</h2>

<p><strong>Email:</strong> {{ $requestSubmission->email }}</p>
<p><strong>Pickup City:</strong> {{ $requestSubmission->pickup_city }}</p>
<p><strong>Details:</strong></p>
<p>{{ $requestSubmission->request_details }}</p>

@if($requestSubmission->images->count() > 0)
    <p><strong>Attached Images:</strong> {{ $requestSubmission->images->count() }}</p>
@endif