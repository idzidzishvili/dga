<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Ipblacklist;

class IpsController extends Controller
{
    public function index()
    {
        $ipAddresses = Ipblacklist::all();
        $pageid = 4;
        $pageTitle = "IP Blacklist";
        return view('ips.index', compact('ipAddresses', 'pageid', 'pageTitle'));
    }

    public function  store(Request $request)
    {

        $data = $this->validate($request, [
            'ipaddress' => 'required'
        ]);
        Ipblacklist::create($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $ipAddr = Ipblacklist::findOrFail($id);
        $ipAddr->delete();
        return redirect()->route('ips');
    }

    
}
