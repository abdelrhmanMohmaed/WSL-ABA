<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Common_Question extends Model
{
    use HasFactory;

    protected $table = 'common_questions';

    protected $appends = [
        'question',
        'answer',
    ];


    public function getQuestionAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->question_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->question_en;
        }else
        {
            return $this->question_ar;
        }
    }

    public function getAnswerAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->answer_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->answer_en;
        }else
        {
            return $this->answer_ar;
        }
    }

}
