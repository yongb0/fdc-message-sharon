<?php
App::uses('AppModel', 'Model');


class User extends AppModel {

	 public $validate = array(
	 	'name' => array(
            'Rule-1' => array(
                'rule' => array('minLength',5),
                'message' => 'Name must between 5 to 20 characters'
            ),
            'Rule-2' => array(
                'rule' => array('maxLength',20),
                'message' => 'Name must between 5 to 20 characters'
            )
        ),
        'email' => array(   
            'Rule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'Email is strictly required'),
            'Rule-2' => array(
                'rule' => 'email',
                'message' => 'Invalid email format'),
            'Rule-3' => array(
                'rule' => array('isUnique', true),
                'message' => 'Email is already taken')
        ),
        'current-password' => array(
                'Rule-1' => array(
                    'rule' => array('minLength',8),
                    'message' => 'Current password must be at least 8 characters'
                ),
                'Rule-2' => array(
                    'rule' => array('differentPassword', 'password'),
                    'message' => 'New password must not the same to Current password'
                )
        ),
        'password' => array(
            'Rule-1' => array(
                'rule' => array('minLength',8),
                'message' => 'Password must be at least 8 characters'
            ),
            'Rule-2' => array(
                'rule' => array('match', 'cpassword'),
                'message' => 'Require the same value to password.'
            )
        ),
        'cpassword' => array(
            'Rule-2' => array(
                'rule' => array('minLength',8),
                'message' => 'Confirm password must be at least 8 characters'
            ),
            'Rule-1' => array(
                'rule' => array('match', 'password'),
                'message' => 'Require the same value to password.'
            )
        ),
         'birthdate' => array(
            'rule' => 'notEmpty',
            'message' => 'Birthdate is required'
        ),
        'gender' => array(
            'rule' => 'notEmpty',
            'message' => 'Gender is required'
        ),
        'hubby' => array(
            'rule' => 'notEmpty',
            'message' => 'Hubby is required'
        ),
       
    );
    
    public function match($check, $with) {

        foreach ($check as $k => $v) {
            $$k = $v;
        }
        $check = trim($$k);
        $with = trim($this->data[$this->name][$with]);
        if (!empty($check) && !empty($with)) {
            return $check == $with;
        }
        return false;

    }

    public function beforeValidate($options = array()) {

        if(empty($this->data[$this->alias]['id'])) {
            return true;
        } else {
            if (empty($this->data[$this->alias]["image"]["name"])) {
                unset($this->data[$this->alias]["image"]);
            }
            return true;
        }

    }

    public function differentPassword($check,$with) {

        foreach ($check as $k => $v) {
            $$k = $v;
        }
        $check = trim($$k);
        $with = trim($this->data[$this->name][$with]);

        if (!empty($check) && !empty($with)) {
            return $check !== $with;
        }
        return false;

    }

}
