<div class="modal" tabindex="-1" role="dialog" id="addTodoTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('todoworklist.save')}}" method="post" id="frmAddTask">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" value="">
            <input type="text" class="form-control" name="name" id="txtName" >
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