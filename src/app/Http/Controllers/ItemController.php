<?php    //DBを使ってアイテム表示のためのコントローラー

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;



class ItemController extends Controller
{
    public function index(){
        if (auth()->check()) {
        //ログインしていたら自分が出品したものは表示しない。
            $items = Item::where('user_id', '!=', auth()->id())->get();
        } else {
        $items = Item::all();//DB から商品を全部取る。itemクラスを使うよ
        }

        return view('index',compact('items'));//compact:データを使える形に変換してindex.blade.phpへ返す。
    }
    public function show($item_id){
        $item = Item::findOrFail($item_id);//findOrFail():()内を元にDBからデータを取得する。
        return view('show',compact('item'));//compact:データを使える形に変換してshow.blade.phpへ返す。
    }

    public function create(){
        return view('sell');
    }

    public function item_sell(StoreRequest $request){
    $item = Item::create([
        'name'        => $request->name,
        'brand'       => $request->brand,
        'description' => $request->description,
        'price'       => $request->price,
        'status'      => $request->status,
        'category'    => $request->category,
        'img_url'     => '/storage/' . $path,
        'user_id'     => auth()->id(),
        'is_sold'     => false,
        ]);

    return redirect('/');
    }

    public function item_sold_out($item_id){
        $item = Item::findOrFail($item_id);
        $item-> is_sold =true;
        $item->save();/*「売り切れ」の状態をDBに反映する */

        return redirect('/item/' . $item_id);
    }
    
}
