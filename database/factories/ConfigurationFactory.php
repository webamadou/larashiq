<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Configuration>
 */
class ConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bilboard_title' => __('front.home_message'),
            'bilboard_subtitle' => '',
            'home_video_title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa labore nisi veniam.',
            'home_video_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing  elit. Culpa labore nisi veniam voluptas. Ab aliquid amet blanditiis, enim facilis fugit mollitia necessitatibus',
            'home_video_embed_code' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/ZANCjMHkcRQ?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            'facebook_link' => 'https://www.facebook.com/ImmoplusSablux?mibextid=LQQJ4d',
            'twiter_link' => 'https://twitter.com',
            'instagram_link' => 'https://instagram.com/immoplus_its_sablux?igshid=YmMyMTA2M2Y=',
            'linkedin_link' => 'https://www.linkedin.com/showcase/immoplus-it-s-sablux/',
            'official_address' => 'Point E, rue PE-29 Dakar - Senegal ',
            'official_phone_nums' => '+221 33 869 60 30',
            'official_email_address' => 'sablux@sabluxgroup.com',
            'customer_space_url' => 'https://espaceclient.sabluximmoplus.immo/',
        ];
    }
}
