<div class="form-group mx-3">
    <ul class="todo-list" id="order_list">
        @foreach($resQuestion->answers as $answer)
            <li class="bg-info rounded-2 w-75">
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <span class="text text-wrap">{{$answer->answerOption2->option2}}</span>
            </li>
        @endforeach
    </ul>
</div>

