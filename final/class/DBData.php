<?php
	class DBData extends saasDB
	{
		protected $errorList = array();

		public function validateAll()
		{
			$this->emailIsValid();
			$this->titleIsValid();
			$this->addressIsValid();
			$this->phoneIsValid();
			$this->aboutIsValid();

			return ( count ($this->errorList) ? false : true);
		}

		public function emailIsValid()
		{
			if (array_key_exists("email", $_POST))
			{
				if (!Validator::emailIsValid($_POST['email']))
				{
					$this->errorList['email'] = "Email is not valid! <br/>";
					return false;
				}
			}
			else
			{
				$this->errorList['email'] = "Email is required. <br/>";
				return false;
			}
			return true;
		}


		public function titleIsValid()
		{
			if (array_key_exists("title", $_POST))
			{
				if (!Validator::isString($_POST['title']))
				{
					$this->errorList['title'] = "Title is not valid! <br/>";
					return false;
				}
			}
			else
			{
				$this->errorList['title'] = "Title is required. <br/>";
				return false;
			}
			return true;
		}

		public function addressIsValid()
		{
			if (array_key_exists("address", $_POST))
			{
				if (!Validator::isString($_POST['address']))
				{
					$this->errorList['address'] = "Address is not valid! <br/>";
					return false;
				}
			}
			else
			{
				$this->errorList['address'] = "Address is required. <br/>";
				return false;
			}
			return true;
		}

		public function phoneIsValid()
		{
			if (array_key_exists("phone", $_POST))
			{
				if (!Validator::isPhone($_POST['phone']))
				{
					$this->errorList['phone'] = "Phone is not valid! <br/>";
					return false;
				}
			}
			else
			{
				$this->errorList['phone'] = "Phone is required. <br/>";
				return false;
			}
			return true;
		}

		public function aboutIsValid()
		{
			if (array_key_exists("about", $_POST))
			{
				if (!Validator::isString($_POST['about']))
				{
					$this->errorList['about'] = "About is not valid! <br/>";
					return false;
				}
			}
			else
			{
				$this->errorList['about'] = "About is required. <br/>";
				return false;
			}
			return true;
		}

		public function getErrorList()
		{
			return $this->errorList;
		}

		public function getDBDataFrom($userID){
			$db = $this->getDB();
			if ( null != $db ) {
	            $stmt = $db->prepare('select * from page where user_ID = :userIDValue');
	            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT); 
	            $stmt->execute();
	            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
	            if ( count($result) )
	            {
	                return $result; 
	            }
        	}
		}
		
		public function saveAll($userID){
			$db = $this->getDB();
			$stmt = $db->prepare('UPDATE page '
				. 'SET title = :titleValue, theme = :themeValue, address = :addressValue, phone = :phoneValue, email = :emailValue, about = :aboutValue '
				. 'WHERE user_id = :userIDValue');
			$stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT); 
			$stmt->bindParam(':titleValue', $_POST['title'], PDO::PARAM_STR); 
			$stmt->bindParam(':themeValue', $_POST['theme'], PDO::PARAM_STR); 
			$stmt->bindParam(':addressValue', $_POST['address'], PDO::PARAM_STR); 
			$stmt->bindParam(':phoneValue', $_POST['phone'], PDO::PARAM_STR); 
			$stmt->bindParam(':emailValue', $_POST['email'], PDO::PARAM_STR); 
			$stmt->bindParam(':aboutValue', $_POST['about'], PDO::PARAM_STR); 

			$stmt->execute();
		}
		

			public function getUserID()
	    {
	        $db = $this->getDB();
	        $stmt = $db->prepare('SELECT user_id, email FROM users WHERE email = :emailValue LIMIT 1');
	        $stmt->bindParam(':emailValue', $_SESSION['email'], PDO::PARAM_STR);
	        if ($stmt->execute())
	        {
	            $result = $stmt->fetch(PDO::FETCH_ASSOC);
	            return intval($result['user_id']);        
	        }
	    }

	    public function getWebsite($userID)
	    {
	        $db = $this->getDB();
	        $stmt = $db->prepare('SELECT website, user_id FROM users WHERE user_id = :userIDValue LIMIT 1');
	        $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_STR);
	        if ($stmt->execute())
	        {
	            $result = $stmt->fetch(PDO::FETCH_ASSOC);
	            return $result['website'];        
	        }
	    }

	        
	        
	    public function addDefault()
	    {
	        $userID = $this->getUserID();
	        $email = $_SESSION['email'];
	        $_SESSION['userid'] = $userID;
	        $db = $this->getDB();

	        try
	        {
	            $stmt = $db->prepare(
	                      'insert into page '
	                    . 'set user_id = :userIDValue, title = "My Title", theme = "theme1", address = "My Address", phone = "4015551122", email = :emailValue, about = "Enter some text about yourself"');
	            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT);
	            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
	            //$stmt->bindParam(':active', $active, PDO::PARAM_INT);
	            //Executes all of the above code within the try
	            $stmt->execute();
	        } 
	        catch (PDOException $e) 
	        {
	            //If there is a PDO exception, print Database error
	            echo $e->getMessage();
	        }
	    }
	}


?>