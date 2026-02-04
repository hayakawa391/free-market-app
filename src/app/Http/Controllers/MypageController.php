<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mypage', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'postcode' => 'nullable|max:20',
            'address' => 'nullable|max:255',
            'building' => 'nullable|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        return redirect('/')->with('message', '更新しました');
    }
}
