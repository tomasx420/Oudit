<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Audit;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $audits = $user->audits()->get();

        return view('audits.index', compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get();
        return view('audits.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $audit = Audit::create($this->validateCreateAuditRequest($request));
        return redirect(route('audits.show', $audit))->with('status', 'A new ongoing audit is successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Audit $audit)
    {
        $questions = $audit->type->questions;

        return view('audits.show', compact(['audit', 'questions']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Audit $audit)
    {
        $questions = $audit->type->questions;

        return view('audits.edit', compact(['audit', 'questions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audit $audit)
    {
        foreach (array_keys($request->all()) as $key) {
            if (is_numeric($key)) {
                $validated = [
                    'question_id' => $key,
                    'audit_id' => $audit->id,
                    'answer' => $request->all()[$key]
                ];

                $previousAnswer = $audit->answers->where('question_id', $key)->first();
                if ($validated['answer'] != 'Select an answer' && !is_null($validated['answer'])) {
                    if (is_null($previousAnswer)) {
                        Answer::create($validated);
                    } else {
                        $previousAnswer->update(['answer' => $validated['answer']]);
                    }
                }
            }
        }
        $audit->refresh();

        if ($audit->answers->count() == $audit->type->questions->count()) {
            $audit->status = 'Done';
            $audit->save();
        }

        return redirect(route('audits.show', $audit));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit)
    {
        //
    }

    /**
     * Validates the create audit request
     * @param Request $request
     * @return array
     */
    private function validateCreateAuditRequest(Request $request)
    {
        $validated = $request->validate(
            [
                'type_id' => 'numeric|required',
                'name' => 'required'
            ]
        );

        $validated['user_id'] = Auth::user()->id;

        return $validated;
    }
}
