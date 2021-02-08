<?php
echo $this->Form->create(false,
	array(
		'url' => array('controller' => 'Users','action' => 'add'),
		'id' => 'addUser',
		'type' => "POST"
	)
);
echo $this->Form->input('User.first_name', array( 'label' => 'First Name' ,'class' => 'mb-4 px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full' ));
echo $this->Form->input('User.last_name', array( 'label' => 'Last Name' ,'class' => 'mb-4 px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full' ));
echo $this->Form->input('User.email', array( array( 'label' => "Email" ),'class' => 'mb-4 px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full' ));
echo $this->Form->input('User.password', array(array( 'label' => "Password" ),'class' => 'px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full'));
echo $this->Form->input('User.phone', array( 'label' => 'Phone' ,'class' => 'mb-4 px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full' ));
$options = array(
	'label' => "Submit",
	'class' => 'bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 cursor-pointer',
	'div' => array(
		'class' => 'my-4'
	)
);
echo $this->Form->end($options);
?>
