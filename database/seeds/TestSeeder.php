<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestSeeder extends Seeder
{
    /**
     * List of applications to add.
     */


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions = array_merge(
            $this->modulePermissions('Address'),
            $this->modulePermissions('Bank'),
            $this->modulePermissions('City'),
            $this->modulePermissions('Country'),
            $this->modulePermissions('Device'),
            $this->modulePermissions('ExternalServiceCategory'),
            $this->modulePermissions('ExternalService'),
            $this->modulePermissions('ExternalServiceProvider'),
            $this->modulePermissions('ExternalServiceProviderWorkDay'),
            $this->modulePermissions('Feed'),
            $this->modulePermissions('Governorate'),
            $this->modulePermissions('Package'),
            $this->modulePermissions('Place'),
            $this->modulePermissions('PlaceType'),
            $this->modulePermissions('PropertyType'),
            $this->modulePermissions('TransferRequest'),
            $this->modulePermissions('TransferRequestNotes'),
            $this->modulePermissions('UserBankAccount'),
            $this->modulePermissions('UserWallet'),
            $this->modulePermissions('WalletLogs'),
            $this->modulePermissions('Role'),
            $this->modulePermissions("Promocode"),
            $this->modulePermissions("Category"),
            $this->modulePermissions("Reservation"),
            $this->modulePermissions("AdditionalService"),
            $this->modulePermissions("Mobile User"),
            $this->modulePermissions("Dashboard User"),
            $this->modulePermissions("AdditionalService"),
            $this->modulePermissions("Attribute"),
            $this->modulePermissions("Permission"),
            [
                'send Notfication'
            ]
        );


        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(["name" => "admin"]);

        $adminRole->syncPermissions($permissions);

        User::admins()->get()->each->assignRole($adminRole);
    }


    private function modulePermissions($module): array
    {
        return [
            'view ' . $module,
        ];
    }
}
