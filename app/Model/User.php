<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
    //!Hay un error interno con las validaciones
    // public $validate = array(
    //     'name' => array(
    //         'length' => array(
    //             'rule' => array('between', 4, 25),
    //             'message'=> 'Name must be between 4 and 25 characters long.'
    //         ),
    //         'onlyLetters' => array(
    //             'rule' => 'alpha',
    //             'message' => 'Name must not contain numbers or symbols.'
    //         )
    //     ),
    //     'email' => array(
    //         'validEmail' => array(
    //             'rule' => 'email',
    //             'message'=> 'Please enter a valid email.',
    //         ),
    //         'notNull' => array(
    //             'rule' => 'notBlank',
    //             'message' => 'Required field.'
    //         ),
    //         'length' => array(
    //             'rule' => array('maxLength', 100),
    //             'message' => 'Email too long.'
    //         )
    //     ),
        // 'phone' => array(
            // 'onlyNumbers' => array(
            //     'rule' => ,
            //     'message' => 'Please enter a valid phone number.'
            // ),
            // 'length' => array(
            //     'rule' => array('maxLength', 20),
            //     'message' => 'Phone number too long.'
            // )
        // )
    // );
}