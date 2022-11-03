<?php
    //INCLUDE DATABASE FILE
    include 'database.php';
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES

    

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }


    function saveTask()
    {
        $Titre = $_POST['title1'];
        $Type  = $_POST['task-type1'];
        $Priority = $_POST['Priority_1'];
        $Status = $_POST['status1'];
        $Date = $_POST['date1'];
        $Description = $_POST['description1'];
        //CODE HERE
        //SQL INSERT
        $sql = "INSERT INTO tasks (title, type_id, priority_id, status_id, tasks_datetime, description) 
                VALUES ('$Titre','$Type','$Priority', '$Status','$Date','$Description')";
        global $conn;
        if ($conn->query($sql) === TRUE) 
        {
          echo "New record created successfully";
        }
        else
        {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        $_SESSION['message'] = "Task has been added successfully !";
		    header('location: index.php');
    }

    function econe($Status)
    {
      if ($Status == '1')
      echo '<ion-icon name="help-outline"></ion-icon>';
      else if ($Status == '2')
      echo '<ion-icon name="megaphone-outline"></ion-icon>';
      else if ($Status == '3')
      echo '<ion-icon name="eye-outline"></ion-icon>';
    }

    function caseCount($Status)
    {
      require "database.php";
      global $conn;

      $query  = "SELECT count(status_id) FROM tasks WHERE status_id = $Status";
      $result = mysqli_query($conn, $query);
      $count  = mysqli_fetch_assoc($result);
      return $count;
    }

    function getadd($Status)
    {
      require "database.php";
      $index = 1;
      $cont = 0;
      $requete1 = "SELECT priorities.name as name  , types.name as name1 , tasks.* from tasks JOIN priorities ON tasks.priority_id = priorities.id JOIN types ON tasks.type_id = types.id";
      $qury = mysqli_query($conn, $requete1);
      while($rows = mysqli_fetch_assoc($qury))
      {
        if ($rows['status_id'] == $Status)
        {
          $id = $rows['id'];
          echo '
          <button href="#modal-task1" data-bs-toggle="modal" onclick="aff('.$id.')">
            <div >'.econe($Status).'</div>
            <div class="bg-white w-100 border-0 border-top d-flex py-2">
            <div class="px-2">
                <i class="bi bi-question-circle text-success fs-3"></i> 
            </div>
              <div class="text-start">
                  <div class="h6" id="titlee'.$id.'" data="'.$rows['title'].'">'.$rows['title'].'</div>
                  <div class="text-start">
                      <div class="text-gray" id="time'.$id.'" data="'.$rows['tasks_datetime'].'">'.$index++.' created in '.$rows['tasks_datetime'].'</div>
                      <div id="descriptionn'.$id.'" title="'.$rows['description'].'">'.$rows['description'].'</div>
                  </div>
                  <div class="d-flex justify-content-between">
                      <div id="statuss'.$id.'" data="'.$rows['status_id'].'">
                          <span class="btn btn-primary p-2" id="priorityy'.$id.'" data="'.$rows['priority_id'].'">'.$rows['name'].'</span>
                          <span class="btn btn-light text-black p-2" id="typee'.$id.'" data="'.$rows['type_id'].'">'.$rows['name1'].'</span>
                      </div>
                  </div>
              </div>
            </div>
          </button>
          ';
        }
      }
      
    }

    function updateTask()
    {
        //CODE HERE
        $Titre1       = $_POST['title2'];
        $Type1        = $_POST['task-type1'];
        $Priority1    = $_POST['Priority_2'];
        $Status1      = $_POST['status2'];
        $Date1        = $_POST['date2'];
        $Description1 = $_POST['description2'];
        $id1          = $_POST['idd1'];

        $rawe = "UPDATE `tasks` SET title ='$Titre1',type_id='$Type1',priority_id='$Priority1',
        status_id='$Status1',tasks_datetime='$Date1',description='$Description1' WHERE id = '$id1'";
        global $conn;
        $qury5 = mysqli_query($conn, $rawe);
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		    header('location: index.php');
    }

    function deleteTask()
    {
      $id = $_POST['idd1'];
      $sql1 = "DELETE FROM tasks where id='$id'";
      global $conn;
      $qury1 = mysqli_query($conn,$sql1);
      $_SESSION['message'] = "Task has been deleted successfully !";
		  header('location: index.php');
    }

?>
