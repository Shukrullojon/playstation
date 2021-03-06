<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $rooms = Room::where('user_id',auth()->user()->id)->latest()->get();
        return view('admin.main.index',[
            'rooms' => $rooms,
        ]);
    }

}
