<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  // Wait till the document has loaded
  $(function() {
    // For all anchors inside our table cells, add an onclick event
    $('#calendar td a').click(
      function (event) { 
        // Stop the link from triggering
        event.preventDefault();
        // Stop the body click from triggering
        event.stopPropagation();
        
        // Remove existing tooltips:
        $('#calendar td div').remove();
        
        // Create a simple container for our data
        var tooltip = $('<div/>').css("position", "absolute").addClass('tooltip');


        // Perform the AJAX request to the anchors link
        $.ajax({
          url: this.href,
          dataType: "json",
          method: "POST",
          success: function(data) {
              
            // On success, add the data inside our tooltip
            alert("<p><b>Event:</b> " + data.title + "<br /> <b>Date:</b> " +data.date+ "</p>");

            // Add the tooltip to the table cell
            // this.parent().append(tooltip);
          }
        });
      }
    );
    
    // Add an onclick to the body to remove existing tooltips so the user can move on by clicking anywhere
    $('body').click(function() {
      $('#calendar td div').remove();
    });
  });
</script>
<!-- Set an ID of calendar -->
<table id="calendar" cellpadding="0" cellspacing="0">
  <tr>
    <!-- Show the current Month -->
    <th colspan="7">May 2011</th>
  </tr>
  <tr>
    <!-- Days of the Week -->
    <th>S</th>
    <th>M</th>
    <th>T</th>
    <th>W</th>
    <th>T</th>
    <th>F</th>
    <th>S</th>
  </tr>
  <!-- Days -->
  <tr>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>
      <!-- Link to each event on the appropriate day -->
      <a href="event.php?id=189">4</a>
    </td>
    <td>5</td>
    <td>6</td>
    <td><a href="event.php?id=194">7</a></td>
  </tr>
  <tr>
    <td>8</td>
    <td>9</td>
    <td><a href="event.php?id=234">10</a></td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
  </tr>
  <tr>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td><a href="event.php?id=300">20</a></td>
    <td>21</td>
  </tr>
  <tr>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
  </tr>
  <tr>
    <td>29</td>
    <td>30</td>
    <td><a href="event.php?id=1337">31</a></td>
    <td colspan="4">
        <!-- Fill in the leftover days with blanks -->
    </td>
  </tr>
</table>