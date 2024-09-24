<?php
// Database connection details
$servername = 'localhost';  // Server 
$username = 'root';               // MySQL username
$password = '';                   // MySQL password
$dbname = 'note';                 // Database name

// Flags to track the state of operations
$insert = false;
$update = false;
$delete = false;



// Establish a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    echo 'Connection error ->' . mysqli_connect_error(); // Display connection error message
}

// Check if a delete request was made
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    // SQL query to delete the note with the specified sno
    $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = $sno;";
    $result = mysqli_query($conn, $sql);

    // If the delete operation was successful, set the $delete flag to true
    if ($result) {
        $delete = true;
    }
}

// Check if a POST request was made
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the request is for updating an existing note
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];

        // SQL query to update the note with the specified sno
        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno;";
        $result = mysqli_query($conn, $sql);

        // If the update operation was successful, set the $update flag to true
        if ($result) {
            $update = true;
        }
    } else {
        // Insert a new note
        $title = $_POST['title'];
        $description = $_POST['description'];

        // SQL query to insert a new note
        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $sql);

        // If the insert operation was successful, set the $insert flag to true
        if ($result) {
            $insert = true;
        }
    }
}
?>
<!doctype html>
<html lang="en">




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Note Saver</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Edit Note Modal -->
    <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalLabel">Edit Note</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./index.php" method="post">
                        <!-- Hidden input to store the sno of the note being edited -->
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="title">Edit Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                        </div>
                        <div class="mb-3">
                            <label for="title">Edit Description</label>
                            <textarea class="form-control" id="descEdit" rows="3" name="descriptionEdit"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Note Saver</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Display alerts for insert, update, and delete operations -->
    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Your note has been added successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Your note has been updated successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Your note has been deleted successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>

    <!-- Form to add a new note -->
    <div class="container mt-5 my-4 mb-5">
        <form action="./index.php" method="post">
            <div class="mb-3">
                <h2>Add a Note</h2>
                <input type="text" class="form-control" id="Inputtitle" placeholder="Note Title" name="title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="note-desc" rows="3" placeholder="Note Description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>

    <!-- Table displaying the list of notes -->
    <div class="container">
        <table class="table table-striped mt-2 table-hover" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch notes from the database
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $i += 1;
                    echo "
                    <tr>
                    <th scope='row'>" . $i . "</th>
                    <td>" . $row['title'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>
                        <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> 
                        <button class='delete btn btn-sm btn-primary mt-1' data-sno='" . $row['sno'] . "'>Delete</button>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        let table = new DataTable('#myTable');
    </script>

    <!-- JavaScript for handling Edit and Delete actions -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Handle Edit button click
            document.getElementById('myTable').addEventListener('click', (e) => {
                if (e.target.classList.contains('edit')) {
                    const noteRow = e.target.closest('tr'); // Get the closest table row
                    const title = noteRow.getElementsByTagName("td")[0].innerText;
                    const description = noteRow.getElementsByTagName("td")[1].innerText;

                    // Update modal input values
                    document.getElementById('titleEdit').value = title;
                    document.getElementById('descEdit').value = description;
                    document.getElementById('snoEdit').value = e.target.id;

                    // Show the modal
                    const editModal = new bootstrap.Modal(document.getElementById('editModel'));
                    editModal.show();
                }
            });
        });

        // Handle Delete button click
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById('myTable').addEventListener('click', (e) => {
                if (e.target.classList.contains('delete')) {
                    const sno = e.target.getAttribute('data-sno'); // Get the sno from data attribute
                    if (confirm("Are you sure you want to delete this note?")) {
                        window.location = `./index.php?delete=${sno}`; // Redirect to delete the note
                    }
                }
            });
        });
    </script>
</body>

</html>
