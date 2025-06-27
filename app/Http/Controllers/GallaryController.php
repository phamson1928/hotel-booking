<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallary;

class GallaryController extends Controller
{
    public function showListGallary(){
        $gallaries = Gallary::all();
        return view('admin.side_bar.list_gallaries', compact('gallaries'));
    }

    public function addGallary(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $gallary = new Gallary();
        $gallary->title = $request->title;
        $gallary->image = $imageName;
        $request->image->move(public_path('images'), $imageName);
        $gallary->save();
        return redirect()->route('list_gallaries')->with('success', 'Thêm ảnh thành công');
    }

    public function deleteGallary($id){
        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect()->route('list_gallaries')->with('success', 'Xóa ảnh thành công');
    }

}
