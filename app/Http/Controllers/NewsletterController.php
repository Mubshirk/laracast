<?php

namespace App\Http\Controllers;

use App\services\Newsletter;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            (new Newsletter())->subscribe(request('email'));

        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter '
            ]);
        }
        return redirect('/')
            ->with('success', 'You successfully signed in for our newsletter !!');
    }
}
