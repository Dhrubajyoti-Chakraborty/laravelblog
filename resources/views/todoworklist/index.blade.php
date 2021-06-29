<div class="panel panel-primary">

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">
                All Todo Task List
                <span class="pull-right">
                    <i class="btn btn-success btn-xs" id="btnAddTask">+</i>
                </span>
            </h3>
        </div>


        <div class="panel-body">
            <div class="form-group">
                @if($tasks->all())
                @foreach($tasks as $task)
                <div class="form-group-item">
                    {{$task->id}} - {{$task->name}}
                    <span class="pull-right">
                        <button class="btn btn-success btn-xs btnManage" data-task="{{$task->id}}">
                            <i class="glyphicon glyphicon-cog"></i>
                        </button>
                    </span>
                </div>
                @endforeach
                @else
                <div class="form-group-item">
                    No Record Found!
                </div> 
                @endif
            </div>
        </div>

        <div class="panel-footer">
            Panel Footer
        </div>
    </div>

</div>