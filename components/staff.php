<script>

    //base Url
    var urlRoute="http://localhost:8080/Learn_php/PHP_AJAX2/Ajax/staff.php?type=";
    //upload image 
    $(document).on("click",".btn_create", function () {
        $("#formstaff").trigger('reset');
        $(".priview-image").html("");
    });
    const Upload_image=(form)=>{
        var alldata=new FormData($(form)[0]);
         $.ajax({
             type: "POST",
             url: urlRoute+"Upload",
             data:alldata,
             dataType:"json",
             contentType: false,
             processData: false,
            success: function (response) {
                var img=`
                    <input type="text" name="image_name" value='${response.data}'>
                    <img src="./public/image/${response.data}" alt="">
                     <button onclick="Cencel_image('${response.data}')" type="button" class="btn btn-danger" id="btn_cen">Cencel</button>
                `
                $(".priview-image").html(img);
            }
         });
    }
    //cencel image
    const Cencel_image=(image)=>{
      $.ajax({
        type: "post",
        url: urlRoute+"cencel",
        data: {image_name:image},
        dataType: "json",
        success: function (response) {
            
        }
      });
    }
    //insert data staff
    const InsertImage=(form)=>{
        var alldata=$(form).serializeArray();
        $.ajax({
            type:"POST",
            url: urlRoute+"insert",
            data:alldata,
            dataType: "json",
            success: function (response) {
                if(response.status==200){
                    $(form).trigger("reset");
                    // $("#create").modal('hide');
                    $(".priview-image").html("");
                    Selectalldata();
                }
            }
        });
    }
    //select all data
    const Selectalldata=(search='',page=1)=>{
     $.ajax({
        type:"POST",
        url:urlRoute+"select",
        data:{
            search_val:search,
            page:page

        },
        dataType: "json",
        success: function (response) {
            var data=response.data;
            var tr;
            $.each(data, function (index, value) { 
                tr+=`
                    <tr>
                            <td>${value.id}</td>
                            <td><img src="./public/iamge_use/${value.image}" width="60px" height="60px" style="object-fit:cover" alt=""></td>
                            <td>${value.fname}</td>
                            <td>${value.gender}</td>
                            <td>${value.position}</td>
                            <th>${value.salary} $</th>
                            <td>
                                <button onclick='edit(${value.id})'  data-bs-toggle="modal" data-bs-target="#update" class="btn btn-warning">Edit</button>
                                <button type="button" onclick="Delete_staff('${value.id}','${value.image}')" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
            `
            });
            var pagination=`
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>`;
                     for(var i=1;i<=response.totalpage;i++){
                      pagination+=`<li onclick="changePage(${i})" class="page-item ${(response.currentPage==i) ? "active":""}"><a class="page-link" href="#">${i}</a></li>`
                     }

                    pagination+=`<li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
                </nav>    
            `;
            $("#show_page").html(pagination);
            $("#allstaff").html(tr);
        }
     });
    }
    Selectalldata('');
    const changePage=(page)=>{
         Selectalldata(search='',page);
    }
 
    $(document).on('input','.search_item', function () {
        var search_val=$(this).val();
        Selectalldata(search_val);
    });
    
    const edit=(id)=>{
       $.ajax({
        type:"POST",
        url:urlRoute+"edit",
        data:{edit_id:id},
        dataType: "json",
        success: function (response) {
            var data=response.data;
            $(".edit_id").val(data.id);
            $(".fname").val(data.fname);
            $(".gender").val(data.gender);
            $(".position").val(data.position);
            $(".salary").val(data.salary);
            $(".old_img").val(data.image);
            $(".priview-image").html(`
                <input type="text" name="image_name" value='${data.image}'>
                <img src="./public/iamge_use/${data.image}" alt="">
                 <button onclick="Cencel_image('${data.image}')" type="button" class="btn btn-danger" id="btn_cen">Cencel</button>
            `);
        }
       });
    }
    const Update=(form)=>{
        alert(1234);
        var alldata=$(form).serializeArray();
        $.ajax({
            type:"POST",
            url:urlRoute+"update",
            data:alldata,
            dataType: "josn",
            success: function (response) {
                alert(response.message);
            }
        });

    }
    const Delete_staff=(id,img)=>{
        if(confirm("Are you sure you want to delete")){
            $.ajax({
            type: "POST",
            url: urlRoute+"delete",
            data: {
                id:id,
                img:img
            },
            dataType:"json",
            success: function (response) {
               if(response.status==200){
                 alert(response.message);
                 Selectalldata();
               }
            }
           });
        }
    }
</script>