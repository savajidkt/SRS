<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{
    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param User $user [explicite description]
     *
     * @return User
     * @throws Exception
     */
    public function update(array $data, User $user): User
    {
        $password = $data['password'];
        $data = [
            'first_name'     => $data['first_name'],
            'last_name'     => $data['last_name'],
            'phone_number'       => $data['phone_number'],
            'mobile_number'       => $data['mobile_number'],
            'email'         => $data['email']
        ];
        
        if (Hash::check("param1", "param2")) {
            //add logic here
        }

        if( isset($password) )
        {
            
            $data['password'] = Hash::make($password);
           
        }
        $user->update($data);
        if( $user->update($data) )
        {
            return $user;
        }

        throw new Exception('Profile update failed.');
    }

}

