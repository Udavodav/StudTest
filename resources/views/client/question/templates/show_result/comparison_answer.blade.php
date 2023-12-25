<div class="form-group mx-3">
    <div class="row justify-content-start d-flex">
        <div class="col-4">
            @foreach($resQuestion->answers as $answer)
                <div class="row">
                    <label class="text-wrap">{{$answer->answerOption1->option1}}</label>
                </div>
            @endforeach
        </div>
        <div class="col-6">
            <ul class="todo-list" id="order_list">
                @foreach($resQuestion->answers as $answer)

                    <li class="bg-info rounded-2">
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                        <span class="text text-wrap">{{$answer->answerOption2->option2}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

