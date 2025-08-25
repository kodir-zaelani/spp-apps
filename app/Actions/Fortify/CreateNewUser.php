<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create( Request $request): User
    {

        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'username' => ['string', 'min:3', 'unique:users'],
        //     'celuller_no' => ['string', 'min:11', 'unique:users'],
        //     'password' => $this->passwordRules(),
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();


        // $user =  User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'username' => $input['username'],
        //     'celuller_no' => $input['celuller_no'],
        //     'password' => Hash::make($input['password']),
        // ]);

        $this->validate($request, [
            'name'                  => 'required|min:2',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'confirmed|min:8',
            'password_confirmation' => 'required',
            'username'              => ['string', 'min:3','unique:users'],
            'celuller_no'           => ['string', 'min:11', 'max:12','unique:users'],
            'terms'                 => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        // Default data
        $data = [
            'name'        => $request->input('name'),
            'email'       => $request->input('email'),
            'username'    => $request->input('username'),
            'celuller_no' => $request->input('celuller_no'),
            'password'    => Hash::make($request->input('password')),
        ];

        $user = User::create($data);

        //assign role to user
        $user->syncRoles($request->input('roles'));

         return redirect()->to('login')->with(['success' => 'Sign Up ' . $user['name'] . ' was successfully!']);
    }
}