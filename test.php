<!DOCTYPE html>
<html>
<head>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simulated data from the database
            var data = [
                { name: "John Doe", email: "john@example.com", id: 1 },
                { name: "Jane Smith", email: "jane@example.com", id: 2 },
                { name: "David Johnson", email: "david@example.com", id: 3 },
                // Add more data as needed
            ];

            var tableBody = document.getElementById("table-body");

            // Function to create a row for each data item
            function createTableRow(item) {
                var row = document.createElement("tr");

                var nameCell = document.createElement("td");
                nameCell.textContent = item.name;
                row.appendChild(nameCell);

                var emailCell = document.createElement("td");
                emailCell.textContent = item.email;
                row.appendChild(emailCell);

                var actionCell = document.createElement("td");
                var updateButton = document.createElement("button");
                updateButton.classList.add("update-btn");
                updateButton.textContent = "Update";
                updateButton.addEventListener("click", function() {
                    // Update logic goes here
                    console.log("Update button clicked for ID:", item.id);
                });
                actionCell.appendChild(updateButton);

                var deleteButton = document.createElement("button");
                deleteButton.classList.add("delete-btn");
                deleteButton.textContent = "Delete";
                deleteButton.addEventListener("click", function() {
                    // Delete logic goes here
                    console.log("Delete button clicked for ID:", item.id);
                });
                actionCell.appendChild(deleteButton);

                row.appendChild(actionCell);

                return row;
            }

            // Populate the table with data
            for (var i = 0; i < data.length; i++) {
                tableBody.appendChild(createTableRow(data[i]));
            }
        });
    </script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        button {
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-btn {
            background-color: #4CAF50;
            color: white;
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody id="table-body">
    <!-- Table rows will be dynamically populated here -->
    </tbody>
</table>

<script src="script.js"></script>
</body>
</html>