<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    //
    public function store(Request $request)
    {
        Invitation::create([
            'theme_id' => $request->theme_id,
            'title' => $request->title,
            'male' => $request->male,
            'female' => $request->female,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'url' => $request->url,
            'music' => $request->music,
        ]);
    }
    public function show($url)
    {
        $addition = 'envitation.test/';
        $modifiedUrl = $addition . $url;
        $invitation = Invitation::where('url', $modifiedUrl)->first();
        // dd($invitation);
        if ($invitation){
            if($invitation->theme_id == 1){
                return view('themes.theme1', compact('invitation'));
            }
        } else {
            return abort('404');
        }
    }
}
