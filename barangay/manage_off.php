<?php require "includes/connection.php" ?>
<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
$officialsQuery = "SELECT * ,timestampdiff(year, birth_date, curdate()) as currentAge FROM officials";
$officalsRes = $conn->query($officialsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Officials</title>
</head>

<body class="d-flex">

  <?php include "includes/sidebar.php" ?>

  <div class="min-vh-100 p-3" style="width: 83%">
    <!--  -->
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h1 class="text-danger">Manage Officials</h1>
        <p>This is where you can manage officials information</p>
      </div>
      <div>
        <a name="create_official" id="create_official" class="btn btn-success" href="create_official.php" role="button">Add Official</a>
      </div>
    </div>

    <!--  -->
    <div class="row row-cols-3 align-items-center justify-content-center gap-5 px-4 mt-3">

      <?php
      if ($officalsRes->num_rows > 0) {
        while ($row = $officalsRes->fetch_assoc()) {

          echo " <div id='official-card' class='card p-3 shadow mb-5 text-center text-bg-body rounded' style='width: 18rem;'>
                <div class='card-body p-0'>
                <div id='official-cover' class='w-100 border-dark-subtle border border-2 bg-light' style='height: 150px; background: url(uploads/cover.jpg) no-repeat center center/cover; '></div>
                <div class='mx-auto mb-2 rounded-circle overflow-hidden' alt='Official's Image' id='official-img' style=' background: url({$row['photo']}) no-repeat center center/cover;'>
                </div>
                <h5 class='card-title'>Name: {$row['name']}</h5>
              <p class='card-text'>Age: {$row['currentAge']}</p>
              <p class='card-text'>Position: {$row['position']}</p>
               <button id='officialBtn' type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#officialModal{$row['id']}'>
                View Profile
               </button>
            </div>
        </div>";

          // Modal
          echo "<div class='modal fade' id='officialModal{$row['id']}' tabindex='-1' aria-labelledby='officialModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <div class='modal-header'>  
              <h5 class='modal-title' id='officialModalLabel'>Name: <span class='text-danger'>{$row['name']}</span></h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
              <div class='text-center'>
              <img src='{$row['photo']}' class='img-fluid rounded-top' alt='' />
              </div>
              <div class='mt-2'>
                <h5>Birth Date: <span class='fw-normal'>{$row['birth_date']}</span></h5>
                <h5>Position: <span class='fw-normal'>{$row['position']}</span></h5>
                <h5>Term Start: <span class='fw-normal'>{$row['term_start']}</span></h5>
                <h5>Term End: <span class='fw-normal'>{$row['term_end']}</span></h5>
              </div>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
              <a class='btn btn-primary' href='update_official.php?id={$row['id']}' role='button'>Edit</a>
              <a class='btn btn-danger' onclick='return aler()' href='delete_official.php?id={$row['id']}' role='button'>Delete Official</a>
            </div>
          </div>
        </div>
      </div>";
        }
      }
      ?>
    </div>
  </div>

  <script>
    function aler() {
      return confirm("Are you sure you want to delete this official?");
    }
  </script>
</body>

</html>
<style>
  /* Sidebar active */
  .official {
    background: black !important;
    color: white !important;
  }

  .card-text {
    margin-bottom: 5px;
  }


  #official-img {
    width: 150px !important;
    height: 150px !important;
    position: relative;
    border: 5px solid #fff !important;
    margin-top: -80px;
    transition: all 0.7s;
  }

  #official-card {
    transition: all 0.7s;
  }

  #official-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5) !important
  }

  #official-img:hover {
    border: 5px solid var(--bs-primary) !important;
  }

  #official-cover {
    border-top-left-radius: 15px !important;
    border-top-right-radius: 15px !important;
  }

  .card-body h5 {
    font-size: clamp(0.7rem, 1rem, 3rem);
  }

  .brgy-official {
    min-width: 15rem !important;
    transition: all 0.4s;
  }

  .brgy-official:hover {
    border: 3px solid var(--bs-primary) !important
  }

  .brgy-official:hover #officialBtn {
    transition: all 0.4s;
    background: var(--bs-primary) !important;
    border: 1px solid var(--bs-primary) !important
  }
</style>