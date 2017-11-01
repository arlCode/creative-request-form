<div class="row">
    <div id="post-name" class="modal modal-fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <h4 class="modal-title">Headline</h4>
                </div>
                <div class="modal-body">
                    <form action="../model/variables.php" method="post">
                        <div class="form-group">
                            <label for="assigned-name">Name: </label>
                            <input type="text" class="form-control" name="assigned-name" id="assigned-name" placeholder="Bill Gates" required>
                        </div>
                        <input type="hidden" class="creative-id" name="hidden"/>
                        <button id="submit-assignment" type="submit" name="submit_name" class="btn btn-primary">Submit</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>


<!--Summary: Modal that controls what tasks are assigned to whom. -->