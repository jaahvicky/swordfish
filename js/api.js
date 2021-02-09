const token = "a8bb94f4fc17c3ac8f0ec3a0d30b54b80e30e650"; 
const owner = "jaahvicky"; 
const reponame = "swordfish"; 

const getIssues = () => {
  $.ajax({
    url: `https://api.github.com/repos/${owner}/${reponame}/issues?state=all`,
    headers: {
      Accept: "application/vnd.github.v3+json",
    },
    success: function (returndata) {
      //   console.log("returndata", returndata);
      if (returndata.length === 0) {
        showNorecordsFound();
      } else {
        showRecordsFound(returndata);
      }
    },
  });
};
const createIssue = (body) => {
  $.ajax({
    url: `https://api.github.com/repos/${owner}/${reponame}/issues`,
    headers: {
      Accept: "application/vnd.github.v3+json",
      Authorization: `token ${token}`,
    },
    type: "POST",
    data: JSON.stringify(body),
  })
    .done(function (respo) {
      //   console.log("returndata post", respo);
      getIssues();
    })
    .fail(function (e) {
      console.log("err", e);
    });
};
const showNorecordsFound = () => {
  var tableBody = $("#table-body");
  var tableTr =
    "<tr><td colspan='8' class='text-center'>No records found<td></tr>";
  tableBody.html(tableTr);
};

const showRecordsFound = (records) => {
  var tableBody = $("#table-body");
  tableBody.html("");
  for (const record of records) {
    var labels = record.labels;
    var priority = "";
    var client = "";
    var type = "";
    for (const label of labels) {
      if (label.name.includes("P:")) {
        priority = label.name.replace("P:", "");
      }
      if (label.name.includes("C:")) {
        client = label.name.replace("C:", "");
      }
      if (label.name.includes("T:")) {
        type = label.name.replace("T:", "");
      }
    }
    var tableTr = `<tr>
            <td>${record.number}</td>
            <td width="240">${record.title}</td>
            <td width="240">${record.body}</td>
            <td>${client}</td>
            <td>${priority}</td>
            <td>${type}</td>
            <td>${record.assignee}</td>
            <td>${record.state}</td>
        </tr>`;
    tableBody.append(tableTr);
  }
};
const isvalidateForm = () => {
  let state = true;
  var regex = /^[a-zA-Z\s]+$/;
  let title = $("#title").val();
  if (regex.test(title) === false) {
    $("#titleError").show();
    state = false;
  }
  let status = $("#status").val();
  if (regex.test(status) === false) {
    $("#statusError").show();
    state = false;
  }
  let desc = $("#description").val();
  if (regex.test(desc) === false) {
    $("#descError").show();
    state = false;
  }
  let client = $("#client").val();
  if (client.trim().length < 1) {
    $("#clientError").show();
    state = false;
  }
  let type = $("#type").val();
  if (type.trim().length < 1) {
    $("#typeError").show();
    state = false;
  }
  let priority = $("#priority").val();
  if (priority.trim().length < 1) {
    $("#priorityError").show();
    state = false;
  }
  return state;
};
