<?php
include 'Event.php';
class MyDataRecord {
  public function save()
  {
    // Actually save data here

    // Trigger the save event
    Event::trigger('save', array("Hello", "World"));
  }
}

$data = new MyDataRecord();
$data->save();
?>