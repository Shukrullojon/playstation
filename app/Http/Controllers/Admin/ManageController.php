<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use App\Models\Room;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        $rooms = Room::where('user_id',auth()->user()->id)->latest()->get();
        $categories = Category::where('user_id',auth()->user()->id)->latest()->get();
        return view('admin.manage.index',[
            'rooms'=>$rooms,
            'categories'=>$categories,
        ]);
    }

    public function open($id){
        Package::create([
            'user_id' => auth()->user()->id,
            'room_id' => $id,
            'start_date' => date("Y-m-d H:i:s"),
            'state' => 1
        ]);
        return redirect()->route('manageIndex')->with('success' ,"Open room successful!");
    }

    public function cloze($id){
        $package = Package::where('id',$id)->first();
        $date = date("Y-m-d H:i:s");
        if(!empty($package->end_date))
            $date = $package->end_date;
        $package->update([
            'end_date' => $date,
            'state' => 2,
        ]);
        $difference = date_diff(date_create($package->start_date), date_create($package->end_date));
        return view('admin.manage.show',[
            'package'=>$package,
            'difference'=>$difference,
        ]);
    }

    public function clozepackage(Package $package){
        $package->update([
            'state' => 3,
        ]);
        return redirect()->route('manageIndex')->with('success' ,"Cloze room successful!");
    }
}
