<?php

namespace App\Providers\Custom;

use Illuminate\Support\ServiceProvider;

// using this to override Illuminate\Auth\EloquentUserProvider

// what to override
use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Support\Str;

// class AccountUserProvider extends ServiceProvider
class AccountUserProvider extends UserProvider
{
    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
           (count($credentials) === 1 &&
            Str::contains($this->firstCredentialKey($credentials), 'c_headera'))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'c_headera')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }
        return $query->first();
    }



    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        // $plain = $credentials['password'];
        $plain = $credentials['c_headera'];
        if ($plain == $user->getAuthPassword()) {
            return true;
        } else {
            return false;
        }
        // return $this->hasher->check($plain, $user->getAuthPassword());
    }

}
