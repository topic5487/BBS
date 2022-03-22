<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $avatars = [
        'https://image.panewslab.com/upload/image/20210930/S4d37116ba4bb4d3985a4c7f369a0aced.JPG',
        'https://api.harpersbazaar.com.hk/var/site/storage/images/_aliases/img_640_w/4/0/1/5/3005104-1-chi-HK/3.jpg',
        'https://dailyclipper.net/wp-content/uploads/2021/09/20210928_6152fd8018e29.jpg',
        'https://www.pimiss.com/wp-content/uploads/2021/10/2-44.jpg',
        'https://media.karousell.com/media/photos/products/2022/2/15/nft_pixel_art_avatar_design_nf_1644908114_399a447d_progressive.jpg',
        'https://media.karousell.com/media/photos/products/2022/1/4/__nft_1641279972_0210040d_progressive.jpg',
        ];

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'introduction' => $this->faker->sentence(),
            'avatar' => $this->faker->randomElement($avatars),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
