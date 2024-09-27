<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!isset($id)) {
  die("Invalid id!");
}



$sql = "SELECT * FROM clearances WHERE id=$id";

$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Clearance Details</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request</a>
        <a href="manage_clearances.php" class="text-decoration-none text-danger">/ Manage Clearances</a>
        <a href="view_clearances.php" class="text-decoration-none text-danger">/ View Clearances</a>
        <a href="view_clearance_details.php" class="text-decoration-none text-black-50">/ View Clearance Details</a>
      </div>
      <div class="d-flex align-items-center justify-content-between  gap-2 w-100">

        <h1 class="m-0 text-danger">Clearance Details</h1>
        <a href="view_clearances.php" class="btn btn-danger">Go Back</a>
      </div>
      <div class="table-responsive w-100 my-3 " id="main_table">
        <table align="center" cellpadding="10" border="1" class="table table-dark table-striped table-hover table-bordered text-center align-middle">
          <thead class="table-secondary">
            <tr>
              <th colspan="2">Clearance Details: <span class="text-danger"><?php echo strtoupper($row['resident_name']) ?></span></th>
            </tr>
            <tr>
              <th class="text-nowrap">ID</th>
              <th class="text-nowrap"><?php echo $id ?></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            echo '<tr class="h-100">';
            echo "<td class='fw-bold'> Resident Name </td>";
            echo "<td> {$row['resident_name']} </td>";
            echo "</tr>";

            echo "<tr>", "<td class='fw-bold'> Clearance Type </td>", "<td> {$row['clearance_type']} </td>", "</tr>";
            echo "<tr>", "<td class='fw-bold'> Date Issued </td>", "<td> {$row['date_issued']} </td>", "</tr>";
            echo "<tr> <td class='fw-bold'> Valid Until </td> <td> {$row['valid_until']} </td> </tr>";


            ?>
          </tbody>
          <tfoot>

          </tfoot>
        </table>
      </div>
      <div>
        <a name="" id="" class="btn btn-danger" href="update_clearance.php?id=<?php echo $id; ?>" role="button">Edit</a>
        <button class="btn btn-primary" OnClick="CallPrint(this.value)" id="printBtn"> Print </button>
        <a name="" id="" class="btn btn-dark" href="view_clearances.php" role="button">Back</a>
      </div>

    </div>


    <div class="text-center">
      <p>&copy; 2024 Barangay Cannery Information System</p>
    </div>
  </div>
</body>

<script>
  function CallPrint(strid) {
    var prtContent = document.getElementById("main_table");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
  }
</script>

</html>

<style>
  /* Sidebar active */
  .complaints {
    background: black !important;
    color: white !important;
  }
</style>