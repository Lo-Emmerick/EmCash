<?php

namespace App\Infra\Memory;

use App\Domain\User\User;
use App\Domain\User\UserPersistenceInterface;

class UserMemory implements UserPersistenceInterface
{
    public function create(User $user): void
    {

    }

    public function isCpfAlreadyCreated(User $user): bool
    {
        return false;
    }

    public function isEmailAlreadyCreated(User $user): bool
    {
        return false;
    }

    public function findAll(User $user): array
    {
        $path = __dir__."/../../../example/UserManagementSpreadsheet.csv";
        $csvData  = array_map('str_getcsv', file($path));

        return $csvData ;
    }

    public function findUserById(Int $id): array
    {   
           try {
        $path = __dir__."/../../../example/UserManagementSpreadsheet.csv";
        $csvData  = array_map('str_getcsv', file($path));
    
        foreach ($csvData as $user) {
            if($user[0] == $id){
                return $user;
            }
        }
        die;
        return null;
    } catch (\Exception $e) {
        // Em caso de erro, retorna null ou lança uma exceção, dependendo dos requisitos do sistema
        return null;
    }
    }


    public function isExistentId(User $user): bool
    {
        return true;
    }

    public function editName(User $user): void
    {

    }

    public function editCpf(User $user): void
    {

    }

    public function editEmail(User $user): void
    {

    }
}
