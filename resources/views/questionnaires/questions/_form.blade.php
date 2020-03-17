<div class="form-group">
    <label for="title">Question</label>
    <input type="text" name="question[question]" id="question" class="form-control @error('question.question') is-invalid @enderror" 
        autocomplete="off" 
        aria-describedby="questionHelp" 
        placeholder="Enter Question"
        value="{{ old('question.question') ?? $question->question}}">
    <small id="questionHelp" class="form-text text-muted">Enter your question</small>
    @error('question.question')
        <span class="invalid-feedback" role="alert" style="display: block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <fieldset >
        <legend>Choices</legend>
        <small id="choicesHelp" class="form-text text-muted">Give Choices that give you the most insight into your question.</small>
        <div>
            
            @for ($index = 0; $index < config('questions')['nb_questions']; $index++)
            <div class="form-group">
                <label for="choice{{$index+1}}">Choice {{$index+1}}</label> 
                <input type="text" name="answers[][answer]" id="answer{{$index+1}}" class="form-control @error('answers.' . $index . '.answer') is-invalid @enderror" 
                        autocomplete="off" 
                        aria-describedby="choicesHelp" 
                        placeholder="Enter choice {{$index+1}}"
                        value="{{ old("answers.$index.answer") ? isset($answers[$index]) ? $answers[$index]['answer'] : old("answers.$index.answer") : old("answers.$index.answer") }}"
                    >
                    @error("answers." . $index . '.answer')
                        <span class="invalid-feedback" role="alert" style="display: block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            @endfor
        </div>
    </fieldset>
</div>