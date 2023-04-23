function createTable() {
    // Retrieve form data
    var busName = document.getElementById("businessName").value;
    var contactName = document.getElementById("businessName").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phoneNum").value;
    var tableRes = document.getElementById("tableNumSelect").value;
    var socialMedia = document.getElementById("socialMediaName").value;
  
    // Create a new data array
    var data = [
      ['Business Name', 'Contact Name', 'Email', 'Phone', 'Table Request', 'Social Medias'],
      [busName, contactName, email, phone, tableRes, socialMedia]
    ];
  
    // Create a table element
    var table = document.createElement("table");
  
    // Loop through the data array and create each row of the table
    for (var i = 0; i < data.length; i++) {
      var row = document.createElement("tr");
      for (var j = 0; j < data[i].length; j++) {
        var cell = document.createElement("td");
        cell.appendChild(document.createTextNode(data[i][j]));
        row.appendChild(cell);
      }
      table.appendChild(row);
    }
  
    // Convert table to CSV format
    var csv = "";
    var rows = table.querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
      var cells = rows[i].querySelectorAll("td");
      var row = [];
      for (var j = 0; j < cells.length; j++) {
        row.push(cells[j].innerText);
      }
      csv += row.join(",") + "\n";
    }
  
    // Encode the CSV data as a URL-encoded query string
    var encodedCSV = encodeURIComponent(csv);
  
    // Redirect the user to the download page with the CSV data as a query parameter
    window.location.href = "userAccount.html?csv=" + encodedCSV;
  }
  
