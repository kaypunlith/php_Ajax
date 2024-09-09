

<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">staff</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formstaffupdate" method="post"  enctype="multipart/form-data">
          <div class="modal-body">
           <div class="row">
               <div class="col-xl-7">
                <input type="text" name="edit_id" class="edit_id">
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
                      <input type="text" name="old_img" class="old_img">
                  </div>
               </div>
               <div class="col-xl-5">
                   <div class="d-flex justify-content-between">
                           <input type="file" name="image" class="form-control">
                           <button onclick="Upload_image('#formstaffupdate')" type="button" class="upload_img btn btn-info rounded-0">Upload</button>
                   </div>
                     <div class="priview-image">
                     
                     </div>
               </div>

           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="Update('#formstaffupdate')" class="btn btn-primary">Update Staff</button>
          </div>
      </form>
    </div>
  </div>
</div>