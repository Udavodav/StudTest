<div class="form-group mx-3">
    <div class="row justify-content-start d-flex">
        <div class="col-4">
            @foreach($question->answers as $answer)
                <div class="row">
                    <label>{{$answer->option1}}</label>
                </div>
            @endforeach
        </div>
        <div class="col-6">
            <ul class="todo-list sortable-ul" id="order_list">
                @foreach($question->answers as $answer)

                    <li class="bg-info rounded-2">
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                        <span class="text">{{$answer->option2}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

