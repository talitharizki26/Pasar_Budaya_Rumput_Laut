<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'no_ktp' => ['required', 'integer'],
            'no_hp' => ['required', 'integer'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'foto' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        if ($input['role'] == "Pelanggan") {
            $o = "0";
        } else {
            $o = "1";
        }


        return User::create([
            'no_ktp' => $input['no_ktp'],
            'nama' => $input['nama'],
            'email' => $input['email'],
            'role' => $input['role'],
            'usertype' => $o,
            'password' => Hash::make($input['password']),
            'jenkel' => $input['jenkel'],
            'no_hp' => $input['no_hp'],
            'tgl_lahir' => $input['tgl_lahir'],
            'alamat' => $input['alamat'],
            'foto' => $input['foto'],
        ]);
    }
}
