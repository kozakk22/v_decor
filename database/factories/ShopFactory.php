<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_manager' => '',
            'mail' => '',
            'phone' => '',
            'instagram' => '',
            'delivery_rules' => '',
            'payment_rules' => '',
            'logo' => '',
        ];
    }
}
