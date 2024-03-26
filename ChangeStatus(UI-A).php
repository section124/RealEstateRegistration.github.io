<?php

session_start();

$userID = "";

if (isset($_SESSION['BuyerUserID'])) {
    $userID = $_SESSION['BuyerUserID'];
} else {
    header("Location: Login.php");
    exit();
}
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: ChangeStatusVerify(UI-A).php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Egyptian Real Estate Registration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style2.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style3.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0">Egyptian Real Estate Registration</h1>
        </a>
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="left-logo">
                    <img src="img/logo 1.png" alt="Logo">
                </div>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index(UI-A).php" class="nav-item nav-link active">Home</a>
                        <a href="about(UI-A).php" class="nav-item nav-link">About</a>
                        <a href="service(UI-A).php" class="nav-item nav-link">Service</a>
                        <a href="contact(UI-A).php" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">&#9776;</button>
                        <div class="dropdown-content">
                            <a href="UnitInspection(UI-A).php">Waiting list</a>
                            <a href="CustomerInquiries(UI-A).php">Customer Inquiries</a>
                            <a href="AccountDetails(UI-A).php?BuyerUserID=<?php echo $userID; ?>">Account Details</a>
                            <a href="index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            </nav>   
        </br></br>
        </br></br>
        <!-- Add the form for user registration -->
        <div class="container-s">
            <h2>States Control</h2>
            <h2>States of Registration Application Submission Documents</h2>
            <form id="status-change-form" method="post" action="ChangeStatusVerify(UI-A).php">
            <input type="hidden" name="applicationID" value="<?php echo isset($_GET['applicationID']) ? htmlspecialchars($_GET['applicationID']) : ''; ?>">
                <div class="mb-3">
                <label for="user-id" class="form-label">ApplicationID:</label>
                <input type="text" class="form-control" id="user-id" name="user-id" value="<?php echo isset($_GET['applicationID']) ? htmlspecialchars($_GET['applicationID']) : ''; ?>" readonly>
                </div>

                <!-- Application ID (to identify the application) -->
                <label for="status-select">Select Status of Document Verification:</label>
                <select id="status-select" name="status-select">
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                </select>
                <!-- Select which status to change -->
                <label for="status-select-review">Select Status Review:</label>
                <select id="status-select-review" name="status-select-review">
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                </select>
                <!-- New Status Value -->
                <label for="new-status">Last Approval:</label>
                <select id="new-status" name="new-status">
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                </select>

                <h2>States of Unit Inspection</h2>
                <!-- Application ID (to identify the application) -->
                <!-- Select Preview Date -->
                <label for="date-select">Select Preview Date:</label>
                <input type="date" id="date-select" name="date-select">
                <!-- Select Status Preview Result -->
                <label for="status-select-preview">Select Status Preview Result:</label>
                <select id="status-select-preview" name="status-select-preview">
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                </select>
                <!-- Select Status Final Approval -->
                <label for="new-status">Select Status Final Approval:</label>
                <select id="new-status" name="new-status">
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                </select>
                <!-- Submit Button -->
                <button class="btn btn-success" type="submit"  onclick="changeStatusManually()">Change Status Manually</button>               
                <div class="mb-3">
                <button type="button" class="btn btn-primary" onclick="window.location.href='UnitInspection(UI-A).php'">Back to Menu</button>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script>
    function changeStatusManually() {

        document.getElementById('status-change-form').submit();
    }
</script>

<script src="js/main.js"></script>
</html>