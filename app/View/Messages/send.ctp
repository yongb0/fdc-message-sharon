

<head>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

        <script type="text/javascript">

        $("#e1").select2();
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


           
                  $('#divSearch').empty();
                 var obj = jQuery.parseJSON(data);

              
        
            console.log(data);
             $.each(obj, function(key, val){ 


                var name2 = "'"+key+"'";
                var id2 = "'"+val+"'";
                var name = key;
                var email = val;
                var num =1;
          
               // $('#divSearch').append('<li style="float:left;list-style-position:inside;" onclick="a('+name2+','+id2+');">'+name+' - '+email+'</li><br />');
                $('#divSearch').append('<table class="table table-bordered"><tr onclick="a('+name2+','+id2+');"><td>'+name+' - '+email+'</td></tr></table>')

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
           <th></th>
        </tr>
              <?php
           //     echo $usid;

                 $tempCount=1;
                 foreach($messages as $message)
                 {
                   $userName = $message['users']['name'];
                  ?>
                  
                  <tr>
                    <div class = "outer" >
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
                       <td>
                        <?php
                                 echo $this->Html->link(
                                  $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
                                  array('controller' => 'messages','action' => 'deleteConversation',$message['users']['id']),
                                  array('class' => 'btn btn-mini', 'escape' => false)
                              );
                        ?>
                       </td></div>
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
        <?php
         //   var_dump($userInfo);
        ?>
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

 <html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

  <!-- stylesheets -->
  
        
        <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
  <style type="text/css">
  body {
    padding: 40px;
  }
  </style>

  <!-- scripts -->
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

  <script>
    $(function(){
      // turn the element to select2 select style
      $('#select2').select2();
    });
  </script>
</head>

<body>



  

</html>


