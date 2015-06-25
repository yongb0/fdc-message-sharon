 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<head>
        <link rel="stylesheet" type="css/text" href="test.css"/>
        <script type="text/javascript" src="test.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        
    </head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Message Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                     <?php print $this->Session->read('Auth.User.username'); ?>
                  </li>

                  <li>
                        <?php echo $this->Html->link('Hi '.strtoupper($sessname[0]['users']['name']).'!', array('controller' => 'main', 'action' => 'profile')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link( "Messages",   array('controller' => 'messages','action'=>'send'),array('escape' => false) ); ?>
                    </li>
                    <li>
                        <?php  echo $this->Html->link( "Logout",   array('controller' => 'main', 'action'=>'logout') ); ?>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<br /><br /><br /><br />
<?php

  //echo "sharon";
  //echo $id;
  //var_dump($messageList);
?>
<head>
  <style>


  

    #child {
      background-color: silver;
      width: 70%;
      padding: 20px;
      margin: 10px;
      font-size: 12px;
      border-radius: 10px;
      float:right;
      font-family: 'Schoolbell', arial, serif;
          
    }
         #child:after {
                content: '';
                top: 1px;
                left: -310px;
                border: 0px solid;
                display: block;
                width: 430px;
                 height: 26px;
                background-color: transparent;
                border-bottom-left-radius: 50%;
                border-bottom-right-radius: 50%;
                box-shadow: -11px 9px 0px 8px silver;
            }
    #child2 {
      background-color: silver;
      width: 70%;
      padding: 20px;
      margin: 10px;
      font-size: 12px;
      border-radius: 10px;
      float:left;
      font-family: 'Schoolbell', arial, serif;
    }
        #child2:after {
                content: '';
                top: 1px;
                right: -410px;
                border: 0px solid;
                display: block;
                width: 400px;
                 height: 16px;
                background-color: transparent;
                border-bottom-left-radius: 50%;
                border-bottom-right-radius: 50%;
                box-shadow: 11px 9px 0px 8px silver;
            }
  </style>

     <script type="text/javascript">
     $( document ).ready(function() {
        var itemsCount = 0,
            itemsMax = $('.outer div').length;
            $('.outer div').hide();

            function showNextItems() {
                var pagination = 4;
                
                for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                    $('.outer div:eq(' + i + ')').show();
                }

                itemsCount += pagination;
                
                if (itemsCount > itemsMax) {
                    $('#showMore').hide();
                }
            };

showNextItems();

$('#showMore').on('click', function (e) {
    e.preventDefault();
    showNextItems();
});

     })
    

    function deleteMessage(implodeIds)
          {
            var imp = implodeIds.split('-');
            var userid = imp[0];
            var messageid = imp[1];

            $.ajax({
            type: "POST",
            url: '/messages/deleteMessage',
            data: {
             userid : userid,
             messageid : messageid
              }, 
            
            success: function(data){


                alert('Message Deleted');


                window.location.href = '/messages/getMessage/'+userid;
              
               
            },
            error: function(data){
            //cannot connect to server
        }
       });

          }
          </script>
</head>


<body>
  <?php
      $me = $userid;
      

       

        echo $this->Html->link("BACK", array('controller' => 'messages','action'=> 'send'), array( 'class' => 'btn btn-primary'))

  ?>



  
  <center>
  <table style='width:80%'>


      <?php
    //  var_dump($sessname);
         //   echo $userid.'|'.$userid_to;
      //echo $sessname;
      $idUser = $username[0]['users']['id'];
      echo '<b>'.strtoupper($username[0]['users']['name']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;';?>
      <button type="button" alass="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+New Message</button>
      <?php
    //  var_dump($username);
        foreach($messageList as $message)
                 {
                  $from_id = $message['Message']['from_id'];
                  $to_id = $message['Message']['to_id'];
                  $content = $message['Message']['content'];
                  $modified = $message['Message']['modified'];
                  $messageId = $message['Message']['id'];

                  if($from_id == $me)
                  {
                    $bubbleCss = 'child';
                  }
                  else
                    $bubbleCss = 'child2';


                  ?>
                  <tr>
                        <div class = "outer" >
                          <div class="child" id="<?php echo $bubbleCss;?>"> 

                            <?php
                            echo '<b><font>'.$content.'</font></b>'."<br>".'~'.$modified;
                            //echo "<td colspan='30' class='$bubbleCss'>".'<font>'.$content.'</font>'."<br>".'~'.$modified."</td>";

                         ?>
                           <a href='#' onclick="deleteMessage('<?php echo $idUser.'-'.$messageId; ?>')"><span class="glyphicon glyphicon-trash"></span></a>
                  
                        </div>
                         
                       
                        <br/>
                       

                    
                         </div>


                  </tr> 

                  <?php
                    }
                  ?>    

        
  </table>  
     <a href="#" id="showMore"><b><u>SEE MORE</u></b></a>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('messages',array('controller' => 'messages','action' => 'addMessage')); ?>
          <div class="form-group">
            <input type='hidden' name='hideId' id='hideId' value='<?php echo $idUser; ?>'>  
             <?php echo $this->Form->input(' ',array(
                        'name' => 'to_id',
                        'id' => 'to_id',
                        'class' => 'form-control',
                        'type' => 'hidden',
                        'value' => $userid_to

                      )
                    );
                    ?>
                     <?php echo $this->Form->input(' ',array(
                        'name' => 'from_id',
                        'id' => 'from_id',
                        'class' => 'form-control',
                        'type' => 'hidden',
                        'value' => $this->Session->read('usersid')
                      )
                    );
                    ?>

            <div id='divSearch'>
           

            </div>

          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <?php
              echo $this->Form->textarea('notes',array(
                        'name' => 'content',
                        'id' => 'content',
                        'class' => 'form-control'
                      ));

            ?>
          </div>
          <?php echo $this->Form->button('Send Message',array('id' => 'btn_login','class' => 'btn btn-primary')); ?>
      <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>







</body>
