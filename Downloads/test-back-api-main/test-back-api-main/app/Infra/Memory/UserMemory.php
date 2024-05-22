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

    public function findUserById(Int $id): array
    {   
        $path = __dir__."/../../../example/UserManagementSpreadsheet.csv";
        $csvData  = array_map('str_getcsv', file($path));

        foreach ($csvData as $user) {
            if($user[0] == $id && $user[5] == 'active'){
                return $user;
            }
        }

        return array();
    }

    public function deleteUserById(Int $id): bool
    {
        $removed = false;

        $path = __dir__."/../../../example/UserManagementSpreadsheet.csv";
        
        $csvData = array_map('str_getcsv', file($path));
        
        $newCsvData = [];

        foreach ($csvData as $key => $row) {
            if ($row[0] == $id) {
                $row[5] = 'deleted';
                $removed = true;
            }

            array_push($newCsvData, $row);
        }

        $file = fopen($path, 'w');
        
        foreach ($newCsvData as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return $removed;
    }
}
