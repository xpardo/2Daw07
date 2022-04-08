<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'desc' => $this->faker->desc(),
            'author_id' => $this->faker->author_id(),
            'assigned_id' => $this->faker->assigned_id(),
            'status_id' => $this->faker->status_id(),
            
        ];
    }
}
