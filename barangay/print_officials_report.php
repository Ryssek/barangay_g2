<?php include "includes/connection.php" ?>
<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
$sql = "SELECT * FROM officials";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Officilas Report</title>
</head>

<body>
  <div class="container-md min-vh-100 d-flex align-items-center flex-column justify-content-center border shadow px-3">
    <div class="mb-2 align-self-start">
      <button class="btn btn-primary" OnClick="CallPrint(this.value)" id="printBtn"> Print </button>
      <a class="btn btn-dark" href="manage_rep.php" role="button">Back</a>
    </div>
    <div class="table-responsive w-100 my-3 " id="main_table">
      <table align="center" cellpadding="10" border="1" class="table table-dark table-striped table-hover table-bordered text-center align-middle">
        <thead class="table-secondary">
          <tr>
            <th colspan="6"> <span class="display-3 text-danger">Officials Report</span> <br> As of <?php echo date("Y-m-d") ?></th>
          </tr>
          <tr>
            <th class="text-nowrap">ID</th>
            <th class="text-nowrap">Name</th>
            <th class="text-nowrap">Birth Date</th>
            <th class="text-nowrap">Position</th>
            <th class="text-nowrap">Term Start</th>
            <th class="text-nowrap">Term End</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">

          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<tr class="h-100">';

              echo "<td> {$row['id']} </td>";
              echo "<td> {$row['name']} </td>";
              echo "<td> {$row['birth_date']} </td>";
              echo "<td> {$row['position']} </td>";
              echo "<td> {$row['term_start']} </td>";
              echo "<td> {$row['term_end']} </td>";

              echo "</tr>";
            }
          }
          ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>

  </div>
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

</body>

</html>