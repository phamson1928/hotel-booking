<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\Models\Gallary;

use App\Models\Contact;

class AdminController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
        }
        if ($usertype === 'user') {
            $rooms = Room::all();
            $gallaries = Gallary::all();
            return view('home.index', compact('rooms', 'gallaries'));
        } elseif ($usertype === 'admin') {
            $contacts = Contact::all();
            return view('admin.side_bar.index', compact('contacts'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Phân quyền không hợp lệ']);
        }
        }

        public function home(){
            $rooms = Room::all();
            $gallaries = Gallary::all();
            return view('home.index',compact('rooms', 'gallaries'));
        }

        public function addRoom(){
            return view('admin.side_bar.add_room_page');
        }

        public function showHomePanel(){
            $contacts = Contact::all();
            return view('admin.side_bar.index', compact('contacts'));
        }
}
