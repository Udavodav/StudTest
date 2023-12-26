<template id="templ_four">
    <div class="form-group" id="four">
        <div class="justify-content-between">
            <label>Варианты ответа</label>
            <button class="btn btn-warning mx-5" type="button"
                    onclick="onClickAddOrder()">Добавить вариант
            </button>
        </div>
        <div class="form-group mt-2">
            <ul class="todo-list sortable-ul" id="order_list">

                @if(isset($question) && $question->type_id == 4)
                    @foreach($question->answers as $answer)
                        <li>
                            <span class="handle ui-sortable-handle">
                              <i class="fas fa-ellipsis-v"></i>
                              <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <span class="text">Текст варианта ответа</span>
                            <div class="tools">
                                <i class="fas fa-trash" onclick="onClickDeleteOrderItem(this)"></i>
                            </div>
                            <div class="mt-3">
                    <textarea class="form-control" rows="2" maxlength="250" name="answers[][option2]"
                              placeholder="Текст">{{$answer->option2}}</textarea>
                            </div>
                        </li>
                    @endforeach
                @else
                    @for($i = 0; $i < count(old('answers', [0,0,0])); $i++)
                        <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                            <span class="text">Текст варианта ответа</span>
                            <div class="tools">
                                <i class="fas fa-trash" onclick="onClickDeleteOrderItem(this)"></i>
                            </div>
                            <div class="mt-3">
                    <textarea class="form-control" rows="2" maxlength="250" name="answers[][option2]"
                              placeholder="Текст">{{old('answers.'.$i.'.option2','')}}</textarea>
                            </div>
                        </li>
                    @endfor
                @endif


            </ul>
        </div>
        <script>
            $('.sortable-ul').sortable();
        </script>

        @error('answers.*')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <template id="templ_order_item">
            <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                <span class="text">Текст варианта ответа</span>
                <div class="tools">
                    <i class="fas fa-trash" onclick="onClickDeleteOrderItem(this)"></i>
                </div>
                <div class="mt-3">
                    <textarea class="form-control" rows="2" maxlength="250" name="answers[][option2]"
                              placeholder="Текст"></textarea>
                </div>
            </li>
        </template>
    </div>
</template>
