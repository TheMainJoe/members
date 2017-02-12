<?php 
 
class Account_model extends CI_Model 
{

	public function std_register($reg_form)
    {
        $username = $reg_form['username'];
        $q = $this
            ->db
            ->where('username', $username)
            ->limit(1)
            ->get('admin');
        
        if( $q->result_id->num_rows == 0 )    
        {
            $pas = $this->password->hash($reg_form['password']);
            unset($reg_form['password']);       
            $reg_form['password'] = $pas;

            $query = $this->db->insert("admin",$reg_form); 

            if( !$query )
            {
                return "Account not created, please try again later.";
            }   
            else
            {
                return true;
            } 
        }
        else
        {
            return "Username already in use, please try another one.";
        }
	}

	public function user_login($username,$password)
    {        
        $q = $this
            ->db
            ->where('username', $username)
            ->limit(1)
            ->get('admin');

        $result = $q->row();

        if( $q->result_id->num_rows == 0 )
        {
            return false;
        }
        else
        {           
            if( $this->password->check_password( $password, $result->password ) ) 
            {
                return $result;
            }  
            else
            {
                return false;
            }   
        } 
    }

}