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
                <a class="navbar-brand" href="<?php echo '/messages/send/' ?>">Message Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  

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


    .collapsed {height:20px; overflow:hidden}

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
        
            #showm{

              position:absolute;
            }
            .footerholder {
    background: none repeat scroll 0 0 transparent;
    bottom: 0;
    position: fixed;
    text-align: center;
    width: 100%;
}

.footer {
    background: none repeat scroll 0 0 blue;
    height: 100px;
    margin: auto;
    width: 400px;
}
  </style>

     <script type="text/javascript">
     $( document ).ready(function() {
        var itemsCount = 0,
            itemsMax = $('.outer div').length;
            $('.outer div').hide();

            function showNextItems() {
                var pagination = 2;
                
                for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                    $('.outer div:eq(' + i + ')').show();
                }

                itemsCount += pagination;
                
                if (itemsCount > itemsMax || itemsCount == itemsMax) {
                    $('#showMore').hide();
                }
            };

showNextItems();

$('#showMore').on('click', function (e) {
    e.preventDefault();
    showNextItems();
});
  

  

     })
    
     function getNextPage()
     {

      page = $('#getPage').val();
      userid = $('#getUserid').val();
      page2 = +page + 1;


      division = $('#countPage').val();

     
      res = +division % 2;
      x = (+division - res) / 2;
      result = x+ 1;
      if(res > 0)
        x = x+1;

       $.ajax({
            type: "POST",
            url: '/messages/getPagination/'+userid+'/page:'+page2,
            data: {
              }, 
            
            success: function(data){

             //   alert(data);
               // alert(x+'|rem='+res);
                if(page2 == x)
                  $('#show-more_id').hide();

                $('#getPage').val(page2);


                $('#getNext').append(data);

          
            },
            error: function(data){
            //cannot connect to server
          //  alert('dfdf');
            
        }
       });
     }
    function deleteMessage(implodeIds)
          {
            var imp = implodeIds.split('-');
            var userid = imp[0];
            var messageid = imp[1];
            var messageClass = imp[2];

            $.ajax({
            type: "POST",
            url: '/messages/deleteMessage',
            data: {
             userid : userid,
             messageid : messageid
              }, 
            
            success: function(data){


                alert('Message Deleted');

                $("."+messageClass).fadeIn(500).delay(500).fadeOut(500);

             //   window.location.href = '/messages/getMessage/'+userid;
              
               
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


      $countPages =   $this->params['paging']['Message']['count'];
      $image = $username[0]['users']['image'];

     // var_dump($sessname);
      $idUser = $idUser;
      
      ?>
      <?php 
      if($image != '')
      {
      ?>
          <img src="<?php echo $this->webroot."img/users images/".$image; ?>" style="height:50px">
           <?php }
           else
            { ?><img src="<?php echo $this->webroot."img/user_icon/user2.png"; ?>" style='height:50px'>
          <?php }
            ?>
          
          
       <?php
            echo '<b>'.strtoupper($username[0]['users']['name']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;';?>
      
                  <button type="button" alass="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+New Message</button>
                  <?php

                   ?>

                    
              </table>  

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
                         <?php
                         date_default_timezone_set('Asia/Manila');
                        $dateToday = date('Y-m-d H:i:s');  

                          echo $this->Form->input(' ',array(
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
                        <input type="hidden" value="<?php echo $dateToday ?>" name="created">
                        <input type="hidden" value="<?php echo $dateToday ?>" name="modified">
                      </div>
                      <?php echo $this->Form->button('Send Message',array('id' => 'btn_login','class' => 'btn btn-primary')); ?>
                  <?php echo $this->Form->end(); ?>
                  </div>
                </div>
              </div>
            </div>


              



</body>

<?php
$paginator = $this->Paginator;
$tempCount = 0;
//var_dump($users);
      
 foreach( $users as $user ){
            $tempCount += 1;
            $message_content = $user['Message']['content'];
            $message_from = $user['Message']['from_id'];;
            $message_to = $user['Message']['to_id'];;
            $message_modified = $user['Message']['modified'];
            $message_id = $user['Message']['id'];

            $pdiv = 'pdiv'.$tempCount;

            if($message_from == $me)
                  {
                    $bubbleCss = 'child';
                  }
                  else
                    $bubbleCss = 'child2';
                  ?>

            <p id="<?php echo $bubbleCss; ?>" class="<?php echo 'pdiv'.$message_id; ?>">
                <?php
            echo htmlspecialchars($user['Message']['content']).'<br />'.$message_modified;?>
              <a href='#' onclick="deleteMessage('<?php echo $idUser.'-'.$message_id.'-'.'pdiv'.$message_id; ?>')"><span class="glyphicon glyphicon-trash"></span></a>
                  
            </p>




<?php
          //  echo '<li>'.$user['Message']['content'].'</li>';
           
        }
     

        ?>  <?php
 
?>

<input type="hidden" id="getPage" value="1">
<input type="hidden" id="getUserid" value="<?php  echo $userid_to;?>">
<input type="hidden" id="countPage" value="<?php echo $countPages; ?>">

<div id="getNext">

</div>

<div class="row">
    <div class="col-md-2 col-md-offset-5"></div>
</div>
  <div class="" >
    <?php

      if($paginator->hasNext()){
               //   echo $paginator->next("Next",array('onlick'=>'getnextPAge()'));
                  ?>
                  <center>
                    <input type="button" id="show-more_id" onclick="getNextPage()" value="Show More">
                  </scenter>
                  <?php
              }

      ?>
    </div>
  
