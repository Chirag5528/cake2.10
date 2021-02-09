<?php

echo $this->Form->create('User',array(
	'inputDefaults' => array(
		'div' => array(
			'class' => 'mb-4'
		),
		'label' => array(

		)
	)
));

echo $this->Form->input(
	'User.email', array(
		'label' => array(
			'text' => 'Enter Email',
			'class' => 'block text-grey-darker text-sm font-bold mb-2'
		),
		'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker',
		'placeholder' => 'Enter Email'
	)
);

echo $this->Form->input(
	'User.password', array(
		'label' => array(
			'text' => 'Enter Password',
			'class' => 'block text-grey-darker text-sm font-bold mb-2'
		),
		'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker',
		'placeholder' => 'Enter Password'
	)
);

echo $this->Html->link(
	'Forgot Password?',
	'javascript:void(0)',
	array(
		'class' => 'inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-darker'
	)
);


$options = array(
	'label' => "Sign In",
	'class' => 'mt-4 bg-blue-600 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded'
);


echo $this->Html->div('flex items-center justify-between',
	$this->Form->end($options) . $this->Html->div(null, $this->Html->link(
		'Create a new account',
		array(
			'controller' => 'Users',
			'action' => 'add'
		),
		array(
			'class' => 'inline-block underline align-baseline font-bold text-sm text-blue-600 hover:text-blue-darker'
		)
	)
)
);

echo $this->Flash->render('auth');
?>
