<?php

namespace App\Http\Controllers;

use App\Models\BookingInfor;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
        ]);

        // Kiểm tra xem phòng đã được đặt trong khoảng thời gian này chưa
        $existingBooking = BookingInfor::where('room_id', $id)
            ->where(function($query) use ($request) {
                $query->whereBetween('checkin_date', [$request->checkin_date, $request->checkout_date])
                    ->orWhereBetween('checkout_date', [$request->checkin_date, $request->checkout_date])
                    ->orWhere(function($q) use ($request) {
                        $q->where('checkin_date', '<=', $request->checkin_date)
                          ->where('checkout_date', '>=', $request->checkout_date);
                    });
            })
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'Phòng đã được đặt trong khoảng thời gian này!');
        }

        $data = new BookingInfor;
        $data->room_id = $id;
        $data->full_name = $request->name;
        $data->email_address = $request->email;
        $data->phone_number = $request->phone;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->save();

        return redirect()->back()->with('success', 'Đặt phòng thành công!');
    }

    public function showListBooking(){
        $bookings = BookingInfor::all();
        return view('admin.side_bar.list_bookings',compact('bookings'));
    }

    public function deleteBooking($id){
        BookingInfor::find($id)->delete();
        return redirect()->back()->with('success','Xóa đơn đặt phòng thành công');  
    }

    public function susscessBooking($id){
        BookingInfor::find($id)->update(['status' => 'approved']);
        return redirect()->back()->with('success','Phòng đã được phê duyệt');
    }

    public function rejectBooking($id){
        BookingInfor::find($id)->update(['status' => 'rejected']);
        return redirect()->back()->with('success','Phòng đã bị từ chối');
    }
}
