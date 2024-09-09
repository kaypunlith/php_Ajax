

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">staff</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formstaff" method="post"  enctype="multipart/form-data">
          <div class="modal-body">
           <div class="row">
               <div class="col-xl-7">
                  <div class="form-group">
                      <label for="" class="form-label">staff Full name</label>
                      <input type="text" name="fname" class="fname form-control">
                  </div>
                  <div class="form-group">
                      <label for="" class="form-label">staff Gender</label>
                      <input type="text" name="gender" class="gender form-control">
                  </div>
                  <div class="form-group">
                      <label for="" class="form-label">staff Position</label>
                      <input type="text" name="position" class="position form-control">
                  </div>
                  <div class="form-group">
                      <label for="" class="form-label">staff Salary</label>
                      <input type="text" name="salary" class="salary form-control">
                  </div>
               </div>
               <div class="col-xl-5">
                   <div class="d-flex justify-content-between">
                           <input type="file" name="image" class="form-control">
                           <button onclick="Upload_image('#formstaff')" type="button" class="upload_img btn btn-info rounded-0">Upload</button>
                   </div>
                     <div class="priview-image">
                     
                     </div>
               </div>

           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="InsertImage('#formstaff')" class="btn btn-primary">Save Staff</button>
          </div>
      </form>
    </div>
  </div>
</div>