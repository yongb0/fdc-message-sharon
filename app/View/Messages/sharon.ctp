 <center>
 <table class="table table-striped table-hover" id="table-inbox" style="width: 80%">
      <tbody>
        <tr>
          <td colspan='6'>  </td>
                    <td colspan='2'>

                </td>
       

        </tr>
				
                      <?php
              $paginator = $this->Paginator;
           //   var_dump($messages);

            date_default_timezone_set('Asia/Manila');
            $dateToday = date('Y-m-d h:i:s');       

           //     $explodeContent = explode('@', $contentS); 


         //      var_dump($messages);

                 
                $arr[] = array();

                 $tempCount=1;
                 foreach($messages as $message)
                 {
                   $userName = $message['users']['name'];

                     $message_toId = $message['users']['id'];


                    

                   if (in_array($message_toId, $arr)) {
                        
                       }

                  
                  else
                  {
                  
                    $image = $message['users']['image'];

                  ?>  

                   <?php

                      $divclass = 'pdiv'.$message_toId;
                      ?>

                    

                     <!-- <div class ="outer" id="outer">

                         <?php
                          echo $this->Html->link($userName,array('controller' => 'messages', 'action' => 'getMessage', $message['users']['id'])
                        );
                      ?>

                      </div> -->
                  <tr>
                   
                    <td colspan='4' class="<?php echo $divclass; ?>">  </td>
                     <td colspan='2' class="<?php echo $divclass; ?>">
                    <ul>
                     
                  <li onclick="getMessageUser('<?php echo $message_toId ?>')" class="<?php echo $divclass; ?>">
                    <?php 
                      if($image != '')
                      {
                    ?>
                  <img src="<?php echo $this->webroot."img/users images/".$image; ?>" style='height:50px'>

                  <?php
                  }
                  else 
                  {
                    ?>
                    <img src="https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User_Speech-2-128.png" style='height:50px'>
                    <?php }
                     ?>
                  <h3><?php echo $userName; ?></h3>
                  <p><?php  if(isset($contentS[$message_toId])) {
                        echo  $contentS[$message_toId];
                     }
                      ?>

                    <?php
                              //    echo $this->Html->link(
                              //     $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
                                 
                              //     array('class' => 'btn btn-mini','onclick' => "deleteConvo('$divclass','$message_toId')", 'escape' => false)
                              // );
                        ?>

                  </p>
                  </li>
                  </ul>
                  <a href = "#" class="<?php echo $divclass; ?>" onclick = "deleteConvo('<?php echo $divclass ?>','<?php echo $message_toId ?>')"> <span class="glyphicon glyphicon-trash"></span></a>
                      </td></td>
                   
                   </tr> 
                 

                  
                <?php
                    }

                 $arr[] = $message_toId;
                 }
               //     var_dump($arr);
              ?>

         
</table></center>