<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    public function index ()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            "name" => $data["name"],
            "last_name" => $data["last_name"],
            "email" => $data["email"],
            "password" => $data["password"]
        ]);

        $noti = new WelcomeNotification($user->name);
        Notification::send($user, $noti);
        return redirect()->route("views.dashboard");
    }
}
