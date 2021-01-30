<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(function(){
  function update(){
  $.getJSON("ajax.php",function(data){ 
  document.write(data.rdata);
  });
  }
  setInterval(update, 2000);
  update();
  });
</script>



