<html>
    <header>
<link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css">
    <style>
        .bold{
            font-weight:bolder;
        }
    
        .column{
            width:100vw;
            padding-left:250px; 
        }
    
        .frame{
            margin-left:50px;
        }
    
        .mainbody{
            margin-top:10px;
            display:block;
                 
        }
        .data{
            border: 5px solid green;
            border-radius:10px;
            width:650px;
            background-color:#b6ffa9;  
            padding:20px;
         
        }
    
        .row-data{
            margin:10px;
            width:600px;
          
        }
    
        .layout{
            width:700px;
        }
        .details{
           width:max-content; 
           font-weight:bolder;
           height:auto;
           max-height:500px;
        }
    
        .announce-details{
            margin:10px;
            
        }
    
        .announce-title{
            margin-top:120px;
            margin-left:290px;
        }
        .announce-btn{
            margin-left:10px;
            height:40px;
            width:40px;
            background-color:green;
          
            
        }
        .announce-btn:hover{
            background-color:#ffcc00;
        }
        .link{
            font-size:20px;
            text-decoration:none;
            color:white;
            
        }
        .contain{
            display:block;
        }
        .border{
            border-bottom: 5px solid green;
            margin-top:5px;
            margin-bottom:5px;
        }
        
        
        .a-delete{
            float:left;
            margin-right:20px;
            color:red; 
            text-decoration:none;
            cursor:pointer;
            
        }

        .img{
            width:100%;
            height:45%;
            
        }

    </style>
    </header>
    <?php
      
        include '../include/sidebar_admin.php';
 
     $connection = mysqli_connect("localhost","root","") or die("A connection to the Server 
     could not be established!");	
    $result=mysqli_select_db ($connection, "portaldb") or die("Database Could not be selected");
    echo '<div class="contain"><h1 class="announce-title">Announcement<button class="announce-btn"><a class="link" href="add-announce.php">+</a></button></div></h1>';
    if($result>=1){
        $sql = "SELECT * FROM announce WHERE type = 'Announcement' ORDER BY id DESC";
        $queryResult = mysqli_query($connection,$sql);
        if(mysqli_num_rows($queryResult) > 0){
            while($row = mysqli_fetch_array($queryResult)){
            ?>

    <div class="mainbody">
      <div class="column">
        <div class="frame">
            <div class="layout">
                <div class="data">  
                    
                                <p class="row-data">
                                    <span class="bold">ID: </span><?= $row['id']; ?> &nbsp;
                                    <span class="bold">Type: </span> <?= $row['type']; ?><br>
                                    <span class="bold">Date: </span><?=$row['date']; ?>
                                   
                                </p>
                        <div class="announce-details">
                                <span class="details">  Details: </span><p class="border"></p><?=$row['details']; ?><br><br>
                                <span class="img"><img class="img" src="../images/post.png"></span>
                            <div class="edit-delete">
                            <span class="details"><a class ="a-delete"onClick="deleteme(<?php echo $row['id']; ?>)" name="Delete" value="Delete">Delete</a> </span> 
                            <script language="javascript">
                            function deleteme(delid)
                                {
                                    if(confirm("Do you want to delete this Post?")){
                                        window.location.href='announce-delete.php?del_id=' +delid+'';
                                        return true;
                                    }
                                }
                            </script>
                            </div>
                        </div>
                    </div>
                </div>
        </div>      
      </div>
    </div>
          
           <?php
            }
        
        }else{
            echo "";
        }
    }
    ?>           
    </html>