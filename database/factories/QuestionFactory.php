<?php

namespace Database\Factories;

use App\Imports\QuestionImport;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = (new QuestionImport)->toArray(storage_path('app/tablesheets/perguntas_spcapps.xlsx'));

        foreach ($array as $key => $cat) {
            foreach ($cat as $k => $v) {
                $item[] = [
                    'category_id' => $key + 1,
                    'title' => $v['title']
                ];
            }
        }
        foreach ($item as $question) {
            Question::create($question);
        }

        return [
            //
        ];
    }
}
