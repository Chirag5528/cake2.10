<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array( 'class' => 'mb-4 px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full' ));
echo $this->Form->input('body', array('rows' => '3','class' => 'px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full'));
echo $this->Form->input('id', array('type' => 'hidden'));
$options = array(
		'label' => "Update",
		'class' => 'bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 cursor-pointer',
		'div' => array(
				'class' => 'my-4'
		)
);
echo $this->Form->end($options);
?>
