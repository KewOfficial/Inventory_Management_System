<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFormController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showContactForm()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Process the form data
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $message = $validatedData['message'];

        // Define the recipient email address
        $recipientEmail = ' contact@ourinventory.com';

        // Compose the email content
        $emailContent = "Name: $name\n";
        $emailContent .= "Email: $email\n\n";
        $emailContent .= "Message:\n$message";

        // Send the email using your preferred method (e.g., PHP's built-in mail function)
        $subject = 'Contact Form Submission';

        // Send the email
        $mailSent = mail($recipientEmail, $subject, $emailContent);

        if ($mailSent) {
            // Email sent successfully
            return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
        } else {
            // Email sending failed
            return redirect()->route('contact')->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}
