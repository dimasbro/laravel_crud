<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert-anggota', function () {
    $user = new App\User;
    $user->name = "Femi";
    $user->password = "45678";
    $user->email = "femi2@gmail.com";
    $user->save();

    $anggota = new App\Anggota;
    $anggota->nama="Femi";
    $anggota->alamat="Semarang";

    $user->anggota()->save($anggota);
});


Route::get('/select-anggota', function () {
    $data = App\User::with('anggota')->get();
    echo "<table border='2'>";
    foreach($data as $key => $value){
    	echo "<tr>
    			<td>".$value->name."</td>
    			<td>".$value->email."</td>
    			<td>".$value->password."</td>
    			<td>".$value->anggota->nama."</td>
    			<td>".$value->anggota->alamat."</td>
    	</tr>";
    }
});

Route::get('/update-anggota', function () {
    $user = App\User::find(3);
    $user->name="dimas bro0";
    $user->save();
    $user->anggota->nama="dimas bro oo";
    $user->anggota->save();
});

Route::get('/delete-anggota', function () {
    $user = App\User::find(8);
    $user->anggota->delete();
    $user->delete();
});