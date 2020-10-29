<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\contactFormRequest;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function create()
    {

        $user = Auth::user();

        return view('contact.create', compact('user'));
    }

    public function store(contactFormRequest $request)
    {
        $contact = new ContactForm;

        $contact->user_id = $request->input('user_id');
        $contact->your_name = $request->input('your_name');
        $contact->email = $request->input('email');
        $contact->contact_category = $request->input('contact_category');
        $contact->contents = $request->input('contents');

        $contact->save();
        
        return redirect('/')->with('status', "お問い合わせを送信いたしました。担当者からの連絡をお待ちください。");
    }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
