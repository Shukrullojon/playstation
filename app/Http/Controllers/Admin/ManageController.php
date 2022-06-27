<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        $rooms = Room::where('user_id',auth()->user()->id)->latest()->get();
        return view('admin.manage.index',[
            'rooms'=>$rooms,
        ]);
    }
}
