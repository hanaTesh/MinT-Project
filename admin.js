// Include jQuery
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

// Click handler
$('.status-btn').click(function() {

  var button = $(this);
  
  // Toggle status
  var newStatus = button.data('status') == 'Checked' ? 'Not Checked' : 'Checked';

  // Update button text and data
  button.text(newStatus);
  button.data('status', newStatus);

  // Call update function
  updateStatus(button);

});

// Update status in DB
function updateStatus(button) {
    var row = button.closest('tr');  
    var id = $(row).find('td:first').text();
 
  
  $.ajax({
    url: 'update_status.php',
    type: 'POST',
    data: {
      id: id,
      status: status  
    }
  });

}