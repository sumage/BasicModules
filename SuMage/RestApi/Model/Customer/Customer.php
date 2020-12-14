public function login($email, $password) {
    	$login = array();
    	if($email)
        	$login['username'] = $email;
    	if($password)
        	$login['password'] = $password;

    	
    	if (!empty($login['username']) && !empty($login['password'])) {
        	try {
            	$customer = $this->customerAccountManagement->authenticate($login['username'], $login['password']);
            	$code = 1;
            	$message = array('id'=>$customer->getId(),'email'=>$customer->getEmail(),'name'=>ucwords($customer->getFirstName().' '.$customer->getLastName()));

        	} catch (EmailNotConfirmedException $e) {
            	$value = $this->customerUrl->getEmailConfirmationUrl($login['username']);
            	$message = __(
                	'This account is not confirmed.' .
                	' <a href="%1">Click here</a> to resend confirmation email.',
                	$value
            	);
            	$code = array('status'=>0,'message'=>$message);
        	} catch (AuthenticationException $e) {
            	$message = __('Invalid login or password.');
            	$code = 0;
        	} catch (\Exception $e) {
            	$message = __('Invalid login or password.');
            	$code = 0;
        	}
    	} else {

        	$message = __('Invalid login or password.');
        	$code = 0;
    	}
    	return array(array('message' => $message,'status'=>$code));
	}
}
