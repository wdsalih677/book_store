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
            'لوحة التحكم',

            'إدارة المستخدمين',
            'المستخدمين',

            'قائمة المستخدمين',
            'إضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'صلاحيات المستخدمين',
            'إضافة صلاحيه',
            'تعديل صلاحيه',
            'حذف صلاحيه',

            'إدارة الكتب و الأقسام', 
            'الأقسام',

            'قائمة الأقسام',
            'إضافة قسم',
            'تعديل قسم',
            'حذف قسم',

            'الكتب',
            'قائمة الكتب',
            'إضافة كتاب',
            'تعديل كتاب',
            'حذف كتاب',

            'إدارة المستودعات',
            'المستودعات',

            'قائمة المستودعات',
            'إضافة مستودع',
            'تعديل مستودع',
            'حذف مستودع',

            'مخزون المستودعات',
            'إضافة مخزون',
            'تعديل مخزون',
            'حذف مخزون',

            'المتجر و المدونات',
            'المدونات',

            'قائمة المدونات',
            'إضافة مدونه',
            'تعديل مدونه',
            'حذف مدونه',

            'المتجر',
            'قائمة أحدث الكتب',
            'إضافة أحدث كتاب',
            'تعديل أحدث كتاب',
            'حذف أحدث كتاب',
        ];
        foreach( $premissions as $premission ){
            Permission::create(['name' => $premission ]);
        }
    }
}
