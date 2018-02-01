<html>
<head>
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<form enctype="multipart/form-data">
  <div class="well clearfix">
          <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
        </div>

      <table class="table table-bordered" id="tbl_posts" width="70%">
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
            <td><span class="sn">1</span>.</td>
            <td>Sanitary Inspector</td>
            <td>02</td>
            <td>21 to 42 years</td>
            <td><input type="number" name="productunit" class="form-control name_list" /></td>
            <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>


<div style="display:none;">
    <table id="sample_table">
      <tr id="">
       <td><span class="sn"></span>.</td>
       <td>ABC Posts</td>
       <td>04</td>
       <td>21 to 42 years</td>
       <td>5200-20200/-</td>
       <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
     </tr>
   </table>
 </div>
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
