<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index(){
        $shortLinks = ShortLink::latest()->get(); 
        return view('shortenLink', compact('shortLinks'));
    }
    
    public function store(Request $request){
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(6);


        ShortLink::create($input);

        return redirect('generate-shorten-link')->withSuccess('Shorten Link Generated Successfully ');
    }

    
    public function shortenLink($code){
        
        $find = ShortLink::where('code', $code)->first();
        return redirect($find->link);
    }
}