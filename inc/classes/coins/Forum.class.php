<?php 
//setImgURL

class Forum {

    public function forumQuestionByID($questionID) {
        $sql = 'SELECT * FROM forum_question WHERE questionID = ' . $questionID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->questionID = $row['questionID'];
        $this->topic = $row['topic'];
        $this->detail = $row['detail'];
		$this->userID = $row['userID'];		
		$this->datetime = $row['datetime'];
        $this->view = $row['view'];
        $this->reply = $row['reply'];
		$this->topicCategory = $row['coinCategory'];
		$this->imageURL = $row['imageURL'];
		$this->notify = $row['notify'];
        return true;
    }
	

	public function getTopic() {
        return strip_tags($this->topic);
    }	
	public function getTopicCategory() {
        return strip_tags($this->topicCategory);
    }
	public function getDetail() {
		$allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <hr> <div> <img>';	
		$this->stripInlineScripts($this->detail);
        return strip_tags($this->detail, $allow);
    }
	public function stripInlineScripts($value) {
		 preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
	}		
	
	public function getAsker() {
        return strip_tags($this->userID);
    }
	public function getPostedDate() {
        return strip_tags($this->datetime);
    }
	public function getViews() {
        return strip_tags($this->view);
    }	
	public function getReplies() {
        return strip_tags($this->reply);
    }
	public function getImgURL() {
        return strip_tags($this->imageURL);
    }
	public function setImgURL($imageURL, $questionID){
		$sql = mysql_query("UPDATE forum_question SET imageURL = '$imageURL' WHERE questionID = '$questionID'") or die(mysql_error()); 
		return;
	}
	
    public function getAnswerById($a_id) {
        $sql = mysql_query("SELECT * FROM forum_answer WHERE a_id = '$a_id'") or die(mysql_error()); 
        $row = mysql_fetch_array($sql);
        $this->answerID = $row['a_id'];
        $this->originalQuestionID = $row['question_id'];
        $this->responder = $row['userID'];
		$this->answer = $row['a_answer'];
		$this->answerDate = $row['a_datetime'];		
        return true;
    }
	public function getAnswerID() {
        return strip_tags($this->answerID);
    }	
	public function getOriginalQuestionID() {
        return strip_tags($this->originalQuestionID);
    }	
	public function getResponder() {
        return strip_tags($this->responder);
    }
	public function getAnswer() {
        return strip_tags($this->answer);
    }
    public function getAnswerCount($coinClubID) {
		$sql = mysql_query("SELECT * FROM forum_answer WHERE questionID = '$questionID'") or die(mysql_error()); 
        return mysql_num_rows($sql);    	
    }

    public function getReponderUserNamer($a_id) {
		$this->getAnswerById($a_id);
		$User = new User();
		$User->getUserById($this->getResponder());
        return $User->getUserName();
    }
	
    public function getAskerUserNamer($questionID) {
		$this->forumQuestionByID($questionID);
		$User = new User();
		$User->getUserById($this->getAsker());
        return $User->getUserName();
    }
	
    public function getQuestionsByUser($userID) {
		$sql = mysql_query("SELECT * FROM forum_question WHERE userID = '$userID'") or die(mysql_error()); 
		return mysql_num_rows($sql); 
    }
	
	public function getAnswersByUser($userID) {
		$sql = mysql_query("SELECT * FROM forum_answer WHERE userID = '$userID'") or die(mysql_error()); 
		return mysql_num_rows($sql); 
    }
	public function getAnswerAvatar($userID){
		$sql = mysql_query("SELECT * FROM forum_answer WHERE userID = '$userID'") or die(mysql_error()); 
		$answered = mysql_num_rows($sql); 
		switch ($answered) { 
	  case $answered < 99: 
		return '(Forum Level 1)';
		break; 
	  case $answered >= 100 and $answered <= 199: 
		return '(Forum Level 2)';
		break; 
	  case $answered >= 200 and $answered <= 499:  
		return '(Forum Level 3)';
		break; 
	  case $answered > 500: 
		return '(Forum Level 4)'; 
		break; 
	  }
		
	}
	
	
	
	
	
	
	
	public function setReplyNumber($questionID){
		$sql = mysql_query("UPDATE forum_question SET reply = reply + 1 WHERE questionID = '$questionID'") or die(mysql_error()); 
		return;
	}	
	public function setViewNumber($questionID, $userID){
		$this->forumQuestionByID($questionID);
		if($this->getAsker() == $userID){
			return false;
		} else {
			$sql = mysql_query("UPDATE forum_question SET view = view + 1 WHERE questionID = '$questionID'") or die(mysql_error()); 
		return true;
		}
	}
	public function getTopicsByCategory($coinCategory){
		$sql = mysql_query("SELECT * FROM forum_question WHERE coinCategory = '$coinCategory'") or die(mysql_error());  
		return mysql_num_rows($sql); 
	}
	public function getTopicViewsByCategory($coinCategory){
		$sql = mysql_query("SELECT COALESCE(sum(view), 0) FROM forum_question WHERE coinCategory = '$coinCategory'") or die(mysql_error()); 
	    while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(view), 0)'];
			  }
			  return $coinSum;	
	}
	public function getTopicRepliesByCategory($coinCategory){
		$sql = mysql_query("SELECT COALESCE(sum(reply), 0) FROM forum_question WHERE coinCategory = '$coinCategory'") or die(mysql_error()); 
	    while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(reply), 0)'];
			  }
			  return $coinSum;	
	}
	public function getLastPostByCategory($coinCategory){
		$sql = mysql_query("SELECT * FROM forum_question WHERE coinCategory = '$coinCategory' ORDER BY questionID DESC LIMIT 1") or die(mysql_error()); 
		if(mysql_num_rows($sql) == 0){
			return 'No Posts';
		} else {
	    while($row = mysql_fetch_array($sql))
			  {
				$datetime = $row['datetime'];
			  }
			  return $datetime;	
	}	
	}
	
	
}//End Class
?>