<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::get(uri:'/about', action: function () {
   $name = 'Heba';
   // return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);
    return view('about',data: compact('name'));  
}); 


Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
      '1' => 'Technical',
      '2' => 'Financial',
      '3' => 'Sales',
    ];
    return view('about',data: compact('name', 'departments'));
});