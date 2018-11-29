function timeSubmit() {
  var timesubmit = document.querySelector("#timesubmit");
  var today = new Date();

  timesubmit.value =
    today.toDateString() + " " + today.getHours() + ":" + today.getMinutes();
}
