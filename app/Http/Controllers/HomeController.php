<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

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
        try {
            $url = "https://randomuser.me/api";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_HEADER, TRUE);
            // curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
            $output = curl_exec($ch);
            curl_close($ch);

            if(!$output){
                throw new Exception("Error Processing Request", 1);
            }

            $getout = json_decode($output, true);

            $res = array();
            $info = array();
            foreach ($getout as $value) {
                $info[] = $value;
                foreach ($value as $getdata) {
                    $res[] = $getdata;
                }
            }
            $exp = explode('T', $res[0]['dob']['date']);
            $exp2 = explode('-', $exp[0]);
            $dob = $exp2[2].'/'.$exp2[1].'/'.$exp2[0];

            $data = (object) array(
                'picture' => $res[0]['picture']['large'],
                'titlename' => $res[0]['name']['title'],
                'firstname' => $res[0]['name']['first'],
                'lastname' => $res[0]['name']['last'],
                'email' => $res[0]['email'],
                'dob' => $dob,
                'phone' => $res[0]['phone'],
                'cell' => $res[0]['cell'],
                'stnumber' => $res[0]['location']['street']['number'],
                'stname' => $res[0]['location']['street']['name'],
                'stcity' => $res[0]['location']['city'],
                'ststate' => $res[0]['location']['state'],
                'stcountry' => $res[0]['location']['country'],
                'stpostcode' => $res[0]['location']['postcode'],
                'status' => 1
            );   
        } catch (Exception $e) {
            $data = (object) array(
                'picture' => asset('img/default-user-image.png'),
                'titlename' => '-',
                'firstname' => '',
                'lastname' => '',
                'email' => '-',
                'dob' => 'dd/mm/yyyy',
                'phone' => '-',
                'cell' => '-',
                'stnumber' => '-',
                'stname' => '',
                'stcity' => '',
                'ststate' => '',
                'stcountry' => '',
                'stpostcode' => '',
                'status' => 0
            );
        }

        return view('profil',compact('data'));
    }
}
