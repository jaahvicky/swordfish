$(document).ready(function () {
    getIssues();
    $("#create-issue").on("submit", function (e) {
      e.preventDefault();
      $(".error-text").hide();
      let title = $("#title");
      let description = $("#description");
      let status = $("#status");
      let type = $("#type");
      let client = $("#client");
      let priority = $("#priority");
      if (isvalidateForm() === false) {
        return;
      }
      var body = {
        title: title.val(),
        body: description.val(),
        labels: [
          {
            name: priority.val(),
          },
          {
            name: client.val(),
          },
          {
            name: type.val(),
          },
        ],
        state: status.val(),
      };
      $("#sub-btn").html("Please wait..").prop("disabled", true);
      $("#closeForm").prop("disabled", true);
      createIssue(body);
      setTimeout(() => {
        getIssues();
        $("#sub-btn").html("Add Issue").prop("disabled", false);
        $("#closeForm").prop("disabled", false);
        $("#ModalIssueForm").modal("hide");
        document.getElementById("create-issue").reset();
        location.reload();
      }, 500);
    });
    $("#closeForm").on("click", function () {
      document.getElementById("create-issue").reset();
    });
  });
  