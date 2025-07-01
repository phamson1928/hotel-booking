<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\RoomImage;

class RoomController extends Controller
{
   public function addNewRoom(Request $request)
   {
       $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string',
           'price' => 'required|numeric|min:0',
           'type' => 'required|string',
           'freewifi' => 'required|boolean',
           'imageroom' => 'required|image|mimes:jpeg,png,jpg|',
           'room_images.*' => 'nullable|image|mimes:jpeg,png,jpg|'
       ]);

       try {
           $uploadPath = public_path('room_images');
           if (!file_exists($uploadPath)) {
               mkdir($uploadPath, 0777, true);
           }

           DB::beginTransaction();

           $data = new Room();
           $data->room_title = $request->title;
           $data->description = $request->description;
           $data->price = $request->price;
           $data->room_type = $request->type;
           $data->has_wifi = $request->freewifi;

           if ($request->hasFile('imageroom')) {
               $image = $request->file('imageroom');
               $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
               $image->move($uploadPath, $imageName);
               $data->image = $imageName;
           }

           $data->save();

           if ($request->hasFile('room_images')) {
               foreach ($request->file('room_images') as $image) {
                   $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                   $image->move($uploadPath, $imageName);
                   
                   RoomImage::create([
                       'room_id' => $data->id,
                       'image_path' => $imageName
                   ]);
               }
           }

           DB::commit();
           return redirect()->back()->with('success', 'Room added successfully');

       } catch (\Exception $e) {
           DB::rollback();
           if (isset($data) && $data->image) {
               $imagePath = $uploadPath . '/' . $data->image;
               if (file_exists($imagePath)) {
                   unlink($imagePath);
               }
           }
           return redirect()->back()->with('error', 'Failed to add room: ' . $e->getMessage());
       }
   }
    public function showListRoom(){
        $rooms = Room::all();
        return view('admin.side_bar.list_room',compact('rooms'));
    }
    public function deleteRoom($id){
        Room::find($id)->delete();
        return redirect()->back()->with('success','');
    }


    public function changeToUpdatePage($id){
        $data = Room::find($id);
        return view('admin.update_room_page',compact('data'));
    }

    public function updateRoom(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->has_wifi = $request->freewifi;

        if ($request->hasFile('imageroom')) {
            $oldImage = public_path('room_images/' . $data->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $image = $request->file('imageroom');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room_images'), $imageName);
            $data->image = $imageName;
        }

        $data->save();

        if ($request->hasFile('room_images')) {
            foreach ($request->file('room_images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('room_images'), $imageName);
                
                RoomImage::create([
                    'room_id' => $data->id,
                    'image_path' => $imageName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Phòng đã được cập nhật');
    }

    public function deleteRoomImage($id)
    {
        $image = RoomImage::find($id);
        if ($image) {
            $imagePath = public_path('room_images/' . $image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
            return redirect()->back()->with('success', 'Ảnh đã được xóa');
        }
        return redirect()->back()->with('error', 'Không tìm thấy ảnh');
    }

    public function showDetail($id){
        $rooms = Room::find($id);
        return view('home.room_detail',compact('rooms'));
    }
}