<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $premissions = [
            'إدارة المستخدمين',
            'المستخدمين',
            'قائمة المستخدمين',
            'صلاحيات المستخدمين',
            'إدارة الكتب و الأقسام',
            'الأقسام',
            'قائمة الأقسام',
            'الكتب',
            'قائمة الكتب',
            'إدارة المستودعات',
            'المستودعات',
            'قائمة المستودعات',
            'مخزون المستودعات',
            'المتجر و المدونات',
            'المدونات',
            'قائمة المدونات',
            'المتجر',
            'قائمة أحدث الكتب',
        ];
        foreach( $premissions as $premission ){
            Permission::create(['name' => $premission ]);
        }
    }
}
