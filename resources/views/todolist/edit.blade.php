<div class="modal" tabindex="-1" role="dialog" id="editTodoTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Todo List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('todolist/update')}}" method="post" id="frmEditTask">
      {{ csrf_field() }}
    
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="id" value="{{$task->id}}">
            <input type="text" name="name" value="{{$task->name}}" id="txtName" class="form-control" placeholder="Enter Todo Task "  required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-task="{{$task->id}}" id="btnDelete" >Delete</button>
        <button type="submit" class="btn btn-primary" >Update</button>
      </div>
      </form>

    </div>
  </div>
</div>