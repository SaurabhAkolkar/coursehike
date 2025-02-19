<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model
{
	use HasTranslations;
    
    public $translatable = ['question'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
      $attributes = parent::toArray();
      
      foreach ($this->getTranslatableAttributes() as $name) {
          $attributes[$name] = $this->getTranslation($name, app()->getLocale());
      }
      
      return $attributes;
    } 

	protected $table = 'quiz_questions';

    protected $fillable = ['course_id', 'topic_id', 'question', 'a', 'b', 'c', 'd', 'answer'];

    public function quizanswers()
    {
    	return $this->hasMany('App\QuizAnswer','question_id');
    }
    
    /**
     * Get the quiztopic that owns the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiztopic()
    {
        return $this->belongsTo(QuizTopic::class, 'topic_id');
    }

    /**
     * Get the quiztopic that owns the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
