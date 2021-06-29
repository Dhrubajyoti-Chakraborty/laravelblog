<div class="modal fade" tabindex="-1" role="dialog" id="editTodoTask"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Todo Record - {{$task->id}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('todo/update')}}" method="post" id="frmEditTask" accept-charset="utf-8">
      {{ csrf_field() }}
      <!-- <input type="hidden" name="id" value="{{$task->id}}"> -->
        <div class="modal-body">
            <div class="form-group">
                <label for="txtName">Update Todo Task</label>
                <input type="hidden" name="id" value="{{$task->id}}">
                <input type="text" id="txtName" name="name" value="{{$task->name}}" class="form-control" placeholder="Enter New Todo Task" required />
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-task="{{$task->id}}" id="btnDelete" data-dismiss="modal" aria-label="Close">Delete</button>
            <button type="submit" class="btn btn-primary" >Save changes</button>
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div> 
            
    </form>
   
    </div>
  </div>
</div>