<?php
$serverName = "f1sqlserver.f1db.windows.net";
$connectionOptions = array(
    "Database" => "f1db",
    "Uid" => "ashish",
    "PWD" => "Kstc@1234"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Checks if the connection is established or not
if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}

// SQL query for creating a table
$sql = "CREATE TABLE Persons (
    PersonID INT NOT NULL PRIMARY KEY,
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    Age INT
)";

// Executes the SQL query
if (sqlsrv_query($conn, $sql)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . sqlsrv_errors();
}

// Closes the connection
sqlsrv_close($conn);
?>
