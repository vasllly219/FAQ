<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
    * Связанная с моделью таблица.
    *
    * @var string
    */
    protected $table = 'faq';
    /**
    * Определяет необходимость отметок времени для модели.
    *
    * @var bool
    */
    public $timestamps = true;
}
