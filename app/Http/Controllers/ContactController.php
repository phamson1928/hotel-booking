<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendEmailNotification;
class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Gửi thành công');
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Xóa thành công thông tin liên hệ STT ' . $id);
    }

    public function sendMail(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->reply_message = $request->reply_message;
        $contact->save();
        $contact->notify(new SendEmailNotification($contact));
        return redirect()->back()->with('success', 'Gửi thành công');
    }

}
