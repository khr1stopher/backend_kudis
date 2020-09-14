<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return response($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $fecha_actual = date("d-m-Y H:i:00",time());
        $usuario = $request;
        // localhost:8000/api/User/?firstname=khristopher&lastname=pineda&email=nuevo@mail.com&years_old=18&phone=04261474765&password=12345
        DB::table('users')->insert(
            [
            'firstname' => $usuario['firstname'],
            'lastname' => $usuario['lastname'],
            'email' => $usuario['email'],
            'years_old' => $usuario['years_old'],
            'phone' => $usuario['phone'],
            'password' => $usuario['password']
            ]
        );
        return response($usuario['firstname']." ".$usuario['lastname']." ".$usuario['email']." ".$usuario['years_old'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // if(!gettype($request['pass']) == 'string'){
        //     $password = (string)$request['pass'];
        // }
        $password = $request['pass'];
        $uduario = $request['correo'];;
        // $email = $request['email'];
        $results = DB::select("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?", ["$uduario", "$password"]);

        return response(json_encode($results[0]), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
