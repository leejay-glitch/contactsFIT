<?php

namespace App\Http\Controllers;

class HomeController extends Controller
    {   public function index()
        {
            $user = auth()->user();

            if ($user) {
                $name = $user->name;
            } else {
                $name = 'Guest'; 
            }
        
            return view('home')->with('name',$name);
        }
    }

   
 