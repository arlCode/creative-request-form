<div class="row">
    <div id="post-data" class="modal modal-fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <h4 class="modal-title">Creative Request</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="../model/variables.php" method="post" enctype="multipart/form-data">
                            <div class="row top-row">
                                <div class="form-group pull-left">
                                    Priority Selection: 
                                    <select class="selectpicker dropdown" id="priority" name="priority" required>
                                        <option value="" selected="">Select Priority</option>
                                        <option value="low" style="background: #2eb82e; color: #fff;">Low</option>
                                        <option value="mid" style="background: #ffaa00; color: #fff;">Mid</option>
                                        <option value="high" style="background: #b30000; color: #fff;">High</option>
                                    </select>
                                </div>
                                <div class="form-group pull-right" required>
                                    Image Type: 
                                    <select class="selectpicker dropdown" id="imageType" name="imageType" required>
                                        <option value="" selected="">Select Type</option>
                                        <option value="Static">Static</option>
                                        <option value="Gif">GIF</option>
                                        <option value="Video">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="yourName">Your Name</label>
                                    <input type="name" class="form-control" name="name" id="yourName" aria-describedby="yourName" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="productName">Product/Offer</label>
                                    <input type="text" class="form-control" name ="productName" id="productName" placeholder="Botfather For the Future Pro" required>
                                </div>
                                <div class="form-group">
                                    <label for="imgDimensions">Dimensions</label>
                                    <input type="text" class="form-control" name="dimensions" id="imgDimensions" placeholder="300 x 250" required>
                                </div>
                                <div class="form-group">
                                    <label for="headlines">Headlines</label>
                                    <div class="input-group">
                                        <input type="text" name="headlines[]" class="form-control" id="headlines" placeholder="Headline Example" required>
                                        <span class="input-group-btn">
                                            <button id="addHeadline" class="btn btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="targetAudience">Target Audience</label>
                                    <input type="text" name="targetAudience" class="form-control" id="targetAudience" placeholder="F45+" required>
                                </div>
                                <div class="form-group">
                                    <label for="landerUrl">Lander URL</label>
                                    <input type="text" class="form-control" name="landerUrls" id="landerUrl" placeholder="http://example.com" required pattern="https?://.+">
                                </div>
                                <div class="form-group">
                                    <label for="placement">Placement</label>
                                    <input type="text" class="form-control" name="placement" placeholder="Gemini" id="placement" required>
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" placeholder="Use gradients, please don't use text." rows="5" id="notes" name="notes"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="assets">Assets</label>
                                    <input type="file" class="form-control" name="filesToUpload[]" id="filesToUpload" multiple required>
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline"><input type="radio" name="text_on_image" value="yes-text">Text On Image</label>
                                    <label class="radio-inline"><input type="radio" name="text_on_image" value="no-text">No Text On Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" onclick="notify(document.getElementById('yourName').value); return validateDropDown();" name="submit_request" class="pull-right btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

