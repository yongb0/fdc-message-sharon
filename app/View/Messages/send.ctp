 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


        <script type="text/javascript">


      //  $("#e1").select2();
          $( document ).ready(function() {

        var itemsCount = 0,
            itemsMax = $('.outer div').length;
            $('.outer div').hide();

            $.fn.select2.defaults = $.extend($.fn.select2.defaults, {
              allowClear: true, // Adds X image to clear select
              closeOnSelect: true, // Only applies to multiple selects. Closes the select upon selection.
              placeholder: 'Select...',
              maximumResultsForSearch: 4,
               // Removes search when there are 15 or fewer options
          });

          $(document).ready(

          function () {




              // Single select example if using params obj or configuration seen above
              var configParamsObj = {
                  placeholder: 'Select ', // Place holder text to place in the select
                  minimumResultsForSearch: 1 // Overrides default of 15 set above
              };
              $("#singleSelectExample").select2(configParamsObj);

           //   alert(configParamsObj);

          });


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

            $(".js-example-basic-multiple").select2();


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



                 $('#divSearch').append('<table id="table-id" class="table table-bordered"><tbody></tbody></table>');
              
        
            console.log(data);
             $.each(obj, function(key, val){ 


                var name2 = "'"+key+"'";
                var id2 = "'"+val+"'";
                var name = key;
                var email = val;
                var num =1;
          
               // $('#divSearch').append('<li style="float:left;list-style-position:inside;" onclick="a('+name2+','+id2+');">'+name+' - '+email+'</li><br />');
              //  $('#divSearch').append('<table class="table table-bordered"><tr onclick="a('+name2+','+id2+');"><td>'+name+' - '+email+'</td></tr></table>')

                $('#table-id').find('tbody:last').append('<tr class="onhover" onclick="a('+name2+','+id2+');"><td>'+name+' - '+email+'</td></tr>');

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
          function getMessageUser(message_toId)
          {
            window.location.href = '/messages/getMessage/'+message_toId;
          }
          function validate()
          {
            //alert($('#singleSelectExample').val()+'|'+ $('#content2').val());
            if($('#content2').val() == '' || $('#singleSelectExample').val() == '')
            {
            alert('Empty field');
            return false;
            }
            else
            {
              return true;
            }
          }

          function sha()
          {
            page = $('#getPage').val();
             page2 = +page + 1;


             division = $('#countPage').val();

     
              res = +division % 2;
              x = (+division - res) / 2;
              result = x+ 1;
              if(res > 0)
                x = x+1;

             //send-pagination
      
             $.ajax({
                  type: "POST",
                  url: '/messages/sendPagination/page:'+page2,
                 
                  data: {
                    }, 
                  
                  success: function(data){
                //    alert(res+'---'+division);

                    $('#getPage').val(page2);

                    if(page2 == x)
                    $('#show-more_id').hide();
                     // alert(x+'|rem='+res);
                   //  alert(data);

                     $('#send-pagination').append(data);

                
                  },
                  error: function(data){
                  //cannot connect to server
                //  alert('dfdf');
                  
              }
             });
          }

           function getNextPage()
           {
             page = $('#getPage').val();
             page2 = +page + 1;


             division = $('#countPage').val();

     
              res = +division % 2;
              x = (+division - res) / 2;
              result = x+ 1;
              if(res > 0)
                x = x+1;

             //send-pagination
      
             $.ajax({
                  type: "POST",
                  url: '/messages/sendPagination/page:'+page2,
                 
                  data: {
                    }, 
                  
                  success: function(data){
                //    alert(res+'---'+division);

                    $('#getPage').val(page2);

                    if(page2 == x)
                    $('#show-more_id').hide();
                     // alert(x+'|rem='+res);
                   //  alert(data);

                     $('#send-pagination').append(data);

                
                  },
                  error: function(data){
                  //cannot connect to server
                //  alert('dfdf');
                  
              }
             });
           }







           function deleteConvo(div,to_id)
           {
            

            $.ajax({
            type: "POST",
            url: '/messages/deleteConversation',
            data: {
             to_id : to_id
              }, 
            
            success: function(data){


            //    alert(data);

                $("."+div).fadeIn(500).delay(500).fadeOut(500);

             //   window.location.href = '/messages/getMessage/'+userid;
              
               
            },
            error: function(data){
            //cannot connect to server
        }
       });
           }









        </script>
        <style>
       * {margin: 0; padding: 0;}

            div {
            margin: 20px;
            }

            ul {
            list-style-type: none;
            
            }

            h3 {
            font: bold 20px/1.5 Helvetica, Verdana, sans-serif;
            }

            li img {
            float: left;
            margin: 0 15px 0 0;
            }

            li p {
            font: 200 12px/1.5 Georgia, Times New Roman, serif;
            }

            li {
            padding: 10px;
            overflow: auto;
            }

           
            .selectRow {
                display : block;
                padding : 20px;
            }
            .select2-container {
                width: 200px;
            }
           
            .selectRow {
              display : block;
              padding : 20px;
          }
          .select2-results__option{
              width:100%;
          }
.select2-container {
    width: 200px;
}

        </style>
    </head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo '/messages/send/' ?>">Message Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

           
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
             
       
            <!-- /.navbar-collapse -->
      
        <!-- /.container -->
    </nav>


<br /><br /><br /><br />


  <?php 

  ?>
<div id="inbox-container">
  <div>
    <center>
    <table class="table table-striped table-hover" id="table-inbox" style="width: 80%">
      <tbody>
        <tr>
          <td colspan='4'>  </td>
                    <td colspan='2'>
                       <h2> My Messages </h2>
                    <button type="button" alass="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+New Message</button>

                </td>
       

        </tr>
            

                   <?php
              $paginator = $this->Paginator;
   //           var_dump($messages);

            date_default_timezone_set('Asia/Manila');
            $dateToday = date('Y-m-d H:i:s');       

           //     $explodeContent = explode('@', $contentS); 


         //    var_dump($messages);

                 
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
                   
                     <td colspan='6' class="<?php echo $divclass; ?>">
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

        
      </tbody>
    </table>
  </center>
  </div>
</div>

  <?php  // var_dump($userList); ?>
   
       
   


<a href="#" id="showMore"><b><u>SEE MORE</u></b></a>

<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
     

        <?php
            //var_dump($userList);
        ?>
        <?php echo $this->Form->create('messages',array('controller' => 'messages','action' => 'send')); ?>
          <div class="form-group">
           

                   

            <div id='divSearch'>
              
            </div>

          </div>
           <div class="form-group">
             <label for="message-text" class="control-label">To:</label>

                        <select  id="singleSelectExample" name="to_id" class="form-control" style="width:100%">
                            <option></option><!-- Needed to show X image to clear the select -->
                            <?php

                           foreach ($userList as  $value) {
                          ?>

                         <option value="<?php echo $value['users']['id']; ?>">
                            <?php echo $value['users']['name']; ?>
                          </option> 

                          <?php
                          }

                          ?>
                         </select>
                    

                     <?php echo $this->Form->input(' ',array(
                        'name' => 'from_id',
                        'id' => 'from_id',
                        'class' => 'form-control',
                        'type' => 'hidden',
                        'value' => $this->Session->read('usersid')
                      )
                    );
                    ?>
          </div>
          <div class="form-group">
            <br />
            <label for="message-text" class="control-label">Message:</label>

            <?php
              echo $this->Form->textarea(' ',array(
                        'name' => 'content',
                        'id' => 'content2',
                        'class' => 'form-control'
                      ));


               echo $this->Form->input(' ',array(
                        'name' => 'created',
                        'id' => 'created',
                        'value' => $dateToday,
                        'type' => 'hidden'
                      ));

               echo $this->Form->input(' ',array(
                        'name' => 'modified',
                        'id' => 'modified',
                        'value' => $dateToday,
                        'type' => 'hidden'
                      ));

            ?>

          </div>
          <?php echo $this->Form->button('Send Message',array('id' => 'btn_login','class' => 'btn btn-primary','onclick' => "return validate()")); ?>
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
  <div id="send-pagination"></div>
  <input type="hidden" id="getPage" value="1">
<?php $countPages =   $this->params['paging']['Message']['count']; ?>
<input type="hidden" id="countPage" value="<?php echo $countRec; ?>">
<?php


 if($paginator->hasNext()){
         //   echo $paginator->next("Next",array('onlick'=>'getnextPAge()'));

            ?>
            <center>
              <input type="button" id="show-more_id" onclick="sha()" value="Show More">
            </center>
            <?php
        }

?>

