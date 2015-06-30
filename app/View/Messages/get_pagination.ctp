

<body>
  <?php
      $me = $userid;

      $idUser = $idUser;
      ?>

      <?php
       ?>


<?php
$paginator = $this->Paginator;
//var_dump($users);
      
 foreach( $users as $user ){

            $message_content = $user['Message']['content'];
            $message_from = $user['Message']['from_id'];
            $message_to = $user['Message']['to_id'];
            $message_modified = $user['Message']['modified'];
            $message_id = $user['Message']['id'];


            if($message_from == $me)
                  {
                    $bubbleCss = 'child';
                  }
                  else
                    $bubbleCss = 'child2';
                  ?>

            <p id="<?php echo $bubbleCss; ?>">
                <?php
            echo htmlspecialchars($user['Message']['content']).'<br />'.$message_modified;?>
              <a href='#' onclick="deleteMessage('<?php echo $idUser.'-'.$message_id; ?>')"><span class="glyphicon glyphicon-trash"></span></a>
                  
            </p>



<?php
          //  echo '<li>'.$user['Message']['content'].'</li>';
           
        }
     

        ?>  <?php
 
?>
<input type="hidden" id="getPage" value="1">
<input type="hidden" id="getUserid" value="<?php  echo $userid_to;?>">

<div id="getNext">

</div>


<div id="tempDiv">

</div>