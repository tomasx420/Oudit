<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer', 'audit_id', 'question_id'];

    use HasFactory;


    /**
     * Returns the audits it comes from
     * @return void
     */
    public function audit()
    {
        $this->belongsTo(Audit::class);
    }

    /**
     * Returns the question that it answers
     * @return void
     */
    public function question()
    {
        $this->belongsTo(Question::class);
    }

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('audit_id', '=', $this->getAttribute('audit_id'))
            ->where('question_id', '=', $this->getAttribute('question_id'));

        return $query;
    }
}
