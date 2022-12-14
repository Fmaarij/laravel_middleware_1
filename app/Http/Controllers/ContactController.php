<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Mail\NewsLetter;
use App\Models\Contact;
use App\Models\EmailSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $sujets = EmailSubjects::all();
        return view('backoffice.contact.index', compact('contacts','sujets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();
        $sujets = EmailSubjects::all();
        return view('backoffice.contact.contact', compact('contacts','sujets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacts = new Contact;
        $contacts->email_subject_id	 = $request->email_subject_id	;
        $contacts->email = $request->email;
        $contacts->msg = $request->msg;
        $contacts->save();
        $user = ['sujet' => $request->email_subject_id	,'email' => $request->email, 'msg' => $request->msg];
        Mail::to($user['email'])->send(new ContactMessageMail($user));
        return redirect( "contactpage");
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $contacts= Contact::all();
        // return view('emails.contact.index', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
