<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Subscription;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('remittance.contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'number' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Mail::send([], [], function ($message) use ($data) {
            $message->to('billarajinikar@gmail.com')
                    ->subject('Contact Us Message from nrily')
                    ->setBody(
                        "Name: {$data['name']}\n".
                        "Email: {$data['email']}\n".
                        "Phone: {$data['number']}\n".
                        "Message:\n{$data['message']}",
                        'text/plain'
                    );
        });

        return response()->json(['status' => 'success']);
    }

public function subscribe(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|unique:subscriptions,email',
    ]);

    Subscription::create(['email' => $validated['email']]);

    return back()->with('subscribe_success', 'Thank you for subscribing!');
}

}
