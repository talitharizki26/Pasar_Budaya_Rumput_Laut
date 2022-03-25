<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Pembudidaya;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
            if($input['role'] == "Pelanggan"){
                $o = "0";
            $langgan = new Pelanggan;
            $langgan->nama_pelanggan = $input['name'];
            $langgan->save();
            } else{
                $daya = new Pembudidaya;
                $daya->nama_pembudidaya = $input['name'];
                $daya->save();
                $o = "1";
            }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'usertype' => $o,
            'password' => Hash::make($input['password']),
        ]);

       

    }
    
}
