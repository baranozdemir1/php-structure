<?php

namespace App\Controllers;

use App\Middlewares\CheckAuth;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Core\Controller;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\HttpFoundation\Request;

class Home extends Controller
{

    public array $middlewareBefore = [
        CheckAuth::class
    ];

    public function main(Request $request): string
    {
//        if ($request->getMethod() === 'POST'){
//            $this->validator
//                ->rule('required', ['username', 'password', 'password_again'])
//                ->rule('equals', 'password', 'password_again');
//            /*
//             * Form field lang set
//             */
//            $this->validator->labels([
//                'username' => 'Kullanıcı adı',
//                'password' => 'Parola',
//                'password_again' => 'Parola (Tekrar)'
//            ]);
//        }

        if ($request->getMethod() === 'POST'){
            $this->validator->rule('required', ['content']);
            $this->validator->labels([
                'content' => 'Content Add'
            ]);
            if ($this->validator->validate()){
                $data = $this->validator->data();
                $data['user_id'] = 2;
                Post::create($data);
            }
        }

//        $posts = Manager::table('posts')
//            ->select(['posts.*', 'users.name as user_name'])
//            ->join('users', 'users.id', '=', 'user_id')
//            ->orderBy('posts.id', 'asc')
//            ->get();

//        $posts = Posts::all();
//        $user = User::find(2);
//        $posts = $user->posts;
        $posts = Post::all();

        return $this->view('home', compact('posts'));
    }

    public function dates()
    {
        $periods = Carbon::parse('2021-05-20')
            ->daysUntil('2021-05-25', 1);
        foreach ($periods as $period) {
            echo $period->toIso8601String() . '<br>';
        }
    }

}