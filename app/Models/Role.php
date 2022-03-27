<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Role extends Model
{
    use HasFactory;

    public static function setStartRoles(): void
    {
        $table='roles';
        $role['name'] = 'admin';
        $role['guard_name'] = 'guard_name';
        DB::table($table)->insert($role);
        $role['name'] = 'agentM1';
        $role['guard_name'] = 'agentM2';
        DB::table($table)->insert($role);
        $role['name'] = 'agentM3';
        $role['guard_name'] = 'agentM3';
        DB::table($table)->insert($role);
    }

    public static function giveStartPermission(){
        $table='model_has_roles';
        $mhs['role_id'] = 1;
        $mhs['model_type'] = 'App\Models\User';
        $mhs['model_id'] = 1;
        DB::table($table)->insert($mhs);
        $mhs['role_id'] = 2;
        $mhs['model_type'] = 'App\Models\User';
        $mhs['model_id'] = 2;
        DB::table($table)->insert($mhs);
        $mhs['role_id'] = 3;
        $mhs['model_type'] = 'App\Models\User';
        $mhs['model_id'] = 3;
        DB::table($table)->insert($mhs);

    }
}
