require "database.php";
      $requete1 = "SELECT * from tasks";
      $qury = mysqli_query($conn, $requete1);
      
while ($rows = mysqli_fetch_assoc($qury))
      {id="typee'.$id.'" data="'.$rows['type_id'].'"
        $nb=$raws[4];
        if ($nb == 1) {$icon="fa fa-question-circle";}
        else if ($nb == 2) {$icon="fa fa-circle-notch fa-spin";}
        else if ($nb == 3) {$icon="fa-regular fa-circle-check";}
        else {echo "ereur";}

        if ($rows['Status'] == $nb)
        {
          echo '
                <div class="bg-white w-100 border-0 border-top d-flex py-2 ">
                    <div class="px-2 ">
                        <i class="bi bi-question-circle text-success fs-3 "></i> 
                    </div>
                    <div class="text-start ">
                        <div class="h6 ">'.$raws['Titre'].'</div>
                        <div class="text-start ">
                            <div class="text-gray "> created in '.$raws['Date'].'</div>
                            <div title="${tasks[i].description}">'.$raws['Description'].'</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="btn btn-primary p-2">'.$raws['Description'].'</span>
                                <span class="btn btn-light text-black p-2">'.$raws['Description'].'}</span>
                            </div>
                        </div>
                    </div>
                </div>';
        }
      }

<?php
    function getTasks($status)
    {
        $index=1;
        require('database.php');
        $requete="SELECT * from tasks";
        $query=mysqli_query($connc,$requete);
        while($row=mysqli_fetch_assoc($query)){

            //CODE HERE
            if($row['status_id'] == $status){
                if($status==1){$icon="fa-regular fa-clock ms-10px";};
                if($status==2){$icon="spinner-border spinner-border-sm ms-10px";};
                if($status==3){$icon="fa-regular fa-circle-check ms-10px";};
                if($row['status_id']==$status){
                    $priority=$row['priority_id']==1?'Low':($row['priority_id']==2?'Medium':($row['priority_id']==3?'High':'Critical'));
                    $type=$row['type_id']==1?'Feature':'Bug';
                    $id=$row['id'];
                    echo '<button class="d-flex w-100 border-0 border-top" onclick="edit('.$id.')" href="#modal-task" data-bs-toggle="modal" >
                    <div class="text-green fs-4">
                        <i class="'.$icon.'"></i> 
                    </div>
                    <div class="ms-10px">
                        <div class="fs-3 " id="title'.$id.'">'.$row['title'].'</div>
                        <div class="">
                            <div class="fs-5 text-gray" id="date'.$id.'">'.$index++.' created in '.$row['task_datetime'].'</div>
                            <div class="fs-5" >'.$row['description'].'</div>
                        </div>
                        <div class="my-10px">
                            <span class="bg-blue-500 p-5px px-10px text-white rounded-2" id="priority'.$id.'">'.$priority.'</span>
                            <span class="bg-gray-400 p-5px px-10px text-black rounded-2" id="type'.$id.'">'.$type.'</span>
                        </div>
                    </div>
                </button>';
                }

                }
        }
        //SQL SELECT
    }
    "INSERT INTO tasks (title, type_id, priority_id, status_id, tasks_datetime, description) 
    VALUES ('$Titre','$Type','$Priority', '$Status','$Date','$Description')"

    "SELECT types.Name as NameTypes ,priorites.Name as NamePriority, statuses.Name AS NameStatus ,tasks.* FROM tasks ,types ,priorites , statuses WHERE tasks.Type_id = types.Id and tasks.Priority_id = priorites.Id and tasks.Status_id = statuses.Id and tasks.Status_id= $column
?>