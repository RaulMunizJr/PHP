<?php

use Base\User as BaseUser;

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class User extends BaseUser
{
    
    function login($pass)
    {   
       return password_verify($pass,BaseUser::getPasswordHash());
    }

    function setPassword($unhashed_password)
    {
        // hash password , then pass it to setPasswordHash (base function)
        BaseUser::setPasswordHash(password_hash($unhashed_password,PASSWORD_DEFAULT));
    }
}
