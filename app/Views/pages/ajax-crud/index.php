<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <title>Document</title>
</head>
<body>
<div class="container">

<h2>Add</h2>

<form method="post" action="javascript:void(0)" id="frm-my-form">
  <p>
    Name: <input type="text" name="name" id="name" placeholder="Enter name"/>
  </p>
  <p>
    <button type="submit">Submit</button>
  </p>
</form>

<h2>Edit</h2>
<form method="post" action="javascript:void(0)" id="my-form-edit">
  <p>
    id: <input type="text" name="data_id" id="data_id" placeholder="Enter name"/>
  </p>
  <p>
    new Name: <input type="text" name="new_name" id="new_name" placeholder="Enter name"/>
  </p>
  <p>
    <button type="submit">Submit</button>
  </p>
</form>
      
</div>

<table>
    <tbody>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
    </tbody>
    <tbody id="table">
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
      
<script>
  $("#frm-my-form").on("submit", function(){
      var dataJson = { 
        name: $("#name").val()
      };

    $.ajax({
        url : "<?php echo base_url('public/submit-data'); ?>",
        type: 'post',
        data: dataJson, 
        dataType: "json",         
        success : function(data)
        {   
            console.log(data);
        }  
    });
  });

  function fetch(){
    // $request = service('request');
    // $postData = $request->getPost();

    $.ajax({
        url : "<?php echo base_url('public/ajax/getdata'); ?>",
        type: 'post',
        dataType: "json",
        success : function(data)
        {
            // a = JSON(data);
            // console.log(data);

            var tbody="";

            for(var key in data){
                tbody += "<tr>";
                tbody += "<td>"+data[key]['id']+"</td>";
                tbody += "<td>"+data[key]['name']+"</td>";
                // tbody += "<td><a href='"+data[key]['id']+"'>Edit</a></td>";
                tbody += "<td><button type='button' class='delete' data-id='"+data[key]['id']+"' id='delete'>Delete</button></td>";
                tbody += "</tr>";
            }
            $('#table').html(tbody);

            //function_name , 1s refresh/millisecond count
            // setTimeout(fetch, 1000);
        } 
    });
  }
  //lunch function
  fetch();

  $("#my-form-edit").on("submit", function(){
    var dataJson = { 
        data_id: $("#data_id").val(),
        new_name: $("#new_name").val()
      };
      console.log(dataJson);
    // die(myurl);
    $.ajax({
      url:"<?php echo base_url('public/ajax/update_data'); ?>",
        type:"post",
        dataType:"json",
        data:dataJson,
        success: function(data){
          // console.log(data);
        }
      });
  });

  // function edit_data(){
  //   var id = $("#data_id").val();
  //   var name = $("#new_name").val();
  //   var myurl = "<?php echo base_url('public/ajax/update_data'); ?>/".id;

  //   die(myurl);

  //   $.ajax({
  //     url:"",
  //     type:"post",
  //     dataType:"json",
  //     data:mydata,
  //     success: function(data){
  //       console.log(data);
  //     }
  //   });
  // }

  $(document).on("click", ".delete" ,function(){
      var id = $(this).data('id');
      $.ajax({
        url:"<?php echo base_url('public/ajax/delete_data'); ?>",
        type:"post",
        dataType:"json",
        data:{id:id},
        success: function(data){
          console.log(data);
        }
      });
  });
</script>
</body>
</html>