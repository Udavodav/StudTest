<div class="form-group mx-3">
    <div class="row justify-content-start d-flex">
        <div class="col-4">
            @foreach($question->answers as $answer)
                <div class="row">
                    <label class="text-wrap">{{$answer->option1}}</label>
                    <input class="d-none" name="questions[{{$question->id}}][answers][{{$loop->index}}][result_answer_order_option1_id]"
                           value="{{$answer->id}}">
                </div>
            @endforeach
        </div>
        <div class="col-6">
            <ul class="todo-list sortable-ul" id="order_list">
                @foreach($question->answers->shuffle() as $answer)

                    <li class="bg-info rounded-2">
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                        <span class="text text-wrap">{{$answer->option2}}</span>
                        <input class="d-none" name="questions[{{$question->id}}][order][][text]"
                               value="{{$answer->option2}}">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

