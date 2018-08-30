<?php

namespace controllers;

//引入模型类
use models\User;

class UserController
{
    public function hello(){

        $user = new User;
        $name = $user->getName();


        //加载视图
        view('users.hello',[
            'name' => $name
        ]);
    }
    public function world(){
        echo 'world';
    }
}