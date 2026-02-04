<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{//ユーザーの個人情報についてのコントローラー
    // マイページ表示
    public function edit()
    {
        $user = Auth::user();
        return view('mypage', compact('user'));
    }

    // 更新処理
    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'postcode' => 'nullable|max:20',
            'address'  => 'nullable|max:255',
            'building' => 'nullable|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'name'     => $request->name,
            'postcode' => $request->postcode,
            'address'  => $request->address,
            'building' => $request->building,
        ]);

        return redirect('/')->with('message', '更新しました');
    }
}
