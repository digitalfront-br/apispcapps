<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends CrudController
{
    public function __construct(Question $question)
    {
        $this->entity = $question;
        $this->resourceCollection = QuestionResource::collection($this->entity->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entidade = new QuestionResource(Question::findOrFail($id));
        return $entidade;
    }
}
