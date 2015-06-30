 <table class="table table-striped table-hover" id="table-inbox" style="width: 80%">
      <tbody>
        <tr>
          <td colspan='6'>  </td>
                    <td colspan='2'>

                </td>
       

        </tr>
				
              <?php
              $paginator = $this->Paginator;
            //  var_dump($contentS);

       

           //     $explodeContent = explode('@', $contentS); 


              // var_dump($messages);

                 
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

                    

                     <!-- <div class ="outer" id="outer">

                         <?php
                          echo $this->Html->link($userName,array('controller' => 'messages', 'action' => 'getMessage', $message['users']['id'])
                        );
                      ?>

                      </div> -->
                  <tr>
                   
                    <td colspan='4'>  </td>
                     <td colspan='5'>
                    <ul>
                  <li onclick="getMessageUser('<?php echo $message_toId ?>')">
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
                                 echo $this->Html->link(
                                  $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
                                  array('controller' => 'messages','action' => 'deleteConversation',$message['users']['id']),
                                  array('class' => 'btn btn-mini','onclick' => "return confirm('are you sure?')", 'escape' => false)
                              );
                        ?>
                  </p>
                  </li>
                  </ul>
                      </td></td>
                   
                   </tr> 
                 

                  
                <?php
                    }

                 $arr[] = $message_toId;
                 }
               //     var_dump($arr);
              ?>
