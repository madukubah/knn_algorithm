<div class="footer">
  <div class="footer-inner">
    <div class="footer-content">
      <span class="bigger-120">
      <span class="red bolder">Madukubah </span>
       Application &copy; 2018 
      </span>
      &nbsp; &nbsp;
      <span class="action-buttons">
      <a href="#">
      <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
      </a>
      <a href="#">
      <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
      </a>
      <a href="#">
      <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
      </a>
      </span>
    </div>
  </div>
</div>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
<script src="<?php echo base_url();?>assets/jQuery.js"></script>
<script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
          $(this).next('ul').toggle();
          e.stopPropagation();
          e.preventDefault();
      });
    });

    function select_category( category_id , category_name)
    {
      console.log("select " + category_id +" "+ category_name);
      document.getElementById("category_name").value = category_name;
      document.getElementById("category_id").value = category_id;
    }
</script>

<script type="text/javascript">
  jQuery(function($){
    $('[data-rel=tooltip]').tooltip();
    $('[data-rel=popover]').popover({html:true});
  });
</script>
<script type="text/javascript">
    $( document ).ready(function() {
    });
</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckfinder/ckfinder.js"></script>
<script>
  function f(x)
  {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
    CKEDITOR.replace('editor'+x,{
            toolbar : 'MyToolbar',
            width:"100%",
            filebrowserBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html?type=Flash',
    });

  }
  
  var i = 1;
  while(i <= 100){
    f(i);
    i=i+1;
  }

    CKEDITOR.replace('editorx',{
            toolbar : 'MyToolbar',
            width:"100%",
            filebrowserBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html?type=Flash',
    });
  
//olah dokument

  

  
</script>
</body>
</html>
