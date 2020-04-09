<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function randomUser()
    {
        $url = "https://randomuser.me/api";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HEADER, TRUE);
        // curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        $output = curl_exec($ch);
        curl_close($ch);
        $getout = json_decode($output, true);

        $res = array();
        $info = array();
        foreach ($getout as $value) {
            $info[] = $value;
            foreach ($value as $getdata) {
                $res[] = $getdata;
            }
        }
        return view('profil',compact('res'));
    }
}
