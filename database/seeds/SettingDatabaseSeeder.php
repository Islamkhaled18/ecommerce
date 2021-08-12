<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','LE','SAR'],
            'default_currency' => 'USD',
            'store_email' => 'admin@ecommerce.test',
            'search_engine' => 'mysql',
            'internal_shippng_cost' => 0,
            'external_shippng_cost' => 0,
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name' => 'Pop Store',
                'free_shipping' => 'Free Shipping',
                'internal_shippng' => 'Internal shippng',
                'external_shippng' => 'External shippng',
            ],
        ]);
    }
}
