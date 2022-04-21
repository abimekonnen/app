<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atms>
 */
class AtmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //protected $model = Atms::class;
    public function definition()
    {
        // $table->increments('number');
        // $table->string('name');
        // $table->string('problem');
        // $table->integer('ticket')->unique();
        // $table->enum('status',['not solved','solved'])->default('not solved');
        // $table->timestamps();
        return [
            'name' => $this->faker->name,
            'problem' => $this->faker->problem,
            'ticket' => $this->faker->unique()->integer(),
            'created_at' => now(),
        ];
    }
}
