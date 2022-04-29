<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace App\Managers\Book;

use Symfony\Component\HttpFoundation\Request;

/**
 *
 * @author brindachanchad
 */
interface BookManagerInterface {
    //put your code here
    public function all(Request $request);
//    public function get($id);    
//    public function store(\Illuminate\Http\Request $request, \App\Models\User $user):User;
//    public function update(\App\Models\User $user, \Illuminate\Http\Request $request);
//    public function delete($id);
}
