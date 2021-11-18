<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Requestmodel;
use App\Models\Ipblacklist;
use App\Models\Product;

class ApiController extends Controller
{
    //
    public function getToken(){
        $token = bin2hex(random_bytes(20));
        $data = [
            'token' => $token,
            'status' => $token?'success':'fail'
        ];
        $tkn = new Token();
        $tkn->token = $token;
        $tkn->save();
        return response()->json($data);
    }


    public function getProduct(Request $request, $id){
        $req = json_decode($request->getContent());
        // if either token or product id is not present return fail
        if(!isset($req->token))
        return response()->json(['status' => 'fail', 'message' => 'ProductId and/or token were not provided']);
        // get token and productID
        $token = $req->token;
        $productId = $id;//$req->productId;        
        // if either token or product id is not set return fail
        if(!$token || !$productId)
        return response()->json(['status' => 'fail', 'message' => 'ProductId and/or token were not provided']);
        // get IP address
        $ip = $this->getUserIP();
        // if IP address is blackisted return fail
        if(Ipblacklist::where('ipaddress', $ip)->first())
            return response()->json(['status' => 'fail', 'message' => 'Your IP address is blacklisted']);
        // get token from tokens table
        $tokenData = Token::where('token', $token)->first();
        // if there is no token in table invalidate it
        if(!$tokenData)
            return response()->json(['status' => 'fail', 'message' => 'Unknown token']);
        // count token by id in requests table
        if(Requestmodel::where('token_id', $tokenData->id)->get()->count())
            return response()->json(['status' => 'fail', 'message' => 'Token has been used']);
        // get product by product id
        $product = Product::where('id', $productId)->first();
        // if there is no product with such id return fail
        if(!$product)
            return response()->json(['status' => 'fail', 'message' => 'Product with such ID was not found']);
        // add new request to requests table
        $request = new Requestmodel();
        $request->product_id = $productId;
        $request->token_id = $tokenData->id;
        $request->ipaddress = $ip;
        $request->save();
  
        return response()->json(['status' => 'success', 'product' => $product]);

    }


    private function getUserIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
