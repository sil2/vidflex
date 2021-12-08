<?php

namespace Sil2\Vidflex\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Sil2\Vidflex\Models\Order;
use Sil2\Vidflex\Models\OrderItem;
use Sil2\Vidflex\Models\Product;
use Sil2\Vidflex\Resources\OrderResource;

class OrderController extends Controller
{

    /**
     * get order / cart
     * @param  int  $id      order ID or null (if draft)
     * @param  Request $request
     * @return OrderResource
     */
    public function get($id = null, Request $request)
    {
        try {
            if ($id) {
                $order = Order::where('id', $id)->where('is_draft', 0)->first(); // get real order if not draft
            } else {
                $order = Order::where('user_id', $request->user()->id)->where('is_draft', 1)->first(); // get draft order (cart)
            }

            if ($order) {
                OrderResource::withoutWrapping();
                return new OrderResource($order);
            } else {
                return response()->json(['Order not found'], 404);
            }
        } catch (Exception $e) {
            \Log::error("Error: " . $e->getMessage() . " (" . $e->getLine() . ")");
            return response()->json('Internal error', 500);
        }
    }

    /**
     * Add product to order / cart
     * @param  int  $id      product id
     * @param  Request $request
     * @return OrderResource
     */
    public function addProduct($id, Request $request)
    {
        try {
            $data  = $request->all();
            $order = Order::where('user_id', 1)->where('is_draft', 1)->with('items')->first();

            if (!$order) {
                $order           = new Order();
                $order->is_draft = 1;
                $order->user_id  = $request->user()->id;
                $order->save();
            }

            $product = Product::find($id);

            if (!$product) {
                return response()->json(['Product not found'], 404);
            }
            $item = OrderItem::where('order_id', $order->id)->where('product_id', $id)->first() ?? new OrderItem();

            $item->order_id   = $order->id;
            $item->product_id = $id;
            $item->quantity++;
            $item->price = $product->price;
            $item->save();
            OrderResource::withoutWrapping();
            return new OrderResource(Order::find($order->id));
        } catch (Exception $e) {
            \Log::error("Error: " . $e->getMessage() . " (" . $e->getLine() . ")");
            return response()->json('Internal error', 500);
        }
        /**/
    }

    /**
     * Create order from cart (draft order)
     * @param  int  $id      product id
     * @param  Request $request
     * @return OrderResource
     */
    public function createOrder(Request $request)
    {
        try {

            $order = Order::where('user_id', 1)
                ->where('is_draft', 1)
                ->first();

            if ($order) {
                $order->is_draft = 0;
                $order->save();
            } else {
                return response()->json(['Cart is empty'], 404);
            }

            OrderResource::withoutWrapping();
            return new OrderResource(Order::find($order->id));
        } catch (Exception $e) {
            \Log::error("Error: " . $e->getMessage() . " (" . $e->getLine() . ")");
            return response()->json('Internal error', 500);
        }
    }
}
