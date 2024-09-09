   <?php
     include("./components/header.php");
     include("./components/sidebar.php");
     include("./modals/create.php");
     include("./modals/edit.php");
?>  



  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Menagements Staff</h1>
      <button type="button" class="btn btn-primary rounded-0 btn_create" data-bs-toggle="modal" data-bs-target="#create">Create Staff</button>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <table class="table table-striped table-hover shadow align-middle">
           <thead>
           <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Position</th>
                <th>salary</th>
                <th>Action</th>
            </tr>
           </thead>
            <tbody id="allstaff">
                <!-- <tr>
                    <td>1</td>
                    <td>123.png</td>
                    <td>kay punlith</td>
                    <td>Male</td>
                    <td>Web developer</td>
                    <th>600 $</th>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
        <div id="show_page"></div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php include("./components/footer.php")?>