<?php

namespace App\Http\Controllers\Auth;

<<<<<<< HEAD
use App\CustomUser;
use App\Student;
use App\Teacher;
=======
use App\User;
>>>>>>> e449ebf53097cf9ae969ccee9a4aebd9bd6cb5b4
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
<<<<<<< HEAD
            'username' => ['required', 'string', 'max:255', 'unique:customusers'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
            // 'role' => ['required', 'integer']
=======
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
>>>>>>> e449ebf53097cf9ae969ccee9a4aebd9bd6cb5b4
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
<<<<<<< HEAD
     * @return \App\CustomUser and \App\...
     */
    protected function create(array $data)
    {
        CustomUser::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
            // 'role' => $data['role']
=======
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
>>>>>>> e449ebf53097cf9ae969ccee9a4aebd9bd6cb5b4
        ]);
    }
}
