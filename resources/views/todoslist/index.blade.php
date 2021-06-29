<div class="panel panel-primary ">

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">
                All Todo Task List
                <span  class="pull-right">
                    <button class="btn btn-success btn-xs" id="btnAddTask">
                      +
                    </button>
                </span>
            </h3>
        </div>


        <div class="panel-body">
             <ul class="list-group">
                 @if($tasks->all())
                 @foreach($tasks as $task)
                 <li class="list-group-item">
                     {{$task->id}} - {{$task->name}}
                     <span class="pull-right">
                         <button class="btn btn-success btn-xs btnManage" data-task="{{$task->id}}">
                             <i class="glyphicon glyphicon-cog"></i>
                         </button>
                     </span>
                 </li>
                 @endforeach
                 @else
                 <li class="list-group-item">
                    No Record found!
                </li>
                @endif
             </ul>
        </div>

        <div class="panel-footer">
            Panel Footer
        </div>
    </div>

</div>