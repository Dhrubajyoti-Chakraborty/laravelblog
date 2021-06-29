<div class="modal fade" tabindex="-1" role="dialog" id="addTodoTask"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Todo Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('todo/save')}}" method="post" id="frmAddTask" accept-charset="utf-8">
      {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="txtName">Enter Todo Task</label>
                <input type="text" id="txtName" name="name" class="form-control" placeholder="Enter New Todo Task" required />
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
            
    </form>
   
    </div>
  </div>
</div>