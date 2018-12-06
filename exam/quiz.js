var question = -1;
var q0 = "Are hedgehogs illegal to own in Colorado?";
var q1 = "Do hedgehogs love mealworms?";
var q2 = "Are hedgehogs nocturnal?";
var q3 = "Do hedgehogs enjoy dog food?";
score = 0;
round = 0;
$(document).ready(function() {
  $("#click").hide();
  $("#ques").hide();

  setScore(0);
});

$(document).ready(function() {
  $(".questions button").hover(
    function() {
      $(this).css("background-color", "navy");
      $(this).css("color", "white");
      $(this).css("border-color", "white");
      if (question == -1) {
        $("#click").show();
        $("#ques").hide();
        $("#click").text("Click button to diplay question:");
      }
    },
    function() {
      $(this).css("background-color", "white");
      $(this).css("color", "navy");
      $(this).css("border-color", "navy");

      $("#click").hide();
    }
  );
});

$(document).ready(function() {
  $(".answer_content button").hover(
    function() {
      $(this).css("background-color", "navy");
      $(this).css("color", "white");
      $(this).css("border-color", "white");
    },
    function() {
      $(this).css("background-color", "white");
      $(this).css("color", "navy");
      $(this).css("border-color", "navy");
    }
  );
});

$(document).ready(function() {
  $(".illegal").click(function() {
    if (question == -1) {
      $("#click").hide();
      $("#ques").show();
      $("#ques").text(q0);
      question = 0;
      $(this).css("background-color", "yellow");
      $(this).css("color", "navy");
      $(this).css("border-color", "navy");
    } else {
      alert("Must answer current question");
    }
  });
});

$(document).ready(function() {
  $(".mealworms").click(function() {
    if (question == -1) {
      $("#click").hide();
      $("#ques").show();
      $("#ques").text(q1);
      question = 1;
      $(this).css("background-color", "yellow");
      $(this).css("color", "navy");
      $(this).css("border-color", "navy");
    } else {
      alert("Must answer current question");
    }
  });
});

$(document).ready(function() {
  $(".nocturnal").click(function() {
    if (question == -1) {
      $("#click").hide();
      $("#ques").show();
      $("#ques").text(q2);
      question = 2;
      $(this).css("background-color", "yellow");
      $(this).css("color", "navy");
      $(this).css("border-color", "navy");
    } else {
      alert("Must answer current question");
    }
  });
});

$(document).ready(function() {
  $(".dog_food").click(function() {
    if (question == -1) {
      $("#click").hide();
      $("#ques").show();
      $("#ques").text(q3);
      question = 3;
      $(this).css("background-color", "yellow");
      $(this).css("color", "navy");
      $(this).css("border-color", "navy");
    } else {
      alert("Must answer current question");
    }
  });
});

$(document).ready(function() {
  $("#true").change(function() {
    if ($("#ques").is(":hidden")) {
      alert("Must select question and answer it to check question.");
      $("#true").prop("checked", false);
    }
  });
});

$(document).ready(function() {
  $("#false").change(function() {
    if ($("#ques").is(":hidden")) {
      alert("Must select question and answer it to check question.");
      $("#false").prop("checked", false);
    }
  });
});

/* Check answer */
$(document).ready(function() {
  $("#check_answer").click(function() {
    if ($("#true").is(":checked")) {
      calcScore(1);
      $("#true").prop("checked", false);
    } else if ($("#false").is(":checked")) {
      calcScore(0);
      $("#false").prop("checked", false);
    } else {
      alert("Must select true/false.");
    }
  });
});

function calcScore(answer) {
  round = round + 1;
  var wasCorrect = 0;
  var gotRight = "Incorrect";
  var msg;
  if (question == 0) {
    if (answer == 0) {
      score = score + 1;
      wasCorrect = 1;
      setScore(score);
      gotRight = "Correct";
    }
    msg = "<li> Illegal - " + gotRight + "</li>";
    $("#prev_questions").append(msg);
    $(".illegal").hide();
  } else if (question == 1) {
    if (answer == 1) {
      score = score + 1;
      setScore(score);
      wasCorrect = 1;
      gotRight = "Correct";
    }
    msg = "<li> Mealworms - " + gotRight + "</li>";
    $("#prev_questions").append(msg);
    $(".mealworms").hide();
  } else if (question == 2) {
    if (answer == 1) {
      score = score + 1;
      setScore(score);
      wasCorrect = 1;
      gotRight = "Correct";
    }
    msg = "<li> Nocturnal - " + gotRight + "</li>";
    $("#prev_questions").append(msg);
    $(".nocturnal").hide();
  } else if (question == 3) {
    if (answer == 0) {
      score = score + 1;
      setScore(score);
      wasCorrect = 1;
      gotRight = "Correct";
    }
    msg = "<li> Dog Food - " + gotRight + "</li>";
    $("#prev_questions").append(msg);
    $(".dog_food").hide();
  }
  $("#ques").hide();
  question = -1;
  endGame(score, round);
  return wasCorrect;
}

function setScore(s) {
  var percent;
  percent = (s / 4) * 100;
  $("#score").empty();
  $("#score").html("Score: " + s + "/4 (" + percent + "%)");
}

$(document).ready(function() {
  $(".popup").dblclick(function() {
    if ($(".popup").is(":visible")) {
      $(".popup").fadeOut(700);
    }
  });
});
