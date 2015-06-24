 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<head>
        <link rel="stylesheet" type="css/text" href="test.css"/>
        <script type="text/javascript" src="test.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script type="text/javascript">
          function search()
          {

            var searchInitial = $('#to_id2').val();
            // $.ajax({
            //     url: "<?php echo $this->Html->url(array('controller' => 'main','action'=> 'serch')); ?>",
            //     dataType: "jsonp",
            //         data: {
            //             name_startsWith: searchInitial
            //         },
            //         success: function(data) {
            //            console.log(data);
            //         }
            // });

            $.ajax({
            type: "POST",
            url: '/main/serch',
            data: { recipient : searchInitial }, 
            
            success: function(data){


            	console.log(data);
                  $('#divSearch').empty();
             //    var obj = jQuery.parseJSON(data);

              
         //    var obj = jQuery.parseJSON(data);

             $.each(data, function(key, val){ 

            //    console.log(obj);
               

                var name2 = "'"+val.name+"'";
                var id2 = "'"+val.id+"'";
                var name = val.name;
                var email = val.email;
                var num =1;
               // var id = val.id;
              //  var hubby = val.hubby;

              //  console.log(name+'|'+email);

                $('#divSearch').append('<li style="float:left;list-style-position:inside;" onclick="a('+name2+','+id2+');">'+name+' - '+email+'</li>');

             });



               
               
            },
            error: function(data){
            //cannot connect to server
        }
       });

          }
          function list(name,id)
          {
            alert(name,id);

          }
          function a(name2,id2)
          {
            $('#divSearch').empty();
            $('#to_id').val(id2);
            $('#to_id2').val(name2);
          }
        </script>
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
                <a class="navbar-brand" href="#">Message Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                	<li>
                		Welcome <?php print $this->Session->read('Auth.User.username'); ?>
                	</li>

                	<li>
                        <?php echo $this->Html->link('Hi '.$this->Session->read('Auth.User.username').'!', array('controller' => 'main', 'action' => 'profile')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link( "Messages",   array('controller' => 'users','action'=>'add'),array('escape' => false) ); ?>
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
<div id="inbox-container">
	<div>
		<table class="table table-striped table-hover" id="table-inbox" style="width: 80%">
			<tbody>
				<tr>
					<td colspan=4>  </td>
                    <td colspan='2'>
                       <h2> My Messages </h2>
                    <button type="button" alass="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+New Message</button>

                </td>
       

				</tr>
        <tr>
           <td colspan=5>  </td>
           <th>#</th>
           <th>Contact Name</th>
           <th></th>
           <th>IP Address</th>
        </tr>
              <?php
              //   var_dump($messages);

                 $tempCount=1;
                 foreach($messages as $message)
                 {
                   $userName = $message['users']['name'];
                  ?>
                  <tr>
                    <td colspan=5>  </td>
                    <td><?php echo $tempCount++; ?></td>

                    <td>
                      <?php
                          echo $this->Html->link($userName,array('controller' => 'messages', 'action' => 'getMessage', $message['users']['id'])
                        );
                      ?>
                    </td>
                       <td></td>
                       <td>
                          <?php 
                            $userName = $message['users']['modified_ip'];
                            echo $userName;
                          ?>
                       </td>
                   </tr> 

                  
                <?php
                 }

              ?>
        
			</tbody>
		</table>
	</div>
</div>

<!-- Button trigger modal -->




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('messages',array('controller' => 'messages','action' => 'send')); ?>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <?php echo $this->Form->input(' ',array(
                        'name' => 'to_id2',
                        'id' => 'to_id2',
                        'class' => 'form-control',
                        'onkeyup' => 'search()'
                      )
                    );
                    ?>
             <?php echo $this->Form->input(' ',array(
                        'name' => 'to_id',
                        'id' => 'to_id',
                        'class' => 'form-control',
                        'type' => 'hidden'
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
            <br />
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

