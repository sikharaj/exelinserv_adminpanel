<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!--<?php
    for($i=0;$i<=6;$i++){
      echo $i;
  }
  ?>-->
  <form enctype="multipart/form-data">
    <div class="container">
        <div class="well clearfix">
                <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
              </div>
    <table id="tbl_posts" width="150px" border="0" class="table table-striped">
      <thead>
        <tr>
          <th>Sl.No.</th>
          <th>Item</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Discount</th>
          <th>Tax Rate</th>
          <th>Product Unit</th>
          <th>Totals</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="tbl_posts_body">
            <tr id="rec-1">

            <td><span class="sn">1</span></td>

            <td>
              <input type="text" name="item" class="form-control name_list" id="slno"/>
            </td>
            <td>
                <input type="text" name="description" class="form-control name_list"/>
            </td>
            <td>
                <input type="number" name="qty" class="form-control name_list" />
            </td>
            <td>
              <input type="number" name="price" class="form-control name_list" />
            </td>
            <td>
              <input type="number" name="discount" class="form-control name_list" />
            </td>
            <td>
              <input type="number" name="taxrate" class="form-control name_list" />
            </td>
              <td>
                <input type="number" name="productunit" class="form-control name_list" />
            </td>
            <td>
              <input type="number" name="total" class="form-control name_list" />
            </td>
            <td>
              <a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div style="display:none;">
      <table id="sample_table">
        <tr id="">
         <td><span class="sn"></span>.</td>

                     <td>
                       <input type="text" name="item" class="form-control name_list" id="slno"/>
                     </td>
                     <td>
                         <input type="text" name="description" class="form-control name_list"/>
                     </td>
                     <td>
                         <input type="number" name="qty" class="form-control name_list" />
                     </td>
                     <td>
                       <input type="number" name="price" class="form-control name_list" />
                     </td>
                     <td>
                       <input type="number" name="discount" class="form-control name_list" />
                     </td>
                     <td>
                       <input type="number" name="taxrate" class="form-control name_list" />
                     </td>
                       <td>
                         <input type="number" name="productunit" class="form-control name_list" />
                     </td>
                     <td>
                       <input type="number" name="total" class="form-control name_list" />
                     </td><td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
       </tr>
     </table>
   </div>
</form>

  <script>
$("#TableView tr.item").each(function() {

           var quantity1=$(this).find("input.name").val();
           var quantity2=$(this).find("input.id").val();


           });
         </script>
   <!-- Script to increase the row size -->

    <script>
      jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
        size = jQuery('#tbl_posts >tbody >tr').length + 1,
        element = null,
        element = content.clone();
        element.attr('id', 'rec-'+size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
        });
      </script>

      <!-- Script to delete dynamic row -->

      <script>
      jQuery(document).delegate('a.delete-record', 'click', function(e) {
           e.preventDefault();
           var didConfirm = confirm("Are you sure You want to delete");
           if (didConfirm == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();

          //regnerate index number on table
          $('#tbl_posts_body tr').each(function(index) {
            //alert(index);
            $(this).find('span.sn').html(index+1);
          });
          return true;
        } else {
          return false;
        }
      });
      </script>

    </body>
</html>
