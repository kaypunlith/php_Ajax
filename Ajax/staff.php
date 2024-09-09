<?php 
   include("../config.php");
   header('content-type: application/json');
    $type=$_GET['type'];
     switch($type){
        case 'Upload':{
            $file_name=$_FILES['image']['name'];	
            $file_tmp=$_FILES['image']['tmp_name'];
            $img_Dir="../public/image/$file_name";
            move_uploaded_file($file_tmp,$img_Dir);
           echo json_encode([
            'status' => 200,
            'data'=>$file_name,
            'message' => 'Upload completed'
           ]);
           break;
        }
        case 'cencel':{
            $image=$_POST['image_name'];
            $image_Dir="../public/image/$image";
            if(file_exists($image_Dir)){
                unlink($image_Dir);
                echo json_encode([
                    'status' => 200,
                    'message' => 'Upload canceled'
                   ]);
            }
           break;
        }
        case 'insert':{
            $fname=$_POST['fname'];
            $gender=$_POST['gender'];
            $position=$_POST['position'];
            $salary=$_POST['salary'];
            $img=$_POST['image_name'];
            $sql="INSERT INTO `staff_ajax`(`id`, `fname`, `gender`, `position`, `salary`, `image`) 
            VALUES (null,'$fname','$gender','$position','$salary','$img')";
            mysqli_query($con,$sql);
            $image_dir="../public/image/$img";
            $image_use="../public/iamge_use/$img";
            if(file_exists($image_dir)){
                copy($image_dir,$image_use);
                unlink($image_dir);
                  echo json_encode([
                'status' => 200,
                'message' => 'Data inserted'
            ]);
            }
          
            break;
        }
        case 'select':{
            $search_val=$_POST['search_val'];
            $page=$_POST['page'];
            $offset=($page-1)*2;
            $sql="SELECT * FROM `staff_ajax`WHERE `fname` LIKE '%$search_val%' LIMIT 2 OFFSET $offset";
            $result=mysqli_query($con,$sql);
             $data=[];
             while($row=mysqli_fetch_assoc($result)){
                 $data[]=$row;
             }
             $sql="SELECT * FROM `staff_ajax`";
             $result=mysqli_query($con,$sql);
             $record=mysqli_num_rows($result);
             $Totalpage=ceil($record/2);
          
            echo json_encode([
                'status'=>200,
                'data'=>$data,
                'totalpage'=>$Totalpage,
                'currentPage'=>$page,
                'message'=>"select data successfuly"
            ]);
            break;
        }
        
        case 'edit':{
             $id=$_POST['edit_id'];
            $sql="SELECT * FROM `staff_ajax` WHERE `id`=$id";
            $result=mysqli_query($con,$sql);
            $data=mysqli_fetch_assoc($result);
            echo json_encode([
                'status'=>200,
                 'data'=>$data,
                'message'=>"edit data successfulyy"
            ]);
            break;
          }
        case 'update':{
            $id=$_POST['edit_id'];
            $fname=$_POST['fname'];
            $gender=$_POST['gender'];
            $position=$_POST['position'];
            $salary=$_POST['salary'];
            if(isset($_POST['image_name'])){
                $img=$_POST['image_name'];
                $img_old=$_POST['old_img'];
                $image_dir="../public/image/$img";
                $image_use="../public/iamge_use/$img";
                if(file_exists($image_dir)){
                    copy($image_dir,$image_use);
                    unlink($image_dir);
                }
                if(file_exists("../public/image/$img_old")){
                    unlink("../public/image/$img_old");
                }
            }else{
                $img=$_POST['old_img'];
            }
            $sql="UPDATE `staff_ajax` SET `fname`='$fname',`gender`='$gender',`position`='$position',`salary`='$salary',`image`='$img' WHERE  `id`=$id";
            mysqli_query($con,$sql);
            echo json_encode([
                'status'=>200,
                'message'=>"update data successfulyy"
            ]);
            break;
        }
        case 'delete':{
            $id=$_POST['id'];
            $img=$_POST['img'];
            $sql="DELETE FROM `staff_ajax` WHERE `id`=$id";
            mysqli_query($con,$sql);
            $image_Dir="../public/iamge_use/$img";
            if(file_exists($image_Dir)){
                unlink($image_Dir);
                echo json_encode([
                    'status'=>200,
                    'message'=>"Delete data successfuly"
                   ]);
            }

          break;

        }
    }
?>