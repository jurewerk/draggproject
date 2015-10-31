<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ItemController extends BaseController
{

    public function delete(Request $request)
    { //Delete an entry
        $this->validate($request, ['id' => 'required|exists:items']);
        $item = Item::find($request->input('id'));
        $item->delete();

        return "Deleted item: " . $request->input('id');
    }
    public function add(Request $request) //Insert item
    {
       //Get max item order id and add 1
        $order = Item::orderBy('item_order','desc')->pluck('item_order');;
        $order++;
        $item = new Item;
        $item->title = $request->input('entry');;
        $item->item_order = $order;
        $item->save();

        $returnId = $item->id;
        return array("id" => $returnId);
    }
    public function sort(Request $itemsOrder)
    {
        $items = explode(',' , $itemsOrder->input('list_order'));
        $i = 1 ;
        foreach($items as $itemId) {
            $item = Item::find($itemId);
            $item->item_order = $i;
            $item->save();
            $i++;
        }
        return "Order saved";
    }
}
