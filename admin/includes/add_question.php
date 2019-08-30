<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

?>
<section class="col s12 m6 offset-m2">
<h4 class="center-align">Add Question</h4>
<?php  

if(isset($_POST["add_question"])) {
  if(!empty($_POST["question"]) && !empty($_POST["opt1"]) && !empty($_POST["opt2"]) && !empty($_POST["answer"])) {

    $question = ucfirst(htmlentities($_POST["question"]));
    $opt1 = ucfirst($_POST["opt1"]);
    $opt2 = ucfirst($_POST["opt2"]);
    $answer = "";
    if($_POST["answer"] === "opt1") {
      $answer = $opt1;
    } else {
      $answer = $opt2;
    }
    

    $sql_query = "INSERT INTO questions(`question`, `opt1`, `opt2`, `answer`) VALUES('$question', '$opt1', '$opt2', '$answer')";

    if(mysqli_query($dbc, $sql_query)){
      echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Course added sucessfully<i class='close mdi mdi-close'></i></div>";
      mysqli_close($dbc);
    }else{
      echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Error adding course<i class='close mdi mdi-close'></i></div>";
      mysqli_close($dbc);
    }
  } else {
    echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Error adding course<i class='close mdi mdi-close'></i></div>";
  }
  
}

?>
	<div class="card-panel">
		<form action="admin.php?action=add_question" method="POST">
      <div class="input-field">
        <i class="mdi mdi-file-document-box prefix"></i>
        <textarea name="question" id="question" class="materialize-textarea"></textarea>
        <label for="course_desc">Question:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-library-books prefix"></i>
        <input id="opt1" type="text" class="validate" name="opt1" required>
        <label for="course">First Option:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-library-books prefix"></i>
        <input id="opt2" type="text" class="validate" name="opt2" required>
        <label for="course">Second Option:</label>
      </div>
      <div class="input-field ">
				<i class="mdi mdi-library-books prefix"></i>
		    <select name="answer">
		      <option value="" disabled selected>Choose answer</option>
		      <option value="opt1">First Option</option>
          <option value="opt2">Second Option</option>
		    </select>
		    <label>Select Course</label>
		  </div>
      <br>
      <button class="btn waves-effect hoverable waves-light block teal btn-large" type="submit" name="add_question">Add Course</button>
		</form>
	</div>
</section>