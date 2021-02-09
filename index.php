<!DOCTYPE html>
<html lang="en">
<head>
  <title>GITHUB API </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/api.js"> </script>
  <script src="js/app.js"> </script>
</head>
<body>

<div class="container">
  <h2>GITHUB API</h2>
  <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#ModalIssueForm">Create Issue</button>
  <table class="table">
    <thead>
      <tr>
        <th>Number</th>
        <th>Title</th>
        <th>Descrription</th>
        <th>Client</th>
        <th>Priority</th>
        <th>Type</th>
        <th>Assigned to</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="table-body">
      <tr>
        <td  colspan='8' class='text-center'>please wait...</td>

      </tr>
    </tbody>
  </table>
</div>
<!-- issue modal -->
<div id="ModalIssueForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Create an Issue</h2>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="create-issue">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <div>
                            <input type="text" id="title" class="form-control" name="title">
                            <p id="titleError" class="error-text">This field is required!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div>
                            <textarea class="form-control" name="description" id="description"></textarea>
                            <p id="descError" class="error-text">This field is required!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <div>
                            <select type="text" id="status" class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option value="open">Open</option>
                                <option value="closed">Close</option>
                            </select>
                            <p id="statusError" class="error-text">This field is required!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Priority</label>
                        <div>
                            <select type="text" id="priority" class="form-control" name="priority">
                                <option value="">Select Priority</option>
                                <option value="P:Low">Low</option>
                                <option value="P:Medium">Medium</option>
                                <option value="P:High">High</option>
                            </select>
                            <p id="priorityError" class="error-text">This field is required!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <div>
                            <select type="text" id="type" class="form-control" name="type">
                                <option value="">Select Type</option>
                                <option value="T:Bug">Bug</option>
                                <option value="T:Support">Support</option>
                                <option value="T:Enhancement">Enhancement</option>
                            </select>
                            <p id="typeError" class="error-text">This field is required!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Client</label>
                        <div>
                            <select type="text" id="client" class="form-control" name="client">
                                <option value="">Select Status</option>
                                <option value="C:Client ABC">Client ABC</option>
                                <option value="C:Client XYZ">Client XYZ</option>
                                <option value="C:Client MNO">Client MNO</option>
                            </select>
                            <p id="clientError" class="error-text">This field is required!</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" id="sub-btn" class="btn btn-success btn-sm pull-right">
                                Add Issue
                            </button>
                            <button type="button" class="btn btn-danger  btn-sm" id="closeForm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
