<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SellerProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // الأدمن
        User::create([
            'name'     => 'مدير سوق بلدنا',
            'email'    => 'admin@souqbaladna.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        // البائع
        $seller = User::create([
            'name'     => 'أم محمد',
            'email'    => 'seller@souqbaladna.com',
            'password' => Hash::make('seller123'),
            'role'     => 'seller',
        ]);

        SellerProfile::create([
            'user_id'   => $seller->id,
            'shop_name' => 'متجر أم محمد للمشغولات',
            'bio'       => 'أصنع منتجات يدوية أصيلة منذ أكثر من 20 سنة',
            'location'  => 'إربد، الأردن',
            'phone'     => '0791234567',
        ]);

        // المشتري
        User::create([
            'name'     => 'أبو علي',
            'email'    => 'buyer@souqbaladna.com',
            'password' => Hash::make('buyer123'),
            'role'     => 'buyer',
        ]);
    }
}